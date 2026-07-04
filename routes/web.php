<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Website Pages
|--------------------------------------------------------------------------
*/

// Home Page - welcome.blade.php
Route::get('/', function () {

    $items = MenuItem::where('is_available', true)
        ->latest()
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


// Menu Page - menu.blade.php
Route::get('/menu', function () {

    $items = MenuItem::where('is_available', true)
        ->latest()
        ->get();

    $specialItems = MenuItem::where('is_available', true)
        ->where('is_special', true)
        ->latest()
        ->take(5)
        ->get();

    return view('menu', compact('items', 'specialItems'));

})->name('menu');


// Checkout Page - checkout.blade.php
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
Route::post('/logout', function (Request $request) {

    // Logout authenticated user
    Auth::guard('web')->logout();

    // Remove all session data, including cart
    $request->session()->flush();

    // Invalidate old session
    $request->session()->invalidate();

    // Regenerate CSRF token
    $request->session()->regenerateToken();

    // Redirect to welcome.blade.php
    return redirect()->route('home');

})->name('logout');


/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Show Cart Page
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    // Add Item to Cart
    Route::post('/cart/add', [CartController::class, 'add'])
        ->name('cart.add');

    // Update Cart Item Quantity
    Route::patch('/cart/update/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    // Remove Item from Cart
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    // Clear Full Cart
    Route::post('/cart/clear', [CartController::class, 'clear'])
        ->name('cart.clear');
});


/*
|--------------------------------------------------------------------------
| Order Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Confirm Order and Save to Database
    Route::post('/order', [OrderController::class, 'store'])
        ->name('order.store');

    // My Orders Page
    Route::get('/my-orders', [OrderController::class, 'myOrders'])
        ->name('orders.my');
});