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

        $user = Auth::user();
        if (!$user) {
            return back()->with('error', 'You must be logged in to order.');
        }

        $item = MenuItem::findOrFail($validated['item_id']);
        $totalPrice = $item->price;

        $paymentMethod = 'cash';
        $creditPaid = 0.00;
        $cashPaid = 0.00;

        if ($user->role === 'college_staff') {
            if ($user->credit_balance >= $totalPrice) {
                $creditPaid = $totalPrice;
                $cashPaid = 0.00;
                $paymentMethod = 'credit';
                
                // Deduct from credit balance
                $user->credit_balance -= $totalPrice;
                $user->save();

                $message = "Order placed! Rs. " . number_format($totalPrice, 2) . " deducted from your monthly credit balance.";
            } else {
                $creditPaid = $user->credit_balance;
                $cashPaid = $totalPrice - $user->credit_balance;
                $paymentMethod = 'mixed';

                // Reduce credit balance to 0
                $user->credit_balance = 0.00;
                $user->save();

                $message = "Order placed! Rs. " . number_format($creditPaid, 2) . " deducted from credit, and remaining Rs. " . number_format($cashPaid, 2) . " to be paid in cash.";
            }
        } else {
            // Student, Admin, Kitchen Staff pay in cash
            $creditPaid = 0.00;
            $cashPaid = $totalPrice;
            $paymentMethod = 'cash';

            $message = "Order placed! Rs. " . number_format($totalPrice, 2) . " to be paid in cash.";
        }

        // 2. Create the order
        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
            'status' => 'pending',
            'payment_method' => $paymentMethod,
            'credit_paid' => $creditPaid,
            'cash_paid' => $cashPaid,
        ]);

        // 3. Attach item to pivot table
        $order->menuItems()->attach($item->id, ['quantity' => 1]);

        return back()->with('success', $message);
    }
}