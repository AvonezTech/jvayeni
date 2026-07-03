<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validate the user input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt to log the user in using the 'users' table
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect to the home page after success
            return redirect()->intended('/');
        }

        // 3. If login fails, redirect back with an error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}