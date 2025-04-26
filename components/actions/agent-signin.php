<?php
session_start();

ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

include("../common/connect.php");

if (isset($_POST['submit'])) {
    $userId = mysqli_real_escape_string($conn, $_POST['admin_email']);
    $password = mysqli_real_escape_string($conn, $_POST['admin_pass']);

    $sql = "SELECT * FROM agencies WHERE email_id='$userId'";
    $qry = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($qry);

    if ($row) {
        if ($row['password'] === $password) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['company'] = $row['company'];
            echo "<script>window.location = '../agency_files/dashboard.php';</script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password.'); window.location = '../Pages/agent_login.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Incorrect email address.'); window.location = '../Pages/agent_login.php';</script>";
        exit();
    }
}
?>
