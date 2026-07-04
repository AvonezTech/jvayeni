<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Food - Our Menu</title>

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
        .special-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .special-scrollbar::-webkit-scrollbar-track {
            background: #f6f5f0;
            border-radius: 8px;
        }

        .special-scrollbar::-webkit-scrollbar-thumb {
            background-color: #8c383880;
            border-radius: 8px;
        }

        .special-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #8c3838;
        }
    </style>
</head>

<body class="bg-canvas text-stone-900 font-sans antialiased">

@php
    $items = $items ?? collect();
    $specialItems = $specialItems ?? collect();

    $cart = session('cart', []);

    $cartItemCount = collect($cart)->sum('quantity');

    $cartTotal = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

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

<!-- HERO SECTION -->
<header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24">
    <div class="flex flex-col-reverse md:flex-row items-center gap-10 md:gap-12 lg:gap-16">

        <div class="w-full md:w-1/2 flex flex-col items-start text-left relative z-10">
            <h1 class="font-heading text-7xl md:text-8xl lg:text-9xl font-bold uppercase leading-none tracking-tight text-stone-900 mb-6 md:mb-8">
                Our.<br>
                <span class="text-brand">Menu.</span>
            </h1>

            <p class="text-stone-700 text-lg md:text-xl font-medium max-w-sm leading-relaxed">
                Good food fuels great minds. Explore our wholesome and affordable menu.
            </p>
        </div>

        <div class="w-full md:w-1/2 relative">
            <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-canvas to-transparent z-10 hidden md:block"></div>

            <img
                src="{{ asset('static-images/Group 16.png') }}"
                alt="Delicious Menu Selection"
                class="w-full aspect-[4/3] md:aspect-auto object-cover rounded-2xl md:rounded-l-full shadow-lg border-4 border-white/50"
            >
        </div>

    </div>
</header>

<!-- TICKER / BANNER SECTION -->
<div class="w-full border-y-2 border-[#A44D49] bg-[#F8F6F1] py-3.5 overflow-hidden block relative left-0 right-0 m-0 p-0">
    <div id="marquee-container" class="flex whitespace-nowrap w-full overflow-hidden relative">
        <div id="marquee-track" class="flex whitespace-nowrap gap-8 items-center will-change-transform">

            <ul class="flex items-center gap-8 text-brand font-medium text-sm md:text-base shrink-0">
                <li>Student Combo</li>
                <li class="w-1.5 h-1.5 rounded-full bg-brand shrink-0"></li>
                <li>Today's Special</li>
                <li class="w-1.5 h-1.5 rounded-full bg-brand shrink-0"></li>
                <li>Festival Offers</li>
                <li class="w-1.5 h-1.5 rounded-full bg-brand shrink-0"></li>
                <li>Healthy Meals</li>
                <li class="w-1.5 h-1.5 rounded-full bg-brand shrink-0"></li>
                <li>Student Combo</li>
            </ul>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const track = document.getElementById("marquee-track");
        const container = document.getElementById("marquee-container");
        const originalList = track.querySelector("ul");

        const containerWidth = container.offsetWidth;
        let currentTrackWidth = originalList.offsetWidth;

        while (currentTrackWidth < (containerWidth * 3)) {
            const clone = originalList.cloneNode(true);
            clone.setAttribute("aria-hidden", "true");
            track.appendChild(clone);
            currentTrackWidth += originalList.offsetWidth;
        }

        let speed = 1.2;
        let scrollPos = 0;
        let isPaused = false;

        function animateMarquee() {
            if (!isPaused) {
                scrollPos -= speed;

                if (Math.abs(scrollPos) >= originalList.offsetWidth) {
                    scrollPos = 0;
                }

                track.style.transform = `translateX(${scrollPos}px)`;
            }

            requestAnimationFrame(animateMarquee);
        }

        track.addEventListener("mouseenter", () => isPaused = true);
        track.addEventListener("mouseleave", () => isPaused = false);

        animateMarquee();
    });
</script>

