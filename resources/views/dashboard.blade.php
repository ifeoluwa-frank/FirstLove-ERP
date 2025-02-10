@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
    Dashboard
@endsection

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Birthdays -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Birthdays</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium">Isack June</p>
                        <p class="text-sm text-gray-500">Bacenta - Volcano</p>
                    </div>
                    <span class="bg-gray-200 px-3 py-1 rounded">14-Feb-2000</span>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-medium">Alice Isaiah</p>
                        <p class="text-sm text-gray-500">Bacenta - ATC girls</p>
                    </div>
                    <span class="bg-gray-200 px-3 py-1 rounded">09-Jun-2007</span>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Upcoming Events</h3>
            <div class="space-y-3">
                <div>
                    <p class="font-medium">Great Invitation</p>
                    <p class="text-sm text-gray-500">30 November 2024</p>
                </div>
                <div>
                    <p class="font-medium">Prayer and Fasting season</p>
                    <p class="text-sm text-gray-500">18 January 2025</p>
                </div>
                <div>
                    <p class="font-medium">Joint Service</p>
                    <p class="text-sm text-gray-500">18 January 2025</p>
                </div>
            </div>
        </div>
    </div>
@endsection
