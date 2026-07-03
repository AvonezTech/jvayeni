<?php

use App\Models\MenuItem;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. The Home Page (welcome.blade.php)
Route::get('/', function () {
    // Fetch a few items (e.g., 4) for the "Popular This Week" section on the Home page
    $items = MenuItem::where('is_available', true)->take(4)->get(); 
    
    // Fetch recent orders if the user is logged in
    $orders = Auth::check() 
        ? Auth::user()->orders()->with('menuItems')->latest()->take(10)->get() 
        : collect();
        
    return view('welcome', compact('items', 'orders'));
})->name('home');


// 2. The Full Menu Page (menu.blade.php)
Route::get('/menu', function () {
    // Fetch ALL available menu items for the dedicated Menu page
    $items = MenuItem::where('is_available', true)->get();
    
    return view('menu', compact('items'));
})->name('menu');


// 3. The Checkout Page (checkout.blade.php) - NEWLY ADDED
Route::get('/checkout', function () {
    // This loads the checkout HTML we created earlier
    return view('checkout');
})->name('checkout');


// 4. Process Order (Authenticated)
Route::post('/order', [OrderController::class, 'store'])
    ->name('order.store')
    ->middleware('auth');


// 5. Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    
    return redirect('/');
})->name('logout');
// Add this anywhere in your routes/web.php file
Route::get('/login', function () {
    // For now, this just returns a simple text message. 
    // Later, you can change this to return view('auth.login');
    return "Login Page (Coming Soon)";
})->name('login');