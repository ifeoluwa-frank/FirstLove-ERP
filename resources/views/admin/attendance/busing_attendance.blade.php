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
      Number of Members in the bus
    </p>
  </header>

  @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
  @endif

  <div class="card-content">
    <form action="{{ route('attendance.busing.submit') }}" method="POST">
      @csrf

      <!-- Service and Date Row -->
      <div class="mb-4 flex flex-wrap gap-6">
        <!-- Service Dropdown -->
        <div class="field w-64">
          <label class="label">Select Service</label>
          <div class="control">
            <div class="select w-full">
              <select name="service_id" required>
                <option disabled selected value="">Select a Service</option>
                @forelse($services as $service)
                  <option value="{{ $service->id }}">{{ $service->name }}</option>
                @empty
                @endforelse
              </select>
            </div>
          </div>
        </div>

        <!-- Service Date Picker -->
        <div class="field w-64">
          <label class="label">Service Date</label>
          <div class="control">
            <input type="date" name="service_date" class="input w-full" required>
          </div>
        </div>
      </div>

      <!-- Bacenta Table -->
      <div class="table-container mt-5">
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
          </tbody>
        </table>
      </div>

      <!-- Submit Button -->
      <div class="mt-4" style="display: flex; justify-content: flex-end;">
        <button type="submit" class="button green">
          Submit Attendance
        </button>
      </div>

    </form>
  </div>
</div>

@endsection
