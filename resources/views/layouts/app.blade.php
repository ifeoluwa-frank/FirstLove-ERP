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
