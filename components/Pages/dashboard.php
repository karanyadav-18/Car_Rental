<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$loggedIn = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<div class="min-h-screen">
<?php include 'components/common/sidebar.php'; ?>
    
    <?php include 'dashboard/main.php'; ?>
    <?php include 'dashboard/carss.php'; ?>
    <?php include 'dashboard/howItWorks.php'; ?>
        <?php include 'dashboard/testimonalPage.php'; ?>
        <?php include 'components/common/footer.php'; ?>
</div>

</body>
</html>
