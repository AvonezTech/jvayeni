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
        $request->validate([
            'menu_item_id' => ['required', 'exists:menu_items,id'],
        ]);

        $menuItem = MenuItem::where('is_available', true)
            ->findOrFail($request->menu_item_id);

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $menuItem->price,
            'status' => 'pending',
        ]);

        $order->menuItems()->attach($menuItem->id, [
            'quantity' => 1,
            'price' => $menuItem->price,
        ]);

        return redirect()
            ->route('menu')
            ->with('success', $menuItem->name . ' added to tray successfully.');
    }
}