<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Food UI</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind Custom Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#8c3838', // Maroon
                        canvas: '#f6f5f0', // Off-white background
                    },
                    fontFamily: {
                        heading: ['Oswald', 'sans-serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-[#F8F6F1] text-stone-900 font-sans antialiased">
    <x-navbar/>

    <!-- HERO SECTION -->
    <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24">
        <div class="flex flex-col-reverse md:flex-row items-center gap-10 md:gap-12 lg:gap-16">
            
            <!-- Hero Text Content -->
            <div class="w-full md:w-1/2 flex flex-col items-start text-left">
                <h1 class="font-heading text-6xl md:text-7xl lg:text-[5.5rem] font-bold uppercase leading-[0.9] tracking-tight text-stone-900 mb-6 md:mb-8">
                    Fresh.<br>
                    <span class="text-brand">Affordable.</span><br>
                    Campus Food.
                </h1>
                <p class="text-stone-700 text-lg md:text-xl font-medium max-w-md mb-8 md:mb-10 leading-relaxed">
                    Good food fuels great minds. Enjoy wholesome meals made fresh every day for our campus family.
                </p>
                <button class="bg-brand hover:bg-[#732d2d] text-white font-medium text-lg px-8 py-3.5 rounded-sm transition-colors duration-200">
                    View Today's Menu
                </button>
            </div>

            <!-- Hero Image -->
            <div class="w-full md:w-1/2">
                <img src="static-images/Group 16.png" alt="Delicious Campus Food" class="w-full aspect-[4/3] object-cover rounded-lg shadow-inner" />
            </div>

        </div>
    </header>

    <!-- TICKER / BANNER SECTION -->
    <div class="w-full border-y-2 border-[#A44D49] bg-[#F8F6F1] py-3.5 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ul class="flex items-center justify-between overflow-x-auto whitespace-nowrap gap-6 md:gap-8 text-brand font-medium text-sm md:text-base">
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

    <!-- MAIN CONTENT AREA -->
    <!-- Added responsive vertical padding and space-y for consistent gaps between sections -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-24 space-y-16 md:space-y-20 lg:space-y-24">

        <!-- 1. PROMO CARDS SECTION -->
        <section>
            <!-- Standardized gap: gap-4 on mobile, gap-6 on tablet, gap-8 on desktop -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                
                <!-- Promo Card 1 -->
                <div class="relative h-48 md:h-52 rounded-xl overflow-hidden flex flex-col justify-between p-5 md:p-6 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <img src="static-images/Rectangle 5.png" alt="Student Combo" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-black/40 z-0"></div> <!-- Dark Overlay -->
                    
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10 relative">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 relative group-hover:underline">Order now</p>
                </div>

                <!-- Promo Card 2 -->
                <div class="relative h-48 md:h-52 rounded-xl overflow-hidden flex flex-col justify-between p-5 md:p-6 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <img src="static-images/Rectangle 5.png" alt="Student Combo" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-black/40 z-0"></div>
                    
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10 relative">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 relative group-hover:underline">Order now</p>
                </div>

                <!-- Promo Card 3 -->
                <div class="relative h-48 md:h-52 rounded-xl overflow-hidden flex flex-col justify-between p-5 md:p-6 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <img src="static-images/Rectangle 5.png" alt="Student Combo" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-black/40 z-0"></div>
                    
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10 relative">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 relative group-hover:underline">Order now</p>
                </div>

                <!-- Promo Card 4 -->
                <div class="relative h-48 md:h-52 rounded-xl overflow-hidden flex flex-col justify-between p-5 md:p-6 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <img src="static-images/Rectangle 5.png" alt="Student Combo" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-black/40 z-0"></div>
                    
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10 relative">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 relative group-hover:underline">Order now</p>
                </div>

            </div>
        </section>

        <!-- 2. BROWSE CATEGORIES SECTION -->
        <section>
            <!-- Standardized title bottom margin: mb-6 md:mb-8 -->
            <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6 md:mb-8">Browse Categories</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                
                <!-- Category Card 1 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-[#ECE5DB] hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="h-44 md:h-48 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Breakfast" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 md:p-5 flex flex-col items-center justify-center text-center bg-white relative z-10">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Breakfast</h3>
                        <p class="text-stone-500 text-xs md:text-sm font-medium">Start your day right</p>
                    </div>
                </div>

                <!-- Category Card 2 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="h-44 md:h-48 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Lunch" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 md:p-5 flex flex-col items-center justify-center text-center bg-white relative z-10">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Lunch</h3>
                        <p class="text-stone-500 text-xs md:text-sm font-medium">Midday fuel</p>
                    </div>
                </div>

                <!-- Category Card 3 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="h-44 md:h-48 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Snacks" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 md:p-5 flex flex-col items-center justify-center text-center bg-white relative z-10">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Snacks</h3>
                        <p class="text-stone-500 text-xs md:text-sm font-medium">Quick bites</p>
                    </div>
                </div>

                <!-- Category Card 4 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="h-44 md:h-48 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Drinks" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 md:p-5 flex flex-col items-center justify-center text-center bg-white relative z-10">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Drinks</h3>
                        <p class="text-stone-500 text-xs md:text-sm font-medium">Refresh yourself</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- 3. POPULAR THIS WEEK SECTION -->
        <section>
            <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6 md:mb-8">Popular This Week</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                
                <!-- Product Card 1 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">
                    <div class="h-44 md:h-48 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Thakali set" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 md:p-5 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1">Thakali set</h3>
                        <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">Rs. 250</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">
                    <div class="h-44 md:h-48 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Momo Plate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 md:p-5 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1">Chicken Momo</h3>
                        <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">Rs. 150</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">
                    <div class="h-44 md:h-48 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Veg Chowmein" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 md:p-5 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1">Veg Chowmein</h3>
                        <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">Rs. 120</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">
                    <div class="h-44 md:h-48 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Fried Rice" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 md:p-5 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm md:text-base mb-1">Mixed Fried Rice</h3>
                        <p class="text-stone-900 font-bold text-xs md:text-sm mb-4 md:mb-5">Rs. 180</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- 4. GALLERY SECTION -->
        <section>
            <!-- Fixed the margin-bottom here from mb-2 to mb-6 md:mb-8 to perfectly match other sections -->
            <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6 md:mb-8">Gallery</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                
                <!-- Gallery Image 1 -->
                <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                    <img src="static-images/Rectangle 5.png" alt="Campus Food Gallery" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>

                <!-- Gallery Image 2 -->
                <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                    <img src="static-images/Rectangle 5.png" alt="Campus Food Gallery" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>

                <!-- Gallery Image 3 -->
                <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                    <img src="static-images/Rectangle 5.png" alt="Campus Food Gallery" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>

                <!-- Gallery Image 4 -->
                <div class="aspect-square bg-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 cursor-pointer group">
                    <img src="static-images/Rectangle 5.png" alt="Campus Food Gallery" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                </div>

            </div>
        </section>

    </main>

    <x-footer/>

</body>
</html>