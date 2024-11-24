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

        // Získaj všetky samozbery, ktoré nevytvoril aktuálny používateľ
        $samozbery = Samozber::with(['nabidka', 'farmar'])
            ->where('id_uzivatel', '!=', $user->id)
            ->get();

        // Získaj ID samozberov, na ktoré je už používateľ registrovaný
        $registeredSamozbery = $user && $user->samozberSeznam 
            ? $user->samozberSeznam->pluck('id_samozber')->toArray() 
            : [];

        // Odovzdaj dáta do pohľadu
        return view('user.index', compact('samozbery', 'registeredSamozbery'));
    }

    public function register($id) // registracia na samozber
    {
        // $user = Auth::user();
        // $samozber = Samozber::findOrFail($id);

        // SamozberSeznam::create([
        //     'id_samozber' => $samozber->id,
        //     'id_uzivatel' => $user->id,
        // ]);

        // return redirect()->route('samozber.index')->with('success', 'Samozber added to your list successfully!');

        $user = Auth::user(); // Prihlásený používateľ
        $samozber = Samozber::findOrFail($id); // Nájdeme samozber

        // Skontroluj, či už používateľ nie je zaregistrovaný
        $alreadyRegistered = SamozberSeznam::where('id_samozber', $samozber->id)
            ->where('id_uzivatel', $user->id)
            ->exists();

        if ($alreadyRegistered) {
            return redirect()->route('samozber.index')->with('error', 'Už ste registrovaný na tento samozber.');
        }

        // Vytvoríme záznam v tabuľke `samozber_seznam`
        SamozberSeznam::create([
            'id_samozber' => $samozber->id,
            'id_uzivatel' => $user->id,
        ]);

        return redirect()->route('samozber.index')->with('success', 'Úspešne ste sa registrovali na samozber.');
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