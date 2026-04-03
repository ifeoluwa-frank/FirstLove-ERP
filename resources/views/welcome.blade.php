@extends('layouts.landing')

@section('content')
<div class="relative w-full h-screen overflow-hidden bg-gray-900">

    <!-- Subtle Animated Light Gradient -->
    <div class="absolute inset-0 bg-gradient-to-tr from-yellow-500/10 via-pink-500/10 to-purple-600/10 animate-gradientMove"></div>

    <!-- Artistic Collage with 14 images -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/church1.jpg') }}" class="absolute top-0 left-0 w-1/3 h-1/2 object-cover transform animate-slowZoom" alt="Church 1">
        <img src="{{ asset('images/church2.jpg') }}" class="absolute top-1/4 left-1/3 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-2000" alt="Church 2">
        <img src="{{ asset('images/church3.jpg') }}" class="absolute bottom-0 right-0 w-1/3 h-1/2 object-cover transform animate-slowZoom delay-4000" alt="Church 3">
        <img src="{{ asset('images/church4.jpg') }}" class="absolute top-1/2 left-1/2 w-1/4 h-1/4 object-cover transform animate-slowZoom delay-6000" alt="Church 4">
        <img src="{{ asset('images/church5.jpg') }}" class="absolute top-0 right-1/4 w-1/5 h-1/3 object-cover transform animate-slowZoom delay-8000" alt="Church 5">
        <img src="{{ asset('images/church6.jpg') }}" class="absolute bottom-10 left-10 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-10000" alt="Church 6">
        <img src="{{ asset('images/church7.jpg') }}" class="absolute top-10 right-10 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-12000" alt="Church 7">
        <img src="{{ asset('images/church8.jpg') }}" class="absolute top-1/3 left-0 w-1/5 h-1/3 object-cover transform animate-slowZoom delay-14000" alt="Church 8">
        <img src="{{ asset('images/church9.jpg') }}" class="absolute bottom-1/4 right-1/3 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-16000" alt="Church 9">
        <img src="{{ asset('images/church10.jpg') }}" class="absolute top-1/3 right-1/2 w-1/5 h-1/3 object-cover transform animate-slowZoom delay-18000" alt="Church 10">
        <img src="{{ asset('images/church11.jpg') }}" class="absolute bottom-0 left-1/2 w-1/3 h-1/3 object-cover transform animate-slowZoom delay-20000" alt="Church 11">
        <img src="{{ asset('images/church12.jpg') }}" class="absolute top-1/4 right-0 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-22000" alt="Church 12">
        <img src="{{ asset('images/church13.jpg') }}" class="absolute bottom-1/3 left-1/3 w-1/5 h-1/4 object-cover transform animate-slowZoom delay-24000" alt="Church 13">
        <img src="{{ asset('images/church14.jpg') }}" class="absolute top-0 right-0 w-1/4 h-1/3 object-cover transform animate-slowZoom delay-26000" alt="Church 14">
    </div>

    <!-- Overlay Content -->
<div class="absolute inset-0 flex flex-col items-center justify-center text-center z-10 px-4">
    <!-- Background overlay stays -->
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>

    <div class="relative z-20 animate-fadeIn space-y-6 max-w-5xl mx-auto">
        <!-- Logo -->
        <img src="{{ asset('images/Logo1.png') }}" 
             alt="Church Logo" 
             class="w-40 sm:w-48 md:w-56 h-40 sm:h-48 md:h-56 mb-4 object-contain mx-auto animate-bounceIn drop-shadow-2xl">

        <!-- Main Heading -->
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white drop-shadow-3xl mb-4 animate-fadeInUp glow-text">
            First Love Arusha
        </h1>

        <!-- Description Paragraph -->
        <p class="text-lg sm:text-xl md:text-2xl font-light text-white leading-relaxed max-w-3xl mx-auto mb-8 animate-fadeInUp delay-150 drop-shadow-2xl">
            We believe in <span class="text-pink-400 font-semibold">Jesus</span>, 
            <span class="text-purple-300 font-semibold">soul winning</span>, 
            and <span class="text-blue-300 font-semibold">working</span> for the Lord all day long.
        </p>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fadeInUp delay-300">
            <a href="{{ route('login') }}" 
               class="px-6 py-2 sm:px-6 sm:py-2.5 bg-blue-600/50 backdrop-blur-sm text-white rounded-xl shadow-md hover:bg-blue-700 hover:scale-105 transition transform duration-300 text-sm sm:text-base font-semibold">
                Admin Login
            </a>
            <a href="{{ route('bacenta.login') }}" 
               class="px-6 py-2 sm:px-6 sm:py-2.5 bg-green-600/50 backdrop-blur-sm text-white rounded-xl shadow-md hover:bg-green-700 hover:scale-105 transition transform duration-300 text-sm sm:text-base font-semibold">
                Bacenta Login
            </a>
        </div>
    </div>
</div>



<style>
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
@keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
@keyframes bounceIn { 0% { transform: scale(0.5); opacity: 0; } 60% { transform: scale(1.1); opacity: 1; } 80% { transform: scale(0.95); } 100% { transform: scale(1); } }
.animate-fadeIn { animation: fadeIn 1s ease forwards; }
.animate-fadeInUp { animation: fadeInUp 1s ease forwards; }
.animate-bounceIn { animation: bounceIn 1s ease forwards; }
.delay-150 { animation-delay: 0.15s; }
.delay-300 { animation-delay: 0.3s; }

@keyframes slowZoom {
  0% { transform: scale(1) translate(0, 0); }
  50% { transform: scale(1.05) translate(10px, 10px); }
  100% { transform: scale(1) translate(0, 0); }
}
.animate-slowZoom { animation: slowZoom 20s ease-in-out infinite alternate; }
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

@keyframes gradientMove {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
.animate-gradientMove {
  background-size: 200% 200%;
  animation: gradientMove 15s ease infinite;
}

.glow-text, img {
  filter: drop-shadow(0 0 10px rgba(255,255,255,0.3));
}
a:hover {
    transform: scale(1.08);
    box-shadow: 0 10px 20px rgba(0,0,0,0.4);
}
h1 { text-shadow: 0 2px 6px rgba(0,0,0,0.6); }
</style>
@endsection
