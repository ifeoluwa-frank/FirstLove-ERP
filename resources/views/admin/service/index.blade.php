
@extends('layouts.app')

@section('title', 'Services')

@section('header')
    Ministries
@endsection     

@section('content')
    <!-- Content Section -->
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
                <button onclick="openModal('modal')" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 modalButton">+ Add Service</button>
            </div>
            
        <div class="card has-table">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-bible"></i></span>
                Services
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
                    <th>Service Name</th>
                    <th>Special</th>
                    <th>Bacenta Level</th>
                    <th>Sunday Service</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                  <tr>
                    <td data-label="Serial">{{ __($loop->index + $services->firstItem()) }}</td>
                    <td data-label="Name">{{ $service->name }}</td>
                    <td data-label="Special" class="progress-cell">
                        @php
                            if ($service->is_special) {
                                $is_special = "Yes";
                            } else {
                                $is_special = "No";
                            }
                        @endphp
                        {{ $is_special }}
                    </td>
                    <td data-label="Bacenta Level" class="progress-cell">
                        @php
                            if ($service->bacenta_level) {
                                $bacenta_level = "Yes";
                            } else {
                                $bacenta_level = "No";
                            }
                        @endphp
                        {{ $bacenta_level }}
                    </td>
                    <td data-label="Sunday" class="progress-cell">
                        @php
                            if ($service->sunday_service) {
                                $sunday_service = "Yes";
                            } else {
                                $sunday_service = "No";
                            }
                        @endphp
                        {{ $sunday_service }}
                    </td>
                    <td data-label="edit" class="actions-cell">
                        <button onclick="openModal('editModal')" class="bg-orange-600 text-white py-1 px-2 rounded hover:bg-orange-700 editBtn modalButton"
                                data-id="{{ $service->id }}" data-name="{{ $service->name }}" data-is_special="{{ $service->is_special }}" data-bacenta_level="{{ $service->bacenta_level }}" 
                                data-sunday_service="{{ $service->sunday_service }}" id="editBtn">
                                Edit
                        </button>
                    </td>
                  </tr>
                  @empty
                    <tr>
                        <td colspan="100%">No Service Added Yet</td>
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
                <h2 class="text-lg font-semibold">Add New Service</h2>
                <button onclick="closeModal('modal')" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="p-4">
                <form action="{{ route('service.addEdit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Service Name</label>
                        <input type="text" name="name" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Is It A Special Service</label>
                        <select class="w-full px-3 py-2 border rounded" name="is_special" required>
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Is It A Sunday Service</label>
                        <select class="w-full px-3 py-2 border rounded" name="sunday_service" required>
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Is It A Bacenta Level Service</label>
                        <select class="w-full px-3 py-2 border rounded" name="bacenta_level" required>
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
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
                <form action="{{ route('service.addEdit') }}" method="POST">
                    @csrf
                    <input name="id" id="id" hidden>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Service Name</label>
                        <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Is It A Special Service</label>
                        <select class="w-full px-3 py-2 border rounded" name="is_special" required>
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Is It A Sunday Service</label>
                        <select class="w-full px-3 py-2 border rounded" name="sunday_service" required>
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Is It A Bacenta Level Service</label>
                        <select class="w-full px-3 py-2 border rounded" name="bacenta_level" required>
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
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
            // modal.querySelector("#description").value = data.is_special || "";

            modal.querySelector('select[name="is_special"]').value = data.is_special || "";
            modal.querySelector('select[name="bacenta_level"]').value = data.bacenta_level || "";
            modal.querySelector('select[name="sunday_service"]').value = data.sunday_service || "";
        });
    });
});

</script>
