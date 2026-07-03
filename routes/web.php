<?php

use App\Models\MenuItem;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController; // Ensure this is imported
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// --- PAGES ---
Route::get('/', function () {
    $items = MenuItem::where('is_available', true)->take(4)->get();
    $orders = Auth::check() ? Auth::user()->orders()->with('menuItems')->latest()->take(10)->get() : collect();
    return view('welcome', compact('items', 'orders'));
})->name('home');

Route::get('/menu', function () {
    $items = MenuItem::where('is_available', true)->get();
    return view('menu', compact('items'));
})->name('menu');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// --- AUTHENTICATION ---
Route::get('/login', function () { return view('login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');

Route::get('/register', function () { return view('register'); })->name('register');

// --- ACTIONS ---
Route::post('/order', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');