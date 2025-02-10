<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js for Mobile Sidebar Toggle -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: #64748B; /* Slate Gray */
            border-radius: 6px;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
<div x-data="{ open: false }" class="flex h-screen">
    <!-- Sidebar -->
    <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
           class="fixed md:relative w-64 bg-[#292C2F] text-white min-h-screen transform transition-transform duration-300 md:translate-x-0">
        <div class="p-5 flex items-center space-x-3 border-b border-gray-600">
            <img src="https://ui-avatars.com/api/?name=Andrew+Smith&background=random" class="rounded-full border-2 border-white" alt="Admin">
            <div>
                <p class="text-xs uppercase text-gray-300">Admin</p>
                <p class="font-semibold">{{ auth()->user()->name }}</p>
            </div>
        </div>
        <nav class="mt-6">
            <a href="{{ route('dashboard') }}" class="flex items-center px-5 py-3 hover:bg-blue-600">
                🏠 Dashboard
            </a>
            <a href="{{ route('attendance.index') }}" class="flex items-center px-5 py-3 hover:bg-blue-600">
                📋 Attendance
            </a>
            <a href="{{ route('bacenta.index') }}" class="flex items-center px-5 py-3 hover:bg-blue-600">
                👥 Bacentas
            </a>
            <a href="{{ route('notifications.index') }}" class="flex items-center px-5 py-3 hover:bg-blue-600">
                🔔 Notifications
            </a>
        </nav>
        <div class="p-5 space-y-3">
            <button class="w-full bg-[#2563EB] text-white py-2 rounded shadow-md hover:bg-blue-700">
                + Add Member
            </button>
            <button class="w-full bg-[#10B981] text-white py-2 rounded shadow-md hover:bg-green-700">
                + Add Bacenta
            </button>
        </div>
    </aside>

    <main class="flex-1 p-6">
        <header class="hidden md:flex justify-between items-center bg-white p-4 rounded-md shadow">
            <h2 class="text-lg font-semibold">@yield('header', 'Dashboard')</h2>
            <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                🚪 Logout
            </a>
        </header>


        <div class="mt-6">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>


{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>@yield('title', 'Dashboard')</title>--}}

