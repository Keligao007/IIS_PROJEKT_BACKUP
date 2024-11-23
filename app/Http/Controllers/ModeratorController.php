<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriaPlodin;
use App\Models\KategoriaPlodinAtribut;
use App\Models\Atribut;
use App\Models\Nabidka;
use App\Models\NavrhKategorie;
use App\Models\NavrhKategorieAtribut;
use Illuminate\Http\Request;

class ModeratorController extends Controller
{
    public function moderator()
    {
        return view('moderator/moderator');
    }

    // ------------ KATEGORIE
    
    public function moderator_kategorie()
    {
        $default_kategorie = KategoriaPlodin::whereIn('id', [1, 2, 3])->get();
        
        $kategorie = KategoriaPlodin::with('atributy')
                ->whereNotIn('id', [1, 2, 3])
                ->get();

        return view('moderator/mod_kategorie', compact('kategorie', 'default_kategorie'));
    }

    public function show_kategorie_detail($id)
    {
        $kategoria = KategoriaPlodin::with('atributy')->findOrFail($id);

        $nepriradeneAtributy = Atribut::whereNotIn('id', $kategoria->atributy->pluck('id'))->get();

        return view('moderator/mod_show_kategorie_detail', compact('kategoria', 'nepriradeneAtributy'));
    }

    public function add_atribut(Request $request, $id)
    {
        $request->validate([
            'atribut_id' => 'required|exists:atribut,id',
        ]);

        $kategoria = KategoriaPlodin::findOrFail($id);

        // Skontrolovať, či už atribút nie je priradený
        if ($kategoria->atributy()->where('kategoria_plodin_atribut.id_atribut', $request->atribut_id)->exists()) {
            return redirect()->back()->withErrors('Tento atribút je už priradený k tejto kategórii.');
        }

        // Pridanie atribútu ku kategórii
        $kategoria->atributy()->attach($request->atribut_id);

        return redirect()->route('show_kategorie_detail', ['id' => $id])->with('success', 'Atribút bol pridaný.');

    }

    public function delete_atribut($id, $atributId)
    {
        $kategoria = KategoriaPlodin::findOrFail($id);

        // Odstránenie atribútu zo všetkých relevantných tabuliek
        $kategoria->atributy()->detach($atributId);

        // Ak treba, odstráň záznamy aj z iných tabuliek súvisiacich s touto kategóriou!!!

        return redirect()->route('show_kategorie_detail', ['id' => $id])->with('success', 'Atribút bol odstránený.');

    }

    public function delete_kategoria($id) {
        $polozka = KategoriaPlodin::find($id);
        
        if (!$polozka) {
            return redirect()->route('moderator_kategorie')->with('error', 'Položku sa nepodarilo zmazať.');
        }

        KategoriaPlodin::where('id', $id)->delete();

        // Odstránenie všetkých atribútov priradených k danej kategórii
        $polozka->atributy()->detach();

        // Odstránenie všetkých záznamov tejto kategórie v Nabídka
        Nabidka::where('id_kategoria_plodin', $id)->delete();

        return redirect()->route('moderator_kategorie')->with('success', 'Kategria bola úspešne vymazaná.');
        
    }
    
    // ------------ NAVRHY

    public function moderator_navrhy() {
        $navrhy = NavrhKategorie::all();

        return view('moderator/mod_narvhy', compact('navrhy'));
    }

    public function show_navrh_detail($id) {
        $navrh = NavrhKategorie::with('atributy')->findOrFail($id);

        $parent_name = NavrhKategorie::with('parent_kategoria')->findOrFail($id);

        $atributy = NavrhKategorie::with(['atributy.atribut'])->findOrFail($id);

        return view('/moderator/mod_show_navrhy_detail', compact('navrh', 'parent_name', 'atributy'));
    }

    public function navrh_odmietnut($id)
    {
        $navrh = NavrhKategorie::findOrFail($id);

        // Odstránenie priradených záznamov v `NavrhKategorieAtribut`
        NavrhKategorieAtribut::where('id_navrh_kategorie', $id)->delete();

        // Odstránenie samotného návrhu
        $navrh->delete();

        // return redirect()->back()->with('success', 'Návrh bol odmietnutý.');
        return redirect()->route('moderator_navrhy')->with('success', 'Návrh bol odmietnutý.');
    }

    public function navrh_schvalit($id)
    {
        $navrh = NavrhKategorie::findOrFail($id);

        // Vytvorenie novej kategórie
        $novaKategoria = KategoriaPlodin::create([
            'meno' => $navrh->meno,
            'parent_kategoria_id' => $navrh->parent_kategoria_id,
        ]);

        // Získanie priradených atribútov k návrhu
        $atributy = NavrhKategorieAtribut::where('id_navrh_kategorie', $id)->get();

        // Pridanie atribútov k novej kategórii
        foreach ($atributy as $atribut) {
            KategoriaPlodinAtribut::create([
                'id_kategoria_plodin' => $novaKategoria->id,
                'id_atribut' => $atribut->id_atribut,
            ]);
        }

        // Odstránenie návrhu a jeho priradených atribútov
        NavrhKategorieAtribut::where('id_navrh_kategorie', $id)->delete();
        $navrh->delete();

        return redirect()->route('moderator_navrhy')->with('success', 'Návrh bol schválený a nová kategória bola vytvorená.');
    }
}
