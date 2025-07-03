@extends('layouts.app')

@section('title', 'Member Details')

@section('header')
    Member Details
@endsection

@section('content')
<div id="app">
    
    <section class="is-title-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <ul>
          <li>Admin</li>
          <li>{{ $member->first_name . " " . $member->last_name . "'s" }} Profile</li>
        </ul>
      </div>
    </section>
      <section class="section main-section">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 mb-6">
            <div class="card lg:col-span-1">
                <header class="card-header">
                  <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account"></i></span>
                    Profile Card
                  </p>
                </header>
                <div class="card-content">
                  <div class="image w-48 h-48 mx-auto">
                    {{-- <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full"> --}}
                    @if($member->profile_picture)
                        <img src="{{ asset('storage/' . $member->profile_picture) }}" alt="Profile Picture" class="rounded-full" style="width: 200px; height: 200px">
                    @else
                        <img src="https://avatars.dicebear.com/v2/initials/john-doe.svg" alt="John Doe" class="rounded-full">
                    @endif
                  </div>
                  <hr>
                  <table class="table-auto w-full text-left mt-4">
                    <tbody>
                        <tr>
                            <th class="p-2">Name:</th>
                            <td class="p-2">{{ $member->first_name . " " . $member->last_name }}</td>
                        </tr>
                        <tr>
                            <th class="p-2">School:</th>
                            <td class="p-2">{{ $member->school }}</td>
                        </tr>
                        <tr>
                            <th class="p-2">Phone:</th>
                            <td class="p-2">{{ $member->phone }}</td>
                        </tr>
                        <tr>
                            <th class="p-2">Bacenta:</th>
                            <td class="p-2">{{ $member->bacenta->bacenta_name }}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
              </div>
          <div class="card lg:col-span-3">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                Edit Profile
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
              <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') 
                <div class="flex flex-col gap-4 sm:flex-row sm:gap-6">
                    <div class="field w-full">
                        <label class="label">First Name</label>
                        <div class="control">
                            <input type="text" name="first_name" value="{{ $member->first_name }}" class="input w-full" required>
                        </div>
                        <p class="help">Required.</p>
                    </div>
                    <div class="field w-full">
                        <label class="label">Middle Name</label>
                        <div class="control">
                            <input type="text" name="middle_name" value="{{ $member->middle_name }}" class="input w-full">
                        </div>
                        {{-- <p class="help">Required.</p> --}}
                    </div>
                    <div class="field w-full">
                        <label class="label">Last Name</label>
                        <div class="control">
                            <input type="text" name="last_name" value="{{ $member->last_name }}" class="input w-full" required>
                        </div>
                        <p class="help">Required.</p>
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:gap-2 mt-6 sm:mt-6">
                    <div class="field w-full">
                        <label class="label">Mobile</label>
                        <div class="control">
                            <input type="text" name="phone" value="{{ $member->phone }}" class="input w-full" required>
                        </div>
                        <p class="help">Required.</p>
                    </div>
                    <div class="field w-full">
                      <label class="label">NBS Certified</label>
                      <select class="w-full px-3 py-2 border rounded controller" name="nbs_certified">
                          <option disabled value="">-- Select an Option --</option>
                          <option value="1" @selected($member->nbs_certified == 1)>Yes</option>
                          <option value="0" @selected($member->nbs_certified == 0)>No</option>
                      </select>
                      {{-- <p class="help">Required.</p> --}}
                  </div>
                    <div class="field w-full">
                        <label class="label">School</label>
                        <div class="control">
                            <input type="text" name="school" value="{{ $member->school }}" class="input w-full" required>
                        </div>
                        <p class="help">Required.</p>
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:gap-2 mt-6 sm:mt-6">
                    <div class="field w-full">
                        <label class="label">Date of Birth</label>
                        <div class="control">
                            <input type="date" autocomplete="on" name="dob" value="{{ $member->dob }}" class="input w-full">
                        </div>
                        {{-- <p class="help">Required.</p> --}}
                    </div>
                    <div class="field w-full">
                        <label class="label">WhatsApp</label>
                        <div class="control">
                            <input type="text" autocomplete="on" name="whatsapp" value="{{ $member->whatsapp }}" class="input w-full">
                        </div>
                        {{-- <p class="help">Required.</p> --}}
                    </div>
                    <div class="field w-full">
                        <label class="label">Address</label>
                        <div class="control">
                            <input type="text" autocomplete="on" name="address" value="{{ $member->address }}" class="input w-full" required>
                        </div>
                        <p class="help">Required.</p>
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:gap-2 mt-6 sm:mt-6">
                    <div class="field w-full">
                        <label class="label">Ministry</label>
                        <select class="w-full px-3 py-2 border rounded controller" name="ministry_id">
                            <option disabled value="">-- Select an Option --</option>
                            @foreach($ministries as $ministry)
                                <option value="{{ $ministry->id }}">{{ $ministry->name }}</option>
                            @endforeach
                        </select>
                        {{-- <p class="help">Required.</p> --}}
                    </div>
                    <div class="field w-full">
                        <label class="label">Speak In Tongues</label>
                        <select class="w-full px-3 py-2 border rounded controller" name="speaks_in_tongues">
                            <option disabled value="">-- Select an Option --</option>
                            <option value="1" @selected($member->speaks_in_tongues == 1)>Yes</option>
                            <option value="0" @selected($member->speaks_in_tongues == 0)>No</option>
                        </select>
                        {{-- <p class="help">Required.</p> --}}
                    </div>
                    <div class="field w-full">
                        <label class="label">Baptized</label>
                        <select class="w-full px-3 py-2 border rounded controller" name="baptized">
                            <option disabled value="">-- Select an Option --</option>
                            <option value="1" @selected($member->baptized == 1)>Yes</option>
                            <option value="0" @selected($member->baptized == 0)>No</option>
                        </select>
                        {{-- <p class="help">Required.</p> --}}
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:gap-2 mt-6 sm:mt-6">
                    {{-- <div class="field w-full">
                        <label class="label">Bacenta</label>
                        <select class="w-full px-3 py-2 border rounded controller" name="bacenta_id">
                            <option disabled value="">-- Select an Option --</option>
                            @foreach($bacentas as $bacenta)
                                <option value="{{ $bacenta->id }}">{{ $bacenta->bacenta_name }}</option>
                            @endforeach
                        </select>
                        <p class="help">Required.</p>
                    </div> --}}
                    <input type="hidden" name="bacenta_id" value="{{ $bacenta->id }}" />
                    <div class="field w-full">
                        <label class="label">Date Joined</label>
                        <div class="control">
                            <input type="date" name="joined_at" value="{{ $member->joined_at }}" class="input w-full">
                        </div>
                        <p class="help">Required.</p>
                    </div>
                    <div class="field w-full">
                        <label class="label">Last Visit</label>
                        <div class="control">
                            <input type="date" name="last_visited_at" value="{{ $member->last_visited_at }}" class="input w-full" required>
                        </div>
                        <p class="help">Required.</p>
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
        {{-- <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-lock"></i></span>
              Change Password
            </p>
          </header>
          <div class="card-content">
            <form>
              <div class="field">
                <label class="label">Current password</label>
                <div class="control">
                  <input type="password" name="password_current" autocomplete="current-password" class="input" required>
                </div>
                <p class="help">Required. Your current password</p>
              </div>
              <hr>
              <div class="field">
                <label class="label">New password</label>
                <div class="control">
                  <input type="password" autocomplete="new-password" name="password" class="input" required>
                </div>
                <p class="help">Required. New password</p>
              </div>
              <div class="field">
                <label class="label">Confirm password</label>
                <div class="control">
                  <input type="password" autocomplete="new-password" name="password_confirmation" class="input" required>
                </div>
                <p class="help">Required. New password one more time</p>
              </div>
              <hr>
              <div class="field">
                <div class="control">
                  <button type="submit" class="button green">
                    Submit
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div> --}}
      </section>
    
    </div>
@endsection
