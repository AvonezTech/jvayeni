<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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
            $now = now();

            /*
            |--------------------------------------------------------------------------
            | Save order
            |--------------------------------------------------------------------------
            */

            $orderData = [
                'user_id' => Auth::id(),
                'status' => 'confirmed',
            ];

            if (Schema::hasColumn('orders', 'total_price')) {
                $orderData['total_price'] = $totalPrice;
            }

            if (Schema::hasColumn('orders', 'total')) {
                $orderData['total'] = $totalPrice;
            }

            if (Schema::hasColumn('orders', 'created_at')) {
                $orderData['created_at'] = $now;
            }

            if (Schema::hasColumn('orders', 'updated_at')) {
                $orderData['updated_at'] = $now;
            }

            $orderId = DB::table('orders')->insertGetId($orderData);

            /*
            |--------------------------------------------------------------------------
            | Save order items
            |--------------------------------------------------------------------------
            */

            foreach ($cart as $cartItem) {
                $menuItem = MenuItem::find($cartItem['id']);

                if (!$menuItem) {
                    continue;
                }

                $quantity = (int) $cartItem['quantity'];
                $unitPrice = (float) $cartItem['price'];
                $lineTotal = $quantity * $unitPrice;

                $orderItemData = [
                    'order_id' => $orderId,
                    'menu_item_id' => $menuItem->id,
                    'quantity' => $quantity,
                ];

                if (Schema::hasColumn('order_items', 'price')) {
                    $orderItemData['price'] = $unitPrice;
                }

                if (Schema::hasColumn('order_items', 'unit_price')) {
                    $orderItemData['unit_price'] = $unitPrice;
                }

                if (Schema::hasColumn('order_items', 'total_price')) {
                    $orderItemData['total_price'] = $lineTotal;
                }

                if (Schema::hasColumn('order_items', 'subtotal')) {
                    $orderItemData['subtotal'] = $lineTotal;
                }

                if (Schema::hasColumn('order_items', 'created_at')) {
                    $orderItemData['created_at'] = $now;
                }

                if (Schema::hasColumn('order_items', 'updated_at')) {
                    $orderItemData['updated_at'] = $now;
                }

                DB::table('order_items')->insert($orderItemData);
            }

            DB::commit();

            session()->forget('cart');

            return redirect()
                ->route('cart.index')
                ->with([
                    'success' => 'Order confirmed successfully.',
                    'order_confirmed' => true,
                    'order_id' => $orderId,
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
}