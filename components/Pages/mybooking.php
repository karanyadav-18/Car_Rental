<?php
include('../common/connect.php');
session_start();

// Check if customer is logged in
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php"); // Redirect if not logged in
    exit();
}

$customer_id = $_SESSION['id'];

// Fetch all bookings for the customer
$query = "SELECT booked_car.*, cars.model, cars.image, cars.rent, cars.location
          FROM booked_car
          JOIN cars ON booked_car.car_id = cars.id
          WHERE booked_car.customer_id = ?
          ORDER BY booked_car.id DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<?php include '../common/navbar.php'; ?>

<div class="max-w-6xl mx-auto py-10">
    <h1 class="text-3xl font-bold text-center mb-8">My Bookings</h1>

    <?php if ($result->num_rows > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while ($row = $result->fetch_assoc()): 
                $total_price = $row['rent'] * $row['no_of_days'];
            ?>
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center mb-4">
                    <img src="../uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['model']; ?>" class="w-24 h-24 object-cover rounded mr-4">
                    <div>
                        <h2 class="text-xl font-semibold"><?php echo htmlspecialchars($row['model']); ?></h2>
                        <p class="text-gray-500"><?php echo htmlspecialchars($row['location']); ?></p>
                    </div>
                </div>

                <div class="space-y-2 text-gray-700 text-sm">
                    <p><strong>Pick-up:</strong> <?php echo htmlspecialchars($row['pickup']); ?></p>
                    <p><strong>Drop:</strong> <?php echo htmlspecialchars($row['dropl']); ?></p>
                    <p><strong>Pick-up Date:</strong> <?php echo date('d M Y', strtotime($row['date'])); ?></p>
                    <p><strong>No. of Days:</strong> <?php echo htmlspecialchars($row['no_of_days']); ?></p>
                    <p><strong>Rent per Day:</strong> ₹<?php echo htmlspecialchars($row['rent']); ?></p>
                    <p><strong>Total Price:</strong> ₹<?php echo $total_price; ?></p>
                </div>

                <div class="mt-4">
                    <span class="inline-block px-3 py-1 text-sm bg-green-100 text-green-800 rounded-full">Confirmed</span>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <div class="text-center text-gray-600 mt-10">
            No bookings found!
        </div>
    <?php endif; ?>
</div>

</body>
</html>
