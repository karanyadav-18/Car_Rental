<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Sidebar -->
    <div class="flex">
        <aside class="w-64 bg-white h-screen p-5 shadow-lg">
            <div class="flex items-center space-x-2 text-xl font-bold">
                <img src="logo.png" class="w-8" />
                <span>CarRental</span>
            </div>
            <nav class="mt-10">
                <a href="#" class="flex items-center p-3 text-blue-600 bg-gray-100 rounded-lg">
                    <img src="https://cdn-icons-png.flaticon.com/512/9292/9292669.png" class="w-5 mr-2">
                    Dashboard
                </a>
                <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg mt-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="w-5 mr-2">
                    Bookings
                </a>
                <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg mt-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="w-5 mr-2">
                    Customers
                </a>
                <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg mt-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" class="w-5 mr-2">
                    Payments
                </a>
                <a href="#" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg mt-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/2099/2099058.png" class="w-5 mr-2">
                    Settings
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Search Bar -->
            <div class="flex items-center justify-between mb-6">
                <input type="text" placeholder="Search for cars..." class="p-3 w-80 border rounded-lg shadow-sm">
                <div class="flex items-center space-x-4">
                    <img src="https://cdn-icons-png.flaticon.com/512/3602/3602123.png" class="w-6">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="w-8 rounded-full bg-gray-300 p-1">
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="flex items-center space-x-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/2972/2972185.png" class="w-6">
                        <span class="text-gray-600">Total Cars</span>
                    </div>
                    <h2 class="text-2xl font-bold mt-2">124</h2>
                </div>
                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="flex items-center space-x-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/8093/8093779.png" class="w-6">
                        <span class="text-gray-600">Active Rentals</span>
                    </div>
                    <h2 class="text-2xl font-bold mt-2">64</h2>
                </div>
                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="flex items-center space-x-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/1041/1041893.png" class="w-6">
                        <span class="text-gray-600">Monthly Revenue</span>
                    </div>
                    <h2 class="text-2xl font-bold mt-2">$28,950</h2>
                </div>
                <div class="bg-white p-5 rounded-lg shadow">
                    <div class="flex items-center space-x-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/2838/2838912.png" class="w-6">
                        <span class="text-gray-600">Pending Returns</span>
                    </div>
                    <h2 class="text-2xl font-bold mt-2">12</h2>
                </div>
            </div>

            <!-- Available Cars Section -->
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Available Cars</h2>
                <button class="bg-gray-200 p-2 rounded-lg">Filter</button>
            </div>

            <!-- Cars Grid -->
            <div class="grid grid-cols-3 gap-6 mt-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="images/car1.jpg" class="rounded-lg">
                    <h3 class="text-lg font-bold mt-3">Tesla Model 3</h3>
                    <p class="text-gray-600 text-sm">🚗 5 seats 📍 New York</p>
                    <p class="text-xl font-bold mt-2">$89/day</p>
                    <button class="w-full bg-blue-600 text-white py-2 mt-3 rounded-lg">Rent Now</button>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="images/car2.jpeg" class="rounded-lg">
                    <h3 class="text-lg font-bold mt-3">BMW X5</h3>
                    <p class="text-gray-600 text-sm">🚗 7 seats 📍 Los Angeles</p>
                    <p class="text-xl font-bold mt-2">$120/day</p>
                    <button class="w-full bg-blue-600 text-white py-2 mt-3 rounded-lg">Rent Now</button>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <img src="images/car3.jpeg" class="rounded-lg">
                    <h3 class="text-lg font-bold mt-3">Mercedes C-Class</h3>
                    <p class="text-gray-600 text-sm">🚗 5 seats 📍 Chicago</p>
                    <p class="text-xl font-bold mt-2">$95/day</p>
                    <button class="w-full bg-blue-600 text-white py-2 mt-3 rounded-lg">Rent Now</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>