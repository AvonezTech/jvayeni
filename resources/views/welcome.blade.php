<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Canteen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl font-bold">Canteen System</h1>
            <a href="/admin" class="text-blue-600">Admin Login</a>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6">Today's Menu</h2>
        
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($items as $item)
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 {{ $item->is_special ? 'border-amber-500' : 'border-blue-500' }}">
                    <h3 class="text-xl font-semibold">{{ $item->name }}</h3>
                    <p class="text-gray-600 mb-4">Rs. {{ number_format($item->price, 2) }}</p>
                    
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="item_name" value="{{ $item->name }}">
                        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                            Order Now
                        </button>
                    </form>
                </div>
                
            @endforeach
        </div>
    </div>
</body>
</html>