@extends('layouts.app')

@section('title', 'Member Details')

@section('header')
    Member Details
@endsection

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md mt-5">
    <div class="flex gap-8">
        <!-- Profile Section -->
        <div class="w-1/3 text-center">
            <img src=" " alt="Profile Picture" class="w-40 h-40 rounded-lg object-cover mx-auto shadow">
            <h3 class="text-2xl font-semibold mt-4">Fred Shayo</h3>
            <p class="text-green-600 font-bold text-lg">Active</p>
        </div>

        <!-- Information Section -->
        <div class="w-2/3 grid grid-cols-2 gap-6">
            @foreach([
                ['label' => 'First Name', 'value' => 'Fred'],
                ['label' => 'Middle Name', 'value' => 'Richard'],
                ['label' => 'Last Name', 'value' => 'Shayo'],
                ['label' => 'Date of Birth', 'value' => '12 March 2022', 'readonly' => true],
                ['label' => 'School', 'value' => 'University of Arusha'],
                ['label' => 'Phone', 'value' => '+255 8146377947'],
                ['label' => 'WhatsApp', 'value' => '+255 8146377947'],
                ['label' => 'Address', 'value' => '123, Sakina, Arusha'],
                ['label' => 'Bacenta ID', 'value' => 'BAC123456789', 'readonly' => true],
                ['label' => 'Date Joined', 'value' => '08 Feb 2025, 11:19 PM', 'readonly' => true],
                ['label' => 'Last Visited', 'value' => '12 Feb 2025, 3:45 PM'],
                ['label' => 'Ministry', 'value' => 'Instrumentalists'],
                ['label' => 'Speak in Tongues', 'value' => 'Yes', 'readonly' => true],
                ['label' => 'Are You Baptized?', 'value' => 'Yes', 'readonly' => true],
                ['label' => 'Do You Have an NBS Certificate?', 'value' => 'Yes', 'readonly' => true]
            ] as $field)
            <div>
                <p class="text-gray-600 font-medium">{{ $field['label'] }}:</p>
                <input type="text" value="{{ $field['value'] }}" class="text-lg p-2 border rounded w-full {{ isset($field['readonly']) ? 'bg-gray-100 cursor-not-allowed' : '' }}" {{ isset($field['readonly']) ? 'readonly' : '' }} />
            </div>
            @endforeach
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-8 flex justify-between">
        <a href="#" class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-700 transition">Back to List</a>
        <a href="#" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-800 transition">Save Changes</a>
    </div>
</div>
@endsection
