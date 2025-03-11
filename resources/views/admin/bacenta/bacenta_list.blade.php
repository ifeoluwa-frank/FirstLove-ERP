
@extends('layouts.app')

@section('title', 'Bacenta')

@section('header')
    Bacenta
@endsection     

@section('content')
    <!-- Content Section -->
    <main class="p-6 bg-white shadow-md m-6 rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Bacenta List</h1>
            <!-- Add New Bacenta Button -->
            <button onclick="openModal('modal')" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 modalButton">+ Add New Bacenta</button>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                    
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse shadow-md rounded-lg overflow-hidden text-sm" id="bacentaTable">
                <thead class="bg-gray-200 text-gray-700">
                    <tr class="text-left">
                        <th class="p-2 border border-gray-300">S.N.</th>
                        <th class="p-2 border border-gray-300">Bacenta Name</th>
                        <th class="p-2 border border-gray-300">Bacenta Leader</th>
                        <th class="p-2 border border-gray-300">Bacenta Location</th>
                        <th class="p-2 border border-gray-300">Status</th>
                        <th class="p-2 border border-gray-300">Username</th>
                        {{-- <th class="p-2 border">Password</th> --}}
                        <th class="p-2 border border-gray-300">Members</th>
                        <th class="p-2 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- New rows will be added here dynamically -->
                    @forelse($bacentas as $bacenta)
                        <tr>
                            <td class="p-2 border border-gray-300">{{ __($loop->index + $bacentas->firstItem()) }}</td>
                            <td class="p-2 border border-gray-300">{{ $bacenta->bacenta_name }}</td>
                            <td class="p-2 border border-gray-300">{{ $bacenta->leader->first_name . " " . $bacenta->leader->last_name}}</td>
                            <td class="p-2 border border-gray-300">{{ $bacenta->location }}</td>
                            <td class="p-2 border border-gray-300">
                                @php
                                    if ($bacenta->is_active) {
                                        $status = "Active";
                                    } else {
                                        $status = "Inactive";
                                    }
                                @endphp
                                {{ $status }}
                            </td>
                            <td class="p-2 border border-gray-300">{{ $bacenta->username }}</td>
                            {{-- <td class="text-center">{{ $bacenta->password }}</td> --}}
                            <td class="p-2 border border-gray-300">
                                <a href="{{ route('bacenta.member', ['id' => $bacenta->id]) }}" class="bg-orange-600 text-white py-1 px-2 rounded hover:bg-orange-700">{{ $bacenta->members_count }} Members</a>
                            </td>
                            <td class="p-2 border border-gray-300">
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
                        <select class="w-full px-3 py-2 border rounded" name="bacenta_leader_id">
                            <option disabled selected value="">-- Select an Option --</option>
                            @forelse ($leaders as $leader)
                                <option value="{{ $leader->id }}">{{ $leader->first_name . " " . $leader->last_name  }}</option>
                            @empty
                                <option disabled value="">-- No Members Added Yet --</option>
                            @endforelse
                        </select>
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
                        <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Submit</button>
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
                        {{-- <input type="text" name="bacenta_leader_id" id="lead_id" class="w-full px-3 py-2 border rounded" required> --}}
                        <select class="w-full px-3 py-2 border rounded" name="bacenta_leader_id">
                            <option disabled selected value="">-- Select an Option --</option>
                            @forelse ($leaders as $leader)
                                <option value="{{ $leader->id }}">{{ $leader->first_name . " " . $leader->last_name  }}</option>
                            @empty
                                <option disabled value="">-- No Members Added Yet --</option>
                            @endforelse
                        </select>
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

@endsection
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
            // modal.querySelector("#lead_id").value = data.leader || "";
            modal.querySelector("#location").value = data.location || "";
            modal.querySelector("#username").value = data.user || "";
            //modal.querySelector("#password").value = data.password || "";

            modal.querySelector('select[name="is_active"]').value = data.status || "";
            modal.querySelector('select[name="bacenta_leader_id"]').value = data.leader || "";
        });
    });
});

</script>
