<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate the incoming order
        $validated = $request->validate([
            'item_id' => 'required|exists:menu_items,id',
        ]);

        $item = MenuItem::findOrFail($validated['item_id']);

        // 2. Create the order
        $order = Order::create([
            'user_id' => Auth::id(), // Ensure user is logged in
            'total_price' => $item->price,
            'status' => 'pending',
        ]);

        // 3. Attach item to pivot table
        $order->menuItems()->attach($item->id, ['quantity' => 1]);

        return back()->with('success', 'Order placed for ' . $item->name);
    }
}