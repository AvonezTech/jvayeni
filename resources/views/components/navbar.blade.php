<nav class="w-full border-b border-stone-200/60 bg-canvas">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        
        <!-- Logo -->
        <div class="flex-1 flex justify-start">
            <a href="{{ route('home') }}" class="font-heading text-2xl font-bold text-brand uppercase tracking-wide">
                Campus Food
            </a>
        </div>

        <!-- Links -->
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="text-stone-700 hover:text-brand font-medium transition-colors">Home</a>
            <a href="{{ route('menu') }}" class="text-stone-700 hover:text-brand font-medium transition-colors">Menu</a>
        </div>
        
        <!-- Auth Button -->
        <div class="flex-1 flex justify-end">
            @auth
                <!-- Show Logout if logged in -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-brand hover:bg-[#732d2d] text-white font-medium text-sm px-6 py-2 rounded-sm transition-colors duration-200 shadow-sm">
                        Logout
                    </button>
                </form>
            @else
                <!-- Show Login if logged out -->
                <a href="{{ route('login') }}" class="bg-brand hover:bg-[#732d2d] text-white font-medium text-sm px-6 py-2 rounded-sm transition-colors duration-200 shadow-sm">
                    Login
                </a>
            @endauth
        </div>
        
    </div>
</nav>