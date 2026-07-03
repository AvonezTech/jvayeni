<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Campus Food</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { brand: '#8c3838', canvas: '#f6f5f0' }, fontFamily: { heading: ['Oswald'], sans: ['Inter'] } } } }
    </script>
</head>
<body class="bg-canvas min-h-screen flex flex-col">
    
    <x-navbar />

    <main class="flex-grow flex items-center justify-center px-4 py-12">
        <div class="max-w-[32rem] w-full p-8 md:p-12 rounded-[2rem] border border-brand/60 shadow-sm bg-white">
            
            <div class="text-center mb-10">
                <h2 class="font-heading text-5xl font-bold text-brand uppercase tracking-wider mb-3">Login</h2>
                <p class="text-stone-600 text-lg">Please enter your details to sign in.</p>
            </div>

            <!-- Changed action to a dedicated post route -->
            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf 

                <div class="mb-4">
                    <input name="email" type="email" placeholder="Email" required 
                           class="w-full px-4 py-3.5 border border-brand/60 rounded-md text-center focus:ring-1 focus:ring-brand outline-none">
                </div>

                <div class="mb-2">
                    <input name="password" type="password" placeholder="Password" required 
                           class="w-full px-4 py-3.5 border border-brand/60 rounded-md text-center focus:ring-1 focus:ring-brand outline-none">
                </div>

                <div class="text-right mb-8">
                    <a href="#" class="text-brand text-sm font-medium underline">Forget Password?</a>
                </div>

                <button type="submit" class="w-full py-3.5 rounded-md text-white bg-brand hover:bg-[#732d2d] transition-colors">
                    Login to Account
                </button>
            </form>
            
            <!-- Register Link -->
            <div class="mt-10 flex items-center gap-5 pl-2">
                <div class="flex flex-col items-start">
                    <p class="font-bold text-stone-900 text-lg">New Here ?</p>
                    <a href="{{ route('register') }}" class="font-bold text-brand underline">Create Account</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>