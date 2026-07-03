<main class="flex-grow flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8 bg-canvas">
        
        <div class="max-w-[32rem] w-full p-8 md:p-12 rounded-[2rem] border border-brand/60 shadow-sm">
            
            <div class="text-center mb-10">
                <h2 class="font-heading text-5xl md:text-6xl font-bold text-brand uppercase tracking-wider mb-3">
                    Login
                </h2>
                <p class="text-stone-600 text-lg md:text-xl">
                    Please enter your details to sign in to your account.
                </p>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf 

                <div class="mb-4">
                    <input id="email" name="email" type="email" placeholder="Email or phone number" required 
                           class="w-full px-4 py-3.5 bg-transparent border border-brand/60 rounded-md focus:outline-none focus:ring-1 focus:ring-brand focus:border-brand text-center placeholder:text-stone-400 text-stone-800 transition-colors">
                </div>

                <div class="mb-2">
                    <input id="password" name="password" type="password" placeholder="Password" required 
                           class="w-full px-4 py-3.5 bg-transparent border border-brand/60 rounded-md focus:outline-none focus:ring-1 focus:ring-brand focus:border-brand text-center placeholder:text-stone-400 text-stone-800 transition-colors">
                </div>

                <div class="text-right mb-8">
                    <a href="#" class="text-brand hover:text-[#732d2d] text-sm md:text-base font-medium transition-colors">
                        Forget Password ?
                    </a>
                </div>

                <div class="mb-8">
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 rounded-md shadow-sm text-base font-medium text-white bg-brand hover:bg-[#732d2d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand transition-colors">
                        Login to Account
                    </button>
                </div>

                <div class="flex items-center gap-4 mb-8">
                    <div class="h-px bg-stone-400 flex-1"></div>
                    <span class="text-stone-800 font-medium">OR</span>
                    <div class="h-px bg-stone-400 flex-1"></div>
                </div>

                <div class="mb-10">
                    <button type="button" class="w-full flex justify-center py-3.5 px-4 rounded-md border border-brand/60 bg-transparent text-stone-500 hover:text-stone-800 hover:bg-black/5 focus:outline-none transition-colors">
                        Continue with Google
                    </button>
                </div>

                <div class="flex items-center justify-start gap-5 pl-2">
                    <div class="w-16 h-16 flex-shrink-0">
                        <svg class="w-full h-full text-stone-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12c0 1.2-4 3-9 3s-9-1.8-9-3m18 0c0-1.2-4-3-9-3s-9 1.8-9 3m18 0v4c0 2.5-4 5-9 5s-9-2.5-9-5v-4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9V5m-3 4V6m6 3V7" />
                        </svg>
                        </div>
                    
                    <div class="flex flex-col items-start text-stone-700">
                        <p class="font-bold text-stone-900 text-lg leading-tight mb-0.5">New Here ?</p>
                        <p class="text-sm md:text-base leading-snug mb-1">Create an account to get started</p>
                        <a href="{{ route('register') }}" class="font-bold text-brand hover:text-[#732d2d] underline decoration-brand underline-offset-4 transition-colors">
                            Create Account
                        </a>
                    </div>
                </div>

            </form>
            
        </div>
    </main>