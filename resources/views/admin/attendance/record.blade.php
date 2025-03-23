@extends('layouts.app')

@section('title', 'Attendance')
<style>
    .svgs {
        width: 40px;
        height: 40px;
    }
  </style>
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
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
          <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                  <span class="icon"><i class="mdi mdi-church"></i></span>
                  Sundays
                </p>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th>
                                Attendance Type
                            </th>
                            @foreach ($headcounts as $sunday)
                                <th>{{ \Carbon\Carbon::parse($sunday->service_date)->format('M d, Y') }}</th>
                            @endforeach
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Usher's Headcount</td>
                            @foreach ($headcounts as $sunday)
                                <td data-label="{{ \Carbon\Carbon::parse($sunday->service_date)->format('M d, Y') }}">{{ $sunday->headcount }}</td> <!-- Replace with dynamic data -->
                            @endforeach
                            <td>
                                <button onclick="openModal('modal')" class="button green">Record</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Busing Attendance</td>
                            @foreach ($headcounts as $sunday)
                                <td>Data 2</td> <!-- Replace with dynamic data -->
                            @endforeach
                            <td>
                                <a href="" class="button green">Record</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
        </section>   
    </div>

    <div id="modal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 open-modal-button hidden">
      <div class="bg-white rounded-lg shadow-lg w-96">
          <!-- Modal Header -->
          <div class="flex justify-between items-center border-b p-4">
              <h2 class="text-lg font-semibold">
                <span class="icon"><i class="mdi mdi-filter-variant"></i></span>
                Filter
              </h2>
              <button onclick="closeModal('modal')" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
          </div>

          <!-- Modal Body -->
          <div class="card">
            <div class="card-content">
    
              <form action="{{ route('attendance.headcount') }}" method="POST">
                @csrf
                <div class="field w-full">
                    <label class="label">Service</label>
                    <select class="w-full px-3 py-2 border rounded controller" name="service_id">
                        <option disabled selected value="">-- Select an Option --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field w-full">
                    <label class="label">Service Date</label>
                    <div class="control">
                        <input type="date" name="service_date" class="input w-full" >
                    </div>
                </div>
                <div class="field w-full">
                    <label class="label">Count</label>
                    <div class="control">
                        <input type="number" name="headcount" class="input w-full" required>
                    </div>
                </div>
                <hr>
                <div class="field">
                  <div class="control">
                    <button type="submit" class="button green w-full">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
  </div>
  <script>
    function openModal(modal) {
        let tmodal = document.getElementById(`${modal}`);
        tmodal.classList.remove('hidden');
    }

    function closeModal(modal) {
        let tModal = document.getElementById(`${modal}`);
        tModal.classList.add('hidden');
    }
  </script>

@endsection