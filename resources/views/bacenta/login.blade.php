<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200 relative overflow-hidden">
    
    <!-- Background Design Elements -->
    <div class="absolute inset-0 bg-gray-200 flex items-center justify-center">
        <div class="absolute top-16 left-16 w-16 h-16 bg-white rounded-full shadow-md"></div>
        <div class="absolute bottom-16 right-16 w-20 h-20 bg-white rounded-full shadow-md"></div>
    </div>
    
    <!-- Main Card -->
    <div class="bg-white shadow-lg rounded-lg flex flex-col md:flex-row max-w-xl w-full relative z-10 overflow-hidden">
        
        <!-- Left Section (Form) -->
        <div class="w-full md:w-1/2 lg:w-[60%] p-10"> <!-- Adjusted width here for a wider form section -->
            <h2 class="text-2xl font-bold text-center mb-6">Login to Your Account</h2>
            <form method="POST" action="{{ route('bacenta.login') }}">
                @csrf
                <div class="mb-4">
                    <input type="text" name="username" placeholder="Enter Email" required
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
        <div class="w-full md:w-1/2 lg:w-[40%] bg-red-600 flex justify-center items-center p-5 relative rounded-tl-[50px] overflow-hidden">
            <div class="absolute top-10 left-10 w-12 h-12 bg-white rounded-full"></div>
            <img src="/build/assets/image/login-image.png" alt="Login Image"
                class="w-full h-full object-cover rounded-tr-[50px]">
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="absolute bottom-4 text-gray-600 text-sm text-center w-full">
        © {{ date('Y') }} First Love Church. All Rights Reserved.
    </footer>
</body>
</html>
