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
            <div>
                <form>
                    <label>Date</label>
                </form>
            </div>
            <div class="grid gap-6 grid-cols-1 md:grid-cols-2 mb-6">
                <div class="card">
                    <div class="card-content">
                      <h2 class="text-2xl ml-2 mb-3">{{ $sundayService->name }} - {{ $ushersHeadcount->service_date ?? "" }}</h2>
                        <div class="flex align-center justify-between mb-3">
                          <div class="flex gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svgs">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                              </svg>                              
                                                      
                              <div class="mt-2 mr-3">
                                  <p class="text-sm font-bold">Usher's Headcount</p>
                              </div>
                          </div>
                          
                          <div class="align-center rounded-md">
                              
                              <h1 class="text-xl font-extrabold mt-1">{{ $ushersHeadcount->headcount ?? "" }}</h1>
                          </div>
                      </div>
                    </div>
                  </div>
              <div class="card">
                <div class="card-content">
                  <div class="flex items-center justify-between">
                    <div class="widget-label">
                      <h3>Total Bacentas</h3>
                      <h1>3</h1>
                    </div>
                    <span class="icon widget-icon text-blue-500"
                      ><i class="mdi mdi-church mdi-48px"></i
                    ></span>
                  </div>
                </div>
              </div>
    
              
              <section class="section main-section">
                <div class="card lg:col-span-1">
                    <header class="card-header">
                        <p class="card-header-title">
                          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                          Add Member
                        </p>
                    </header>
                    <div class="card-content">
                        @if ($errors->any())
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            
                        <form action="{{ route('attendance.headcount') }}" method="POST">
                            @csrf
                            <div class="">
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
              </section>
          </section>   
    </div>

@endsection