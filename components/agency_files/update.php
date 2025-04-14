<?php
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

include("../inc/connect.php");

if (isset($_POST['edit_id2'])) {
    $edit_id = $_POST["edit_id2"];
    $model = mysqli_real_escape_string($conn, $_POST["model"]);
    $number_plate = mysqli_real_escape_string($conn, $_POST["number_plate"]);
    $seats = mysqli_real_escape_string($conn, $_POST["seats"]);
    $rent = mysqli_real_escape_string($conn, $_POST["rent"]);
    $sql2 = "UPDATE cars SET model='$model', car_number='$number_plate', seats='$seats', rent='$rent' WHERE id=$edit_id";

    $qry2 = mysqli_query($conn, $sql2);
    if ($qry2) {

        header('location:available.php');
    }
}