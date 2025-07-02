
@extends('layouts.app')

@section('title', 'Bacenta')

@section('header')
    Bacenta
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
              {{-- <a
                href="https://justboil.me/"
                onclick="alert('Coming soon'); return false"
                target="_blank"
                class="button blue"
              >
                <span class="icon"
                  ><i class="mdi mdi-credit-card-outline"></i
                ></span>
                <span>Premium Demo</span>
              </a> --}}
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
                <div></div>
            <button onclick="openModal('modal')" 
                class="bg-[#0ca678] text-white px-4 py-2 rounded hover:bg-[#087f5b] transition duration-200 modalButton">
                + Add Bacenta
            </button>
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
                    {{-- <th></th> --}}
                    <th>S/N</th>
                    <th>Bacenta Name</th>
                    <th>Bacenta Leader</th>
                    <th>Bacenta Location</th>
                    <th>Status</th>
                    <th>Username</th>
                    <th>Members</th>
                    <th>Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($bacentas as $bacenta)
                  <tr>
                    <td data-label="Serial">{{ __($loop->index + $bacentas->firstItem()) }}</td>
                    <td data-label="Name">{{ $bacenta->bacenta_name }}</td>
                    <td data-label="Leader">{{ $bacenta->leader->first_name ?? '' . " " . $bacenta->leader->last_name ?? ''}}</td>
                    <td data-label="Location">{{ $bacenta->location }}</td>
                    <td data-label="Status" class="progress-cell">
                        @php
                        if ($bacenta->is_active) {
                            $status = "Active";
                        } else {
                            $status = "Inactive";
                        }
                        @endphp
                        {{ $status }}
                    </td>
                    <td data-label="Username">
                        {{ $bacenta->username }}
                    </td>
                    <td data-label="members" class="members">
                      <div class="buttons right nowrap">
                        <a
                          href="{{ route('bacenta.member', ['id' => $bacenta->id]) }}"
                          class="button small green --jb-modal"
                          data-target="sample-modal-2"
                          type="button"
                        >
                        {{ $bacenta->members_count }} Members
                        </a>
                        {{-- <button
                          class="button small red --jb-modal"
                          data-target="sample-modal"
                          type="button"
                        >
                          <span class="icon"
                            ><i class="mdi mdi-trash-can"></i
                          ></span> --}}
                        {{-- </button> --}}
                      </div>
                    </td>
                    <td data-label="edit" class="actions-cell">
                        <button
                        onclick="openModal('editModal')"
                          class="button small red --jb-modal editBtn modalButton"
                          {{-- data-target="sample-modal" --}}
                          type="button"
                          data-id="{{ $bacenta->id }}" data-name="{{ $bacenta->bacenta_name }}" data-leader="{{ $bacenta->bacenta_leader_id }}"
                        data-location="{{ $bacenta->location }}" data-status="{{ $bacenta->is_active }}" data-user="{{ $bacenta->username }}"
                        data-password="{{ $bacenta->password }}" id="editBtn"
                        >
                          <i class="mdi mdi-account-edit"></i>Edit
                        </button>
                        {{-- <button onclick="openModal('editModal')" class="bg-orange-600 text-white py-1 px-2 rounded hover:bg-orange-700 editBtn modalButton"
                        data-id="{{ $bacenta->id }}" data-name="{{ $bacenta->bacenta_name }}" data-leader="{{ $bacenta->bacenta_leader_id }}"
                        data-location="{{ $bacenta->location }}" data-status="{{ $bacenta->is_active }}" data-user="{{ $bacenta->username }}"
                        data-password="{{ $bacenta->password }}" id="editBtn"
                        >
                            Edit
                        </button> --}}
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
                      <button type="submit" 
                          class="w-full bg-[#0ca678] text-white px-4 py-2 rounded hover:bg-[#087f5b] transition">
                          Submit
                      </button>
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
                    <button type="submit" class="w-full bg-[#0ca678] text-white px-4 py-2 rounded hover:bg-[#087f5b] transition">
                        Submit
                    </button>
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
