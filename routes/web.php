<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Website Pages
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', function () {

    $items = MenuItem::where('is_available', true)
        ->take(4)
        ->get();

    if (Auth::check()) {
        $orders = Auth::user()
            ->orders()
            ->with('menuItems')
            ->latest()
            ->take(10)
            ->get();
    } else {
        $orders = collect();
    }

    return view('welcome', compact('items', 'orders'));

})->name('home');


// Menu Page
Route::get('/menu', function () {

    $items = MenuItem::where('is_available', true)->get();

    return view('menu', compact('items'));

})->name('menu');


// Checkout Page
Route::get('/checkout', function () {

    return view('checkout');

})->name('checkout')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Show Login Page
Route::get('/login', function () {

    return view('login');

})->name('login');


// Handle Login Form
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');


// Show Register Page
Route::get('/register', function () {

    return view('register');

})->name('register');


// Handle Register Form
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');


// Logout User
Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');

})->name('logout');


/*
|--------------------------------------------------------------------------
| Order Routes
|--------------------------------------------------------------------------
*/

// Place Order
Route::post('/order', [OrderController::class, 'store'])
    ->name('order.store')
    ->middleware('auth');