@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
    Dashboard
@endsection

@section('content')
    <!-- Main Content -->
    <div class="w-full px-6 py-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-center">Add New Member</h2>
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
      
            <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Middle Name</label>
                        <input type="text" name="middle_name" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" name="last_name" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Picture</label>
                        <input type="file" name="profile_picture" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <input type="date" name="dob" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">School</label>
                        <input type="text" name="school" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text" name="phone" class="w-full px-3 py-2 border rounded" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">WhatsApp Number</label>
                        <input type="text" name="whatsapp" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fellowship</label>
                        <select class="w-full px-3 py-2 border rounded" name="bacenta_id">
                            <option disabled selected value="">-- Select an Option --</option>
                            @foreach($bacentas as $bacenta)
                                <option value="{{ $bacenta->id }}">{{ $bacenta->bacenta_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">When Did You Join the Church?</label>
                        <input type="date" name="joined_at" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div>
                        {{-- TODO: MINISTRY SHOULD BE DYNAMICALLY ADDED - MINISTRY CRUDE TO BE DONE --}}
                        <label class="block text-sm font-medium text-gray-700">What Do You Do in Church?</label>
                        <select class="w-full px-3 py-2 border rounded" name="ministry">
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="choir">Choir</option>
                            <option value="usher">Usher</option>
                            <option value="media">Media Team</option>
                            <option value="dancing star">Dancing Star</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Holy Ghost Baptised?</label>
                        <select class="w-full px-3 py-2 border rounded" name="speaks_in_tongues">
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Water Baptized?</label>
                        <select class="w-full px-3 py-2 border rounded" name="baptized">
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">NBS Certified?</label>
                        <select class="w-full px-3 py-2 border rounded" name="nbs_certified">
                            <option disabled selected value="">-- Select an Option --</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Visited</label>
                        <input type="date" name="last_visited_at" class="w-full px-3 py-2 border rounded">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6 flex justify-start">
                    <button type="submit" class="w-1/2 bg-yellow-500 text-white px-4 py-3 rounded-lg hover:bg-yellow-600 transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection