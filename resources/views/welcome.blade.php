<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Food UI</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts matching the design -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind Custom Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#8c3838', // The maroon brand color
                        canvas: '#f6f5f0', // The off-white background color
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
<body class="bg-canvas text-stone-900 font-sans antialiased">

    <!-- HERO SECTION -->
    <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24">
        <div class="flex flex-col-reverse md:flex-row items-center gap-10">
            
            <!-- Hero Text Content -->
            <div class="w-full md:w-1/2 flex flex-col items-start text-left">
                <h1 class="font-heading text-6xl md:text-7xl lg:text-[5.5rem] font-bold uppercase leading-[0.9] tracking-tight text-stone-900 mb-6">
                    Fresh.<br>
                    <span class="text-brand">Affordable.</span><br>
                    Campus Food.
                </h1>
                <p class="text-stone-700 text-lg md:text-xl font-medium max-w-md mb-8 leading-relaxed">
                    Good food fuels great minds. Enjoy wholesome meals made fresh every day for our campus family.
                </p>
                <button class="bg-brand hover:bg-[#732d2d] text-white font-medium text-lg px-8 py-3 rounded-sm transition-colors duration-200">
                    View Today's Menu
                </button>
            </div>

            <!-- Hero Image Placeholder -->
            <div class="w-full md:w-1/2">
                <!-- Replace this gray box with your actual hero image -->
                <div class="w-full aspect-[4/3] bg-gray-300 rounded-lg shadow-inner flex items-center justify-center text-gray-500 font-medium">
                    [ Hero Image Placeholder ]
                </div>
            </div>

        </div>
    </header>

    <!-- TICKER / BANNER SECTION -->
    <div class="w-full border-y-2 border-brand/20 bg-canvas py-3 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ul class="flex items-center justify-between overflow-x-auto whitespace-nowrap gap-6 text-brand font-medium text-sm md:text-base">
                <li>Student Combo</li>
                <li class="w-1.5 h-1.5 rounded-full bg-brand"></li>
                <li>Today's Special</li>
                <li class="w-1.5 h-1.5 rounded-full bg-brand"></li>
                <li>Festival Offers</li>
                <li class="w-1.5 h-1.5 rounded-full bg-brand"></li>
                <li>Healthy Meals</li>
                <li class="w-1.5 h-1.5 rounded-full bg-brand"></li>
                <li>Student Combo</li>
            </ul>
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">

        <!-- 1. PROMO CARDS SECTION -->
        <section>
            <!-- 4 Column Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                
                <!-- Promo Card 1 -->
                <div class="relative h-48 bg-gray-500 rounded-xl overflow-hidden flex flex-col justify-between p-5 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 group-hover:underline">Order now</p>
                    <!-- To add a background image later, put your <img> tag here with class="absolute inset-0 w-full h-full object-cover mix-blend-overlay z-0" -->
                </div>

                <!-- Promo Card 2 -->
                <div class="relative h-48 bg-gray-500 rounded-xl overflow-hidden flex flex-col justify-between p-5 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 group-hover:underline">Order now</p>
                </div>

                <!-- Promo Card 3 -->
                <div class="relative h-48 bg-gray-500 rounded-xl overflow-hidden flex flex-col justify-between p-5 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 group-hover:underline">Order now</p>
                </div>

                <!-- Promo Card 4 -->
                <div class="relative h-48 bg-gray-500 rounded-xl overflow-hidden flex flex-col justify-between p-5 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 group-hover:underline">Order now</p>
                </div>

            </div>
        </section>

        <!-- 2. BROWSE CATEGORIES SECTION -->
        <section>
            <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6">Browse Categories</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                
                <!-- Category Card 1 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer">
                    <!-- Image Placeholder -->
                    <div class="h-44 bg-gray-300 w-full flex items-center justify-center text-gray-500 text-sm">
                        [ Image ]
                    </div>
                    <!-- Card Body -->
                    <div class="p-4 flex flex-col items-center justify-center text-center">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Breakfast</h3>
                        <p class="text-stone-500 text-xs font-medium">Start your day right</p>
                    </div>
                </div>

                <!-- Category Card 2 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="h-44 bg-gray-300 w-full flex items-center justify-center text-gray-500 text-sm">[ Image ]</div>
                    <div class="p-4 flex flex-col items-center justify-center text-center">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Breakfast</h3>
                        <p class="text-stone-500 text-xs font-medium">Start your day right</p>
                    </div>
                </div>

                <!-- Category Card 3 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="h-44 bg-gray-300 w-full flex items-center justify-center text-gray-500 text-sm">[ Image ]</div>
                    <div class="p-4 flex flex-col items-center justify-center text-center">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Breakfast</h3>
                        <p class="text-stone-500 text-xs font-medium">Start your day right</p>
                    </div>
                </div>

                <!-- Category Card 4 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer">
                    <div class="h-44 bg-gray-300 w-full flex items-center justify-center text-gray-500 text-sm">[ Image ]</div>
                    <div class="p-4 flex flex-col items-center justify-center text-center">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Breakfast</h3>
                        <p class="text-stone-500 text-xs font-medium">Start your day right</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- 3. POPULAR THIS WEEK SECTION -->
        <section class="pb-16">
            <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6">Popular This Week</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                
                <!-- Product Card 1 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1">
                    <!-- Image Placeholder -->
                    <div class="h-44 bg-gray-300 w-full flex items-center justify-center text-gray-500 text-sm">
                        [ Image ]
                    </div>
                    <!-- Card Body -->
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm mb-0.5">Thakali set</h3>
                        <p class="text-stone-900 font-bold text-xs mb-4">Rs. 250</p>
                        <!-- Add to Tray Button -->
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1">
                    <div class="h-44 bg-gray-300 w-full flex items-center justify-center text-gray-500 text-sm">[ Image ]</div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm mb-0.5">Thakali set</h3>
                        <p class="text-stone-900 font-bold text-xs mb-4">Rs. 250</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1">
                    <div class="h-44 bg-gray-300 w-full flex items-center justify-center text-gray-500 text-sm">[ Image ]</div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm mb-0.5">Thakali set</h3>
                        <p class="text-stone-900 font-bold text-xs mb-4">Rs. 250</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1">
                    <div class="h-44 bg-gray-300 w-full flex items-center justify-center text-gray-500 text-sm">[ Image ]</div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm mb-0.5">Thakali set</h3>
                        <p class="text-stone-900 font-bold text-xs mb-4">Rs. 250</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

            </div>
        </section>

    </main>

</body>
</html>