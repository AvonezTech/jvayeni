<x-layout>

    @php
        $getMenuPhoto = function ($photo) {
            if (!$photo) {
                return asset('static-images/Rectangle 5.png');
            }

            if (str_starts_with($photo, 'http://') || str_starts_with($photo, 'https://')) {
                return $photo;
            }

            if (str_starts_with($photo, 'menu_items/')) {
                return asset('storage/' . $photo);
            }

            if (str_starts_with($photo, 'storage/')) {
                return asset($photo);
            }

            return asset($photo);
        };

        $statusClass = function ($status) {
            return match (strtolower($status)) {
                'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                'confirmed' => 'bg-blue-100 text-blue-800 border-blue-200',
                'processing' => 'bg-purple-100 text-purple-800 border-purple-200',
                'completed' => 'bg-green-100 text-green-800 border-green-200',
                'cancelled' => 'bg-red-100 text-red-800 border-red-200',
                default => 'bg-stone-100 text-stone-800 border-stone-200',
            };
        };
    @endphp

    <div class="w-full max-w-7xl mx-auto text-stone-900 font-sans antialiased">
        
        <main class="px-4 sm:px-6 lg:px-8 py-8 md:py-12 lg:py-16">

            <div class="mb-8 md:mb-10 flex flex-col md:flex-row md:items-end justify-between gap-4">
                <div>
                    <h1 class="font-heading text-4xl sm:text-5xl md:text-6xl font-black tracking-tight uppercase text-stone-900 leading-none">
                        My <span class="text-brand">Orders.</span>
                    </h1>
                    <p class="text-stone-500 mt-2 md:mt-3 text-sm md:text-base font-medium">
                        View your order history and track current statuses.
                    </p>
                </div>

                @if ($orders->count() > 0)
                    <span class="inline-block bg-stone-100 text-stone-600 font-bold px-4 py-1.5 rounded-full text-sm w-fit border border-stone-200">
                        {{ $orders->count() }} Order(s)
                    </span>
                @endif
            </div>

            @if (session('success'))
                <div class="mb-8 rounded-xl border border-green-200 bg-green-50/80 px-5 py-4 text-green-700 text-sm font-medium flex items-center gap-3">
                    <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        {{ session('success') }}
                        @if (session('order_id'))
                            <span class="font-bold ml-1 inline-block px-2 py-0.5 bg-green-200/50 rounded text-green-900">
                                Order ID: #{{ session('order_id') }}
                            </span>
                        @endif
                    </div>
                </div>
            @endif

            @if ($orders->count() > 0)
                <div class="space-y-6 md:space-y-8">

                    @foreach ($orders as $order)
                        <div class="bg-white rounded-2xl border border-stone-200 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.03)] overflow-hidden transition-colors hover:border-stone-300">

                            <div class="p-5 md:p-6 bg-stone-50/50 border-b border-stone-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                
                                <div>
                                    <div class="flex flex-wrap items-center gap-3">
                                        <h2 class="font-heading text-xl md:text-2xl font-black uppercase text-stone-900">
                                            Order #{{ $order->id }}
                                        </h2>
                                        <span class="inline-flex items-center rounded-full border px-3 py-1 text-[10px] md:text-xs font-bold uppercase tracking-wider {{ $statusClass($order->status) }}">
                                            {{ $order->status }}
                                        </span>
                                    </div>
                                    <p class="text-xs md:text-sm text-stone-500 font-medium mt-1.5 flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $order->created_at->format('M d, Y h:i A') }}
                                    </p>
                                </div>

                                <div class="text-left sm:text-right border-t sm:border-0 border-stone-200 pt-4 sm:pt-0 mt-1 sm:mt-0">
                                    <p class="text-[10px] md:text-xs text-stone-500 font-bold uppercase tracking-wider mb-0.5">
                                        Total Amount
                                    </p>
                                    <p class="text-xl md:text-2xl font-black text-brand leading-none">
                                        Rs. {{ number_format($order->total_price) }}
                                    </p>
                                </div>

                            </div>

                            <div class="p-5 md:p-6 divide-y divide-stone-100">
                                @forelse ($order->menuItems as $menuItem)
                                    @php
                                        $quantity = $menuItem->pivot->quantity ?? 1;
                                        $lineTotal = $menuItem->price * $quantity;
                                    @endphp

                                    <div class="flex flex-col sm:flex-row gap-4 py-4 first:pt-0 last:pb-0 group">
                                        
                                        <div class="w-full sm:w-24 h-40 sm:h-24 rounded-xl overflow-hidden bg-stone-100 shrink-0 relative">
                                            <img
                                                src="{{ $getMenuPhoto($menuItem->photo ?? null) }}"
                                                alt="{{ $menuItem->name }}"
                                                class="w-full h-full object-cover transition duration-300 group-hover:scale-105"
                                            >
                                        </div>

                                        <div class="flex-1 flex flex-col justify-center">
                                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2">
                                                
                                                <div>
                                                    @if (!empty($menuItem->menu_category))
                                                        <p class="text-[10px] uppercase tracking-wider text-brand font-bold mb-1">
                                                            {{ str_replace('_', ' ', $menuItem->menu_category) }}
                                                        </p>
                                                    @endif
                                                    
                                                    <h3 class="font-bold text-base md:text-lg text-stone-900 leading-tight">
                                                        {{ $menuItem->name }}
                                                    </h3>
                                                    
                                                    <p class="text-sm font-medium text-stone-500 mt-1">
                                                        <span class="text-stone-700 font-bold">{{ $quantity }}</span> × Rs. {{ number_format($menuItem->price) }}
                                                    </p>
                                                </div>

                                                <p class="font-black text-stone-900 text-lg md:text-base mt-2 sm:mt-0 bg-stone-50 px-3 py-1 rounded-lg w-fit sm:bg-transparent sm:p-0">
                                                    Rs. {{ number_format($lineTotal) }}
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                @empty
                                    <div class="py-4 text-center">
                                        <p class="text-sm text-stone-500 font-medium">
                                            No items found for this order.
                                        </p>
                                    </div>
                                @endforelse
                            </div>

                            <div class="px-5 md:px-6 py-4 bg-stone-50 border-t border-stone-100 flex items-center gap-3">
                                @if (strtolower($order->status) === 'pending')
                                    <svg class="w-5 h-5 text-yellow-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="text-sm text-stone-700 font-medium">
                                        Your order has been received and is waiting for kitchen confirmation.
                                    </p>
                                @elseif (strtolower($order->status) === 'confirmed')
                                    <svg class="w-5 h-5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="text-sm text-blue-800 font-medium">
                                        Your order has been confirmed by the kitchen.
                                    </p>
                                @elseif (strtolower($order->status) === 'processing')
                                    <svg class="w-5 h-5 text-purple-600 shrink-0 animate-spin-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    <p class="text-sm text-purple-800 font-medium">
                                        Chefs are on it! Your food is currently being prepared.
                                    </p>
                                @elseif (strtolower($order->status) === 'completed')
                                    <svg class="w-5 h-5 text-green-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    <p class="text-sm text-green-800 font-medium">
                                        Your order has been completed. Enjoy your meal!
                                    </p>
                                @elseif (strtolower($order->status) === 'cancelled')
                                    <svg class="w-5 h-5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    <p class="text-sm text-red-700 font-medium">
                                        This order was cancelled.
                                    </p>
                                @else
                                    <svg class="w-5 h-5 text-stone-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="text-sm text-stone-700 font-medium">
                                        Current status: {{ ucfirst($order->status) }}
                                    </p>
                                @endif
                            </div>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="bg-white rounded-3xl border border-stone-200 p-10 md:p-16 text-center max-w-2xl mx-auto shadow-sm">
                    <div class="w-24 h-24 bg-stone-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="text-4xl">🧾</span>
                    </div>

                    <h2 class="font-heading text-2xl md:text-3xl font-black uppercase text-stone-900 mb-3 tracking-tight">
                        No Orders Yet
                    </h2>

                    <p class="text-stone-500 text-sm md:text-base font-medium mb-8 max-w-md mx-auto">
                        Your order history is empty. Time to change that! Browse our menu and find something delicious.
                    </p>

                    <a
                        href="{{ route('menu') }}"
                        class="inline-flex items-center justify-center bg-brand text-white px-8 py-3.5 rounded-xl text-base font-bold hover:bg-[#6f2c2c] transition-all shadow-md hover:shadow-lg active:scale-[0.98] gap-2"
                    >
                        Browse Menu
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            @endif

        </main>
    </div>
</x-layout>