<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Food - Checkout</title>
    
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
<body class="bg-canvas text-stone-900 font-sans antialiased min-h-screen flex flex-col">

    <!-- HEADER NAVIGATION (Minimal for Checkout) -->
    <nav class="max-w-5xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-6 border-b border-brand/10 mb-8 md:mb-12">
        <a href="#" class="font-heading text-2xl font-bold text-stone-900 uppercase tracking-wide flex items-center gap-2 hover:text-brand transition-colors w-fit">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Menu
        </a>
    </nav>

    <!-- PAGE HEADER -->
    <header class="max-w-5xl mx-auto w-full px-4 sm:px-6 lg:px-8">
        <h1 class="font-heading text-7xl md:text-[7.5rem] font-bold uppercase leading-[0.85] tracking-tight text-brand mb-4">
            Checkout.
        </h1>
        <p class="text-stone-600 text-lg md:text-xl font-medium max-w-lg leading-relaxed">
            Almost there ! Review your order, provide your details and enjoy your meal.
        </p>
    </header>

    <!-- MAIN CONTENT AREA -->
    <main class="max-w-5xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-12 flex-grow">
        
        <!-- CART ITEMS CONTAINER (With Thin Maroon Border) -->
        <div class="border border-brand/50 rounded-[1.5rem] p-6 md:p-8 lg:p-10 mb-8 bg-canvas">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12">
                
                <!-- CART ITEM 1 -->
                <div class="flex flex-col sm:flex-row gap-5 md:gap-6 relative group">
                    <!-- Remove Button (Absolute to top right of item block) -->
                    <button class="absolute top-0 right-0 sm:-top-2 sm:-right-2 text-stone-500 hover:text-brand font-bold text-lg p-2 transition-colors z-10" aria-label="Remove item">
                        X
                    </button>

                    <!-- Image -->
                    <div class="w-full sm:w-36 h-48 sm:h-36 shrink-0 rounded-xl overflow-hidden shadow-sm">
                        <img src="static-images/Rectangle 5.png" alt="Chicken Momo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>

                    <!-- Item Details -->
                    <div class="flex flex-col justify-center py-1">
                        <h3 class="font-bold text-lg md:text-xl text-stone-900 leading-tight pr-6">Chicken Momo (10 Pcs)</h3>
                        <p class="font-bold text-stone-900 mt-1 mb-4">Rs. 250</p>
                        
                        <!-- Quantity Selector -->
                        <div class="flex items-center border border-brand/40 rounded-md w-fit bg-white/50">
                            <button class="px-3.5 py-1 text-brand hover:bg-brand/10 transition-colors font-medium">-</button>
                            <span class="px-4 py-1 text-stone-900 font-semibold text-sm border-x border-brand/40">2</span>
                            <button class="px-3.5 py-1 text-brand hover:bg-brand/10 transition-colors font-medium">+</button>
                        </div>
                    </div>
                </div>

                <!-- CART ITEM 2 -->
                <div class="flex flex-col sm:flex-row gap-5 md:gap-6 relative group">
                    <!-- Remove Button -->
                    <button class="absolute top-0 right-0 sm:-top-2 sm:-right-2 text-stone-500 hover:text-brand font-bold text-lg p-2 transition-colors z-10" aria-label="Remove item">
                        X
                    </button>

                    <!-- Image -->
                    <div class="w-full sm:w-36 h-48 sm:h-36 shrink-0 rounded-xl overflow-hidden shadow-sm">
                        <img src="static-images/Rectangle 5.png" alt="Chicken Momo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    </div>

                    <!-- Item Details -->
                    <div class="flex flex-col justify-center py-1">
                        <h3 class="font-bold text-lg md:text-xl text-stone-900 leading-tight pr-6">Chicken Momo (10 Pcs)</h3>
                        <p class="font-bold text-stone-900 mt-1 mb-4">Rs. 250</p>
                        
                        <!-- Quantity Selector -->
                        <div class="flex items-center border border-brand/40 rounded-md w-fit bg-white/50">
                            <button class="px-3.5 py-1 text-brand hover:bg-brand/10 transition-colors font-medium">-</button>
                            <span class="px-4 py-1 text-stone-900 font-semibold text-sm border-x border-brand/40">2</span>
                            <button class="px-3.5 py-1 text-brand hover:bg-brand/10 transition-colors font-medium">+</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- TOTALS & ACTION BUTTON -->
        <div class="flex flex-col items-center mt-10">
            <!-- Totals Row -->
            <div class="flex items-center gap-12 sm:gap-20 mb-8">
                <span class="text-xl md:text-2xl font-bold text-stone-900">Total Amount</span>
                <span class="text-xl md:text-2xl font-bold text-brand">Rs. 500</span>
            </div>

            <!-- Order Now Button -->
            <button class="bg-[#ab5353] hover:bg-brand text-white text-lg font-medium py-3 px-16 rounded shadow-md hover:shadow-lg transition-all hover:-translate-y-0.5">
                Order Now
            </button>
        </div>

        <!-- THANK YOU BANNER (With Image Placeholder) -->
        <div class="mt-20 border border-brand/50 rounded-2xl p-6 md:p-8 lg:p-10 flex flex-col sm:flex-row items-center justify-center gap-8 lg:gap-12 text-center sm:text-left bg-white/30">
            
            <!-- IMAGE PLACEHOLDER: Put your bowl image tag inside this div! -->
            <div class="w-40 h-40 md:w-48 md:h-48 shrink-0 flex items-center justify-center relative">
                
                <!-- Remove this dashed border div when you add your actual image -->
                <div class="absolute inset-0 border-2 border-dashed border-brand/30 rounded-xl flex items-center justify-center text-brand/50 text-sm p-4 text-center">
                    [ Add Bowl Image Here ]
                </div>
                
                <!-- Example of how to add your image: -->
                <!-- <img src="static-images/bowl-illustration.png" alt="Bowl" class="w-full h-full object-contain relative z-10" /> -->
                
            </div>
            
            <!-- Thank You Text -->
            <div class="flex flex-col max-w-xl">
                <h2 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold uppercase text-brand tracking-tight mb-2 leading-none">
                    Thank for supporting our canteen !
                </h2>
                <p class="text-stone-600 text-lg md:text-xl font-medium mt-2">
                    Every order helps us serve you better.
                </p>
            </div>

        </div>

    </main>

</body>
</html>