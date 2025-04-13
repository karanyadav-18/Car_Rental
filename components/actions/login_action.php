<?php
session_start();
ini_set('display_errors', 0);
ini_set('log_errors', 0);
error_reporting(E_ALL);

include("../common/connect.php");

if (isset($_POST['submit'])) {
  $userId = $_POST['email'];
  $password = $_POST['password'];

  $sql = "select * from customer where email_id='$userId' and password='$password'";
  $qry = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($qry);
  if ($row) {
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    header('location:../index.php');
  } else {
    header('location:../index.php?message=Invalid Username Or Password');
  }
}
?>
