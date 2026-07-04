<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Campus Food' }}</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('static-images/logo.svg') }}">

    <script src="https://cdn.tailwindcss.com"></script>

   <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#8c3838',
                        canvas: '#F8F6F1',
                    },
                    fontFamily: {
                        heading: ['Oswald', 'sans-serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-canvas min-h-screen flex flex-col">
    
    <x-navbar />

    <main class="flex-grow flex flex-col">
        {{ $slot }}
    </main>

    <x-footer />

</body>
</html>