<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nabidka;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        // Načítanie filtrov z požiadavky
        $parentKategorie = $request->input('kategorie', []);

        // Dotaz na nabídky s filtrovaním
        $nabidky = Nabidka::with(['nabidka_atribut.atribut', 'kategoria'])
            ->when($parentKategorie, function ($query, $parentKategorie) {
                $query->whereHas('kategoria', function ($subQuery) use ($parentKategorie) {
                    $subQuery->whereIn('parent_kategoria_id', $parentKategorie);
                });
            })
            ->get();

        // Poslanie do view
        return view('common', compact('nabidky', 'parentKategorie'));
    }

    public function register(){
        return view('register');
    }

    public function login(){
        return view('log_in');
    }

    //TODO 
    // neregistrovany uzivatel moze pozerat ceny a produkty

}
