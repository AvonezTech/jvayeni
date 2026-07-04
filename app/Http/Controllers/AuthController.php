<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login user
    public function login(Request $request)
    {
        // Validate login form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Try to login
        if (Auth::attempt($credentials)) {

            // Secure session after login
            $request->session()->regenerate();

            // Redirect to menu.blade.php
            return redirect()->route('menu');
        }

        // If login fails
        return back()->withErrors([
            'email' => 'The provided email or password is incorrect.',
        ])->onlyInput('email');
    }


    // Register user
    public function register(Request $request)
    {
        // Validate register form
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // Create user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Automatically login after register
        Auth::login($user);

        // Redirect to menu.blade.php
        return redirect()->route('menu');
    }
}