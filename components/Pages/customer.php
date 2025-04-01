<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="customer/script.js"></script>  <!-- Include AJAX Script -->
</head>
<body class="bg-gray-100">

    <?php include '../common/navbar.php'; ?>

    <div class="container mx-auto p-4 flex space-x-6">
        
        <!-- Sidebar -->
        <?php include 'customer/SidebarCustomer.php'; ?>

        <!-- Main Content -->
        <div class="w-3/4 bg-white rounded-lg shadow-lg p-6 border" id="main-content">
            <h2 class="text-xl font-semibold mb-4">My Bookings</h2>
            <?php include 'customer/myBooking.php'; ?>  <!-- Default Content -->
        </div>

    </div>

</body>
</html>