<!-- MAIN CONTENT AREA -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-24">

    @if (session('success'))
        <div class="mb-8 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-8 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 text-sm font-medium">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-10 md:gap-12 lg:gap-14 xl:gap-16 items-start">

        <!-- LEFT SIDE: MENU ITEMS -->
        <div class="order-last lg:order-first flex-1 w-full">

            <h2 class="font-heading text-3xl md:text-4xl font-bold uppercase text-stone-900 mb-6 md:mb-8">
                Menu Items
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6 lg:gap-8">

                @forelse ($items as $item)
                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">

                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img
                                src="{{ $getMenuPhoto($item->photo) }}"
                                alt="{{ $item->name }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            >
                        </div>

                        <div class="p-4 md:p-5 flex flex-col flex-grow">
                            <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1">
                                {{ $item->name }}
                            </h3>

                            @if (!empty($item->menu_category))
                                <p class="text-[11px] uppercase tracking-wide text-brand font-bold mb-2">
                                    {{ str_replace('_', ' ', $item->menu_category) }}
                                </p>
                            @endif

                            @if (!empty($item->description))
                                <p class="text-stone-500 text-xs mb-3 leading-relaxed">
                                    {{ $item->description }}
                                </p>
                            @endif

                            <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">
                                Rs. {{ number_format($item->price) }}
                            </p>

                            <form method="POST" action="{{ route('cart.add') }}" class="mt-auto">
                                @csrf

                                <input type="hidden" name="menu_item_id" value="{{ $item->id }}">

                                <button
                                    type="submit"
                                    class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors"
                                >
                                    Add to Tray
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-xl border border-stone-200 p-10 text-center">
                        <h3 class="font-heading text-2xl text-stone-900 mb-2">
                            No Menu Items
                        </h3>

                        <p class="text-stone-500 text-sm">
                            No menu items are available right now.
                        </p>
                    </div>
                @endforelse

            </div>

        </div>

        <!-- RIGHT SIDE: CART + SPECIAL ITEMS -->
        <aside class="order-first lg:order-last w-full lg:w-[380px] xl:w-[420px] shrink-0 lg:sticky lg:top-8 space-y-6">

            <!-- CART CARD -->
            <div class="bg-white rounded-2xl shadow-2xl shadow-brand/10 border-t-4 border-t-brand p-6 lg:p-8 relative overflow-hidden">

                <div class="absolute top-0 right-0 w-32 h-32 bg-brand/5 rounded-full -translate-y-10 translate-x-10"></div>

                <div class="relative z-10 flex items-center justify-between mb-6">
                    <h2 class="font-heading text-2xl font-bold uppercase text-stone-900">
                        Your Tray
                    </h2>

                    <span class="bg-brand text-white text-xs font-bold rounded-full px-3 py-1">
                        {{ $cartItemCount }} item
                    </span>
                </div>

                @if ($cartItemCount > 0)
                    <div class="relative z-10 space-y-4 max-h-[360px] overflow-y-auto special-scrollbar pr-2">

                        @foreach ($cart as $cartId => $cartItem)
                            <div class="flex gap-3 border-b border-stone-100 pb-4">
                                <div class="w-16 h-16 rounded-lg overflow-hidden bg-stone-100 shrink-0">
                                    <img
                                        src="{{ $getMenuPhoto($cartItem['photo'] ?? null) }}"
                                        alt="{{ $cartItem['name'] }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>

                                <div class="flex-1 min-w-0">
                                    <h3 class="font-bold text-sm text-stone-900 truncate">
                                        {{ $cartItem['name'] }}
                                    </h3>

                                    <p class="text-xs text-stone-500 mt-1">
                                        Qty: {{ $cartItem['quantity'] }} × Rs. {{ number_format($cartItem['price']) }}
                                    </p>

                                    <p class="text-sm font-bold text-brand mt-1">
                                        Rs. {{ number_format($cartItem['price'] * $cartItem['quantity']) }}
                                    </p>
                                </div>

                                <form method="POST" action="{{ route('cart.remove', $cartId) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-500 text-xs font-bold hover:underline"
                                    >
                                        Remove
                                    </button>
                                </form>
                            </div>
                        @endforeach

                    </div>

                    <div class="relative z-10 mt-6 border-t border-stone-200 pt-5 space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-stone-600">Total Items</span>
                            <span class="font-bold text-stone-900">
                                {{ $cartItemCount }}
                            </span>
                        </div>

                        <div class="flex justify-between text-base">
                            <span class="font-bold text-stone-900">Total Price</span>
                            <span class="font-bold text-brand">
                                Rs. {{ number_format($cartTotal) }}
                            </span>
                        </div>

                        <a
                            href="{{ route('cart.index') }}"
                            class="block w-full text-center bg-brand text-white py-3 rounded-md text-sm font-medium hover:bg-[#6f2c2c] transition"
                        >
                            View Full Cart
                        </a>

                        <a
                            href="{{ route('checkout') }}"
                            class="block w-full text-center border border-brand text-brand py-3 rounded-md text-sm font-medium hover:bg-brand hover:text-white transition"
                        >
                            Checkout
                        </a>

                        <form method="POST" action="{{ route('cart.clear') }}">
                            @csrf

                            <button
                                type="submit"
                                class="w-full text-center text-red-600 py-2 rounded-md text-sm font-medium hover:bg-red-50 transition"
                            >
                                Clear Tray
                            </button>
                        </form>
                    </div>
                @else
                    <div class="relative z-10 rounded-xl border border-stone-100 bg-canvas/60 p-5 text-center">
                        <p class="text-stone-500 text-sm">
                            Your tray is empty.
                        </p>

                        <p class="text-stone-400 text-xs mt-1">
                            Click Add to Tray to add food items.
                        </p>
                    </div>
                @endif

            </div>

            <!-- TODAY'S SPECIAL CARD -->
            <div class="bg-white rounded-2xl shadow-xl shadow-brand/10 border border-stone-100 p-6 lg:p-8 relative overflow-hidden">

                <h2 class="font-heading text-2xl font-bold uppercase text-stone-900 mb-6">
                    Today's Special
                </h2>

                <div class="max-h-[420px] overflow-y-auto special-scrollbar pr-3 space-y-4">

                    @forelse ($specialItems as $item)
                        <div class="flex gap-4 bg-canvas/50 rounded-xl border border-stone-100 p-3 group">
                            <div class="w-24 h-24 rounded-lg overflow-hidden bg-stone-100 shrink-0">
                                <img
                                    src="{{ $getMenuPhoto($item->photo) }}"
                                    alt="{{ $item->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                >
                            </div>

                            <div class="flex-1">
                                <h3 class="text-stone-800 font-bold text-sm">
                                    {{ $item->name }}
                                </h3>

                                <p class="text-brand font-bold text-sm mt-1">
                                    Rs. {{ number_format($item->price) }}
                                </p>

                                <form method="POST" action="{{ route('cart.add') }}" class="mt-3">
                                    @csrf

                                    <input type="hidden" name="menu_item_id" value="{{ $item->id }}">

                                    <button
                                        type="submit"
                                        class="w-full bg-[#ab5353] hover:bg-brand text-white text-xs font-medium py-2 rounded-sm transition-colors"
                                    >
                                        Add to Tray
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-xl border border-stone-100 bg-canvas/60 p-5 text-center">
                            <p class="text-stone-500 text-sm">
                                No special items available today.
                            </p>
                        </div>
                    @endforelse

                </div>

            </div>

        </aside>

    </div>
</main>

<x-footer />

</body>
</html>