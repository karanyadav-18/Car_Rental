<?php
// Include database connection file
include('../common/connect.php');
session_start();

// Initialize variables to hold car details
$car_id = $car_model = $car_image = $car_rent = $location = $start_date = $number_of_days = $total_price = "";

// Check if booking details are available in session
if (isset($_SESSION['booking_details'])) {
    // Retrieve booking details from session
    $booking_details = $_SESSION['booking_details'];
    $car_id = $booking_details['car_id'];
    $car_model = $booking_details['car_model'];
    $car_image = $booking_details['car_image'];
    $car_rent = $booking_details['car_rent'];
    $location = $booking_details['location'];
    $start_date = $booking_details['start_date'];
    $number_of_days = $booking_details['number_of_days'];
    $total_price = $booking_details['total_price'];

    // Generate a unique booking number
    $booking_number = "BK" . str_pad(rand(0, 9999), 4, "0", STR_PAD_LEFT);
} else {
    die('Booking details not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <?php include '../common/navbar.php'; ?>

    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <!-- Confirmation Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7"></path></svg>
                </div>
                <h1 class="text-3xl font-semibold text-gray-800 mb-2">Booking Confirmed!</h1>
                <p class="text-gray-600">Thank you for your booking. Your reservation has been confirmed.</p>
            </div>

            <!-- Booking Details -->
            <div class="mb-6">
                <div class="flex justify-between mb-6 border-b border-gray-200 pb-6">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Booking Number</p>
                        <p class="text-xl font-bold text-gray-800"><?php echo $booking_number; ?></p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Status</p>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            Confirmed
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Booking Details</h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-800 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18V3H3z" /></svg>
                                <div>
                                    <p class="font-medium text-gray-700">Pick-up Date</p>
                                    <p class="text-gray-600"><?php echo date('l, F j, Y', strtotime($start_date)); ?></p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-800 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18V3H3z" /></svg>
                                <div>
                                    <p class="font-medium text-gray-700">Return Date</p>
                                    <p class="text-gray-600"><?php echo date('l, F j, Y', strtotime($start_date . ' + ' . $number_of_days . ' days')); ?></p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-800 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18V3H3z" /></svg>
                                <div>
                                    <p class="font-medium text-gray-700">Location</p>
                                    <p class="text-gray-600"><?php echo $location; ?></p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Vehicle Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Vehicle Information</h3>
                        <div class="flex items-center mb-4">
                            <div class="w-20 h-20 bg-gray-100 rounded overflow-hidden mr-4">
                                <img src="../uploads/<?php echo $car_image; ?>" class="w-full h-full object-cover" alt="<?php echo $car_model; ?>" />
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800"><?php echo $car_model; ?></h4>
                                <p class="text-gray-600 text-sm"><?php echo $location; ?> • <?php echo date('Y', strtotime($start_date)); ?></p>
                            </div>
                        </div>

                        <ul class="space-y-2">
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7" /></svg>
                                <span>Seats: 4</span>
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7" /></svg>
                                <span>Fuel Type: Petrol</span>
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12l5 5L20 7" /></svg>
                                <span>Transmission: Manual</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="bg-gray-50 p-6 rounded-xl mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Payment Summary</h3>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Amount:</span>
                            <span class="font-semibold">₹<?php echo $total_price; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Payment Method:</span>
                            <span class="font-semibold">Credit Card</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Payment Status:</span>
                            <span class="text-green-600 font-semibold">Paid</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 mt-4">A confirmation email has been sent to your email address with all the details.</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 mt-8">
                    <a href="/" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold text-center">Return to Home</a>
                    <a href="/cars" class="w-full bg-gray-300 text-gray-700 py-3 rounded-lg font-semibold text-center">Browse More Cars</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
