<?php

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// The Landing Page / Menu
Route::get('/', function () {
    $items = MenuItem::where('is_available', true)->get();
    return view('welcome', compact('items'));
})->name('home');

// Process Order (Simplified)
Route::post('/order', function (Request $request) {
    // Basic logic: Just confirm the order
    return back()->with('success', 'Order for ' . $request->item_name . ' placed!');
})->name('order.store');