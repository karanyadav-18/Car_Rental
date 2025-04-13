<?php
if ($_SERVER['SERVER_NAME'] === 'localhost') {
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    error_reporting(E_ALL);
}

include("../inc/connect.php");

$car_id = isset($_POST["car_id"]) ? trim($_POST["car_id"]) : null;
$customer_id = isset($_POST["customer_id"]) ? trim($_POST["customer_id"]) : null;
$pickup = isset($_POST["pickup"]) ? trim($_POST["pickup"]) : null;
$drop = isset($_POST["drop"]) ? trim($_POST["drop"]) : null;
$start_date = isset($_POST["start_date"]) ? trim($_POST["start_date"]) : null;
$filter_config = isset($_POST["filter_config"]) ? trim($_POST["filter_config"]) : null;

$errors = [];
if (empty($car_id)) {
    $errors[] = "Car ID is required.";
}
if (empty($customer_id)) {
    $errors[] = "Customer ID is required.";
}
if (empty($pickup)) {
    $errors[] = "Pickup location is required.";
}
if (empty($drop)) {
    $errors[] = "Drop location is required.";
}
if (empty($start_date)) {
    $errors[] = "Start date is required.";
}
if (empty($filter_config)) {
    $errors[] = "Number of days is required.";
}

if (!empty($errors)) {
    echo "<script>";
    foreach ($errors as $error) {
        echo "alert('$error');";
    }
    echo "window.history.back();";
    echo "</script>";
    exit();
}

$stmt = $conn->prepare("INSERT INTO booked_car (customer_id, car_id, pickup, dropl, date, no_of_days) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("iisssi", $customer_id, $car_id, $pickup, $drop, $start_date, $filter_config);

    if ($stmt->execute()) {
        echo "<script>
                alert('Thank you. Your car has been booked.');
                window.location.href = '../index.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: Unable to book the car. Please try again later.');
                window.history.back();
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('Error: Unable to process your request.');
            window.history.back();
          </script>";
}

$conn->close();
?>
