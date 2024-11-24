<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Samozber;
use Illuminate\Support\Facades\Auth;

class SamozberController extends Controller
{
    public function create() // vytvorenie samozberu
    {
        return view('user.create');
    }

    public function index() // zobrazenie vsetkych samozberov
    {
        $user = Auth::user();
        $samozbery = Samozber::with(['nabidka', 'farmar'])->get();
        $registeredSamozbery = $user && $user->samozberSeznam ? $user->samozberSeznam->pluck('id_samozber')->toArray() : [];
        return view('user.index', compact('samozbery', 'registeredSamozbery'));
    }

    public function register($id) // registracia na samozber
    {
        $user = Auth::user();
        $samozber = Samozber::findOrFail($id);

        SamozberSeznam::create([
            'id_samozber' => $samozber->id,
            'id_uzivatel' => $user->id,
        ]);

        return redirect()->route('samozber.index')->with('success', 'Samozber added to your list successfully!');
    }
    
    public function store(Request $request) // ukladanie samozberu
    {
        $request->validate([
            'miesto' => 'required|string|max:255',
            'datum_a_cas' => 'required|date_format:Y-m-d\TH:i',
            'id_nabidka' => 'required|integer|exists:nabidkas,id',
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