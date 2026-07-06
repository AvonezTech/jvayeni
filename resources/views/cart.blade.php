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

        <div class="mb-8 md:mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="font-heading text-4xl sm:text-5xl md:text-6xl font-black tracking-tight text-stone-900 leading-none">
                    Your <span class="text-brand">Cart.</span>
                </h1>
                <p class="text-stone-500 mt-2 md:mt-3 text-sm md:text-base font-medium">
                    Review your selected items and confirm your order.
                </p>
            </div>
            
            @if (count($cart) > 0)
                <span class="inline-block bg-brand/10 text-brand font-bold px-4 py-1.5 rounded-full text-sm w-fit">
                    {{ count($cart) }} Item(s)
                </span>
            @endif
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50/80 px-5 py-4 text-green-700 text-sm font-medium flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        @if (session('order_confirmed'))
            <div class="mb-8 rounded-2xl border border-green-200 bg-green-50 px-6 py-8 text-center text-green-800 shadow-sm">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase mb-2">
                    Order Confirmed!
                </h2>
                <p class="text-stone-600 text-sm md:text-base">
                    Your order has been saved successfully.
                    @if (session('order_id'))
                        <br class="md:hidden">
                        <span class="font-bold text-green-900 md:ml-1 mt-2 md:mt-0 inline-block px-3 py-1 bg-green-200/50 rounded-lg">Order ID: #{{ session('order_id') }}</span>
                    @endif
                </p>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50/80 px-5 py-4 text-red-700 text-sm font-medium flex items-center gap-3">
                <svg class="w-5 h-5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ $errors->first() }}
            </div>
        @endif

        @if (count($cart) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">

                <div class="lg:col-span-7 xl:col-span-8 space-y-4 md:space-y-5">
                    @foreach ($cart as $id => $item)
                        <div class="bg-white rounded-2xl border border-stone-200 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.03)] p-4 sm:p-5 flex flex-col sm:flex-row gap-5 hover:border-stone-300 transition-colors">

                            <div class="w-full sm:w-36 h-48 sm:h-36 rounded-xl overflow-hidden bg-stone-100 shrink-0 relative group">
                                <img
                                    src="{{ $getMenuPhoto($item['photo'] ?? null) }}"
                                    alt="{{ $item['name'] }}"
                                    class="w-full h-full object-cover transition duration-300 group-hover:scale-105"
                                >
                            </div>

                            <div class="flex-1 flex flex-col justify-between">
                                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-3">
                                    <div class="pr-4">
                                        @if (!empty($item['menu_category']))
                                            <p class="text-[10px] uppercase tracking-wider text-brand font-bold mb-1">
                                                {{ str_replace('_', ' ', $item['menu_category']) }}
                                            </p>
                                        @endif
                                        <h2 class="font-bold text-lg md:text-xl text-stone-900 leading-tight">
                                            {{ $item['name'] }}
                                        </h2>
                                        <p class="text-sm font-medium text-stone-500 mt-1">
                                            Rs. {{ number_format($item['price']) }} <span class="text-xs text-stone-400 font-normal">/ each</span>
                                        </p>
                                    </div>

                                    <p class="hidden md:block font-black text-brand text-lg text-right min-w-[100px]">
                                        Rs. {{ number_format($item['price'] * $item['quantity']) }}
                                    </p>
                                </div>

                                <div class="mt-5 pt-4 border-t border-stone-100 flex flex-wrap items-center justify-between gap-4">
                                    
                                    <form method="POST" action="{{ route('cart.update', $id) }}" class="flex items-center gap-2">
                                        @csrf
                                        @method('PATCH')
                                        <div class="flex items-center border border-stone-300 rounded-lg overflow-hidden bg-stone-50 focus-within:border-brand focus-within:ring-1 focus-within:ring-brand transition-all">
                                            <span class="pl-3 pr-2 text-xs font-bold text-stone-500 uppercase tracking-wider">Qty</span>
                                            <input
                                                type="number"
                                                name="quantity"
                                                value="{{ $item['quantity'] }}"
                                                min="1"
                                                max="99"
                                                class="w-14 py-2 bg-transparent text-sm font-semibold text-stone-900 text-center focus:outline-none border-none p-0"
                                            >
                                        </div>
                                        <button
                                            type="submit"
                                            class="p-2 bg-stone-900 text-white rounded-lg text-sm hover:bg-brand transition-colors flex items-center justify-center"
                                            title="Update Quantity"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                        </button>
                                    </form>

                                    <div class="flex items-center gap-4">
                                        <p class="md:hidden font-black text-brand text-lg">
                                            Rs. {{ number_format($item['price'] * $item['quantity']) }}
                                        </p>

                                        <form method="POST" action="{{ route('cart.remove', $id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="text-stone-400 hover:text-red-600 transition-colors p-2 rounded-lg hover:bg-red-50 flex items-center gap-1.5"
                                                title="Remove Item"
                                            >
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                <span class="sr-only sm:not-sr-only sm:text-sm sm:font-medium">Remove</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <aside class="lg:col-span-5 xl:col-span-4 h-fit lg:sticky lg:top-24 mt-4 lg:mt-0">
                    <div class="bg-stone-50 rounded-2xl border border-stone-200 shadow-sm p-6 md:p-8">
                        <h2 class="font-heading text-xl md:text-2xl font-black uppercase text-stone-900 mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Order Summary
                        </h2>

                        <div class="space-y-4 text-sm md:text-base font-medium">
                            <div class="flex justify-between items-center">
                                <span class="text-stone-500">Subtotal</span>
                                <span class="text-stone-900">Rs. {{ number_format($subtotal) }}</span>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-stone-500 text-sm">Service Charge <span class="text-xs text-stone-400 bg-white px-2 py-0.5 rounded border border-stone-200 ml-1">Fixed</span></span>
                                <span class="text-stone-900">Rs. {{ number_format($serviceCharge) }}</span>
                            </div>

                            <div class="border-t-2 border-dashed border-stone-300 pt-4 mt-2 flex justify-between items-end">
                                <div>
                                    <span class="block text-xs uppercase tracking-wider text-stone-500 font-bold mb-1">Total Amount</span>
                                    <span class="text-xs text-stone-400 font-normal">Including VAT</span>
                                </div>
                                <span class="font-black text-2xl text-brand">
                                    Rs. {{ number_format($total) }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-8 space-y-3">
                            <form id="confirmOrderForm" method="POST" action="{{ route('order.store') }}">
                                @csrf
                                <button
                                    id="confirmOrderButton"
                                    type="submit"
                                    class="w-full group flex items-center justify-center gap-2 bg-brand text-white py-3.5 rounded-xl text-base font-bold hover:bg-[#6f2c2c] active:scale-[0.98] transition-all shadow-md hover:shadow-lg"
                                >
                                    Confirm Order
                                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </form>

                            <a
                                href="{{ route('menu') }}"
                                class="flex items-center justify-center w-full text-center bg-white border-2 border-stone-200 text-stone-700 py-3 rounded-xl text-sm font-bold hover:border-brand hover:text-brand transition-colors"
                            >
                                Add More Items
                            </a>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('cart.clear') }}" class="mt-4 text-center">
                        @csrf
                        <button
                            type="submit"
                            class="text-stone-400 text-xs font-medium uppercase tracking-wider hover:text-red-500 transition-colors py-2 px-4 rounded-lg hover:bg-red-50 inline-flex items-center gap-1.5"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            Empty Entire Cart
                        </button>
                    </form>
                </aside>

            </div>
        @else
            <div class="bg-white rounded-3xl border border-stone-200 p-10 md:p-16 text-center max-w-2xl mx-auto shadow-sm">
                <div class="w-24 h-24 bg-stone-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-4xl">🛒</span>
                </div>
                
                <h2 class="font-heading text-2xl md:text-3xl font-black uppercase text-stone-900 mb-3 tracking-tight">
                    Your Cart is Empty
                </h2>

                @if (session('order_confirmed'))
                    <p class="text-stone-500 text-sm md:text-base font-medium mb-8 max-w-md mx-auto">
                        Your previous order has been confirmed. Feeling hungry again? Browse our menu to add more items.
                    </p>
                @else
                    <p class="text-stone-500 text-sm md:text-base font-medium mb-8 max-w-md mx-auto">
                        Looks like you haven't added anything yet. Discover our delicious meals and satisfy your cravings!
                    </p>
                @endif

                <a
                    href="{{ route('menu') }}"
                    class="inline-flex items-center justify-center bg-brand text-white px-8 py-3.5 rounded-xl text-base font-bold hover:bg-[#6f2c2c] transition-all shadow-md hover:shadow-lg active:scale-[0.98] gap-2"
                >
                    Browse Menu
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        @endif

    </div>

    <div id="processingOverlay" class="hidden fixed inset-0 z-50 bg-stone-900/40 backdrop-blur-sm items-center justify-center px-4 transition-opacity">
        <div class="bg-white rounded-3xl shadow-2xl max-w-sm w-full p-8 md:p-10 text-center animate-pulse">
            <svg class="animate-spin h-10 w-10 text-brand mx-auto mb-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>

            <h2 class="font-heading text-xl md:text-2xl font-black uppercase text-stone-900 mb-2">
                Processing Order
            </h2>

            <p class="text-stone-500 text-sm font-medium">
                Please hold on a second...
            </p>
        </div>
    </div>

    <script>
        const confirmOrderForm = document.getElementById('confirmOrderForm');
        const confirmOrderButton = document.getElementById('confirmOrderButton');
        const processingOverlay = document.getElementById('processingOverlay');

        if (confirmOrderForm) {
            confirmOrderForm.addEventListener('submit', function () {
                // Show overlay
                processingOverlay.classList.remove('hidden');
                processingOverlay.classList.add('flex');

                // Disable button
                confirmOrderButton.disabled = true;
                
                // Keep the button width stable while changing text
                const originalWidth = confirmOrderButton.offsetWidth;
                confirmOrderButton.style.width = originalWidth + 'px';
                confirmOrderButton.innerHTML = 'Processing...';
                confirmOrderButton.classList.add('opacity-70', 'cursor-not-allowed');
            });
        }
    </script>

</x-layout>