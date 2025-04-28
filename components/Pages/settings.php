<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental - Settings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <main class="flex-1 p-6 ml-64">
        <?php include '../common/sidebar.php'; ?>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Profile Settings</h2>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center text-gray-500 text-2xl">&#128100;</div>
                    <div class="flex-1 grid grid-cols-2 gap-4">
                        <input type="text" class="border p-2 rounded w-full" placeholder="First Name" value="John">
                        <input type="text" class="border p-2 rounded w-full" placeholder="Last Name" value="Doe">
                        <input type="email" class="border p-2 rounded w-full" placeholder="Email" value="john.doe@example.com">
                        <input type="text" class="border p-2 rounded w-full" placeholder="Phone" value="+1 (555) 123-4567">
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow mt-4">
                <h2 class="text-xl font-semibold mb-4">Notification Settings</h2>
                <div class="flex justify-between items-center mb-4">
                    <span>Email Notifications</span>
                    <label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                </div>
                <div class="flex justify-between items-center">
                    <span>SMS Notifications</span>
                    <label class="switch"><input type="checkbox"><span class="slider round"></span></label>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow mt-4">
                <h2 class="text-xl font-semibold mb-4">System Settings</h2>
                <div class="flex justify-between items-center mb-4">
                    <span>Dark Mode</span>
                    <label class="switch"><input type="checkbox"><span class="slider round"></span></label>
                </div>
                <div class="flex justify-between items-center">
                    <span>Language</span>
                    <select class="border p-2 rounded">
                        <option>English</option>
                        <option>Spanish</option>
                    </select>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow mt-4">
                <h2 class="text-xl font-semibold mb-4">Payment Settings</h2>
                <div class="flex justify-between items-center mb-4">
                    <span>Payment Methods</span>
                    <a href="#" class="text-blue-600">Manage</a>
                </div>
                <div class="flex justify-between items-center">
                    <span>Security Settings</span>
                    <a href="#" class="text-blue-600">Configure</a>
                </div>
            </div>
            
            <div class="mt-8 flex justify-end gap-4">
                <button class="px-4 py-2 bg-gray-200 rounded">Cancel</button>
                <button class="px-4 py-2 bg-blue-600 text-white rounded">Save Changes</button>
            </div>
        </main>
    </div>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 34px;
            height: 20px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #4a90e2;
        }
        input:checked + .slider:before {
            transform: translateX(14px);
        }
    </style>
</body>
</html>
