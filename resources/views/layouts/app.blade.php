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
        .d_svg {
            width: 24px;
            height:24px;
        }
        .p_pic {
            height: 45px;
        }
    </style>
</head>
<body class="bg-gray-300 text-gray-900">
<div x-data="{ open: false }" class="flex h-screen">
    <!-- Sidebar -->
    <aside :class="open ? 'translate-x-0' : '-translate-x-full'"
           class="fixed md:relative w-52 bg-[#292C2F] text-white min-h-screen transform transition-transform duration-300 md:translate-x-0">
        <div class="p-5 flex gap-4 ml-4 items-center border-b border-gray-600">
            <img src="https://ui-avatars.com/api/?name=Andrew+Smith&background=random" class="rounded-full border-2 border-white p_pic" alt="Admin">
            <div class="">
                <p class="text-xs uppercase text-gray-300">Admin</p>
                <p class="text-xs">{{ auth()->user()->name }}</p>
            </div>
        </div>
        <nav class="mt-6 flex flex-col gap-3 text-sm mb-16">
            <a href="{{ route('dashboard') }}" class="flex gap-2 items-center  w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                  </svg>
                   Dashboard
            </a>
            <a href="{{ route('member.index') }}" class="flex gap-2 items-center w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                  </svg>                  
                   Members
            </a>
            <a href="{{ route('bacenta.index') }}" class="flex gap-2 items-center w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                  </svg>
                   Bacentas
            </a>
            <a href="" class="flex gap-2 items-center  w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                  </svg>
                   Attendance
            </a>
            <a href="" class="flex gap-2 items-center  w-3/4 px-5 py-3 hover:bg-gray-500 ml-6 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                  </svg>
                   Notifications
            </a>
        </nav>
        <div class="py-4 px-3 w-3/4 ml-6 rounded-2xl bg-gray-500">
            <a href="{{ route('member.create') }}" class="text-xs flex align-center justify-center w-full bg-[#E58025] text-white rounded-lg py-2 mb-3 rounded">
                + Add Member
            </a>
            <a href="{{ route('bacenta.index') }}" class="text-xs flex align-center justify-center w-full bg-[#E58025] text-white rounded-lg py-2 rounded">
                + Add Bacenta
            </a>
        </div>
    </aside>

    <main class="flex-1 p-6">
        <header class="hidden md:flex justify-between items-center bg-gray-200 p-4 rounded-md shadow">
            <h2 class="text-lg font-semibold">@yield('header', 'Dashboard')</h2>
            <a href="{{ route('logout') }}" class="flex gap-2 bg-red-500 text-white font-semibold px-4 py-2 rounded-md hover:bg-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 d_svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                <span >Logout</span>
            </a>
        </header>


        <div class="mt-6">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
