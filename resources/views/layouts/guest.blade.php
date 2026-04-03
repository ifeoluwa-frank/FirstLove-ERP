<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>First Love Arusha | Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Tailwind + JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Poppins] text-white bg-gray-900 relative overflow-hidden min-h-screen">

    <!-- Artistic Background (same style as landing page) -->
    <div class="absolute inset-0 opacity-25" >
        <img src="{{ asset('images/church1.jpg') }}" class="absolute top-0 left-0 w-1/3 h-1/2 object-cover">
        <img src="{{ asset('images/church2.jpg') }}" class="absolute bottom-0 right-0 w-1/3 h-1/2 object-cover">
        <img src="{{ asset('images/church3.jpg') }}" class="absolute top-1/3 right-1/4 w-1/4 h-1/3 object-cover">
    </div>

    <!-- Main Page Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4">
        {{ $slot }}
    </div>

</body>
</html>
