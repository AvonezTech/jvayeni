<?php

use App\Models\MenuItem;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// The Landing Page / Menu
Route::get('/', function () {
    $items = MenuItem::where('is_available', true)->get();
    $orders = Auth::check() 
        ? Auth::user()->orders()->with('menuItems')->latest()->take(10)->get() 
        : collect();
    return view('welcome', compact('items', 'orders'));
})->name('home');

// Process Order (Authenticated)
Route::post('/order', [OrderController::class, 'store'])
    ->name('order.store')
    ->middleware('auth');

// Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');