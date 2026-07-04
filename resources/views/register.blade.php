<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f7f4ec] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-[550px] border border-[#72302b] rounded-xl px-6 py-10 sm:px-12 sm:py-12 bg-[#f7f4ec]">

        <div class="text-center mb-8">
            <h1 class="text-[2.75rem] font-bold text-[#72302b] tracking-wider mb-2" style="font-family: Impact, sans-serif;">
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
                    class="w-full px-4 py-3 border border-[#72302b] rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-[#72302b] placeholder-gray-400 text-gray-700 text-sm transition"
                >
            </div>

            <div>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email address"
                    required
                    class="w-full px-4 py-3 border border-[#72302b] rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-[#72302b] placeholder-gray-400 text-gray-700 text-sm transition"
                >
            </div>

            <div>
                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    class="w-full px-4 py-3 border border-[#72302b] rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-[#72302b] placeholder-gray-400 text-gray-700 text-sm transition"
                >
            </div>

            <div>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm password"  
                    required
                    class="w-full px-4 py-3 border border-[#72302b] rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-[#72302b] placeholder-gray-400 text-gray-700 text-sm transition"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-[#72302b] text-white py-3 rounded-md hover:bg-[#5a2522] transition duration-200 text-sm font-medium mt-2"
            >
                Create Account
            </button>
        </form>

        <div class="mt-8 text-center">
            <span class="text-gray-500 text-sm">
                Already have an account?
            </span>

            <a href="{{ route('login') }}" class="font-bold text-[#72302b] text-sm underline decoration-1 underline-offset-[3px] hover:text-[#5a2522]">
                Login
            </a>
        </div>

    </div>

</body>
</html>