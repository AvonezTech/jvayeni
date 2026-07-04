<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom color definitions to match the exact image palette */
        :root {
            --brand-color: #72302b;
            --bg-color: #f7f4ec;
        }
    </style>
</head>
<body class="bg-[#f7f4ec] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-[550px] border border-[#72302b] rounded-xl px-6 py-10 sm:px-12 sm:py-12 bg-[#f7f4ec]">
        
        <div class="text-center mb-8">
            <h1 class="text-[2.75rem] font-bold text-[#72302b] tracking-wider mb-2" style="font-family: Impact, sans-serif;">LOGIN</h1>
            <p class="text-gray-600 text-sm sm:text-base leading-relaxed px-4">
                Please enter your details to sign in to your account.
            </p>
        </div>

        <form class="space-y-4">
            <div>
                <input 
                    type="text" 
                    placeholder="Email or phone number" 
                    class="w-full px-4 py-3 border border-[#72302b] rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-[#72302b] placeholder-gray-400 text-gray-700 text-sm transition"
                >
            </div>
            
            <div>
                <input 
                    type="password" 
                    placeholder="Password" 
                    class="w-full px-4 py-3 border border-[#72302b] rounded-md bg-transparent focus:outline-none focus:ring-1 focus:ring-[#72302b] placeholder-gray-400 text-gray-700 text-sm transition"
                >
            </div>

            <div class="text-right">
                <a href="#" class="text-[13px] text-[#72302b] hover:underline font-medium">Forget Password ?</a>
            </div>

            <button 
                type="submit" 
                class="w-full bg-[#72302b] text-white py-3 rounded-md hover:bg-[#5a2522] transition duration-200 text-sm font-medium mt-2"
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
            class="w-full border border-[#72302b] text-gray-400 bg-transparent py-3 rounded-md hover:bg-white hover:text-gray-600 transition duration-200 flex justify-center items-center text-sm font-medium"
        >
            Continue with Google
        </button>

        <div class="mt-10 flex items-center justify-start gap-4">
            <div class="w-16 h-16 flex-shrink-0 text-[#72302b]">
    <img 
        src="/static-images/botuko.png" 
        alt="Bowl illustration" 
        class="w-full h-full object-contain" 
    />
</div>
            
            <div class="flex flex-col">
                <span class="font-bold text-gray-900 text-[15px] mb-0.5">New Here ?</span>
                <span class="text-gray-500 text-sm mb-0.5">Create an account to get started</span>
                <a href="#" class="font-bold text-[#72302b] text-[15px] underline decoration-1 underline-offset-[3px] hover:text-[#5a2522]">Create Account</a>
            </div>
        </div>
        
    </div>
</body>
</html>