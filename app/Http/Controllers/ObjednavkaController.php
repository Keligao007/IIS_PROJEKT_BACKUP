<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Objednavka;
use App\Models\ObjednavkaAtribut;
use App\Models\RegistrovanyUzivatel;
use App\Models\Nabidka;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ObjednavkaController extends Controller
{   
    public function store_order(Request $request, $id)
    {
        // Validácia množstva
        $validated = $request->validate([
            'mnozstvo' => 'required|integer|min:1',
        ]);

        $mnozstvo = $validated['mnozstvo'];

        // Načítanie ponuky
        $nabidka = Nabidka::find($id);

        if (!$nabidka) {
            return back()->withErrors(['error' => 'Ponuka neexistuje.']);
        }

        // Načítanie atribútov danej ponuky
        $atributy = $nabidka->nabidka_atribut;

        // Nájdeme množstvo (ID 3 alebo 4)
        $mnozstvoAtribut = $atributy->whereIn('id_atribut', [3, 4])->first();

        if (!$mnozstvoAtribut) {
            return back()->withErrors(['error' => 'Množstvo pre túto ponuku nebolo definované.']);
        }

        // Skontrolujeme, či je dostatok množstva
        if ($mnozstvoAtribut->hodnota < $mnozstvo) {
            return back()->withErrors(['error' => 'Nedostatočné množstvo na sklade.']);
        }

        // Odrátame množstvo a uložíme zmenu
        $mnozstvoAtribut->hodnota -= $mnozstvo;
        $mnozstvoAtribut->save();

        // Vytvorenie objednávky
        $objednavka = Objednavka::create([
            'id_nabidka' => $nabidka->id,
            'id_uzivatel' => Auth::user()->id,
            'mnozstvo' => $mnozstvo,
        ]);

        ObjednavkaAtribut::create([
            'id_objednavka' => $objednavka->id, // Prepojenie na objednávku
            'id_atribut' => $mnozstvoAtribut->id_atribut, // ID atribútu
            'hodnota' => $validated['mnozstvo'], // Hodnota = množstvo od užívateľa
        ]);

        // ObjednakaAtribut::create([
        // ])

        return redirect()->route('prechadzat_nabidky')->with('success', 'Objednávka bola úspešne vytvorená.');
    }



}
        // Zobraziť prichádzajúce údaje
        //dd($validated, $request->all(), $nabidkaId, Auth::id());
        //dd(Auth::user());
        // $id = Auth::id();
        // dd($id);