{{--    <!-- Tailwind CSS -->--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}

{{--    <!-- Alpine.js for Mobile Sidebar Toggle -->--}}
{{--    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}
{{--</head>--}}
{{--<body class="bg-gray-100">--}}
{{--<div x-data="{ open: false }" class="flex h-screen">--}}
{{--    <!-- Sidebar -->--}}
{{--    <aside :class="open ? 'translate-x-0' : '-translate-x-full'"--}}
{{--           class="fixed md:relative w-64 bg-gray-900 text-white min-h-screen transform transition-transform duration-300 md:translate-x-0">--}}
{{--        <div class="p-4 flex items-center space-x-2">--}}
{{--            <img src="https://via.placeholder.com/40" class="rounded-full" alt="Admin Profile">--}}
{{--            <div>--}}
{{--                <p class="text-sm">ADMIN</p>--}}
{{--                <p class="font-bold">Andrew Smith</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <nav class="mt-5 flex-1">--}}
{{--            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">--}}
{{--                🏠 Dashboard--}}
{{--            </a>--}}
{{--            <a href="{{ route('attendance.index') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">--}}
{{--                📋 Attendance--}}
{{--            </a>--}}
{{--            <a href="{{ route('bacenta.index') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">--}}
{{--                👥 Bacentas--}}
{{--            </a>--}}
{{--            <a href="{{ route('notifications.index') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">--}}
{{--                🔔 Notifications--}}
{{--            </a>--}}
{{--        </nav>--}}
{{--        <div class="p-4 space-y-2">--}}
{{--            <button class="w-full bg-orange-500 text-white py-2 rounded">➕ Add Member</button>--}}
{{--            <button class="w-full bg-orange-500 text-white py-2 rounded">➕ Add Bacenta</button>--}}
{{--        </div>--}}
{{--    </aside>--}}

{{--    <!-- Main Content -->--}}
{{--    <main class="flex-1 p-6">--}}
{{--        <!-- Mobile Header with Sidebar Toggle -->--}}
{{--        <header class="flex justify-between items-center bg-gray-200 p-4 rounded md:hidden">--}}
{{--            <button @click="open = !open" class="text-gray-900">--}}
{{--                🍔 Menu--}}
{{--            </button>--}}
{{--            <h2 class="text-xl font-bold">@yield('header', 'Dashboard')</h2>--}}
{{--            <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded">🚪 Logout</a>--}}
{{--        </header>--}}

{{--        <div class="mt-6">--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--    </main>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}



{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>@yield('title', 'Dashboard')</title>--}}

{{--    <!-- Tailwind CSS -->--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
{{--    <!-- Heroicons for icons -->--}}
{{--    <script src="https://unpkg.com/@heroicons/react@v1.0.0/dist/outline.js"></script>--}}
{{--</head>--}}
{{--<body class="bg-gray-100">--}}
{{--<div class="flex">--}}
{{--    <!-- Sidebar -->--}}
{{--    <aside class="w-64 bg-gray-900 text-white min-h-screen flex flex-col">--}}
{{--        <div class="p-4 flex items-center space-x-2">--}}
{{--            <img src="https://via.placeholder.com/40" class="rounded-full" alt="Admin Profile">--}}
{{--            <div>--}}
{{--                <p class="text-sm">ADMIN</p>--}}
{{--                <p class="font-bold">Andrew Smith</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <nav class="mt-5 flex-1">--}}
{{--            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">--}}
{{--                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h6m10-11v10a1 1 0 01-1 1h-6m-4 0h4"></path>--}}
{{--                </svg>--}}
{{--                Dashboard--}}
{{--            </a>--}}
{{--            <a href="{{ route('attendance.index') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">--}}
{{--                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-8-4h8m-6 8v6"></path>--}}
{{--                </svg>--}}
{{--                Attendance--}}
{{--            </a>--}}
{{--            <a href="{{ route('bacenta.index') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">--}}
{{--                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V10M17 21V6a3 3 0 00-3-3H4"></path>--}}
{{--                </svg>--}}
{{--                Bacentas--}}
{{--            </a>--}}
{{--            <a href="{{ route('notifications.index') }}" class="flex items-center px-4 py-2 hover:bg-gray-700">--}}
{{--                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.5 3m-8.5-3H5l1.5 3m2-3a6 6 0 0112 0"></path>--}}
{{--                </svg>--}}
{{--                Notifications--}}
{{--            </a>--}}
{{--        </nav>--}}
{{--        <div class="mt-4 p-4 space-y-2">--}}
{{--            <button class="w-full bg-orange-500 text-white py-2 rounded flex items-center justify-center">--}}
{{--                <span class="mr-2">+</span> Add Member--}}
{{--            </button>--}}
{{--            <button class="w-full bg-orange-500 text-white py-2 rounded flex items-center justify-center">--}}
{{--                <span class="mr-2">+</span> Add Bacenta--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </aside>--}}

{{--    <!-- Main Content -->--}}
{{--    <main class="flex-1 p-6">--}}
{{--        <header class="flex justify-between items-center bg-gray-200 p-4 rounded">--}}
{{--            <h2 class="text-xl font-bold">@yield('header', 'Dashboard')</h2>--}}
{{--            <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded flex items-center">--}}
{{--                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"></path>--}}
{{--                </svg>--}}
{{--                Logout--}}
{{--            </a>--}}
{{--        </header>--}}

{{--        <div class="mt-6">--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--    </main>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}



{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>@yield('title', 'Dashboard')</title>--}}

{{--    <!-- Tailwind CSS (or your preferred styling) -->--}}
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}

{{--</head>--}}
{{--<body class="bg-gray-100">--}}
{{--<div class="flex">--}}
{{--    <!-- Sidebar -->--}}
{{--    <aside class="w-64 bg-gray-900 text-white min-h-screen">--}}
{{--        <div class="p-4">--}}
{{--            <h2 class="text-xl font-bold">Dashboard</h2>--}}
{{--        </div>--}}
{{--        <nav class="mt-5">--}}
{{--            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>--}}
{{--            <a href="{{ route('attendance.index') }}" class="block px-4 py-2 hover:bg-gray-700">Attendance</a>--}}
{{--            <a href="{{ route('bacenta.index') }}" class="block px-4 py-2 hover:bg-gray-700">Bacentas</a>--}}
{{--            <a href="{{ route('notifications.index') }}" class="block px-4 py-2 hover:bg-gray-700">Notifications</a>--}}
{{--        </nav>--}}
{{--        <div class="mt-10 px-4">--}}
{{--            <button class="w-full bg-orange-500 text-white py-2 rounded">+ Add Member</button>--}}
{{--            <button class="w-full bg-orange-500 text-white py-2 rounded mt-2">+ Add Bacenta</button>--}}
{{--        </div>--}}
{{--    </aside>--}}

{{--    <!-- Main Content -->--}}
{{--    <main class="flex-1 p-6">--}}
{{--        <header class="flex justify-between items-center bg-gray-200 p-4 rounded">--}}
{{--            <h2 class="text-xl font-bold">@yield('header', 'Dashboard')</h2>--}}
{{--            <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded">Logout</a>--}}
{{--        </header>--}}

{{--        <div class="mt-6">--}}
{{--            @yield('content')--}}
{{--        </div>--}}
{{--    </main>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
