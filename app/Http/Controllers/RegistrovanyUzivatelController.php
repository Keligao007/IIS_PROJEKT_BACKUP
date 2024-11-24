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
    //TODO 
    // neregistrovany uzivatel moze pozerat ceny a produkty

}
