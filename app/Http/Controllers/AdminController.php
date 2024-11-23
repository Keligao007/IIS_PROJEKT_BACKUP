<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RegistrovanyUzivatel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('admin/admin_view');
    }

    public function admin_users(){
        return view('admin/admin_users');
    }

    public function admin_moderators(){
        return view('admin/admin_moderator_create');
    }

    public function show_moderators(){
        $users = RegistrovanyUzivatel::where('type', 'moderator')->get(); // získaš všetkých moderátorov
        
        return view('admin/admin_moderator_create', ['users' => $users]); // odosielaš $users do Blade
    }

    public function show_users(){
        $users = RegistrovanyUzivatel::where('type', 'regular')->get();

        return view('admin/admin_users', ['users' => $users]);
    }

    // Add a delete method
    public function delete_user($id)
    {
        // Deleting the user from the database
        DB::table('Registrovany_Uzivatel')->where('id', $id)->delete();

        // Redirecting back to the users list with a success message
        return redirect()->route('show_users')->with('success', 'User deleted successfully');
    }

    

    // public function moderator_kategorie(){
    //     return view('moderator/mod_kategorie');
    // }

    // public function moderator_navrhy() {
    //     return view('moderator/mod_narvhy');
    // }

    // public function moderator_kategorie_ovocie() {
    //     $ovocie = DB::table('kategoria_plodin')
    //             ->where('path', 'LIKE', '/1/2/%')
    //             ->whereNotIn('id', [2])
    //             ->get();
    //     return view('moderator/mod_kategorie_ovocie', ['ovocie' => $ovocie]);
    // }

    // public function moderator_ovocie_detail($meno) {
    //     return view('moderator/mod_ovocie_detail', ['meno' => $meno]);
    // }

    // public function moderator_kategorie_zelenina() {
    //     $zelenina = DB::table('kategoria_plodin')
    //             ->where('path', 'LIKE', '/1/3/%')
    //             ->whereNotIn('id', [3])
    //             ->get();
    //     return view('moderator/mod_kategorie_zelenina', ['zelenina' => $zelenina]);
    // }

    // public function moderator_zelenina_detail($meno) {
    //     return view('moderator/mod_zelenina_detail', ['meno' => $meno]);
    // }

    // public function ovocie_destroy($id) {
    //     $polozka = DB::table('kategoria_plodin')
    //         ->where('id', $id)
    //         ->first();
        
    //     if (!$polozka) {
    //         return redirect()->route('moderator_kategorie_ovocie')->with('error', 'Položku sa nepodarilo zmazať.');    
    //     }

    //     DB::table('kategoria_plodin')
    //     ->where('id', $id)
    //     ->delete();

    //     return redirect()->route('moderator_kategorie_ovocie')->with('success', 'Ovocie bolo úspešne vymazané.');
    // }

    // public function zelenina_destroy($id) {
    //     $polozka = DB::table('kategoria_plodin')
    //         ->where('id', $id)
    //         ->first();
        
    //     if (!$polozka) {
    //         return redirect()->route('moderator_kategorie_zelenina')->with('error', 'Položku sa nepodarilo zmazať.');    
    //     }

    //     DB::table('kategoria_plodin')
    //     ->where('id', $id)
    //     ->delete();

    //     return redirect()->route('moderator_kategorie_zelenina')->with('success', 'Ovocie bolo úspešne vymazané.');
    // }

}