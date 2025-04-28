<?php
// Include database connection file
include('../common/connect.php');
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure that the customer is logged in (session should be active)
    if (!isset($_SESSION['id'])) {
        die('You must be logged in to make a payment.');
    }

    // Get form data
    $car_id = intval($_POST['car_id']);
    $car_model = $_POST['car_model'];
    $car_image = $_POST['car_image'];
    $car_rent = $_POST['car_rent'];
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $number_of_days = intval($_POST['number_of_days']);
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $cardholder_name = $_POST['cardholder_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    // Get the logged-in customer's ID
    $customer_id = $_SESSION['id'];

    // Calculate total price
    $total_price = $car_rent * $number_of_days;

    // Insert booking details into the 'booked_car' table
    $stmt1 = $conn->prepare("INSERT INTO booked_car (customer_id, car_id, pickup, dropl, date, no_of_days) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt1) {
        die("Error preparing booking query: " . $conn->error);
    }
    $stmt1->bind_param("iisssi", $customer_id, $car_id, $start_date, $location, $start_date, $number_of_days);
    if (!$stmt1->execute()) {
        die("Error executing booking query: " . $stmt1->error);
    }
    $booking_id = $stmt1->insert_id; // Get the inserted booking ID

    // Close the statement
    $stmt1->close();

    // Store the booking details in session to use on booking.php
    $_SESSION['booking_details'] = [
        'car_id' => $car_id,
        'car_model' => $car_model,
        'car_image' => $car_image,
        'car_rent' => $car_rent,
        'location' => $location,
        'start_date' => $start_date,
        'number_of_days' => $number_of_days,
        'total_price' => $total_price,
    ];

    // Redirect to booking page
    header("Location: ../Pages/booking.php");
    exit;
} else {
    echo "Invalid request method.";
}
?>
