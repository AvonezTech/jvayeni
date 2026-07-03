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
    <style>
        /* Custom sleek scrollbar for the Today's Special section */
        .special-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .special-scrollbar::-webkit-scrollbar-track {
            background: #f6f5f0;
            border-radius: 8px;
        }
        .special-scrollbar::-webkit-scrollbar-thumb {
            background-color: #8c383880; /* Brand color with opacity */
            border-radius: 8px;
        }
        .special-scrollbar::-webkit-scrollbar-thumb:hover {
            background-color: #8c3838;
        }
    </style>
</head>
<body class="bg-canvas text-stone-900 font-sans antialiased">

    <!-- NAVIGATION BAR -->
   <x-navbar />

    <!-- HERO SECTION -->
    <!-- Standardized padding to match home page: py-12 md:py-20 lg:py-24 -->
    <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20 lg:py-24">
        <!-- Standardized gap: gap-10 md:gap-12 lg:gap-16 -->
        <div class="flex flex-col-reverse md:flex-row items-center gap-10 md:gap-12 lg:gap-16">
            
            <!-- Hero Text Content -->
            <div class="w-full md:w-1/2 flex flex-col items-start text-left relative z-10">
                <!-- Standardized bottom margin: mb-6 md:mb-8 -->
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
                <!-- A soft gradient mask on the left side of the image to blend it with the background like the UI -->
                <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-canvas to-transparent z-10 hidden md:block"></div>
                <img src="static-images/Group 16.png" alt="Delicious Menu Selection" class="w-full aspect-[4/3] md:aspect-auto object-cover rounded-2xl md:rounded-l-full shadow-lg border-4 border-white/50" />
            </div>

        </div>
    </header>

    <!-- TICKER / BANNER SECTION -->
    <div class="w-full border-y-2 border-brand/20 bg-canvas py-3.5 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Standardized gap and added shrink-0 to prevent text squishing -->
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
    <!-- Standardized padding to match home page: py-12 md:py-16 lg:py-24 -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-24">
        
        <!-- Flex Container for Grid and Sidebar -->
        <!-- Standardized flex gap between main content and sidebar -->
        <div class="flex flex-col lg:flex-row gap-10 md:gap-12 lg:gap-14 xl:gap-16 items-start">

            <!-- RIGHT SIDEBAR: TODAY'S SPECIAL (Shows FIRST on Mobile, RIGHT on Desktop) -->
            <aside class="order-first lg:order-last w-full lg:w-[380px] xl:w-[420px] shrink-0 sticky top-8">
                
                <!-- Enhanced Attractive Container -->
                <div class="bg-white rounded-2xl shadow-2xl shadow-brand/10 border-t-4 border-t-brand p-6 lg:p-8 relative overflow-hidden">
                    
                    <!-- Decorative Background elements -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-brand/5 rounded-full -translate-y-10 translate-x-10"></div>
                    
                    <!-- Header -->
                    <div class="flex items-center justify-between mb-6 md:mb-8 relative z-10">
                        <h2 class="font-heading text-2xl font-bold uppercase text-stone-900 flex items-center gap-2">
                            Today's Special
                            <!-- Pulsing Hot Badge -->
                            
                        </h2>
                    </div>

                    <!-- SCROLLABLE LIST -->
                    <!-- Standardized spacing: space-y-4 md:space-y-6 -->
                    <div class="max-h-[500px] overflow-y-auto special-scrollbar pr-3 space-y-4 md:space-y-6 relative z-10">
                        
                        <!-- Special Item 1 -->
                        <div class="flex flex-col bg-canvas/50 rounded-xl overflow-hidden border border-stone-100 hover:border-brand/30 hover:shadow-md transition-all group">
                            <!-- Standardized image height -->
                            <div class="h-44 md:h-48 w-full overflow-hidden relative">
                                <span class="absolute top-3 left-3 bg-brand text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wider z-10">Chef's Pick</span>
                                <img src="static-images/Rectangle 5.png" alt="Thakali set" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            </div>
                            <!-- Standardized padding -->
                            <div class="p-4 md:p-5 bg-white">
                                <h3 class="text-stone-800 font-bold text-base mb-1">Deluxe Thakali Set</h3>
                                <p class="text-brand font-bold text-sm mb-4 md:mb-5">Rs. 250</p>
                                <button class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors shadow-sm">
                                    Add to Tray
                                </button>
                            </div>
                        </div>

                        <!-- Special Item 2 -->
                        <div class="flex flex-col bg-canvas/50 rounded-xl overflow-hidden border border-stone-100 hover:border-brand/30 hover:shadow-md transition-all group">
                            <div class="h-44 md:h-48 w-full overflow-hidden">
                                <img src="static-images/Rectangle 5.png" alt="Momo Plate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            </div>
                            <div class="p-4 md:p-5 bg-white">
                                <h3 class="text-stone-800 font-bold text-base mb-1">Steamy Chicken Momo</h3>
                                <p class="text-brand font-bold text-sm mb-4 md:mb-5">Rs. 180</p>
                                <button class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors shadow-sm">
                                    Add to Tray
                                </button>
                            </div>
                        </div>

                        <!-- Special Item 3 -->
                        <div class="flex flex-col bg-canvas/50 rounded-xl overflow-hidden border border-stone-100 hover:border-brand/30 hover:shadow-md transition-all group">
                            <div class="h-44 md:h-48 w-full overflow-hidden">
                                <img src="static-images/Rectangle 5.png" alt="Chowmein" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            </div>
                            <div class="p-4 md:p-5 bg-white">
                                <h3 class="text-stone-800 font-bold text-base mb-1">Spicy Pork Chowmein</h3>
                                <p class="text-brand font-bold text-sm mb-4 md:mb-5">Rs. 200</p>
                                <button class="w-full bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 md:py-2.5 rounded-sm transition-colors shadow-sm">
                                    Add to Tray
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>


            <!-- LEFT SIDE: MAIN MENU ITEMS -->
            <div class="order-last lg:order-first flex-1 w-full">
                <!-- Standardized title bottom margin: mb-6 md:mb-8 -->
                <h2 class="font-heading text-3xl md:text-4xl font-bold uppercase text-stone-900 mb-6 md:mb-8">Menu Items</h2>
                
                <!-- Standardized grid gap matching home page: gap-4 md:gap-6 lg:gap-8 -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                    
                    <!-- Menu Card 1 -->
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

                    <!-- Menu Card 2 -->
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

                    <!-- Menu Card 3 -->
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

                    <!-- Menu Card 4 -->
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

                    <!-- Menu Card 5 -->
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
                    
                    <!-- Menu Card 6 -->
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

                </div>
                
            </div>
            
        </div>
    </main>

    <x-footer />
</body>
</html>