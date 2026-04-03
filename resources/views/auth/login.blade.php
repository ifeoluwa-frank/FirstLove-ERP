@extends('layouts.landing')

@section('content')
<div class="relative w-full h-screen overflow-hidden bg-gray-900">

    <!-- Artistic Collage Background -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/church1.jpg') }}" 
             class="absolute top-0 left-0 w-1/3 h-1/2 object-cover transform animate-slowZoom opacity-70">
        <img src="{{ asset('images/church2.jpg') }}" 
             class="absolute top-1/4 left-1/3 w-1/3 h-2/3 object-cover transform animate-slowZoom opacity-70 delay-2000">
        <img src="{{ asset('images/church3.jpg') }}" 
             class="absolute top-1/2 left-2/3 w-1/3 h-1/2 object-cover transform animate-slowZoom opacity-70 delay-4000">
        <img src="{{ asset('images/church4.jpg') }}" 
             class="absolute top-1/4 left-1/3 w-1/3 h-2/3 object-cover transform animate-slowZoom opacity-70 delay-6000">
        <img src="{{ asset('images/church5.jpg') }}" 
             class="absolute top-1/2 left-2/3 w-1/3 h-1/2 object-cover transform animate-slowZoom opacity-70 delay-8000">
    </div>

    <!-- Black Frosted Glass Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm"></div>

    <!-- Login Card -->
    <div class="relative z-10 flex items-center justify-center h-full px-4">
        <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl p-10 w-full max-w-md border border-white/20 hover:scale-105 transition-transform duration-300">

            <!-- Logo and Title -->
            <div class="flex flex-col items-center mb-6 text-center animate-fadeInUp">
                <div class="bg-white/20 backdrop-blur-md p-3 rounded-full shadow-lg">
                    <img src="{{ asset('images/login_logo.png') }}" 
                         alt="First Love Arusha Logo" 
                         class="w-20 h-20 drop-shadow-md">
                </div>
                <h1 class="text-2xl font-semibold text-white mt-3">First Love Arusha</h1>
                <p class="text-sm text-gray-300">Welcome back Admin! Please log in to continue</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-200 mb-2">Email Address</label>
                    <input type="email" name="email" required 
                           class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:ring-2 focus:ring-green-400 outline-none"
                           placeholder="Enter your email">
                </div>

                <!-- Password -->
                <div class="mb-6">
                    <label class="block text-gray-200 mb-2">Password</label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-2 rounded-lg bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:ring-2 focus:ring-green-400 outline-none"
                           placeholder="Enter your password">
                </div>

                <!-- Login Button -->
                <button type="submit" 
                        class="w-full py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-300">
                    Login
                </button>

                <!-- Optional Links -->
                <div class="text-center mt-4 space-y-2">
                    <a href="{{ route('register') }}" class="block text-sm text-gray-300 hover:text-green-400">
                        Create an account
                    </a>
                    <a href="{{ url('/') }}" class="block text-sm text-gray-300 hover:text-green-400">
                        ← Back to Home
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Animations & slow zoom -->
<style>
@keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
.animate-fadeInUp { animation: fadeInUp 1s ease forwards; }

@keyframes slowZoom { 0% { transform: scale(1); } 50% { transform: scale(1.05); } 100% { transform: scale(1); } }
.animate-slowZoom { animation: slowZoom 20s ease-in-out infinite alternate; }
.delay-2000 { animation-delay: 2s; }
.delay-4000 { animation-delay: 4s; }
.delay-6000 { animation-delay: 6s; }
.delay-8000 { animation-delay: 8s; }
</style>
@endsection
