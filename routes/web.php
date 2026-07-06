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

// Dynamic Traffic Control: Logged-in users skip landing and go straight to the Menu.
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('menu');
    }

    $items = MenuItem::where('is_available', true)
        ->latest()
        ->take(4)
        ->get();

    $orders = collect(); // Guests have no orders

    return view('welcome', compact('items', 'orders'));
})->name('home');


// UPDATED: Dynamically filter items based on the 'category' query parameter
Route::get('/menu', function (Request $request) {
    // 1. Get the category from the URL, defaulting to 'all'
    $category = $request->query('category', 'all');

    // 2. Start building the query for available items
    $itemsQuery = MenuItem::where('is_available', true);

    // 3. If a specific category is requested, filter the database query
    if ($category !== 'all') {
        $itemsQuery->where('menu_category', $category);
    }

    // 4. Execute the query
    $items = $itemsQuery->latest()->get();

    // Fetch special items for the sidebar
    $specialItems = MenuItem::where('is_available', true)
        ->where('is_special', true)
        ->latest()
        ->take(5)
        ->get();

    return view('menu', compact('items', 'specialItems'));
})->name('menu');




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

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');    

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

    // Make sure your "Add to Tray/Cart" buttons on the menu page post to this route
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

    // Make sure your navbar "My Orders" link points to this route name: route('orders.my')
    Route::get('/my-orders', [OrderController::class, 'myOrders'])
        ->name('orders.my');
});