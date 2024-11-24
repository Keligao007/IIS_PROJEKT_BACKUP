<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriaPlodin;
use App\Models\Atribut;
use App\Models\NavrhKategorie;
use App\Models\Nabidka;
use App\Models\NabidkaAtribut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrovanyUzivatelController extends Controller
{
    public function user() {
        return view('user/user');
    }

    public function destroy($id)
    {
        $nabidka = Nabidka::findOrFail($id);
        $nabidka->delete();

        return redirect()->route('zobrazit_nabidky')->with('success', 'Ponuka bola úspešne zmazaná.');
    }
    
    public function navrhnut_kategoriu() {
        $kategorie = KategoriaPlodin::whereIn('id', [2, 3])->get();

        // Načítanie všetkých dostupných atribútov
        $atributy = Atribut::all();

        return view('user/user_navrh_kategorie', compact('kategorie', 'atributy'));
    }

    public function ulozit_navrh_kategorie(Request $request)
    {
        // Kontrola prihlásenia
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Musíte byť prihlásený.');
        }

        // Validácia údajov
        $request->validate([
            'meno' => 'required|string|max:255',
            'parent_kategoria_id' => 'required|integer|exists:kategoria_plodin,id',
            'atributy' => 'array',
            'atributy.*' => 'integer|exists:atribut,id',
        ]);

        // Získaj aktuálneho používateľa
        $user = Auth::user();

        // Vytvorenie návrhu kategórie
        $navrhKategoria = NavrhKategorie::create([
            'meno' => $request->meno,
            'parent_kategoria_id' => $request->parent_kategoria_id,
            'id_uzivatel' => $user->id,
        ]);

        // Priradenie vybraných atribútov
        if ($request->has('atributy')) {
            $navrhKategoria->atributy_navrh()->sync($request->atributy);
        }

        // Presmerovanie späť s úspešnou správou
        return redirect()->route('navrhnut_kategoriu')->with('success', 'Návrh kategórie bol úspešne odoslaný.');
    }


    public function vlozit_nabidku(Request $request) {
        // Získanie kategórií, ktoré neobsahujú ID 1, 2, 3
        $kategorie = KategoriaPlodin::whereNotIn('id', [1, 2, 3])->get();

        // // Inicializácia atributov
        // $atributy = Atribut::whereHas('kategorie', function ($query) use ($request) {
        //     $query->where('kategoria_plodin.id', $request->id_kategoria_plodin);
        // })->get();

        // Získanie atribútov pre vybranú kategóriu
        $atributy = Atribut::whereHas('kategorie', function ($query) use ($request) {
            $query->where('kategoria_plodin.id', $request->id_kategoria_plodin);
        })->get();

        return view('user/user_vlozit_nabidku', compact('kategorie', 'atributy'));
    }

    public function ulozit_nabidku(Request $request)
    {
        // Kontrola prihlásenia
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Musíte byť prihlásený.');
        }

        // Validácia údajov
        $request->validate([
            'meno' => 'required|string|max:255',
            'id_kategoria_plodin' => 'required|integer|exists:kategoria_plodin,id',
            'atributy' => 'array',
            'atributy.*.id' => 'integer|exists:atribut,id',
            'atributy.*.hodnota' => 'required|string|max:255',
        ]);

        // Získanie aktuálneho používateľa
        $user = Auth::user();

        // Vytvorenie ponuky
        $nabidka = Nabidka::create([
            'meno' => $request->meno,
            'id_kategoria_plodin' => $request->id_kategoria_plodin,
            'id_uzivatel' => $user->id,
        ]);

        // Priradenie vyplnených atribútov
        if ($request->has('atributy')) {
            foreach ($request->atributy as $atribut) {
                NabidkaAtribut::create([
                    'id_nabidka' => $nabidka->id,
                    'id_atribut' => $atribut['id'],
                    'hodnota' => $atribut['hodnota'],
                ]);
            }
        }

        // Presmerovanie s úspešnou správou
        return redirect()->route('vlozit_nabidku')->with('success', 'Nabídka bola úspešne vytvorená.');
    }


    public function zobrazit_nabidky() {
        // Predpokladáme, že id prihláseného používateľa je dostupné cez auth
        $userId = Auth::user()->id;

        // Načítanie ponúk s atribútmi a názvami atribútov
        $nabidky = Nabidka::where('id_uzivatel', $userId)
            ->with(['atributy.atribut']) // Načítaj vzťahy
            ->get();
        
        return view('user/zobrazit_nabidky', compact('nabidky'));
    }

    public function nabidka_edit($id)
    {
        $nabidka = Nabidka::with(['atributy.atribut'])->findOrFail($id);

        // Skontroluj, či ponuka patrí prihlásenému používateľovi
        if ($nabidka->id_uzivatel !== Auth::user()->id) {
            abort(403, 'Nemáte povolenie upravovať túto ponuku.');
        }

        return view('user/user_edit_nabidka', compact('nabidka'));
    }

    public function nabidka_update(Request $request, $id)
    {   
        $nabidka = Nabidka::with('atributy')->findOrFail($id);

        // Skontroluj, či ponuka patrí prihlásenému používateľovi
        if ($nabidka->id_uzivatel !== Auth::user()->id) {
            abort(403, 'Nemáte povolenie upravovať túto ponuku.');
        }

        // Validácia vstupov
        $request->validate([
            'meno' => 'required|string|max:255',
            'atributy.*' => 'required|string|max:255',
        ]);

        // Aktualizácia mena ponuky
        $nabidka->meno = $request->input('meno');
        $nabidka->save();

        // Aktualizácia atribútov
        foreach ($request->input('atributy') as $atributId => $hodnota) {
            $atribut = $nabidka->atributy->find($atributId);
            if ($atribut) {
                $atribut->hodnota = $hodnota;
                $atribut->save();
            }
        }

        return redirect()->route('zobrazit_nabidky')->with('success', 'Ponuka bola úspešne upravená.');
    }
}
