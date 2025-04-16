<!-- Profile Settings Section (TailwindCSS Form) -->
<div class="container mx-auto p-4 mt-6">
    <div id="profile-section" class="bg-white p-6 rounded-lg shadow-lg hidden">
        <h2 class="text-2xl font-semibold mb-4">Profile Settings</h2>
        <form action="update_profile.php" method="POST">
            <!-- Name Input -->
            <div class="mb-4">
                <label class="block text-gray-700">Full Name</label>
                <input type="text" name="name" value="John Doe" class="w-full p-3 border rounded-lg mt-2" required>
            </div>
            <!-- Email Input -->
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="john.doe@example.com" class="w-full p-3 border rounded-lg mt-2" required>
            </div>
            <!-- Phone Input -->
            <div class="mb-4">
                <label class="block text-gray-700">Phone</label>
                <input type="text" name="phone" value="+1 (555) 123-4567" class="w-full p-3 border rounded-lg mt-2" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg mt-4">Save Changes</button>
        </form>
    </div>

    <!-- Change Password Section -->
    <div id="password-section" class="bg-white p-6 rounded-lg shadow-lg hidden">
        <h2 class="text-2xl font-semibold mb-4">Change Password</h2>
        <form action="update_password.php" method="POST">
            <!-- Current Password -->
            <div class="mb-4">
                <label class="block text-gray-700">Current Password</label>
                <input type="password" name="current_password" class="w-full p-3 border rounded-lg mt-2" required>
            </div>
            <!-- New Password -->
            <div class="mb-4">
                <label class="block text-gray-700">New Password</label>
                <input type="password" name="new_password" class="w-full p-3 border rounded-lg mt-2" required>
            </div>
            <!-- Confirm New Password -->
            <div class="mb-4">
                <label class="block text-gray-700">Confirm New Password</label>
                <input type="password" name="confirm_password" class="w-full p-3 border rounded-lg mt-2" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg mt-4">Change Password</button>
        </form>
    </div>
</div>
