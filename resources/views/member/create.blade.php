<!-- Modal (Hidden by Default) -->
<div id="modal" class="modal fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-3xl p-6">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b pb-4">
            <h2 class="text-xl font-semibold">Add New Member</h2>
            <button onclick="closeModal('modal')" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>

        <!-- Modal Body -->
        <div class="p-4">
            <form action="member.add" method="POST" enctype="multipart/form-data">
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
                            <option value="youth">Youth Fellowship</option>
                            <option value="women">Women’s Fellowship</option>
                            <option value="men">Men’s Fellowship</option>
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
                            <option value="teacher">Sunday School Teacher</option>
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
                <div class="text-right mt-4">
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
