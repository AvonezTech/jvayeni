<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->withErrors([
                    'cart' => 'Your cart is empty.',
                ]);
        }

        $totalPrice = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        DB::beginTransaction();

        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $totalPrice,
                'status' => 'pending',

                // Default payment values
                'payment_method' => 'cash',
                'credit_paid' => 0,
                'cash_paid' => $totalPrice,
            ]);

            foreach ($cart as $cartItem) {
                $menuItem = MenuItem::find($cartItem['id']);

                if (!$menuItem) {
                    continue;
                }

                $order->menuItems()->attach($menuItem->id, [
                    'quantity' => $cartItem['quantity'],
                ]);
            }

            DB::commit();

            session()->forget('cart');

            return redirect()
                ->route('orders.my')
                ->with([
                    'success' => 'Order confirmed successfully.',
                    'order_id' => $order->id,
                ]);

        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()
                ->route('cart.index')
                ->withErrors([
                    'order' => 'Order could not be confirmed. ' . $e->getMessage(),
                ]);
        }
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('menuItems')
            ->latest()
            ->get();

        return view('my-orders', compact('orders'));
    }
}