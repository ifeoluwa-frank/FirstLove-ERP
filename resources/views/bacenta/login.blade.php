{{-- <form method="POST" action="{{ route('bacenta.login') }}">
    @csrf
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form> --}}

<div class="flex min-h-screen items-center justify-center bg-gray-200 relative overflow-hidden">
    <!-- Background Design Elements -->
    <div class="absolute inset-0 bg-gray-200">
        <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full shadow-md"></div>
        <div class="absolute bottom-10 right-10 w-24 h-24 bg-white rounded-full shadow-md"></div>
    </div>

    <!-- Main Card -->
    <div class="bg-white shadow-lg rounded-lg flex max-w-4xl w-full relative z-10">
        
        <!-- Left Section (Form) -->
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold text-center mb-6">Login to Your Account</h2>

            <form method="POST" action="{{ route('bacenta.login') }}">
                @csrf
                <div class="mb-4">
                    <input type="email" name="email" placeholder="Enter Email" required
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <div class="mb-6">
                    <input type="password" name="password" placeholder="Enter Password" required
                        class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                </div>
                <button type="submit"
                    class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition">
                    Login
                </button>
            </form>
        </div>

        <!-- Right Section (Image) -->
        <div class="w-1/2 bg-red-600 relative flex justify-center items-center">
            <div class="absolute top-10 left-10 w-12 h-12 bg-white rounded-full"></div>
            <img src="{{ asset('path/to/your/image.jpg') }}" alt="Login Image"
                class="w-full h-auto rounded-lg shadow-lg">
        </div>
    </div>

    <!-- Footer -->
    <footer class="absolute bottom-4 text-gray-600 text-sm">
        © {{ date('Y') }} Your Church Name. All Rights Reserved.
    </footer>
</div>
