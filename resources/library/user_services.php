<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    // Method to add an account
    public function addAccount(Request $request)
    {
        $account = Account::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'name' => $request->name
        ]);

        return response()->json($account);
    }

    // Method to validate a user's login
    public function validateAccount(Request $request)
    {
        $account = Account::where('login', $request->login)->first();

        if ($account && Hash::check($request->password, $account->password)) {
            return response()->json(['message' => 'Login successful']);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
