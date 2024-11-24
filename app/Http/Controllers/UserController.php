<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistrovanyUzivatel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // public function store(Request $request)
    // {
    //     // Validácia údajov
    //     $validatedData = $request->validate([
    //         'login' => 'required|string|max:100|unique:registrovany_uzivatel,login',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     // Vytvorenie a uloženie užívateľa
    //     $user = new RegistrovanyUzivatel();
    //     $user->login = $validatedData['login'];
    //     $user->password = bcrypt($validatedData['password']); // šifrovanie hesla
    //     $user->type = 'regular';
    //     $user->save();

    //     return view('common');
    //     //return '<h1>User added</h1>';
    // }


    public function store(Request $request)
    {
        //echo 'som tu';
        // Validate data
        $validatedData = $request->validate([
            'login' => 'required|string|max:100|unique:registrovany_uzivatel,login',
            'password' => 'required|string|min:6',
        ]);

        // Create and save the user
        $user = new RegistrovanyUzivatel();
        $user->login = $validatedData['login'];
        $user->password = Hash::make($validatedData['password']); // Secure password hashing
        $user->type = 'regular';
        $user->save();

        Auth::login($user);
        // return view('common');
        return redirect()->route('user');

        // return '<h1> user added </h1>';
    }

    public function store_moderator(Request $request)
    {
        //echo 'som tu';
        // Validate data
        $validatedData = $request->validate([
            'login' => 'required|string|max:100|unique:registrovany_uzivatel,login',
            'password' => 'required|string|min:6',
        ]);

        // Create and save the user
        $user = new RegistrovanyUzivatel();
        $user->login = $validatedData['login'];
        $user->password = Hash::make($validatedData['password']); // Secure password hashing
        $user->type = 'moderator';
        $user->save();

        Auth::login($user);
        return redirect()->route('show_moderators')->with('success', 'Moderator added successfully');

        // return '<h1> user added </h1>';
    }

    public function delete_user($id)
    {
        // Deleting the user from the database
        DB::table('Registrovany_Uzivatel')->where('id', $id)->delete();

        // Redirecting back to the users list with a success message
        return redirect()->route('show_users')->with('success', 'User deleted successfully');
    }

    public function delete_moderator($id)
    {
        // Deleting the user from the database
        DB::table('Registrovany_Uzivatel')->where('id', $id)->delete();

        // Redirecting back to the users list with a success message
        return redirect()->route('show_moderators')->with('success', 'Moderator deleted successfully');
    }

    public function login(Request $request)
    {
        // Validate the input
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to retrieve the user by their login field
        $user = RegistrovanyUzivatel::where('login', $credentials['login'])->first();

        // Check if the user exists and if the password is correct
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Log the user in using Laravel's Auth system
            Auth::login($user);

            // Regenerate session ID to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to a common page or intended URL
            return redirect()->intended('/common'); // Redirect to a home or dashboard page
        } else {
            // If login fails, redirect back with an error message
            return back()->withErrors([
                'login' => 'The provided credentials do not match our records.',
            ]);
        }
    }


    public function edit()
    {
        $user = Auth::user();
        return view('edit', compact('user'));
    }

    public function update(Request $request)
    {
        //$user = RegistrovanyUzivatel::find($id);
        // Retrieve the currently authenticated user
        $user = Auth::user(); 

        // Validate the input data
        $validatedData = $request->validate([
            'login' => 'required|string|max:100|unique:registrovany_uzivatel,login,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        // Update the user's information
        $user->login = $validatedData['login'];
        if ($request->input('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
        
        // Save the user, doesnt work now
        //$user->save();

        return redirect()->route('edit')->with('success', 'Profile updated successfully.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('log_in');
    }
}
