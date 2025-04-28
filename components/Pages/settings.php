<?php
include '../common/connect.php';
session_start();

// Assuming user is logged in and session contains user id
$user_id = $_SESSION['id'];

// Fetch customer data
$sql = "SELECT * FROM customer WHERE id = '$user_id'";
$result = mysqli_query($conn, $sql);
$customer = mysqli_fetch_assoc($result);

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = $_POST['password'];

    if (!empty($password)) {
        // Password provided, update it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $update_sql = "UPDATE customer SET name='$name', email_id='$email', mobile='$mobile', password='$hashed_password' WHERE id='$user_id'";
    } else {
        // No password provided, keep the old one
        $update_sql = "UPDATE customer SET name='$name', email_id='$email', mobile='$mobile' WHERE id='$user_id'";
    }

    if (mysqli_query($conn, $update_sql)) {
        $success_message = "Profile updated successfully!";
        // Fetch updated data
        $sql = "SELECT * FROM customer WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $customer = mysqli_fetch_assoc($result);
    } else {
        $error_message = "Failed to update profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Settings - Car Rental</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<?php include '../common/navbar.php'; ?>

<div class="flex justify-center items-center min-h-screen p-4">
    <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-xl">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Profile Settings</h2>

        <?php if (isset($success_message)): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-6 text-center">
                <?php echo $success_message; ?>
            </div>
        <?php elseif (isset($error_message)): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-6 text-center">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="space-y-6">
                <!-- Profile Icon -->
                <div class="flex justify-center">
                    <div class="w-24 h-24 bg-gray-300 rounded-full flex items-center justify-center text-gray-500 text-3xl">
                        &#128100;
                    </div>
                </div>

                <!-- Fields -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2" for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($customer['name']); ?>" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2" for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($customer['email_id']); ?>" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2" for="mobile">Phone Number</label>
                        <input type="text" name="mobile" id="mobile" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($customer['mobile']); ?>" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2" for="password">New Password (Optional)</label>
                        <input type="password" name="password" id="password" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Leave empty to keep current password">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-8 flex justify-between">
                    <button type="reset" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
