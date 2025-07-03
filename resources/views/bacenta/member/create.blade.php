@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
    Dashboard
@endsection

@section('content')
    <!-- Main Content -->
    <div id="app">
        <section class="is-title-bar">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
              <ul>
                <li>Admin</li>
                <li>Add New Member</li>
              </ul>
            </div>
          </section>

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
        
                    <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-col gap-4 sm:flex-row sm:gap-6">
                            <div class="field w-full">
                                <label class="label">First Name</label>
                                <div class="control">
                                    <input type="text" name="first_name" class="input w-full" required>
                                </div>
                            </div>
                            <div class="field w-full">
                                <label class="label">Middle Name</label>
                                <div class="control">
                                    <input type="text" name="middle_name" class="input w-full" >
                                </div>
                            </div>
                            <div class="field w-full">
                                <label class="label">Last Name</label>
                                <div class="control">
                                    <input type="text" name="last_name" class="input w-full" required>
                                </div>
                            </div>
                            <div class="field w-full">
                                <label class="label">Picture</label>
                                <div class="control">
                                    <input type="file" name="profile_picture" class="file w-full" accept="image/*">
                                </div>

                            </div>
                        </div>
                        <div class="flex flex-col gap-4 sm:flex-row sm:gap-6">
                            <div class="field w-full">
                                <label class="label">Birthday</label>
                                <div class="control">
                                    <input type="date" name="dob" class="input w-full">
                                </div>
                            </div>
                            <div class="field w-full">
                                <label class="label">School</label>
                                <div class="control">
                                    <input type="text" name="school" class="input w-full">
                                </div>
                            </div>
                            <div class="field w-full">
                                <label class="label">Phone Number</label>
                                <div class="control">
                                    <input type="text" name="phone" class="input w-full" required>
                                </div>
                            </div>
                            <div class="field w-full">
                                <label class="label">WhatsApp Number</label>
                                <div class="control">
                                    <input type="text" name="whatsapp" class="input w-full" >
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 sm:flex-row sm:gap-6">
                            <div class="field w-full">
                                <label class="label">Address</label>
                                <div class="control">
                                    <input type="text" name="address" class="input w-full">
                                </div>
                            </div>
                            {{-- <div class="field w-full">
                                <label class="label">Bacenta</label>
                                <select class="w-full px-3 py-2 border rounded controller" name="bacenta_id">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    @foreach($bacentas as $bacenta)
                                        <option value="{{ $bacenta->id }}">{{ $bacenta->bacenta_name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <input type="hidden" value="{{ $bacenta->id }}" name="bacenta_id" />
                            <div class="field w-full">
                                <label class="label">When Did You Join the Church?</label>
                                <div class="control">
                                    <input type="date" name="joined_at" class="input w-full">
                                </div>
                            </div>
                            <div class="field w-full">
                                <label class="label">Sonta</label>
                                <select class="w-full px-3 py-2 border rounded controller" name="ministry">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    @foreach ($ministries as $ministry)
                                        <option value="{{ $ministry->id }}">{{ $ministry->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 sm:flex-row sm:gap-6">
                            <div class="field w-full">
                                <label class="label">Holy Ghost Baptized?</label>
                                <select class="w-full px-3 py-2 border rounded" name="speaks_in_tongues">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="field w-full">
                                <label class="label">Water Baptized?</label>
                                <select class="w-full px-3 py-2 border rounded" name="baptized">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="field w-full">
                                <label class="label">NBS Certified?</label>
                                <select class="w-full px-3 py-2 border rounded" name="nbs_certified">
                                    <option disabled selected value="">-- Select an Option --</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="field w-full">
                                <label class="label">Last Visited?</label>
                                <div class="control">
                                    <input type="date" name="last_visited_at" class="input w-full">
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
    </div>
    
@endsection