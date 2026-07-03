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
<nav class="w-full border-b border-stone-200/60 bg-canvas">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            
            <div class="flex-1 flex justify-start">
                <a href="#" class="font-heading text-2xl font-bold text-brand uppercase tracking-wide">
                    Campus Food
                </a>
            </div>

            <div class="flex items-center gap-8">
                <a href="#" class="text-stone-700 hover:text-brand font-medium transition-colors">Home</a>
                <a href="#" class="text-stone-700 hover:text-brand font-medium transition-colors">Menu</a>
            </div>
            
            <div class="flex-1 flex justify-end">
                <a href="#" class="bg-brand hover:bg-[#732d2d] text-white font-medium text-sm px-6 py-2 rounded-sm transition-colors duration-200 shadow-sm">
                    Login
                </a>
            </div>
            
        </div>
    </nav>
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

            <!-- Hero Image -->
            <div class="w-full md:w-1/2">
                <img src="static-images/Group 16.png" alt="Delicious Campus Food" class="w-full aspect-[4/3] object-cover rounded-lg shadow-inner" />
            </div>

        </div>
    </header>

    <!-- TICKER / BANNER SECTION -->
    <div class="w-full border-y-2 border-[#A44D49] bg-[#F8F6F1] py-3 overflow-hidden">
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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                
                <!-- Promo Card 1 -->
                <div class="relative h-48 rounded-xl overflow-hidden flex flex-col justify-between p-5 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <img src="static-images/Rectangle 5.png" alt="Student Combo" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-black/40 z-0"></div> <!-- Dark Overlay -->
                    
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10 relative">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 relative group-hover:underline">Order now</p>
                </div>

                <!-- Promo Card 2 -->
                <div class="relative h-48 rounded-xl overflow-hidden flex flex-col justify-between p-5 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <img src="static-images/Rectangle 5.png" alt="Student Combo" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-black/40 z-0"></div>
                    
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10 relative">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 relative group-hover:underline">Order now</p>
                </div>

                <!-- Promo Card 3 -->
                <div class="relative h-48 rounded-xl overflow-hidden flex flex-col justify-between p-5 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <img src="static-images/Rectangle 5.png" alt="Student Combo" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-black/40 z-0"></div>
                    
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10 relative">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 relative group-hover:underline">Order now</p>
                </div>

                <!-- Promo Card 4 -->
                <div class="relative h-48 rounded-xl overflow-hidden flex flex-col justify-between p-5 shadow-sm group cursor-pointer hover:shadow-md transition-shadow">
                    <img src="static-images/Rectangle 5.png" alt="Student Combo" class="absolute inset-0 w-full h-full object-cover z-0 group-hover:scale-105 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-black/40 z-0"></div>
                    
                    <h3 class="font-heading text-2xl md:text-3xl font-bold text-white uppercase leading-tight z-10 relative">Student<br>Combo</h3>
                    <p class="text-white text-sm font-medium z-10 relative group-hover:underline">Order now</p>
                </div>

            </div>
        </section>

        <!-- 2. BROWSE CATEGORIES SECTION -->
        <section>
            <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6">Browse Categories</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                
                <!-- Category Card 1 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-[#ECE5DB] hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="h-44 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Breakfast" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 flex flex-col items-center justify-center text-center bg-white relative z-10">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Breakfast</h3>
                        <p class="text-stone-500 text-xs font-medium">Start your day right</p>
                    </div>
                </div>

                <!-- Category Card 2 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="h-44 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Lunch" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 flex flex-col items-center justify-center text-center bg-white relative z-10">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Lunch</h3>
                        <p class="text-stone-500 text-xs font-medium">Midday fuel</p>
                    </div>
                </div>

                <!-- Category Card 3 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="h-44 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Snacks" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 flex flex-col items-center justify-center text-center bg-white relative z-10">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Snacks</h3>
                        <p class="text-stone-500 text-xs font-medium">Quick bites</p>
                    </div>
                </div>

                <!-- Category Card 4 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 hover:shadow-md transition-shadow cursor-pointer group">
                    <div class="h-44 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Drinks" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 flex flex-col items-center justify-center text-center bg-white relative z-10">
                        <h3 class="font-heading text-brand font-bold uppercase text-xl mb-0.5">Drinks</h3>
                        <p class="text-stone-500 text-xs font-medium">Refresh yourself</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- 3. POPULAR THIS WEEK SECTION -->
        <section class="pb-16">
            <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6">Popular This Week</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                
                <!-- Product Card 1 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">
                    <div class="h-44 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Thakali set" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm mb-0.5">Thakali set</h3>
                        <p class="text-stone-900 font-bold text-xs mb-4">Rs. 250</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">
                    <div class="h-44 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Momo Plate" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm mb-0.5">Chicken Momo</h3>
                        <p class="text-stone-900 font-bold text-xs mb-4">Rs. 150</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">
                    <div class="h-44 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Veg Chowmein" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm mb-0.5">Veg Chowmein</h3>
                        <p class="text-stone-900 font-bold text-xs mb-4">Rs. 120</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="flex flex-col bg-white rounded-xl overflow-hidden shadow-sm border border-stone-200/60 transition-transform hover:-translate-y-1 group">
                    <div class="h-44 w-full overflow-hidden">
                        <img src="static-images/Rectangle 5.png" alt="Fried Rice" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-stone-800 font-bold text-sm mb-0.5">Mixed Fried Rice</h3>
                        <p class="text-stone-900 font-bold text-xs mb-4">Rs. 180</p>
                        <button class="w-full mt-auto bg-[#ab5353] hover:bg-brand text-white text-sm font-medium py-2 rounded-sm transition-colors">
                            Add to Tray
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <!-- 4. GALLERY SECTION (NEW) -->
        <section>
            <h2 class="font-heading text-2xl md:text-3xl font-bold uppercase text-stone-900 mb-6">Gallery</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                
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

    <!-- FOOTER SECTION (NEW) -->
    <footer class="bg-brand text-[#f6f5f0] pt-16 pb-8 border-t border-brand">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-16">
                
                <!-- Brand Info -->
                <div class="flex flex-col items-start">
                    <h2 class="font-heading text-3xl font-bold uppercase tracking-wide text-white mb-4">
                        Campus<span class="text-white/60">Food</span>
                    </h2>
                    <p class="text-white/80 text-sm font-medium leading-relaxed mb-6 max-w-sm">
                        Good food fuels great minds. Serving the best, fresh, and affordable meals for our campus family every single day.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-heading text-xl font-bold uppercase text-white mb-4 tracking-wide">Quick Links</h3>
                    <ul class="space-y-3 text-sm font-medium text-white/80">
                        <li><a href="#" class="hover:text-white transition-colors">Today's Menu</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Student Combos</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Browse Categories</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Photo Gallery</a></li>
                    </ul>
                </div>

                <!-- Contact & Hours -->
                <div>
                    <h3 class="font-heading text-xl font-bold uppercase text-white mb-4 tracking-wide">Visit Us</h3>
                    <ul class="space-y-3 text-sm font-medium text-white/80">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 mt-0.5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Main Campus Cafeteria, Ground Floor
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 mt-0.5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Mon - Sat: 8:00 AM - 7:00 PM
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 mt-0.5 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            canteen@campus.edu
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-white/20 mt-12 pt-6 flex flex-col md:flex-row items-center justify-between text-xs font-medium text-white/60">
                <p>&copy; 2026 Campus Food. All rights reserved.</p>
                <div class="flex gap-4 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>