<nav class="w-full border-b border-stone-200/60 bg-canvas relative z-50">
    @php
        $cartCount = collect(session('cart', []))->sum('quantity');
    @endphp

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between gap-4">

        <div class="flex items-center">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('static-images/logo.svg') }}" alt="Campus Food Logo" class="h-40 w-auto object-contain">
            </a>
        </div>

        <div class="hidden md:flex items-center gap-8">
            @auth
                <a href="{{ route('menu') }}" class="text-sm font-medium text-stone-700 hover:text-brand transition">
                    Menu
                </a>

                <a href="{{ route('cart.index') }}" class="relative text-sm font-medium text-stone-700 hover:text-brand transition">
                    Cart
                    @if ($cartCount > 0)
                        <span class="absolute -top-3 -right-5 min-w-5 h-5 px-1 rounded-full bg-brand text-white text-[11px] flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('orders.my') }}" class="text-sm font-medium text-stone-700 hover:text-brand transition">
                    My Orders
                </a>

                @endauth
        </div>

        <div class="flex items-center justify-end gap-3">
            @auth
                <a href="{{ route('cart.index') }}" class="md:hidden relative text-xl text-stone-700 hover:text-brand transition mr-2">
                    🛒
                    @if ($cartCount > 0)
                        <span class="absolute -top-2 -right-3 min-w-5 h-5 px-1 rounded-full bg-brand text-white text-[11px] flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                <form action="{{ route('logout') }}" method="POST" class="hidden md:block">
                    @csrf
                    <button type="submit" class="bg-brand hover:bg-[#732d2d] text-white font-medium text-sm px-5 sm:px-6 py-2 rounded-lg transition-colors duration-200 shadow-sm">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hidden md:block bg-brand hover:bg-[#732d2d] text-white font-medium text-sm px-6 py-2 rounded-lg transition-colors duration-200 shadow-sm">
                    Login
                </a>
            @endauth

            <button id="mobile-menu-button" class="md:hidden p-2 text-stone-600 hover:text-brand focus:outline-none transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="hamburger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

    </div>

    <div id="mobile-menu" class="hidden md:hidden border-t border-stone-200/60 bg-canvas absolute w-full left-0 shadow-lg origin-top">
        <div class="px-4 pt-2 pb-6 space-y-1 flex flex-col">
            @auth
                <a href="{{ route('menu') }}" class="block px-3 py-3 text-base font-medium text-stone-700 hover:text-brand hover:bg-stone-100 rounded-md transition-colors">
                    Menu
                </a>
                
                <a href="{{ route('orders.my') }}" class="block px-3 py-3 text-base font-medium text-stone-700 hover:text-brand hover:bg-stone-100 rounded-md transition-colors">
                    My Orders
                </a>

                <div class="border-t border-stone-200/60 mt-2 pt-3">
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-3 text-base font-medium text-red-600 hover:bg-red-50 rounded-md transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="pt-3">
                    <a href="{{ route('login') }}" class="block w-full text-center bg-brand hover:bg-[#732d2d] text-white font-medium text-base px-6 py-3 rounded-lg transition-colors duration-200 shadow-sm">
                        Login
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function () {
                // Toggle menu visibility
                mobileMenu.classList.toggle('hidden');
                
                // Toggle between Hamburger and X icon
                hamburgerIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }
    });
</script>