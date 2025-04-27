<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

include("../common/connect.php");

$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$password = $_POST["pass"];

if (empty($name) || empty($email) || empty($number) || empty($password)) {
    echo "<script>alert('Please fill all fields!'); window.history.back();</script>";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Invalid email format!'); window.history.back();</script>";
    exit();
}

if (!preg_match('/^[0-9]{10}$/', $number)) {
    echo "<script>alert('Invalid phone number. It must be 10 digits!'); window.history.back();</script>";
    exit();
}

// $hashedPassword = $password;

$sql = "INSERT INTO customer(name, email_id, mobile, password) VALUES ('$name', '$email', '$number', '$password')";

$qry = mysqli_query($conn, $sql);

if ($qry) {
    echo "<script>alert('Registration Successful! Now You Can Login'); window.location.href='../Authentication/login.php';</script>";
} else {
    echo "<script>alert('Registration Failed. Please Try Again Later.'); window.history.back();</script>";
}
?>
