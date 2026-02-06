<?php
session_start();
include("../common/connect.php");

if (isset($_POST['submit'])) {
    $email = trim(strtolower($_POST['email']));
    $password = trim($_POST['password']);

    // Escape values to prevent SQL injection (basic security)
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM customer WHERE LOWER(email_id) = '$email' AND password = '$password'";
    $qry = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($qry);

    if ($row) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['user'] = true;
        header('Location: ../../index.php');
        exit();
    } else {
        echo "<script>
                alert('Incorrect Email or Password!');
                window.history.back();
              </script>";
        exit();
    }
}
?>
