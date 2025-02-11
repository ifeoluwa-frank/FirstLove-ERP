<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <app-navbar></app-navbar>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5">
            <app-sidenav></app-sidenav>
        </div>

        <!-- Main Content -->
        <div class="w-4/5 p-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Add New Member</h2>
                
                <form action="('member.add')" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Picture</label>
                            <input type="file" name="picture" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <input type="date" name="dob" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">School</label>
                            <input type="text" name="school" class="w-full px-3 py-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="text" name="phone_number" class="w-full px-3 py-2 border rounded" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">WhatsApp Number</label>
                            <input type="text" name="whatsapp_number" class="w-full px-3 py-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Where They Live</label>
                            <input type="text" name="location" class="w-full px-3 py-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fellowship</label>
                            <select class="w-full px-3 py-2 border rounded" name="fellowship">
                                <option disabled selected value="">-- Select an Option --</option>
                                <option value="youth">ATC boys hostel 1</option>
                                <option value="women">ATC girls hostel 1</option>
                                <option value="men">Volcano College</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">When Did You Join the Church?</label>
                            <input type="date" name="join_date" class="w-full px-3 py-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">What Do You Do in Church?</label>
                            <select class="w-full px-3 py-2 border rounded" name="church_role">
                                <option disabled selected value="">-- Select an Option --</option>
                                <option value="choir">Choir</option>
                                <option value="usher">Usher</option>
                                <option value="media">Media Team</option>
                                <option value="dancing star">Dancing Star</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Do You Speak in Tongues?</label>
                            <select class="w-full px-3 py-2 border rounded" name="speak_tongues">
                                <option disabled selected value="">-- Select an Option --</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Are You Baptised?</label>
                            <select class="w-full px-3 py-2 border rounded" name="baptised">
                                <option disabled selected value="">-- Select an Option --</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Do You Have an NBS Certificate?</label>
                            <select class="w-full px-3 py-2 border rounded" name="nbs_certificate">
                                <option disabled selected value="">-- Select an Option --</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Visited</label>
                            <input type="date" name="last_visited" class="w-full px-3 py-2 border rounded">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4">
                        <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
