
@extends('layouts.app')

@section('title', 'Ministries')

@section('header')
    Ministries
@endsection     

@section('content')
    <!-- Content Section -->
    {{-- <main class="p-6 bg-white shadow-md m-6 rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Ministry List</h1>
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
                        <th class="p-2 border border-gray-300">Ministry Name</th>
                        <th class="p-2 border border-gray-300">Description</th>
                        <th class="p-2 border border-gray-300">Status</th>
                        <th class="p-2 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- New rows will be added here dynamically -->
                    @forelse($ministries as $ministry)
                        <tr>
                            <td class="p-2 border border-gray-300">{{ __($loop->index + $ministries->firstItem()) }}</td>
                            <td class="p-2 border border-gray-300">{{ $ministry->name }}</td>
                            <td class="p-2 border border-gray-300">{{ $ministry->description}}</td>
                            <td class="p-2 border border-gray-300">
                                @php
                                    if ($ministry->status) {
                                        $status = "Active";
                                    } else {
                                        $status = "Inactive";
                                    }
                                @endphp
                                {{ $status }}
                            </td>
                            <td class="p-2 border border-gray-300">
                                <button onclick="openModal('editModal')" class="bg-orange-600 text-white py-1 px-2 rounded hover:bg-orange-700 editBtn modalButton"
                                data-id="{{ $ministry->id }}" data-name="{{ $ministry->name }}" data-description="{{ $ministry->description }}"
                                data-status="{{ $ministry->status }}" id="editBtn"
                                >
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="100%">No Ministry Added Yet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main> --}}

    <div id="app">
        <section class="is-title-bar">
            <div
              class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0"
            >
              <ul>
                <li>Admin</li>
                <li>{{ $pageTitle }}</li>
              </ul>
            </div>
          </section>
        <section class="section main-section">
            @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold"></h1>
                <!-- Add New Bacenta Button -->
                <button onclick="openModal('modal')" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 modalButton">+ Add Sonta</button>
            </div>
            
        <div class="card has-table">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-church"></i></span>
                Bacentas
              </p>
              {{-- <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
              </a> --}}
              {{-- <button onclick="openModal('modal')" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 modalButton">+ Add New Bacenta</button> --}}
              
            </header>
            <div class="card-content">
              <table>
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Ministry Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($ministries as $ministry)
                  <tr>
                    <td data-label="Serial">{{ __($loop->index + $ministries->firstItem()) }}</td>
                    <td data-label="Name">{{ $ministry->name }}</td>
                    <td data-label="Description">{{ $ministry->description}}</td>
                    <td data-label="Status" class="progress-cell">
                        @php
                            if ($ministry->status) {
                                $status = "Active";
                            } else {
                                $status = "Inactive";
                            }
                        @endphp
                        {{ $status }}
                    </td>
                    <td data-label="edit" class="actions-cell">
                        <button onclick="openModal('editModal')" class="bg-orange-600 text-white py-1 px-2 rounded hover:bg-orange-700 editBtn modalButton"
                                data-id="{{ $ministry->id }}" data-name="{{ $ministry->name }}" data-description="{{ $ministry->description }}"
                                data-status="{{ $ministry->status }}" id="editBtn"
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
              {{-- <div class="table-pagination">
                <div class="flex items-center justify-between">
                  <div class="buttons">
                    <button type="button" class="button active">1</button>
                    <button type="button" class="button">2</button>
                    <button type="button" class="button">3</button>
                  </div>
                  <small>Page 1 of 3</small>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        </section>
    </div>
    <!-- Modal (Hidden by Default) -->
    <div id="modal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 open-modal-button hidden">
        <div class="bg-white rounded-lg shadow-lg w-96">
            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b p-4">
                <h2 class="text-lg font-semibold">Add New Ministry</h2>
                <button onclick="closeModal('modal')" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="p-4">
                <form action="{{ route('ministry.addEdit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Ministry Name</label>
                        <input type="text" name="name" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Minstry description</label>
                        <textarea name="description" class="border border-gray-300 rounded-lg p-2 w-full" rows="4" cols="30"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select class="w-full px-3 py-2 border rounded" name="status">
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
                <h2 class="text-lg font-semibold">Edit Ministry</h2>
                <button onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </div>

            <!-- Edit Modal Body -->
            <div class="p-4">
                <form action="{{ route('ministry.addEdit') }}" method="POST">
                    @csrf
                    <input name="id" id="id" hidden>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Ministry Name</label>
                        <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Minstry description</label>
                        <textarea id="description" name="description" class="border border-gray-300 rounded-lg p-2 w-full"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select class="w-full px-3 py-2 border rounded" name="status">
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
            modal.querySelector("#description").value = data.description || "";

            modal.querySelector('select[name="status"]').value = data.status || "";
        });
    });
});

</script>
