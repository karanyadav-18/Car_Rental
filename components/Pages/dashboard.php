<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$loggedIn = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<!-- Wrap sidebar and content in a flex container -->
<div class="flex min-h-screen">

    <!-- Sidebar -->
    <?php include 'components/common/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 p-6">

        <!-- Search Bar -->
        <div class="flex items-center justify-between mb-6">
            <input type="text" placeholder="Search for cars..." class="p-3 w-80 border rounded-lg shadow-sm">
            <div class="flex items-center space-x-4">
                <!-- User Section -->
                <div class="flex items-center space-x-4">
                    <?php if ($loggedIn): ?>
                        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="w-8 rounded-full bg-gray-300 p-1" />
                    <?php else: ?>
                        <a href="components/Authentication/login.php" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md shadow-md transition duration-300">Login</a>
                        <a href="components/Authentication/signup.php" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md shadow-md transition duration-300">Sign Up</a>
                    <?php endif; ?>
                </div>
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
                <img src="./components/images/car1.jpg" class="rounded-lg w-full h-48 object-cover">
                <h3 class="text-lg font-bold mt-3">Tesla Model 3</h3>
                <p class="text-gray-600 text-sm">🚗 5 seats 📍 New York</p>
                <p class="text-xl font-bold mt-2">$89/day</p>
                <a href="<?php echo $loggedIn ? 'components/Pages/booking.php' : 'components/Authentication/login.php'; ?>" 
                   class="block w-full bg-blue-600 hover:bg-blue-700 text-white py-2 mt-3 rounded-lg text-center">
                   Rent Now
                </a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="./components/images/car2.jpeg" class="rounded-lg w-full h-48 object-cover">
                <h3 class="text-lg font-bold mt-3">BMW X5</h3>
                <p class="text-gray-600 text-sm">🚗 7 seats 📍 Los Angeles</p>
                <p class="text-xl font-bold mt-2">$120/day</p>
                <a href="<?php echo $loggedIn ? 'components/Pages/booking.php' : 'components/Authentication/login.php'; ?>" 
                   class="block w-full bg-blue-600 hover:bg-blue-700 text-white py-2 mt-3 rounded-lg text-center">
                   Rent Now
                </a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <img src="./components/images/car3.jpeg" class="rounded-lg w-full h-48 object-cover">
                <h3 class="text-lg font-bold mt-3">Mercedes C-Class</h3>
                <p class="text-gray-600 text-sm">🚗 5 seats 📍 Chicago</p>
                <p class="text-xl font-bold mt-2">$95/day</p>
                <a href="<?php echo $loggedIn ? 'components/Pages/booking.php' : 'components/Authentication/login.php'; ?>" 
                   class="block w-full bg-blue-600 hover:bg-blue-700 text-white py-2 mt-3 rounded-lg text-center">
                   Rent Now
                </a>
            </div>
        </div>

    </div>
</div>

</body>
</html>
