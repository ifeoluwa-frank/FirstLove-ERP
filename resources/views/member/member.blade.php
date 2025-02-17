@extends('layouts.app')
<style>
    .svg_details {
        width: 18px;
        height: 18px;;
    }
</style>
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
                            <td class="p-2 border border-gray-300">{{ $member->bacenta->bacenta_name }}</td>
                            <td class="p-2 border border-gray-300">{{ $member->ministry->name}}</td>
                            <td class="p-2 border border-gray-300 text-center">
                                <a href="{{ route('member.details', ['id' => $member->id]) }}" class="text-blue-600">
                                    <div class="border border-blue-600 rounded-md flex align-center justify-center gap-2 hover:text-white hover:bg-blue-700 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="svg_details">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125Z" />
                                          </svg>                                      
                                        <span>Details</span> 
                                    </div>                                               
                                </a>
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

