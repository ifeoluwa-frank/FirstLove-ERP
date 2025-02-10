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

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Add Bacenta") }}
                    <a href="{{ route('bacenta.index') }}">Add Bacenta</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

