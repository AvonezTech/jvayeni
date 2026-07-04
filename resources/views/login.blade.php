<x-layout>

<body class="bg-canvas min-h-screen flex flex-col">
    


    <main class="flex-grow flex items-center justify-center p-4 py-12">
        <div class="w-full max-w-[550px] border border-brand rounded-xl px-6 py-10 sm:px-12 sm:py-12 bg-canvas">

            <div class="text-center mb-8">
                <h1 class="text-[2.75rem] font-bold text-brand tracking-wider mb-2" style="font-family: Impact, sans-serif;">
                    LOGIN
                </h1>

                <p class="text-gray-600 text-sm sm:text-base leading-relaxed px-4">
                    Please enter your details to sign in to your account.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 rounded-md bg-red-100 border border-red-300 text-red-700 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf

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

                <div class="text-right">
                    <a href="#" class="text-[13px] text-brand hover:underline font-medium">
                        Forget Password ?
                    </a>
                </div>

                <button
                    type="submit"
                    class="w-full bg-brand text-white py-3 rounded-md hover:bg-[#5a2522] transition duration-200 text-sm font-medium mt-2"
                >
                    Login to Account
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
                    >
                </div>

                <div class="flex flex-col">
                    <span class="font-bold text-gray-900 text-[15px] mb-0.5">
                        New Here ?
                    </span>

                    <span class="text-gray-500 text-sm mb-0.5">
                        Create an account to get started
                    </span>

                    <a href="{{ route('register') }}" class="font-bold text-brand text-[15px] underline decoration-1 underline-offset-[3px] hover:text-[#5a2522]">
                        Create Account
                    </a>
                </div>
            </div>

        </div>
    </main>

</body>
</x-layout>