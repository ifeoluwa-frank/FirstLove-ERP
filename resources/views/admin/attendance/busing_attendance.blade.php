@extends('layouts.app')

@section('title', 'Attendance')

@section('header')
    Bacenta Attendance
@endsection     

@section('content')

<div class="card">
  <header class="card-header">
    <p class="card-header-title">
      <span class="icon"><i class="mdi mdi-bus"></i></span>
      Bacenta Attendance - Number of Buses
    </p>
  </header>

  <div class="card-content">
    <form action="{{ route('attendance.busing.submit') }}" method="POST">
        @csrf
      <!-- Service Dropdown -->
      <div class="field mb-4 w-full">
        <label class="label">Select Service</label>
        <div class="control">
          <div class="select w-full">
            <select name="service_id" required>
                <option disabled selected value="">-- Select a Service --</option>
                @forelse($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @empty
                @endforelse
            </select>
          </div>
        </div>
      </div>

      <div class="table-container">
        <table class="table is-fullwidth is-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Bacenta Name</th>
              <th>Bus Member Count</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($bacentas as $index => $bacenta)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $bacenta->bacenta_name }}</td>
                    <td>
                        <div class="control">
                            <input type="number" name="{{ $bacenta->id }}" class="input" placeholder="Enter Busing Number" min="0" required>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="has-text-centered">No Bacenta Records Yet</td>
                </tr>
            @endforelse

            <!-- Hardcoded example row -->
            {{-- <tr>
              <td>{{ $bacentas->count() + 1 }}</td>
              <td>Love Bacenta</td>
              <td>
                <div class="control">
                  <input 
                    type="number" 
                    class="input" 
                    value="3" 
                    min="0"
                  >
                </div>
              </td>
            </tr> --}}

          </tbody>
        </table>
      </div>

        <div class="mt-4" style="display: flex; justify-content: flex-end;">
            <button type="submit" class="button green">
                Submit Attendance
            </button>
        </div>

    </form>
  </div>
</div>

@endsection
