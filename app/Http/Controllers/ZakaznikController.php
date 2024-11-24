<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nabidka;
use Illuminate\Http\Request;

class ZakaznikController extends Controller
{
    // public function prechadzat_nabidky() {
    //     return view('user/nabidky');
    // }

    public function prechadzat_nabidky()
    {
        $nabidky = Nabidka::with(['kategoria', 'nabidka_atribut'])->get(); // Načítanie údajov s vzťahmi

        return view('user/nabidky', ['nabidky' => $nabidky]);
    }

    // public function show_users(){
    //     $users = RegistrovanyUzivatel::where('type', 'regular')->get();

    //     return view('admin/admin_users', ['users' => $users]);
    // }


}
