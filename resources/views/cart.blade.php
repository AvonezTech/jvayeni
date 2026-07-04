<x-layout>

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

    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 text-stone-900 font-sans antialiased">

        <div class="mb-8 md:mb-10">
            <h1 class="font-heading text-4xl sm:text-5xl md:text-7xl font-bold uppercase text-stone-900 leading-none">
                Your <span class="text-brand">Cart.</span>
            </h1>

            <p class="text-stone-600 mt-3 md:mt-4 text-sm md:text-base">
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
                <h2 class="font-heading text-2xl md:text-3xl uppercase text-green-800 mb-1">
                    Order Confirmed
                </h2>

                <p class="text-sm">
                    Your order has been saved successfully.
                    @if (session('order_id'))
                        <span class="font-bold">Order ID: #{{ session('order_id') }}</span>
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

                <div class="lg:col-span-2 space-y-4">

                    @foreach ($cart as $id => $item)
                        <div class="bg-white rounded-2xl border border-stone-200 shadow-sm p-4 md:p-5 flex flex-col sm:flex-row gap-4 sm:gap-5">

                            <div class="w-full sm:w-32 h-40 sm:h-32 rounded-xl overflow-hidden bg-stone-100 shrink-0">
                                <img
                                    src="{{ $getMenuPhoto($item['photo'] ?? null) }}"
                                    alt="{{ $item['name'] }}"
                                    class="w-full h-full object-cover"
                                >
                            </div>

                            <div class="flex-1 flex flex-col justify-between">
                                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-2 md:gap-3">

                                    <div>
                                        <h2 class="font-bold text-lg text-stone-900 leading-tight">
                                            {{ $item['name'] }}
                                        </h2>

                                        @if (!empty($item['menu_category']))
                                            <p class="text-[11px] uppercase tracking-wide text-brand font-bold mt-1">
                                                {{ str_replace('_', ' ', $item['menu_category']) }}
                                            </p>
                                        @endif

                                        <p class="text-sm font-bold text-stone-500 mt-1 md:mt-2">
                                            Rs. {{ number_format($item['price']) }} each
                                        </p>
                                    </div>

                                    <p class="font-bold text-brand text-lg md:text-base mt-1 md:mt-0">
                                        Rs. {{ number_format($item['price'] * $item['quantity']) }}
                                    </p>
                                </div>

                                <div class="mt-4 md:mt-5 flex flex-wrap sm:flex-nowrap items-center gap-3">

                                    <form method="POST" action="{{ route('cart.update', $id) }}" class="flex items-center gap-2">
                                        @csrf
                                        @method('PATCH')

                                        <label class="text-sm text-stone-600 font-medium">Qty</label>
                                        <input
                                            type="number"
                                            name="quantity"
                                            value="{{ $item['quantity'] }}"
                                            min="1"
                                            max="99"
                                            class="w-16 md:w-20 px-2 md:px-3 py-2 border border-stone-300 rounded-md bg-white text-sm focus:outline-none focus:ring-1 focus:ring-brand"
                                        >
                                        <button
                                            type="submit"
                                            class="px-3 md:px-4 py-2 bg-stone-900 text-white rounded-md text-sm hover:bg-brand transition"
                                        >
                                            Update
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('cart.remove', $id) }}" class="ml-auto sm:ml-0">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="px-3 md:px-4 py-2 border border-red-200 text-red-600 rounded-md text-sm hover:bg-red-50 transition"
                                        >
                                            Remove
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>

                <aside class="bg-white rounded-2xl border border-stone-200 shadow-sm p-5 md:p-6 h-fit lg:sticky lg:top-8">

                    <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-5 md:mb-6">
                        Summary
                    </h2>

                    <div class="space-y-3 md:space-y-4 text-sm md:text-base">
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

                        <div class="border-t border-stone-200 pt-4 flex justify-between text-base md:text-lg">
                            <span class="font-bold text-stone-900">Total</span>
                            <span class="font-bold text-brand">
                                Rs. {{ number_format($total) }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 md:mt-8 space-y-3">
                        <a
                            href="{{ route('menu') }}"
                            class="block w-full text-center border border-brand text-brand py-3 rounded-md text-sm font-medium hover:bg-brand hover:text-white transition"
                        >
                            Add More Items
                        </a>

                        <form id="confirmOrderForm" method="POST" action="{{ route('order.store') }}">
                            @csrf
                            <button
                                id="confirmOrderButton"
                                type="submit"
                                class="w-full text-center bg-brand text-white py-3 rounded-md text-sm font-medium hover:bg-[#6f2c2c] transition shadow-sm"
                            >
                                Confirm Order
                            </button>
                        </form>

                        <form method="POST" action="{{ route('cart.clear') }}">
                            @csrf
                            <button
                                type="submit"
                                class="w-full text-center text-red-600 py-2 mt-2 rounded-md text-sm font-medium hover:bg-red-50 transition"
                            >
                                Clear Cart
                            </button>
                        </form>
                    </div>

                </aside>

            </div>
        @else
            <div class="bg-white rounded-2xl border border-stone-200 p-8 md:p-12 text-center max-w-2xl mx-auto">
                <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-3">
                    Cart is Empty
                </h2>

                @if (session('order_confirmed'))
                    <p class="text-stone-500 text-sm md:text-base mb-6 md:mb-8">
                        Your order has been confirmed. You can add more items from the menu.
                    </p>
                @else
                    <p class="text-stone-500 text-sm md:text-base mb-6 md:mb-8">
                        You have not added any food item yet.
                    </p>
                @endif

                <a
                    href="{{ route('menu') }}"
                    class="inline-flex items-center justify-center bg-brand text-white px-6 md:px-8 py-3 rounded-md text-sm font-medium hover:bg-[#6f2c2c] transition shadow-sm"
                >
                    Browse Menu
                </a>
            </div>
        @endif

    </div>

    <div id="processingOverlay" class="hidden fixed inset-0 z-50 bg-black/60 backdrop-blur-sm items-center justify-center px-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full p-8 text-center">
            <div class="processing-spinner mx-auto mb-5"></div>

            <h2 class="font-heading text-2xl md:text-3xl uppercase text-stone-900 mb-2">
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

</x-layout>