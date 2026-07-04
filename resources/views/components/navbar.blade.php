<nav class="w-full border-b border-stone-200/60 bg-canvas">
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

                @if (auth()->user()->role === 'admin')
                    <a href="/admin" class="text-sm font-medium text-stone-700 hover:text-brand transition">
                        Admin
                    </a>
                @endif
            @endauth
        </div>

        <div class="flex items-center justify-end gap-3">
            @auth
                <a href="{{ route('cart.index') }}" class="md:hidden relative text-xl text-stone-700 hover:text-brand transition">
                    🛒

                    @if ($cartCount > 0)
                        <span class="absolute -top-2 -right-3 min-w-5 h-5 px-1 rounded-full bg-brand text-white text-[11px] flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('orders.my') }}" class="md:hidden text-xl text-stone-700 hover:text-brand transition">
                    📦
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        class="bg-brand hover:bg-[#732d2d] text-white font-medium text-sm px-5 sm:px-6 py-2 rounded-lg transition-colors duration-200 shadow-sm"
                    >
                        Logout
                    </button>
                </form>
            @else
                <a
                    href="{{ route('login') }}"
                    class="bg-brand hover:bg-[#732d2d] text-white font-medium text-sm px-6 py-2 rounded-lg transition-colors duration-200 shadow-sm"
                >
                    Login
                </a>
            @endauth
        </div>

    </div>
</nav>