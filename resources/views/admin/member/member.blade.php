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

    <div id="app">
        <section class="is-title-bar">
            <div
              class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0"
            >
              <ul>
                <li>Admin</li>
                <li>{{ $pageTitle }}</li>
              </ul>
            </div>
        </section>
        <section class="section main-section">
            @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold"></h1>
                <!-- Add New Bacenta Button -->
                <a href="{{ route('member.create') }}"
                  style="background-color: #0ca678; color: #fff; padding: 8px 16px; border-radius: 6px; display: inline-block; text-decoration: none;"
                  onmouseover="this.style.backgroundColor='#087f5b'"
                  onmouseout="this.style.backgroundColor='#0ca678'">
                  + Add New Member
                </a>
            </div>
            
        <div class="card has-table">
            <header class="card-header">
              <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Members
              </p>
              
            </header>
            <div class="card-content">
              <table>
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>School</th>
                    <th>Fellowship</th>
                    <th>Ministry</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                  <tr>
                    <td data-label="Serial">{{ __($loop->index + $members->firstItem()) }}</td>
                    <td data-label="Name">{{ $member->first_name }} {{ $member->last_name }}</td>
                    <td data-label="Phone">{{ $member->phone }}</td>
                    <td data-label="Phone">{{ $member->school }}</td>
                    <td data-label="Location">{{ $member->bacenta->bacenta_name }}</td>
                    <td data-label="Sonta">{{ $member->fellowship->name ?? " "}}</td>
                    <td class="">
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
                        <td colspan="100%">No Members Added Yet</td>
                    </tr>
                @endforelse
                
                </tbody>
              </table>
              {{-- <div class="table-pagination">
                <div class="flex items-center justify-between">
                  <div class="buttons">
                    <button type="button" class="button active">1</button>
                    <button type="button" class="button">2</button>
                    <button type="button" class="button">3</button>
                  </div>
                  <small>Page 1 of 3</small>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
        </section>
    </div>

@endsection

