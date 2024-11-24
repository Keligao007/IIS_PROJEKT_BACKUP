<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrovanyUzivatelController extends Controller
{
    public function user() {
        return view('user/user');
    }

    public function navrhnut_kategoriu() {

    }

    public function vlozit_nabidku() {
        
    }

    public function zobrazit_nabidky() {
        return view('user/zobrazit_nabidky');
    }
    //TODO 
    // neregistrovany uzivatel moze pozerat ceny a produkty

}
