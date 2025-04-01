<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <?php include '../common/navbar.php' ?>
    <!-- Main Content -->
    <div class="flex p-6">
        <!-- Available Cars Section -->
        <div class="flex-1">
            <h2 class="text-2xl font-semibold mb-4">Available Cars</h2>
            
            <div class="bg-white p-4 rounded-lg shadow flex items-center mb-4">
                <img src="../images/car1.jpg" alt="Tesla Model 3" class="w-40 h-24 rounded-lg">
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-semibold">Tesla Model 3</h3>
                    <p class="text-gray-500">Electric</p>
                    <p class="text-gray-500 flex items-center">&#128101; 5 seats</p>
                </div>
                <p class="text-blue-600 font-bold text-lg">$89/day</p>
            </div>

            <div class="bg-white p-4 rounded-lg shadow flex items-center mb-4">
                <img src="../images/car2.jpeg" alt="BMW X5" class="w-40 h-24 rounded-lg">
                <div class="ml-4 flex-1">
                    <h3 class="text-lg font-semibold">BMW X5</h3>
                    <p class="text-gray-500">SUV</p>
                    <p class="text-gray-500 flex items-center">&#128101; 7 seats</p>
                </div>
                <p class="text-blue-600 font-bold text-lg">$129/day</p>
            </div>
        </div>
        
        <!-- Book Your Car Card -->
        <div class="w-1/3 ml-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold mb-4">Book Your Car</h2>
                <label class="block mb-2 text-gray-700">Location</label>
                <input type="text" placeholder="Enter pickup location" class="w-full border p-2 rounded mb-4">
                <label class="block mb-2 text-gray-700">Pickup Date</label>
                <input type="date" class="w-full border p-2 rounded mb-4">
                <label class="block mb-2 text-gray-700">Return Date</label>
                <input type="date" class="w-full border p-2 rounded mb-4">
                <button class="w-full bg-blue-600 text-white py-2 rounded">Book Now</button>
            </div>
        </div>
    </div>
</body>
</html>
<!-- <?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "car_rental";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Fetch bookings
// $sql = "SELECT * FROM bookings WHERE user_id = 1";  // Assuming user ID is 1 for now
// $result = $conn->query($sql);

// $bookings = [];
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         $bookings[] = $row;
//     }
// }

// $conn->close();
?>
 -->