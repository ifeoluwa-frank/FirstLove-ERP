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
                    <h1 class="text-xl font-bold">Bacenta List</h1>
                    <!-- Add New Bacenta Button -->
                    <button onclick="openModal('modal')" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 modalButton">+ Add New Bacenta</button>
                </div>
                    
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse shadow-md rounded-lg overflow-hidden text-sm" id="bacentaTable">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr class="text-left">
                                <th class="p-2 border">S.N.</th>
                                <th class="p-2 border">Bacenta Name</th>
                                <th class="p-2 border">Bacenta Leader</th>
                                <th class="p-2 border">Bacenta Location</th>
                                <th class="p-2 border">Status</th>
                                <th class="p-2 border">Username</th>
                                <th class="p-2 border">Password</th>
                                <th class="p-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- New rows will be added here dynamically -->
                            @forelse($bacentas as $bacenta)
                                <tr>
                                    <td class="text-center">{{ __($loop->index + $bacentas->firstItem()) }}</td>
                                    <td class="text-center">{{ $bacenta->bacenta_name }}</td>
                                    <td class="text-center">{{ $bacenta->bacenta_leader_id }}</td>
                                    <td class="text-center">{{ $bacenta->location }}</td>
                                    <td class="text-center">{{ $bacenta->is_active }}</td>
                                    <td class="text-center">{{ $bacenta->username }}</td>
                                    <td class="text-center">{{ $bacenta->password }}</td>
                                    <td class="text-center">
                                        <button onclick="openModal('editModal')" class="bg-orange-600 text-white py-1 px-2 rounded hover:bg-orange-700 editBtn modalButton"
                                        data-id="{{ $bacenta->id }}" data-name="{{ $bacenta->bacenta_name }}" data-leader="{{ $bacenta->bacenta_leader_id }}"
                                        data-location="{{ $bacenta->location }}" data-status="{{ $bacenta->is_active }}" data-user="{{ $bacenta->username }}"
                                        data-password="{{ $bacenta->password }}" id="editBtn"
                                        >
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="100%">No Bacenta Added Yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


<!-- Modal (Hidden by Default) -->
<div id="modal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 open-modal-button hidden">
    <div class="bg-white rounded-lg shadow-lg w-96">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b p-4">
            <h2 class="text-lg font-semibold">Add New Bacenta</h2>
            <button onclick="closeModal('modal')" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="p-4">
            <form action="{{ route('bacenta.add') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Bacenta Name</label>
                    <input type="text" name="bacenta_name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Bacenta Leader</label>
                    <input type="text" name="bacenta_leader_id" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Bacenta Location</label>
                    <input type="text" name="location" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select class="w-full px-3 py-2 border rounded" name="is_active">
                        <option disabled selected value="">-- Select an Option --</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="text" name="password" class="w-full px-3 py-2 border rounded" required>
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="editModal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 open-modal-button hidden">
    <div class="bg-white rounded-lg shadow-lg w-96">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b p-4">
            <h2 class="text-lg font-semibold">Edit Bacenta</h2>
            <button onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
        </div>

        <!-- Edit Modal Body -->
        <div class="p-4">
            <form action="{{ route('bacenta.add') }}" method="POST">
                @csrf
                <input name="id" id="id" hidden>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Bacenta Name</label>
                    <input type="text" name="bacenta_name" id="name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Bacenta Leader</label>
                    <input type="text" name="bacenta_leader_id" id="lead_id" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Bacenta Location</label>
                    <input type="text" name="location" id="location" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select class="w-full px-3 py-2 border rounded" name="is_active">
                        <option disabled selected value="">-- Select an Option --</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="text" name="password" id="password" class="w-full px-3 py-2 border rounded" required>
                </div>

                <!-- Submit Button -->
                <div class="text-right">
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>
    function openModal(modal) {
        let tmodal = document.getElementById(`${modal}`);
        tmodal.classList.remove('hidden');
    }

    function closeModal(modal) {
        let tModal = document.getElementById(`${modal}`);
        tModal.classList.add('hidden');
    }

    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".editBtn").forEach((button) => {
        button.addEventListener("click", (e) => {
            const modal = document.getElementById("editModal");
            const data = e.currentTarget.dataset;

            modal.querySelector("#id").value = data.id || "";
            modal.querySelector("#name").value = data.name || "";
            modal.querySelector("#lead_id").value = data.leader || "";
            modal.querySelector("#location").value = data.location || "";
            modal.querySelector("#username").value = data.user || "";
            modal.querySelector("#password").value = data.password || "";

            modal.querySelector('select[name="is_active"]').value = data.status || "";
        });
    });
});

</script>
