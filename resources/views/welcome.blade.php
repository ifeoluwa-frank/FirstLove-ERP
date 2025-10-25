@extends('layouts.landing')

@section('content')
<div class="relative w-full h-screen overflow-hidden bg-gray-900">

    <!-- Artistic Collage -->
    <div class="absolute inset-0">
        <img src="{{ asset('build/assets/image/church1.jpg') }}" 
             class="absolute top-0 left-0 w-1/3 h-1/2 object-cover transform animate-slowZoom" alt="Church 1">
        <img src="{{ asset('build/assets/image/church2.jpg') }}" 
             class="absolute top-1/4 left-1/3 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-2000" alt="Church 2">
        <img src="{{ asset('build/assets/image/church3.jpg') }}" 
             class="absolute bottom-0 right-0 w-1/3 h-1/2 object-cover transform animate-slowZoom delay-4000" alt="Church 3">
        <img src="{{ asset('build/assets/image/church4.jpg') }}" 
             class="absolute top-1/2 left-1/2 w-1/4 h-1/4 object-cover transform animate-slowZoom delay-6000" alt="Church 4">
        <img src="{{ asset('build/assets/image/church5.jpg') }}" 
             class="absolute top-0 right-1/4 w-1/5 h-1/3 object-cover transform animate-slowZoom delay-8000" alt="Church 5">
        <img src="{{ asset('build/assets/image/church6.jpg') }}" 
             class="absolute bottom-1/4 left-1/4 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-10000" alt="Church 6">
        <img src="{{ asset('build/assets/image/church7.jpg') }}" 
             class="absolute bottom-0 left-0 w-1/5 h-1/4 object-cover transform animate-slowZoom delay-12000" alt="Church 7">
        <img src="{{ asset('build/assets/image/church8.jpg') }}" 
             class="absolute top-1/3 right-0 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-14000" alt="Church 8">
        <img src="{{ asset('build/assets/image/church9.jpg') }}" 
             class="absolute top-1/2 left-0 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-16000" alt="Church 9">
        <img src="{{ asset('build/assets/image/church10.jpg') }}" 
             class="absolute bottom-0 right-1/3 w-1/5 h-1/4 object-cover transform animate-slowZoom delay-18000" alt="Church 10">
        <img src="{{ asset('build/assets/image/church11.jpg') }}" 
             class="absolute top-1/5 left-2/3 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-20000" alt="Church 11">
        <img src="{{ asset('build/assets/image/church12.jpg') }}" 
             class="absolute bottom-1/3 left-1/2 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-22000" alt="Church 12">
        <img src="{{ asset('build/assets/image/church13.jpg') }}" 
             class="absolute top-0 left-1/2 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-24000" alt="Church 13">
        <img src="{{ asset('build/assets/image/church14.jpg') }}" 
             class="absolute bottom-0 right-0 w-1/5 h-1/4 object-cover transform animate-slowZoom delay-26000" alt="Church 14">
    </div>

    <!-- Overlay Content -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center z-10 px-4">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-20 animate-fadeIn">
            <img src="{{ asset('build/assets/image/Logo1.png') }}" 
                alt="Church Logo" class="w-56 h-56 mb-0 object-contain mx-auto animate-bounceIn">
            <h1 class="text-5xl font-bold text-white drop-shadow-lg mb-4 animate-fadeInUp">First Love Arusha</h1>
            <p class="text-xl text-white drop-shadow-lg mb-8 animate-fadeInUp delay-150">We believe in Jesus, soul winning and working for the Lord all day long.</p>
            <div class="flex flex-wrap justify-center gap-4 animate-fadeInUp delay-300">
                <a href="{{ route('login') }}" 
                   class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 hover:scale-105 transition transform duration-300 shadow-lg">
                    Admin Login
                </a>
                <a href="{{ route('bacenta.login') }}" 
                   class="px-6 py-3 bg-green-600 text-white rounded hover:bg-green-700 hover:scale-105 transition transform duration-300 shadow-lg">
                    Bacenta Login
                </a>
            </div>
        </div>
    </div>

</div>

<style>
/* Fade & entrance animations */
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
@keyframes bounceIn { 0% { transform: scale(0.5); opacity: 0; } 60% { transform: scale(1.1); opacity: 1; } 80% { transform: scale(0.95); } 100% { transform: scale(1); } }
.animate-fadeIn { animation: fadeIn 1s ease forwards; }
.animate-fadeInUp { animation: fadeInUp 1s ease forwards; }
.animate-bounceIn { animation: bounceIn 1s ease forwards; }
.delay-150 { animation-delay: 0.15s; }
.delay-300 { animation-delay: 0.3s; }

/* Slow zoom/pan for collage images */
@keyframes slowZoom {
  0% { transform: scale(1) translate(0, 0); }
  50% { transform: scale(1.05) translate(10px, 10px); }
  100% { transform: scale(1) translate(0, 0); }
}
.animate-slowZoom {
  animation: slowZoom 20s ease-in-out infinite alternate;
}
.delay-2000 { animation-delay: 2s; }
.delay-4000 { animation-delay: 4s; }
.delay-6000 { animation-delay: 6s; }
.delay-8000 { animation-delay: 8s; }
.delay-10000 { animation-delay: 10s; }
.delay-12000 { animation-delay: 12s; }
.delay-14000 { animation-delay: 14s; }
.delay-16000 { animation-delay: 16s; }
.delay-18000 { animation-delay: 18s; }
.delay-20000 { animation-delay: 20s; }
.delay-22000 { animation-delay: 22s; }
.delay-24000 { animation-delay: 24s; }
.delay-26000 { animation-delay: 26s; }
</style>
@endsection
