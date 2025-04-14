<?php
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

session_start();
include("../inc/connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../include/custom.css" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Agency Dashboard</title>
</head>

<body>
    <div class="sticky">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Car Rental Agency</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php 
                        if ($_SESSION['name']) {
                            $name = $_SESSION['name'];
                            $sqla = "SELECT name from agencies WHERE name = '$name'";
                            $cat = mysqli_query($conn, $sqla);
                            if ($cat) {
                                while ($rows = mysqli_fetch_assoc($cat)) {
                                    echo "<li class='nav-item dropdown1'>
                                            <a class='nav-link'>
                                                <i class='bi bi-person-circle'></i>
                                            </a>
                                            <div class='dropdown-content'>
                                                <div><a class='nav-link'>HELLO, " . $rows['name'] . "</a></div>
                                                <div><a href='logout.php'>Logout</a></div>
                                            </div>
                                          </li>";
                                }
                            }
                        } 
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="available.php">Add Cars</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>
