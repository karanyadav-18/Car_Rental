<?php
session_start();
include("../common/connect.php");

if (isset($_POST['submit'])) {
  $email = trim(strtolower($_POST['email']));
  $password = trim($_POST['password']);

  $sql = "SELECT * FROM customer WHERE LOWER(email_id) = '$email' AND password = '$password'";
  $qry = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($qry);

  if ($row) {
    $_SESSION['name'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['user'] = true;
    header('location:../../index.php');
    exit();
  } else {
    header('location:../../index.php?error=1');
    exit();
  }
}
?>
