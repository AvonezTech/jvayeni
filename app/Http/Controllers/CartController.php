<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $subtotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('cart', compact('cart', 'subtotal'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'menu_item_id' => ['required', 'exists:menu_items,id'],
        ]);

        $menuItem = MenuItem::where('is_available', true)
            ->findOrFail($request->menu_item_id);

        $cart = session()->get('cart', []);

        $id = $menuItem->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $menuItem->id,
                'name' => $menuItem->name,
                'menu_category' => $menuItem->menu_category,
                'price' => (float) $menuItem->price,
                'photo' => $menuItem->photo,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', $menuItem->name . ' added to cart.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Cart updated successfully.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()
            ->route('cart.index')
            ->with('success', 'Item removed from cart.');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()
            ->route('cart.index')
            ->with('success', 'Cart cleared successfully.');
    }
}