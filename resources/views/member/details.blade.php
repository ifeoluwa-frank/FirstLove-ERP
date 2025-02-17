@extends('layouts.app')

@section('title', 'Member Details')

@section('content')
    <div class="container mx-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Left Sidebar - Profile Picture & Basic Information -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex justify-center">
                    <img src="{{ asset('storage/profile.jpg') }}" alt="Profile Picture" class="w-40 h-40 rounded-full object-cover">
                </div>

                <h2 class="text-xl font-semibold text-center mt-4">Japheth Abashe</h2>

                <div class="mt-4">
                    <p class="text-gray-600"><strong>Username:</strong> japheth.abashe</p>
                    <p class="text-gray-600"><strong>Account Number:</strong> 123456789</p>
                    <p class="text-gray-600"><strong>Branch:</strong> Online</p>
                    <p class="text-gray-600"><strong>Joined On:</strong> 08 Feb 2025, 11:19 PM</p>
                    <p class="text-gray-600"><strong>Account Type:</strong> Personal Account</p>
                </div>
            </div>

            <!-- Right Section - Detailed Information -->
            <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Information of Japheth Abashe</h2>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600"><strong>Account Type:</strong></p>
                        <p class="text-lg">Personal Account</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>Account Classification:</strong></p>
                        <p class="text-lg">Tier 1</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>First Name:</strong></p>
                        <p class="text-lg">Japheth</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>Last Name:</strong></p>
                        <p class="text-lg">Abashe</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>Email:</strong></p>
                        <p class="text-lg">japheth@example.com</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>Branch:</strong></p>
                        <p class="text-lg">Online</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>Mobile Number:</strong></p>
                        <p class="text-lg">+255 714 567 890</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>City:</strong></p>
                        <p class="text-lg">Dar es Salaam</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>State:</strong></p>
                        <p class="text-lg">Tanzania</p>
                    </div>

                    <div>
                        <p class="text-gray-600"><strong>Address:</strong></p>
                        <p class="text-lg">1234 Street, Dar es Salaam</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <a href="#" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                        Back to List
                    </a>
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Edit Member
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
