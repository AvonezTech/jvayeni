<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Food - Cart</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#8c3838',
                        canvas: '#f6f5f0',
                    },
                    fontFamily: {
                        heading: ['Oswald', 'sans-serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        .processing-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid rgba(140, 56, 56, 0.15);
            border-top-color: #8c3838;
            border-radius: 9999px;
            animation: spin 0.9s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-canvas text-stone-900 font-sans antialiased">

    @php
        $cart = $cart ?? [];
        $subtotal = $subtotal ?? 0;
        $serviceCharge = 0;
        $total = $subtotal + $serviceCharge;

        $getMenuPhoto = function ($photo) {
            if (!$photo) {
                return asset('static-images/Rectangle 5.png');
            }

            if (str_starts_with($photo, 'http://') || str_starts_with($photo, 'https://')) {
                return $photo;
            }

            if (str_starts_with($photo, 'menu_items/')) {
                return asset('storage/' . $photo);
            }

            if (str_starts_with($photo, 'storage/')) {
                return asset($photo);
            }

            return asset($photo);
        };
    @endphp

    <x-navbar />

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">

        <div class="mb-10">
            <h1 class="font-heading text-5xl md:text-7xl font-bold uppercase text-stone-900 leading-none">
                Your <span class="text-brand">Cart.</span>
            </h1>

            <p class="text-stone-600 mt-4 text-sm md:text-base">
                Review your selected items and confirm your order.
            </p>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if (session('order_confirmed'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-5 text-green-700">
                <h2 class="font-heading text-3xl uppercase text-green-800 mb-1">
                    Order Confirmed
                </h2>

                <p class="text-sm">
                    Your order has been saved successfully.
                    @if (session('order_id'))
                        Order ID: #{{ session('order_id') }}
                    @endif
                </p>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 text-sm font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        @if (count($cart) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-4">

                    @foreach ($cart as $id => $item)
                        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-4 md:p-5 flex flex-col sm:flex-row gap-4">

                            <div class="w-full sm:w-32 h-32 rounded-xl overflow-hidden bg-stone-100 shrink-0">
                                <img
                                    src="{{ $getMenuPhoto($item['photo'] ?? null) }}"
                                    alt="{{ $item['name'] }}"
                                    class="w-full h-full object-cover"
                                >
                            </div>

                            <div class="flex-1">
                                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-3">

                                    <div>
                                        <h2 class="font-bold text-lg text-stone-900">
                                            {{ $item['name'] }}
                                        </h2>

                                        @if (!empty($item['menu_category']))
                                            <p class="text-[11px] uppercase tracking-wide text-brand font-bold mt-1">
                                                {{ str_replace('_', ' ', $item['menu_category']) }}
                                            </p>
                                        @endif

                                        <p class="text-sm font-bold text-stone-800 mt-2">
                                            Rs. {{ number_format($item['price']) }}
                                        </p>
                                    </div>

                                    <p class="font-bold text-brand text-base">
                                        Rs. {{ number_format($item['price'] * $item['quantity']) }}
                                    </p>

                                </div>

                                <div class="mt-5 flex flex-col sm:flex-row sm:items-center gap-3">

                                    <form method="POST" action="{{ route('cart.update', $id) }}" class="flex items-center gap-2">
                                        @csrf
                                        @method('PATCH')

                                        <label class="text-sm text-stone-600 font-medium">
                                            Qty
                                        </label>

                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            max="99"
                                            class="w-20 px-3 py-2 border border-stone-300 rounded-md bg-white text-sm focus:outline-none focus:ring-1 focus:ring-brand"
                                        >

                                        <button
                                            type="submit"
                                            class="px-4 py-2 bg-stone-900 text-white rounded-md text-sm hover:bg-brand transition"
                                        >
                                            Update
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('cart.remove', $id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-4 py-2 border border-red-200 text-red-600 rounded-md text-sm hover:bg-red-50 transition"
                                        >
                                            Remove
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>

                <!-- Summary -->
                <aside class="bg-white rounded-2xl border border-stone-200 shadow-sm p-6 h-fit lg:sticky lg:top-8">

                    <h2 class="font-heading text-3xl font-bold uppercase text-stone-900 mb-6">
                        Summary
                    </h2>

                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-stone-600">Subtotal</span>
                            <span class="font-bold text-stone-900">
                                Rs. {{ number_format($subtotal) }}
                            </span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-stone-600">Service Charge</span>
                            <span class="font-bold text-stone-900">
                                Rs. {{ number_format($serviceCharge) }}
                            </span>
                        </div>

                        <div class="border-t border-stone-200 pt-4 flex justify-between text-base">
                            <span class="font-bold text-stone-900">Total</span>
                            <span class="font-bold text-brand">
                                Rs. {{ number_format($total) }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 space-y-3">
                        <a
                            href="{{ route('menu') }}"
                            class="block w-full text-center border border-brand text-brand py-3 rounded-md text-sm font-medium hover:bg-brand hover:text-white transition"
                        >
                            Add More Items
                        </a>

                        <!-- Confirm Order: saves to database -->
                        <form id="confirmOrderForm" method="POST" action="{{ route('order.store') }}">
                            @csrf

                            <button
                                id="confirmOrderButton"
                                type="submit"
                                class="w-full text-center bg-brand text-white py-3 rounded-md text-sm font-medium hover:bg-[#6f2c2c] transition"
                            >
                                Confirm Order
                            </button>
                        </form>

                        <form method="POST" action="{{ route('cart.clear') }}">
                            @csrf

                            <button
                                type="submit"
                                class="w-full text-center text-red-600 py-2 rounded-md text-sm font-medium hover:bg-red-50 transition"
                            >
                                Clear Cart
                            </button>
                        </form>
                    </div>

                </aside>

            </div>
        @else
            <div class="bg-white rounded-2xl border border-stone-200 p-10 text-center">
                <h2 class="font-heading text-3xl font-bold uppercase text-stone-900 mb-3">
                    Cart is Empty
                </h2>

                @if (session('order_confirmed'))
                    <p class="text-stone-500 text-sm mb-6">
                        Your order has been confirmed. You can add more items from the menu.
                    </p>
                @else
                    <p class="text-stone-500 text-sm mb-6">
                        You have not added any food item yet.
                    </p>
                @endif

                <a
                    href="{{ route('menu') }}"
                    class="inline-flex items-center justify-center bg-brand text-white px-6 py-3 rounded-md text-sm font-medium hover:bg-[#6f2c2c] transition"
                >
                    Browse Menu
                </a>
            </div>
        @endif

    </main>

    <x-footer />

    <!-- Processing Popup -->
    <div id="processingOverlay" class="hidden fixed inset-0 z-50 bg-black/50 backdrop-blur-sm items-center justify-center px-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full p-8 text-center">
            <div class="processing-spinner mx-auto mb-5"></div>

            <h2 class="font-heading text-3xl uppercase text-stone-900 mb-2">
                Processing
            </h2>

            <p class="text-stone-500 text-sm">
                Please wait while we confirm your order.
            </p>
        </div>
    </div>

    <script>
        const confirmOrderForm = document.getElementById('confirmOrderForm');
        const confirmOrderButton = document.getElementById('confirmOrderButton');
        const processingOverlay = document.getElementById('processingOverlay');

        if (confirmOrderForm) {
            confirmOrderForm.addEventListener('submit', function () {
                processingOverlay.classList.remove('hidden');
                processingOverlay.classList.add('flex');

                confirmOrderButton.disabled = true;
                confirmOrderButton.innerText = 'Processing...';
                confirmOrderButton.classList.add('opacity-70', 'cursor-not-allowed');
            });
        }
    </script>

</body>
</html>