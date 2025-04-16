<?php
include("../common/connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);

    // Delete the car from the database
    $query = "DELETE FROM cars WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php?msg=deleted");
        exit();
    } else {
        echo "Error deleting car: " . mysqli_error($conn);
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>
