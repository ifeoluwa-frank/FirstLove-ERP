<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
    <style>
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="overflow-x-hidden">

    @yield('content')

</body>
</html>
