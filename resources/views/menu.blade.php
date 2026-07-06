<x-layout>

    <style>
        .scrollbar-none::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-none {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

<body class="bg-[#FAF9F5] text-stone-900 font-sans antialiased selection:bg-brand selection:text-white flex flex-col min-h-screen">

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

    <header class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 pt-12 pb-6 md:pt-20 md:pb-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 border-b border-stone-200/80 pb-8">
            <div class="space-y-2">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-brand/80">Y'all Food Service</p>
                <h1 class="font-heading text-5xl md:text-7xl font-light tracking-tight text-stone-900 uppercase">
                    Our <span class="font-serif italic font-normal text-brand">Menu</span>
                </h1>
            </div>
            <p class="text-stone-500 text-sm md:text-base font-medium max-w-xs leading-relaxed">
                Wholesome meals, thoughtfully crafted daily for our campus family.
            </p>
        </div>
    </header>

    <div class="w-full border-y-2 border-[#A44D49] bg-[#F8F6F1] py-3.5 overflow-hidden block relative left-0 right-0 m-0 p-0">
        <div id="marquee-container" class="flex whitespace-nowrap w-full overflow-hidden relative">
            <div id="marquee-track" class="flex whitespace-nowrap gap-8 items-center will-change-transform transform-gpu">
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

    <main class="max-w-7xl mx-auto w-full px-0 sm:px-6 lg:px-8 py-4 md:py-8 flex-grow overflow-x-hidden">

        @if (session('success'))
            <div class="mx-4 sm:mx-0 mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mx-4 sm:mx-0 mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700 text-sm font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-10 xl:gap-12 items-start w-full">

            <div class="w-full lg:flex-grow order-2 lg:order-1 relative">

                <div class="sticky top-16 z-40 mb-8 backdrop-blur-md bg-[#FAF9F5]/90 border-b border-stone-200/40 w-full">
                    
                    <div class="flex items-center justify-start sm:justify-center gap-6 sm:gap-8 overflow-x-auto scrollbar-none snap-x snap-mandatory px-4 sm:px-0 py-4 w-full">
                        
                        @php 
                            $currentCat = request('category', 'all');
                            
                            $categories = [
                                'all' => ['label' => 'All Items', 'img' => 'static-images/Group 16.png'],
                                'breakfast' => ['label' => 'Breakfast', 'img' => 'static-images/sandwich.jpg'],
                                'lunch' => ['label' => 'Lunch', 'img' => 'static-images/khana.jpg'],
                                'snacks' => ['label' => 'Snacks', 'img' => 'static-images/chowmin.jpg'],
                                'drinks' => ['label' => 'Drinks', 'img' => 'static-images/tea.jpg']
                            ];
                        @endphp

                        @foreach($categories as $key => $cat)
                            <a href="{{ route('menu', ['category' => $key]) }}" 
                               class="flex flex-col items-center text-center gap-3 group shrink-0 snap-start select-none">
                                
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full p-1 transition-all duration-300 transform group-active:scale-95 shadow-sm
                                    {{ $currentCat === $key 
                                        ? 'ring-[3px] ring-brand bg-white scale-[1.05]' 
                                        : 'ring-1 ring-stone-200/80 bg-stone-100 group-hover:ring-stone-400' }}">
                                    <img src="{{ asset($cat['img']) }}" alt="{{ $cat['label'] }}" 
                                         class="w-full h-full object-cover rounded-full">
                                </div>

                                <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider transition-colors duration-200
                                    {{ $currentCat === $key ? 'text-brand font-extrabold' : 'text-stone-600 group-hover:text-stone-900' }}">
                                    {{ $cat['label'] }}
                                </span>
                            </a>
                        @endforeach

                    </div>
                </div>

                <div class="grid grid-cols-2 xl:grid-cols-3 gap-3 md:gap-6 w-full px-4 sm:px-0">

                    @forelse ($items as $item)
                        <div class="group relative flex flex-col bg-white rounded-2xl overflow-hidden transition-all duration-500 hover:shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-stone-200/60 w-full">

                            <div class="h-32 sm:h-44 md:h-52 w-full overflow-hidden relative bg-stone-100">
                                <img src="{{ $getMenuPhoto($item->photo) }}" alt="{{ $item->name }}"
                                    class="w-full h-full object-cover scale-100 group-hover:scale-105 transition-transform duration-700 ease-out">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                
                                @if (!empty($item->menu_category))
                                    <span class="absolute top-2 left-2 sm:top-3 sm:left-3 bg-stone-950/90 backdrop-blur-md text-white font-semibold text-[9px] uppercase tracking-widest px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-md">
                                        {{ str_replace('_', ' ', $item->menu_category) }}
                                    </span>
                                @endif
                            </div>

                            <div class="p-3 sm:p-5 flex flex-col flex-grow">
                                <h3 class="text-stone-950 font-semibold text-xs sm:text-base md:text-lg tracking-tight group-hover:text-brand transition-colors duration-300 truncate">
                                    {{ $item->name }}
                                </h3>

                                @if (!empty($item->description))
                                    <p class="text-stone-500 text-[11px] sm:text-xs line-clamp-2 leading-relaxed mb-4 mt-1">
                                        {{ $item->description }}
                                    </p>
                                @endif

                                <div class="flex items-center justify-between gap-2 mt-auto pt-2">
                                    <span class="text-stone-900 font-bold text-xs sm:text-base whitespace-nowrap">
                                        Rs. {{ number_format($item->price) }}
                                    </span>

                                    <form method="POST" action="{{ route('cart.add') }}" class="shrink-0">
                                        @csrf
                                        <input type="hidden" name="menu_item_id" value="{{ $item->id }}">
                                        <button type="submit" aria-label="Add item to Tray"
                                            class="flex items-center justify-center bg-stone-100 hover:bg-brand text-stone-900 hover:text-white h-8 w-8 sm:h-9 sm:w-9 rounded-xl transition-all duration-300 transform active:scale-95 shadow-sm">
                                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-full bg-white rounded-2xl border border-stone-200/80 p-12 text-center shadow-sm w-full">
                            <h3 class="font-heading text-lg font-medium text-stone-900 mb-1">No Items Available</h3>
                            <p class="text-stone-400 text-xs max-w-xs mx-auto">This dynamic collection is currently resting.</p>
                        </div>
                    @endforelse

                </div>
            </div>

            <aside class="order-1 lg:order-2 w-full lg:w-[360px] xl:w-[400px] shrink-0 lg:sticky lg:top-24 space-y-6 px-4 sm:px-0">

                <div class="bg-white rounded-2xl border border-stone-200/80 p-5 sm:p-6 shadow-[0_25px_60px_rgba(0,0,0,0.02)] relative w-full">
                    <div class="flex items-center justify-between border-b border-stone-100 pb-4 mb-4 sm:mb-6">
                        <div class="flex items-center gap-2">
                            <div class="h-2 w-2 rounded-full bg-brand animate-pulse"></div>
                            <h2 class="font-heading text-base sm:text-lg font-bold uppercase tracking-wide text-stone-900">Your Tray</h2>
                        </div>
                        <span class="bg-stone-950 text-white text-[9px] sm:text-[10px] font-bold tracking-wider uppercase rounded-md px-2.5 py-1">
                            {{ $cartItemCount }} Selected
                        </span>
                    </div>

                    @if ($cartItemCount > 0)
                        <div class="space-y-4 max-h-[240px] sm:max-h-[290px] overflow-y-auto special-scrollbar pr-1">
                            @foreach ($cart as $cartId => $cartItem)
                                <div class="flex gap-3 sm:gap-4 items-center border-b border-stone-50/80 pb-4 last:border-0 last:pb-0">
                                    <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl overflow-hidden bg-stone-100 shrink-0 border border-stone-100">
                                        <img src="{{ $getMenuPhoto($cartItem['photo'] ?? null) }}" alt="{{ $cartItem['name'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-semibold text-xs sm:text-sm text-stone-900 truncate">{{ $cartItem['name'] }}</h4>
                                        <p class="text-[11px] sm:text-xs text-stone-400 mt-0.5">
                                            {{ $cartItem['quantity'] }} × <span class="font-medium text-stone-600">Rs. {{ number_format($cartItem['price']) }}</span>
                                        </p>
                                    </div>
                                    <div class="flex flex-col items-end gap-1">
                                        <span class="text-xs font-bold text-stone-900">Rs. {{ number_format($cartItem['price'] * $cartItem['quantity']) }}</span>
                                        <form method="POST" action="{{ route('cart.remove', $cartId) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-stone-400 hover:text-red-600 text-[11px] font-medium transition-colors">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 border-t border-stone-100 pt-4 space-y-4">
                            <div class="flex justify-between items-end">
                                <span class="text-[11px] font-semibold text-stone-400 uppercase tracking-wider">Subtotal Value</span>
                                <span class="font-serif text-lg sm:text-xl font-normal text-stone-900">Rs. {{ number_format($cartTotal) }}</span>
                            </div>

                            <div class="grid grid-cols-2 gap-2">
                                <a href="{{ route('cart.index') }}" class="block w-full text-center bg-stone-50 hover:bg-stone-100 text-stone-900 py-2.5 sm:py-3 rounded-xl text-xs font-bold uppercase tracking-wider border border-stone-200 transition-all">
                                    Review
                                </a>
                                <a href="{{ route('checkout') }}" class="block w-full text-center bg-brand hover:bg-[#782d2a] text-white py-2.5 sm:py-3 rounded-xl text-xs font-bold uppercase tracking-wider transition-all shadow-md shadow-brand/10">
                                    Checkout
                                </a>
                            </div>

                            <form method="POST" action="{{ route('cart.clear') }}" class="pt-1">
                                @csrf
                                <button type="submit" class="w-full text-center text-stone-400 hover:text-stone-900 text-xs font-semibold uppercase tracking-wider transition-colors">
                                    Reset Empty Tray
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="py-6 text-center">
                            <p class="text-stone-400 text-xs sm:text-sm font-medium">Your interactive tray is empty.</p>
                        </div>
                    @endif
                </div>

                <div class="bg-white rounded-2xl border border-stone-200/80 p-5 sm:p-6 shadow-[0_25px_60px_rgba(0,0,0,0.02)] w-full">
                    <h2 class="font-heading text-base sm:text-lg font-bold uppercase tracking-wide text-stone-900 mb-4">Chef's Highlights</h2>

                    <div class="max-h-[260px] lg:max-h-[320px] overflow-y-auto special-scrollbar space-y-3 pr-1">
                        @forelse ($specialItems as $item)
                            <div class="flex gap-3 bg-stone-50/50 p-2.5 rounded-2xl border border-stone-100 items-center group">
                                <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl overflow-hidden bg-stone-100 shrink-0 border border-stone-200/40">
                                    <img src="{{ $getMenuPhoto($item->photo) }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-stone-950 font-semibold text-xs sm:text-sm truncate">{{ $item->name }}</h4>
                                    <p class="text-brand font-bold text-xs mt-0.5">Rs. {{ number_format($item->price) }}</p>
                                </div>
                                <form method="POST" action="{{ route('cart.add') }}" class="shrink-0">
                                    @csrf
                                    <input type="hidden" name="menu_item_id" value="{{ $item->id }}">
                                    <button type="submit" aria-label="Add highlighting item"
                                        class="flex items-center justify-center bg-white hover:bg-brand border border-stone-200 text-stone-800 hover:text-white h-8 w-8 rounded-lg transition-all duration-300 transform active:scale-95">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-stone-400 text-xs text-center py-2">Highlights will refresh tomorrow morning.</p>
                        @endforelse
                    </div>
                </div>

            </aside>

        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const track = document.getElementById("marquee-track");
            const container = document.getElementById("marquee-container");
            if (!track || !container) return;
            const originalList = track.querySelector("ul");
            if (!originalList) return;

            let speed = 1.2;
            let scrollPos = 0;
            let loopWidth = 0;
            let isPaused = false;
            let animationFrame = null;
            let resizeTimer = null;

            function updateSpeed() {
                const screenWidth = window.innerWidth;
                if (screenWidth < 768) { speed = 0.5; } 
                else if (screenWidth < 1024) { speed = 0.8; } 
                else { speed = 1.2; }
            }

            function setupMarquee() {
                updateSpeed();
                track.querySelectorAll('ul[aria-hidden="true"]').forEach(function (clone) { clone.remove(); });
                scrollPos = 0;
                loopWidth = 0;
                track.style.transition = "none";
                track.style.transform = "translate3d(0, 0, 0)";

                const containerWidth = container.getBoundingClientRect().width;
                const originalWidth = originalList.getBoundingClientRect().width;
                let totalWidth = originalWidth;
                let cloneCount = 0;

                while (totalWidth < containerWidth * 3 || cloneCount < 2) {
                    const clone = originalList.cloneNode(true);
                    clone.setAttribute("aria-hidden", "true");
                    track.appendChild(clone);
                    totalWidth += originalWidth;
                    cloneCount++;
                }

                const firstClone = track.querySelector('ul[aria-hidden="true"]');
                if (firstClone) { loopWidth = firstClone.offsetLeft; } 
                else { loopWidth = originalWidth; }
            }

            function animateMarquee() {
                if (!isPaused && loopWidth > 0) {
                    scrollPos -= speed;
                    if (Math.abs(scrollPos) >= loopWidth) { scrollPos += loopWidth; }
                    track.style.transform = `translate3d(${scrollPos}px, 0, 0)`;
                }
                animationFrame = requestAnimationFrame(animateMarquee);
            }

            function restartMarquee() {
                if (animationFrame) { cancelAnimationFrame(animationFrame); }
                setupMarquee();
                animateMarquee();
            }

            track.addEventListener("mouseenter", function () { isPaused = true; });
            track.addEventListener("mouseleave", function () { isPaused = false; });
            window.addEventListener("resize", function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () { restartMarquee(); }, 150);
            });

            if (document.fonts && document.fonts.ready) {
                document.fonts.ready.then(function () { restartMarquee(); });
            } else {
                restartMarquee();
            }
        });
    </script>

</body>

</x-layout>