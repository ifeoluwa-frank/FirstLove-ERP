@extends('layouts.app')

@section('title', 'Members')

@section('header')
    Members
@endsection

@section('content')
    <!-- Content Section -->
    <main class="p-6 bg-white shadow-md m-6 rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Members</h1>
            <!-- Add New Bacenta Button -->
            <a href="{{ route('member.create') }}" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700 modalButton">+ Add New Member</a>
        </div>
        
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse shadow-md rounded-lg overflow-hidden text-sm">
                <thead class="bg-gray-200 text-gray-700">
                    <tr class="text-left">
                        <th class="p-2 border border-gray-300">S.N.</th>
                        <th class="p-2 border border-gray-300">Name</th>
                        <th class="p-2 border border-gray-300">Phone Number</th>
                        <th class="p-2 border border-gray-300">School</th>
                        <th class="p-2 border border-gray-300">Fellowship</th>
                        <th class="p-2 border border-gray-300">Ministry</th>
                        <th class="p-2 border border-gray-300 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Dynamic rows here -->
                    @forelse($members as $member)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="p-2 border border-gray-300">{{ __($loop->index + $members->firstItem()) }}</td>
                            <td class="p-2 border border-gray-300">{{ $member->first_name }} {{ $member->last_name }}</td>
                            <td class="p-2 border border-gray-300">{{ $member->phone }}</td>
                            <td class="p-2 border border-gray-300">{{ $member->school }}</td>
                            <td class="p-2 border border-gray-300">{{ $member->bacenta_id }}</td>
                            <td class="p-2 border border-gray-300">{{ $member->ministry }}</td>
                            <td class="p-2 border border-gray-300 text-center">
                                <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-700 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                    </svg>                               
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center">No Member Added Yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

@endsection

