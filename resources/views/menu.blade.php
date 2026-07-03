    <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Today's Menu</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($items as $item)
            <div class="border p-4 rounded-lg shadow-sm {{ $item->is_special ? 'bg-yellow-50 border-yellow-200' : '' }}">
                <h2 class="text-xl font-semibold">{{ $item->name }}</h2>
                <p class="text-gray-600">Price: Rs. {{ $item->price }}</p>
                
                @if($item->is_special)
                    <span class="text-xs bg-yellow-400 text-white px-2 py-1 rounded">Special!</span>
                @endif
                
                <form action="{{ route('order.store') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Order Now
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>