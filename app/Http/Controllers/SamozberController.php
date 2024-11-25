<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Samozber;
use App\Models\SamozberSeznam;
use App\Models\Nabidka;
use Illuminate\Support\Facades\Auth;

class SamozberController extends Controller
{
    public function create() // vytvorenie samozberu
    {
        $userId = Auth::user()->id; // ID prihláseného používateľa
        $nabidky = Nabidka::where('id_uzivatel', $userId)->get(); // Filtrované nabidky
        return view('user.create', compact('nabidky'));
    }

    public function index() // zobrazenie vsetkych samozberov
    {
        $user = Auth::user(); // Prihlásený používateľ

        // Získanie samozberov, ktoré vytvoril prihlásený používateľ
        $userCreatedSamozbery = Samozber::with(['farmar', 'nabidka'])
            ->where('id_uzivatel', $user->id)
            ->get();

        // Získanie samozberov, ktorých sa používateľ chce zúčastniť (druhá tabuľka)
        $registeredSamozbery = Samozber::with(['farmar', 'nabidka'])
            ->whereHas('ucastnici', function ($query) use ($user) {
                $query->where('id_uzivatel', $user->id);
            })
            ->get();

        // Samozbery, ktorých sa používateľ neúčastní a ktoré nevytvoril (tretia tabuľka)
        $otherSamozbery = Samozber::with(['farmar', 'nabidka'])
            ->where('id_uzivatel', '!=', $user->id)
            ->whereDoesntHave('ucastnici', function ($query) use ($user) {
                $query->where('id_uzivatel', $user->id);
            })
            ->get();

        return view('user.index', compact('userCreatedSamozbery', 'registeredSamozbery', 'otherSamozbery'));
    }

    public function unregister($id)
    {
        $user = Auth::user(); // Prihlásený používateľ

        // Nájdeme záznam v samozber_seznam podľa id samozberu a id používateľa
        $record = SamozberSeznam::where('id_samozber', $id)
            ->where('id_uzivatel', $user->id)
            ->firstOrFail();

        // Zrušenie účasti
        $record->delete();

        return redirect()->route('samozber.index')->with('success', 'Účasť na samozbere bola zrušená.');
    }

    public function destroy($id)
    {
        $user = Auth::user(); // Prihlásený používateľ

        // Nájdeme samozber, ktorý má byť zmazaný, a overíme, že ho vytvoril prihlásený používateľ
        $samozber = Samozber::where('id', $id)->where('id_uzivatel', $user->id)->firstOrFail();

        // Odstránime samozber
        $samozber->delete();

        return redirect()->route('samozber.index')->with('success', 'Samozber bol úspešne zmazaný.');
    }

    public function register($id)
    {
        $user = Auth::user(); // Prihlásený používateľ

        // Overenie, či užívateľ nie je už zaregistrovaný
        $exists = SamozberSeznam::where('id_samozber', $id)
            ->where('id_uzivatel', $user->id)
            ->exists();

        if (!$exists) {
            // Pridanie záznamu do samozber_seznam
            SamozberSeznam::create([
                'id_samozber' => $id,
                'id_uzivatel' => $user->id,
            ]);
        }

        return redirect()->route('samozber.index')->with('success', 'Úspešne ste sa zaregistrovali na samozber.');
    }
    
    public function store(Request $request) // ukladanie samozberu
    {
        $request->validate([
            'miesto' => 'required|string|max:255',
            'datum_a_cas' => 'required|date_format:Y-m-d\TH:i',
            'id_nabidka' => 'required|integer|exists:nabidka,id',
        ]);

        Samozber::create([
            'miesto' => $request->miesto,
            'datum_a_cas' => $request->datum_a_cas,
            'id_nabidka' => $request->id_nabidka,
            'id_uzivatel' => Auth::user()->id, 
        ]);

        return redirect()->route('samozber.create')->with('success', 'Samozber created successfully!');
    }
}