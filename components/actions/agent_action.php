<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

include("../common/connect.php");

$name1 = $_POST["name1"];
$name2 = $_POST["name2"];
$email = $_POST["email"];
$number = $_POST["number"];
$gst = $_POST["gst"];
$password = $_POST["password"];

$sql = "insert into agencies(company, name, email_id, mobile, password, gst) values ('$name1', '$name2', '$email', '$number', '$password', '$gst')";
$qry = mysqli_query($conn, $sql);
if ($qry) {
    header('location:../agent_login.php?message=Registration Successful! Now You Can Login');
} else {
    header('location:../agent_login.php?message=Registration Failed. Please Try Again Later.');
}
?>
