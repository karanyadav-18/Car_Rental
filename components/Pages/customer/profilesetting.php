<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 flex space-x-6">

        <!-- Content Area -->
        <div class="w-3/4 p-6">
            <div id="profile-section">
                <h1 class="text-2xl font-semibold">Profile Settings</h1>
                <div class="bg-white p-6 mt-4 rounded-lg shadow-lg">
                    <label class="block text-gray-700">Full Name</label>
                    <input type="text" class="w-full p-2 border rounded-lg mt-1" value="John Doe">

                    <label class="block text-gray-700 mt-4">Email</label>
                    <input type="email" class="w-full p-2 border rounded-lg mt-1" value="john.doe@example.com">

                    <label class="block text-gray-700 mt-4">Phone</label>
                    <input type="text" class="w-full p-2 border rounded-lg mt-1" value="+1 (555) 123-4567">

                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-4">Save Changes</button>
                </div>
            </div>

            <div id="payment-section" class="hidden">
                <h1 class="text-2xl font-semibold">Payment Methods</h1>
                <div class="bg-white p-6 mt-4 rounded-lg shadow-lg">
                    <div class="p-4 border rounded-lg flex justify-between items-center">
                        <span>💳 **** **** **** 4242</span>
                        <a href="#" class="text-blue-600">Edit</a>
                    </div>
                    <div class="mt-4 p-4 border-dashed border-2 text-center text-gray-500 rounded-lg cursor-pointer">
                        + Add New Payment Method
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function showSection(section) {
            document.getElementById("profile-section").classList.add("hidden");
            document.getElementById("payment-section").classList.add("hidden");

            if (section === "profile") {
                document.getElementById("profile-section").classList.remove("hidden");
            } else if (section === "payment") {
                document.getElementById("payment-section").classList.remove("hidden");
            }
        }
    </script>

</body>
</html>