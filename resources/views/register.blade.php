<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#72302b',
                        canvas: '#f7f4ec',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-canvas min-h-screen flex flex-col">
    
    <x-navbar />

    <main class="flex-grow flex items-center justify-center p-4 py-12">
        <div class="w-full max-w-[550px] border border-brand rounded-xl px-6 py-10 sm:px-12 sm:py-12 bg-canvas">
            
            <div class="text-center mb-8">
                <h1 class="text-[2.75rem] font-bold text-brand tracking-wider mb-2" style="font-family: Impact, sans-serif;">
                    REGISTER
                </h1>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed px-4">
                    Create your account to start ordering.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-md bg-red-100 border border-red-300 text-red-700 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <input 
                        type="text" 
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Full name" 
                        required
                        class="w-full px-4 py-3 border border-brand rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-brand placeholder-gray-400 text-gray-700 text-sm transition"
                    >
                </div>

                <div>
                    <input 
                        type="email" 
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Email address" 
                        required
                        class="w-full px-4 py-3 border border-brand rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-brand placeholder-gray-400 text-gray-700 text-sm transition"
                    >
                </div>
                
                <div>
                    <input 
                        type="password" 
                        name="password"
                        placeholder="Password" 
                        required
                        class="w-full px-4 py-3 border border-brand rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-brand placeholder-gray-400 text-gray-700 text-sm transition"
                    >
                </div>

                <div>
                    <input 
                        type="password" 
                        name="password_confirmation"
                        placeholder="Confirm password" 
                        required
                        class="w-full px-4 py-3 border border-brand rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-brand placeholder-gray-400 text-gray-700 text-sm transition"
                    >
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-brand text-white py-3 rounded-md hover:bg-[#5a2522] transition duration-200 text-sm font-medium mt-4"
                >
                    Create Account
                </button>
            </form>

            <div class="flex items-center my-6">
                <div class="flex-grow border-t border-gray-400"></div>
                <span class="mx-4 text-gray-800 text-sm font-medium">OR</span>
                <div class="flex-grow border-t border-gray-400"></div>
            </div>

            <button 
                type="button" 
                class="w-full border border-brand text-gray-400 bg-transparent py-3 rounded-md hover:bg-white hover:text-gray-600 transition duration-200 flex justify-center items-center text-sm font-medium"
            >
                Continue with Google
            </button>

            <div class="mt-10 flex items-center justify-start gap-4">
                <div class="w-16 h-16 flex-shrink-0 text-brand">
                    <img 
                        src="{{ asset('static-images/botuko.png') }}" 
                        alt="Bowl illustration" 
                        class="w-full h-full object-contain" 
                    />
                </div>
                
                <div class="flex flex-col">
                    <span class="font-bold text-gray-900 text-[15px] mb-0.5">Already Here ?</span>
                    <span class="text-gray-500 text-sm mb-0.5">Sign in to access your account</span>
                    <a href="{{ route('login') }}" class="font-bold text-brand text-[15px] underline decoration-1 underline-offset-[3px] hover:text-[#5a2522]">Login to Account</a>
                </div>
            </div>
            
        </div>
    </main>

    <x-footer />

</body>
</html>