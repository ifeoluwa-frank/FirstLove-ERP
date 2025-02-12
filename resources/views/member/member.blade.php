<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Add Heroicons CDN -->
    <script src="https://unpkg.com/@heroicons/vue@1.0.5"></script>
</head>
<body class="bg-gray-100">
    
    <!-- Sidebar & Content Wrapper -->
    <div class="flex h-screen">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white p-5 space-y-4">
            
            <!-- Username and Profile Section at the Top -->
            <div class="mt-2 mb-6 flex items-center space-x-3">
                <img src="https://via.placeholder.com/40" class="rounded-full" alt="Profile">
                <span class="text-sm">User Name</span>
            </div>

            <nav>
                <ul class="space-y-2">
                    <li class="py-2 px-4 rounded hover:bg-gray-700">
                        <a href="#" class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                            </svg>                                                                                                               
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="py-2 px-4 rounded hover:bg-gray-700">
                        <a href="#" class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                            </svg>                                                      
                            <span>Bacenta List</span>
                        </a>
                    </li>
                    <li class="py-2 px-4 rounded hover:bg-gray-700">
                        <a href="#" class="flex items-center space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                              </svg>                                                                                   
                            <span>Attendance</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            
            <!-- Top Navbar -->
            <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                </div>
                <!-- Logout Button -->
                <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Logout</button>
            </header>
            
            <!-- Content Section -->
            <main class="p-6 bg-white shadow-md m-6 rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-xl font-bold">Members</h1>
                    <!-- Add New Bacenta Button -->
                    <a href="{{ route('member.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 modalButton">+ Add New Member</a>
                </div>
                
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse shadow-md rounded-lg overflow-hidden text-sm">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr class="text-left">
                                <th class="p-2 border border-gray-300">S.N.</th>
                                <th class="p-2 border border-gray-300">Name</th>
                                <th class="p-2 border border-gray-300">Phone Number</th>
                                <th class="p-2 border border-gray-300">School</th>
                                <th class="p-2 border border-gray-300">Fellowship</th>
                                <th class="p-2 border border-gray-300">Ministry</th>
                                <th class="p-2 border border-gray-300 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Dynamic rows here -->
                            @forelse($members as $member)
                                <tr class="hover:bg-gray-100 transition">
                                    <td class="p-2 border border-gray-300">{{ __($loop->index + $members->firstItem()) }}</td>
                                    <td class="p-2 border border-gray-300">{{ $member->first_name }} {{ $member->last_name }}</td>
                                    <td class="p-2 border border-gray-300">{{ $member->phone }}</td>
                                    <td class="p-2 border border-gray-300">{{ $member->school }}</td>
                                    <td class="p-2 border border-gray-300">{{ $member->bacenta_id }}</td>
                                    <td class="p-2 border border-gray-300">{{ $member->ministry }}</td>
                                    <td class="p-2 border border-gray-300 text-center">
                                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                            </svg>                               
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center">No Member Added Yet</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

