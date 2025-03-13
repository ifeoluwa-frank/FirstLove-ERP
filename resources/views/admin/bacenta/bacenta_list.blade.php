
@extends('layouts.app')

@section('title', 'Bacenta')

@section('header')
    Bacenta
@endsection     

@section('content')
    <!-- Content Section -->
    <body>
    <div id="app">
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
        <div class="card has-table">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-church"></i></span>
                Bacentas
              </p>
              {{-- <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
              </a> --}}
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
                    <td data-label="Leader">{{ $bacenta->leader->first_name . " " . $bacenta->leader->last_name}}</td>
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
</body>
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
