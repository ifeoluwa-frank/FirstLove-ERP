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
        <div class="flex-1 flex flex-col h-screen overflow-auto">
            
            <!-- Top Navbar -->
            <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                </div>
                <!-- Logout Button -->
                <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Logout</button>
            </header>

            <!-- Main Content -->
            <div class="w-full px-6 py-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4 text-center">Add New Member</h2>
                    
                    <form action="{{ route('member.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-4 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="first_name" class="w-full px-3 py-2 border rounded" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                                <input type="text" name="middle_name" class="w-full px-3 py-2 border rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" class="w-full px-3 py-2 border rounded" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Picture</label>
                                <input type="file" name="profile_picture" class="w-full px-3 py-2 border rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                                <input type="date" name="dob" class="w-full px-3 py-2 border rounded" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">School</label>
                                <input type="text" name="school" class="w-full px-3 py-2 border rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" name="phone" class="w-full px-3 py-2 border rounded" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">WhatsApp Number</label>
                                <input type="text" name="whatsapp" class="w-full px-3 py-2 border rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Address</label>
                                <input type="text" name="address" class="w-full px-3 py-2 border rounded">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Fellowship</label>
                                <select class="w-full px-3 py-2 border rounded" name="fellowship">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    @foreach($bacentas as $bacenta)
                                        <option value="{{ $bacenta->id }}">{{ $bacenta->bacenta_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">When Did You Join the Church?</label>
                                <input type="date" name="joined_at" class="w-full px-3 py-2 border rounded">
                            </div>
                            <div>
                                {{-- TODO: MINISTRY SHOULD BE DYNAMICALLY ADDED - MINISTRY CRUDE TO BE DONE --}}
                                <label class="block text-sm font-medium text-gray-700">What Do You Do in Church?</label>
                                <select class="w-full px-3 py-2 border rounded" name="church_role">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    <option value="choir">Choir</option>
                                    <option value="usher">Usher</option>
                                    <option value="media">Media Team</option>
                                    <option value="dancing star">Dancing Star</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Holy Ghost Baptised?</label>
                                <select class="w-full px-3 py-2 border rounded" name="speaks_in_tongues">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Water Baptized?</label>
                                <select class="w-full px-3 py-2 border rounded" name="baptized">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">NBS Certified?</label>
                                <select class="w-full px-3 py-2 border rounded" name="nbs_certified">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Last Visited</label>
                                <input type="date" name="last_visited_at" class="w-full px-3 py-2 border rounded">
                            </div>
                        </div>

                    <!-- Submit Button -->
                        <div class="mt-6 flex justify-start">
                            <button type="submit" class="w-1/2 bg-yellow-500 text-white px-4 py-3 rounded-lg hover:bg-yellow-600 transition">
                                Submit
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>