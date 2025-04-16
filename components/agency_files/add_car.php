<?php
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);
include("../common/connect.php");
$agent_id = $_POST["agent_id"];
$model = mysqli_real_escape_string($conn, $_POST["model"]);
$number_plate = mysqli_real_escape_string($conn, $_POST["number_plate"]);
$seats = mysqli_real_escape_string($conn, $_POST["seats"]);
$rent = mysqli_real_escape_string($conn, $_POST["rent"]);

$filename = $_FILES["filetoupload"]["name"];
$tempname = $_FILES["filetoupload"]["tmp_name"];
$folder = "../uploads/" . $filename;
move_uploaded_file($tempname, $folder);

$sql = "insert into cars(agent_id, model, image, car_number, seats, rent) values ('$agent_id', '$model', '$filename', '$number_plate', '$seats', '$rent')";

$qry = mysqli_query($conn, $sql);
if ($qry) {
   header('location:dashboard.php');
}