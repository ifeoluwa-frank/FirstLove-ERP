@extends('layouts.app')

@section('title', 'Member Details')

@section('header')
    Member Details
@endsection

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-5">
    <div class="flex gap-6">
        <!-- Profile Section -->
        <div class="w-1/4 text-center">
            <img src=" " alt="Profile Picture" class="w-40 h-40 rounded-lg object-cover mx-auto">
            <h3 class="text-xl font-semibold mt-4">Fred Shayo</h3>
            <p class="text-green-500 font-bold">Active</p>
        </div>

        <!-- Information Section -->
        <div class="w-3/4 grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-600 font-semibold">First Name:</p>
                <input type="text" value="Fred" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Middle Name:</p>
                <input type="text" value="Richard" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Last Name:</p>
                <input type="text" value="Shayo" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Date of Birth:</p>
                <input type="text" value="12 March 2022" class="text-lg p-2 border rounded w-full" readonly />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">School:</p>
                <input type="text" value="University of Arusha" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Phone:</p>
                <input type="text" value="+255 8146377947" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">WhatsApp:</p>
                <input type="text" value="+255 8146377947" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Address:</p>
                <input type="text" value="123, Sakina, Arusha" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Bacenta ID:</p>
                <input type="text" value="BAC123456789" class="text-lg p-2 border rounded w-full" readonly />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Date Joined:</p>
                <input type="text" value="08 Feb 2025, 11:19 PM" class="text-lg p-2 border rounded w-full" readonly />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Last Visited:</p>
                <input type="text" value="12 Feb 2025, 3:45 PM" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Ministry:</p>
                <input type="text" value="Instrumentalists" class="text-lg p-2 border rounded w-full" />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Speak in Tongues:</p>
                <input type="text" value="Yes" class="text-lg p-2 border rounded w-full" readonly />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Are You Baptized?</p>
                <input type="text" value="Yes" class="text-lg p-2 border rounded w-full" readonly />
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Do You Have an NBS Certificate?</p>
                <input type="text" value="Yes" class="text-lg p-2 border rounded w-full" readonly />
            </div>
        </div>
    </div>
    
    <div class="mt-6 flex justify-between">
        <a href="#" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">Back to List</a>
        <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Save Changes</a>
    </div>
</div>
@endsection
