        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Campus Food - Our Menu</title>

            <!-- Tailwind CSS -->
            <script src="https://cdn.tailwindcss.com"></script>

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

            <!-- Tailwind Custom Configuration & Custom Styles -->
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
                /*
                    Safety fallback:
                    If route forgets to send $items or $specialItems,
                    page will not crash.
                */
                $items = $items ?? collect();
                $specialItems = $specialItems ?? collect();

                /*
                    Photo helper:
                    - Filament uploaded image: menu_items/example.png => public/storage/menu_items/example.png
                    - Static image: static-images/example.png => public/static-images/example.png
                    - Empty photo => default image
                */
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

            <!-- NAVIGATION BAR -->
            <x-navbar />

            <!-- HERO SECTION -->
            <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24">
                <div class="flex flex-col-reverse md:flex-row items-center gap-10 md:gap-12 lg:gap-16">

                    <!-- Hero Text Content -->
                    <div class="w-full md:w-1/2 flex flex-col items-start text-left relative z-10">
                        <h1 class="font-heading text-[5.5rem] md:text-[6rem] lg:text-[8rem] font-bold uppercase leading-[0.85] tracking-tight text-stone-900 mb-6 md:mb-8">
                            Our.<br>
                            <span class="text-brand">Menu.</span>
                        </h1>

                        <p class="text-stone-700 text-lg md:text-xl font-medium max-w-sm leading-relaxed">
                            Good food fuels great minds. Explore our wholesome and affordable menu.
                        </p>
                    </div>

                    <!-- Hero Image -->
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

                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-8 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="mb-8 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700 text-sm font-medium">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="flex flex-col lg:flex-row gap-10 md:gap-12 lg:gap-14 xl:gap-16 items-start">

                    <!-- RIGHT SIDEBAR: TODAY'S SPECIAL -->
                    <aside class="order-first lg:order-last w-full lg:w-[380px] xl:w-[420px] shrink-0 lg:sticky lg:top-8">

                        <div class="bg-white rounded-2xl shadow-2xl shadow-brand/10 border-t-4 border-t-brand p-6 lg:p-8 relative overflow-hidden">

                            <div class="absolute top-0 right-0 w-32 h-32 bg-brand/5 rounded-full -translate-y-10 translate-x-10"></div>

                            <div class="flex items-center justify-between mb-6 md:mb-8 relative z-10">
                                <h2 class="font-heading text-2xl font-bold uppercase text-stone-900 flex items-center gap-2">
                                    Today's Special
                                </h2>
                            </div>

                            <div class="max-h-[500px] overflow-y-auto special-scrollbar pr-3 space-y-4 md:space-y-6 relative z-10">

                                @forelse ($specialItems as $item)
                                    <div class="flex flex-col bg-canvas/50 rounded-xl overflow-hidden border border-stone-100 hover:border-brand/30 hover:shadow-md transition-all group">

                                        <div class="h-44 md:h-48 w-full overflow-hidden relative">
                                            <span class="absolute top-3 left-3 bg-brand text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wider z-10">
                                                Chef's Pick
                                            </span>

                                            <img
                                                src="{{ $getMenuPhoto($item->photo) }}"
                                                alt="{{ $item->name }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                            >
                                        </div>

                                        <div class="p-4 md:p-5 bg-white">
                                            <h3 class="text-stone-800 font-bold text-base mb-1">
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

                                            <p class="text-brand font-bold text-sm mb-4 md:mb-5">
                                                Rs. {{ number_format($item->price) }}
                                            </p>

                                            <form method="POST" action="{{ route('order.store') }}">
                                                @csrf

                                                <input type="hidden" name="menu_item_id" value="{{ $item->id }}">

                                                <button
                                                    type="submit"
                                                    class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors shadow-sm"
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

                    <!-- LEFT SIDE: MAIN MENU ITEMS -->
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

                                        <form method="POST" action="{{ route('order.store') }}" class="mt-auto">
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

                </div>
            </main>

            <x-footer />

        </body>
        </html>