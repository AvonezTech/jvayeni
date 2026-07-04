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


Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout')->middleware('auth');


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');


Route::get('/register', function () {
    return view('register');
})->name('register');


Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');


Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();

    $request->session()->flush();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home');
})->name('logout');


/*
|--------------------------------------------------------------------------
| Cart Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/cart/add', [CartController::class, 'add'])
        ->name('cart.add');

    Route::patch('/cart/update/{id}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::post('/cart/clear', [CartController::class, 'clear'])
        ->name('cart.clear');
});


/*
|--------------------------------------------------------------------------
| Order Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::post('/order', [OrderController::class, 'store'])
        ->name('order.store');

    Route::get('/my-orders', [OrderController::class, 'myOrders'])
        ->name('orders.my');
});