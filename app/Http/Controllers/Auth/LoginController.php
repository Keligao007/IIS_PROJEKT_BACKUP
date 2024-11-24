<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\RegistrovanyUzivatel;

class LoginController extends Controller
{
    /**
     * Zobrazí prihlasovací formulár.
     */
    public function showLoginForm()
    {
        return view('common'); // Pohľad pre login formulár
    }

    /**
     * Prihlási používateľa.
     */
    public function login(Request $request)
    {
        // Validácia údajov
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Získanie prihlasovacích údajov
        $credentials = $request->only('login', 'password');

        // Skúsime nájsť používateľa podľa loginu
        $user = RegistrovanyUzivatel::where('login', $credentials['login'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Prihlásenie úspešné, prihlásime používateľa
            Auth::login($user);
            //dd(Auth::user(), session()->all());

            // Presmerovanie na stránku dashboard
            // return redirect()->intended('/');
            if ($user->type === 'regular') {
                // Presmerovanie na stránku pre bežných používateľov
                return redirect()->route('index'); 

            } elseif ($user->type === 'moderator') {

                return redirect()->route('moderator');

            } elseif ($user->type === 'admin') {

                return redirect()->route('admin'); // Uisti sa, že máš route 'moderator'
            }
        }

        // Prihlásenie zlyhalo, vrátime späť s chybovou hláškou
        return back()->withErrors([
            'login' => 'Prihlasovacie údaje sú nesprávne.',
        ])->withInput();
    }



    /**
     * Odhlási používateľa.
     */

    //  public function logout(Request $request)
    // {
    //     Auth::logout();
    //     return redirect('/');
    // }
    public function logout(Request $request)
    {
        Auth::logout(); // Odhlási používateľa
        $request->session()->invalidate(); // Zneplatní reláciu
        $request->session()->regenerateToken(); // Znovu vygeneruje CSRF token

        return redirect('/');
        // return redirect('common'); // Presmeruje na prihlasovaciu stránku
    }
}
