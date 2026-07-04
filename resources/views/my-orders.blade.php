<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Food - My Orders</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#8c3838',
                        canvas: '#f6f5f0',
                    },
                    fontFamily: {
                        heading: ['Oswald', 'sans-serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-canvas text-stone-900 font-sans antialiased">

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
        return match ($status) {
            'pending' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
            'confirmed' => 'bg-blue-100 text-blue-700 border-blue-200',
            'processing' => 'bg-purple-100 text-purple-700 border-purple-200',
            'completed' => 'bg-green-100 text-green-700 border-green-200',
            'cancelled' => 'bg-red-100 text-red-700 border-red-200',
            default => 'bg-stone-100 text-stone-700 border-stone-200',
        };
    };
@endphp

<x-navbar />

<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">

    <div class="mb-10">
        <h1 class="font-heading text-5xl md:text-7xl font-bold uppercase text-stone-900 leading-none">
            My <span class="text-brand">Orders.</span>
        </h1>

        <p class="text-stone-600 mt-4 text-sm md:text-base">
            View your order history and current order status.
        </p>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700 text-sm font-medium">
            {{ session('success') }}

            @if (session('order_id'))
                <span class="font-bold">
                    Order ID: #{{ session('order_id') }}
                </span>
            @endif
        </div>
    @endif

    @if ($orders->count() > 0)
        <div class="space-y-6">

            @foreach ($orders as $order)
                <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">

                    <!-- Order Header -->
                    <div class="p-5 md:p-6 border-b border-stone-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        <div>
                            <div class="flex flex-wrap items-center gap-3">
                                <h2 class="font-heading text-2xl font-bold uppercase text-stone-900">
                                    Order #{{ $order->id }}
                                </h2>

                                <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-bold uppercase {{ $statusClass($order->status) }}">
                                    {{ $order->status }}
                                </span>
                            </div>

                            <p class="text-sm text-stone-500 mt-1">
                                Ordered on {{ $order->created_at->format('M d, Y h:i A') }}
                            </p>
                        </div>

                        <div class="text-left md:text-right">
                            <p class="text-xs text-stone-500 font-medium uppercase">
                                Total Amount
                            </p>

                            <p class="text-xl font-bold text-brand">
                                Rs. {{ number_format($order->total_price) }}
                            </p>
                        </div>

                    </div>

                    <!-- Order Items -->
                    <div class="p-5 md:p-6 space-y-4">

                        @forelse ($order->menuItems as $menuItem)
                            @php
                                $quantity = $menuItem->pivot->quantity ?? 1;
                                $lineTotal = $menuItem->price * $quantity;
                            @endphp

                            <div class="flex flex-col sm:flex-row gap-4">

                                <div class="w-full sm:w-24 h-24 rounded-xl overflow-hidden bg-stone-100 shrink-0">
                                    <img
                                        src="{{ $getMenuPhoto($menuItem->photo ?? null) }}"
                                        alt="{{ $menuItem->name }}"
                                        class="w-full h-full object-cover"
                                    >
                                </div>

                                <div class="flex-1 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">

                                    <div>
                                        <h3 class="font-bold text-stone-900">
                                            {{ $menuItem->name }}
                                        </h3>

                                        @if (!empty($menuItem->menu_category))
                                            <p class="text-[11px] uppercase tracking-wide text-brand font-bold mt-1">
                                                {{ str_replace('_', ' ', $menuItem->menu_category) }}
                                            </p>
                                        @endif

                                        <p class="text-sm text-stone-500 mt-1">
                                            Qty: {{ $quantity }} × Rs. {{ number_format($menuItem->price) }}
                                        </p>
                                    </div>

                                    <p class="font-bold text-stone-900">
                                        Rs. {{ number_format($lineTotal) }}
                                    </p>

                                </div>

                            </div>
                        @empty
                            <p class="text-sm text-stone-500">
                                No items found for this order.
                            </p>
                        @endforelse

                    </div>

                    <!-- Status Message -->
                    <div class="px-5 md:px-6 py-4 bg-canvas/60 border-t border-stone-100">
                        @if ($order->status === 'pending')
                            <p class="text-sm text-stone-600">
                                Your order has been received and is waiting for kitchen confirmation.
                            </p>
                        @elseif ($order->status === 'confirmed')
                            <p class="text-sm text-blue-700">
                                Your order has been confirmed.
                            </p>
                        @elseif ($order->status === 'processing')
                            <p class="text-sm text-purple-700">
                                Your food is being prepared.
                            </p>
                        @elseif ($order->status === 'completed')
                            <p class="text-sm text-green-700 font-medium">
                                Your order has been completed.
                            </p>
                        @elseif ($order->status === 'cancelled')
                            <p class="text-sm text-red-600">
                                Your order was cancelled.
                            </p>
                        @else
                            <p class="text-sm text-stone-600">
                                Current status: {{ $order->status }}
                            </p>
                        @endif
                    </div>

                </div>
            @endforeach

        </div>
    @else
        <div class="bg-white rounded-2xl border border-stone-200 p-10 text-center">
            <h2 class="font-heading text-3xl font-bold uppercase text-stone-900 mb-3">
                No Orders Yet
            </h2>

            <p class="text-stone-500 text-sm mb-6">
                You have not placed any order yet.
            </p>

            <a
                href="{{ route('menu') }}"
                class="inline-flex items-center justify-center bg-brand text-white px-6 py-3 rounded-md text-sm font-medium hover:bg-[#6f2c2c] transition"
            >
                Browse Menu
            </a>
        </div>
    @endif

</main>

<x-footer />

</body>
</html>