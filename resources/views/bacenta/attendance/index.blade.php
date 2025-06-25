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
    </div>

@endsection

