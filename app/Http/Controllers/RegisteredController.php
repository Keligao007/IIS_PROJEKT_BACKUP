<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NavrhKategorie;
use Illuminate\Support\Facades\Auth;

class RegisteredController extends Controller
{
    public function create()
    {
        return view('suggestions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'meno' => 'required|string|max:255',
            'parent_kategoria_id' => 'required|integer',
        ]);

        NavrhKategorie::create([
            'meno' => $request->meno,
            'parent_kategoria_id' => $request->parent_kategoria_id,
            'id_uzivatel' => Auth::user()->id,
        ]);

        return redirect()->route('suggestions.create')->with('success', 'Suggestion submitted successfully!');
    }
}