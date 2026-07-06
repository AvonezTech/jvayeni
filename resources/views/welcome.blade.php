<x-layout>

    <style>
        .reveal {
            opacity: 0;
            transform: translateY(15px);
            transition: opacity 2.0s cubic-bezier(0.16, 1, 0.3, 1), transform 2.0s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <div class="bg-[#F8F6F1] text-stone-900 font-sans antialiased overflow-x-hidden">

        <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24">
            <div class="flex flex-col-reverse md:flex-row items-center gap-10 md:gap-12 lg:gap-16">
                
                <div class="w-full md:w-1/2 flex flex-col items-start text-left reveal">
                    <h1 class="font-heading text-6xl md:text-5xl lg:text-7xl font-bold uppercase leading-none tracking-tight text-stone-900 mb-6 md:mb-8">
                        Fresh.<br>
                        <span class="text-brand">Affordable.</span><br>
                        Campus Food.
                    </h1>

                    <p class="text-stone-700 text-lg md:text-xl font-medium max-w-md mb-8 md:mb-10 leading-relaxed">
                        Good food fuels great minds. Enjoy wholesome meals made fresh every day for our campus family.
                    </p>

                    <button class="bg-brand hover:bg-[#732d2d] text-white font-medium text-lg px-8 py-3.5 rounded-sm transform hover:scale-[1.03] active:scale-95 transition-all duration-300 shadow-md hover:shadow-brand/30">
                        <a href="{{ auth()->check() ? route('menu') : route('login') }}" class="w-full h-full block"> 
                            View Today's Menu 
                        </a>
                    </button>
                </div>

                <div class="w-full md:w-1/2 reveal" style="transition-delay: 150ms;">
                    <img src="static-images/Group 16.png" alt="Delicious Campus Food" class="w-full aspect-[4/3] object-cover rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-500" />
                </div>

            </div>
        </header>

        <div class="w-full border-y-2 border-[#A44D49] bg-[#F8F6F1] py-3.5 overflow-hidden block relative left-0 right-0 m-0 p-0 reveal">
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

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-24 space-y-16 md:space-y-20 lg:space-y-24">

            <section class="reveal">
                <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6 md:mb-8">Browse Categories</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                    
                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-[#ECE5DB] hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img src="static-images/sandwich.jpg" alt="Breakfast" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                        <div class="p-4 md:p-5 flex flex-col items-center justify-center text-center bg-white relative z-10">
                            <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Breakfast</h3>
                            <p class="text-stone-500 text-xs md:text-sm font-medium">Start your day right</p>
                        </div>
                    </div>

                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img src="static-images/khana.jpg" alt="Lunch" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                        <div class="p-4 md:p-5 flex flex-col items-center justify-center text-center bg-white relative z-10">
                            <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Lunch</h3>
                            <p class="text-stone-500 text-xs md:text-sm font-medium">Midday fuel</p>
                        </div>
                    </div>

                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img src="static-images/chowmin.jpg" alt="Snacks" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                        <div class="p-4 md:p-5 flex flex-col items-center justify-center text-center bg-white relative z-10">
                            <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Snacks</h3>
                            <p class="text-stone-500 text-xs md:text-sm font-medium">Quick bites</p>
                        </div>
                    </div>

                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img src="static-images/tea.jpg" alt="Drinks" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                        <div class="p-4 md:p-5 flex flex-col items-center justify-center text-center bg-white relative z-10">
                            <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Drinks</h3>
                            <p class="text-stone-500 text-xs md:text-sm font-medium">Refresh yourself</p>
                        </div>
                    </div>

                </div>
            </section>

            <section class="reveal">
                <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6 md:mb-8">Popular This Week</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                    
                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-all duration-300 hover:shadow-xl hover:-translate-y-1.5 group">
                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img src="static-images/khana.jpg" alt="Thakali set" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                        <div class="p-4 md:p-5 flex flex-col flex-grow">
                            <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1">Khana set</h3>
                            <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">Rs. 250</p>
                            @auth
                                <form action="{{ route('cart.add') }}" method="POST" class="w-full mt-auto">
                                    @csrf
                                    <input type="hidden" name="menu_item_id" value="1"> 
                                    <button type="submit" class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors duration-200">
                                        Add to Tray
                                    </button>
                                </form>
                            @else
                                <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors duration-200">
                                    <a href="{{ route('login') }}" class="block w-full h-full">Add to Tray</a>
                                </button>
                            @endauth
                        </div>
                    </div>

                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-all duration-300 hover:shadow-xl hover:-translate-y-1.5 group">
                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img src="static-images/sadeko.webp" alt="Momo Plate" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                        <div class="p-4 md:p-5 flex flex-col flex-grow">
                            <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1">Chauchau Sadeko</h3>
                            <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">Rs. 50</p>
                            @auth
                                <form action="{{ route('cart.add') }}" method="POST" class="w-full mt-auto">
                                    @csrf
                                    <input type="hidden" name="menu_item_id" value="2">
                                    <button type="submit" class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors duration-200">
                                        Add to Tray
                                    </button>
                                </form>
                            @else
                                <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors duration-200">
                                     <a href="{{ route('login') }}" class="block w-full h-full">Add to Tray</a>
                                </button>
                            @endauth
                        </div>
                    </div>

                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-all duration-300 hover:shadow-xl hover:-translate-y-1.5 group">
                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img src="static-images/chowmin.jpg" alt="Veg Chowmein" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                        <div class="p-4 md:p-5 flex flex-col flex-grow">
                            <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1"> Chowmein</h3>
                            <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">Rs. 120</p>
                            @auth
                                <form action="{{ route('cart.add') }}" method="POST" class="w-full mt-auto">
                                    @csrf
                                    <input type="hidden" name="menu_item_id" value="3">
                                    <button type="submit" class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors duration-200">
                                        Add to Tray
                                    </button>
                                </form>
                            @else
                                <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors duration-200">
                                     <a href="{{ route('login') }}" class="block w-full h-full">Add to Tray</a>
                                </button>
                            @endauth
                        </div>
                    </div>

                    <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-all duration-300 hover:shadow-xl hover:-translate-y-1.5 group">
                        <div class="h-44 md:h-48 w-full overflow-hidden">
                            <img src="static-images/rice.avif" alt="Fried Rice" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                        </div>
                        <div class="p-4 md:p-5 flex flex-col flex-grow">
                            <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1">Mixed Fried Rice</h3>
                            <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">Rs. 180</p>
                            @auth
                                <form action="{{ route('cart.add') }}" method="POST" class="w-full mt-auto">
                                    @csrf
                                    <input type="hidden" name="menu_item_id" value="4">
                                    <button type="submit" class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors duration-200">
                                        Add to Tray
                                    </button>
                                </form>
                            @else
                                <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors duration-200">
                                     <a href="{{ route('login') }}" class="block w-full h-full">Add to Tray</a>
                                </button>
                            @endauth
                        </div>
                    </div>

                </div>
            </section>

            <section class="reveal">
                <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6 md:mb-8">Gallery</h2>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                    
                    <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group">
                        <img src="static-images/samosa.jpg" alt="Campus Food Gallery" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                    </div>

                    <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group">
                        <img src="static-images/sandwich.jpg" alt="Campus Food Gallery" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                    </div>

                    <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group">
                        <img src="static-images/rice.avif" alt="Campus Food Gallery" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                    </div>

                    <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 cursor-pointer group">
                        <img src="static-images/pakauras.jpg" alt="Campus Food Gallery" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" />
                    </div>

                </div>
            </section>

        </main>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        
        // --- 1. Scroll Reveal Animation ---
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));


        // --- 2. Marquee Logic ---
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
            if (screenWidth < 768) {
                speed = 0.5; 
            } else if (screenWidth < 1024) {
                speed = 0.8; 
            } else {
                speed = 1.2; 
            }
        }

        function setupMarquee() {
            updateSpeed();

            track.querySelectorAll('ul[aria-hidden="true"]').forEach(function (clone) {
                clone.remove();
            });

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

            if (firstClone) {
                loopWidth = firstClone.offsetLeft;
            } else {
                loopWidth = originalWidth;
            }
        }

        function animateMarquee() {
            if (!isPaused && loopWidth > 0) {
                scrollPos -= speed;

                if (Math.abs(scrollPos) >= loopWidth) {
                    scrollPos += loopWidth;
                }

                track.style.transform = `translate3d(${scrollPos}px, 0, 0)`;
            }
            animationFrame = requestAnimationFrame(animateMarquee);
        }

        function restartMarquee() {
            if (animationFrame) {
                cancelAnimationFrame(animationFrame);
            }
            setupMarquee();
            animateMarquee();
        }

        track.addEventListener("mouseenter", function () {
            isPaused = true;
        });

        track.addEventListener("mouseleave", function () {
            isPaused = false;
        });

        window.addEventListener("resize", function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                restartMarquee();
            }, 150);
        });

        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(function () {
                restartMarquee();
            });
        } else {
            restartMarquee();
        }
    });
    </script>

</x-layout>