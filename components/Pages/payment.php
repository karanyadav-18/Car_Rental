<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<?php include '../common/navbar.php' ?>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg p-6 flex justify-between">
            <!-- Payment Form -->
            <div class="w-2/3 pr-6">
                <h2 class="text-2xl font-semibold mb-5">Payment Details</h2>
                <form action="process_payment.php" method="POST">
                    <div class="mb-4">
                        <label class="block text-gray-700">Card Number</label>
                        <input type="text" name="card_number" class="w-full border px-4 py-2 rounded-lg mt-1" placeholder="1234 5678 9012 3456" required>
                    </div>
                    <div class="flex gap-4">
                        <div class="mb-4 w-1/2">
                            <label class="block text-gray-700">Expiry Date</label>
                            <input type="text" name="expiry_date" class="w-full border px-4 py-2 rounded-lg mt-1" placeholder="MM/YY" required>
                        </div>
                        <div class="mb-4 w-1/2">
                            <label class="block text-gray-700">CVV</label>
                            <input type="text" name="cvv" class="w-full border px-4 py-2 rounded-lg mt-1" placeholder="123" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Cardholder Name</label>
                        <input type="text" name="cardholder_name" class="w-full border px-4 py-2 rounded-lg mt-1" value="John Doe" required>
                    </div>
                    <div class="bg-blue-100 text-blue-600 px-4 py-3 rounded-lg mb-4 flex items-center">
                        <span class="mr-2">🔒</span> Your payment information is encrypted and secure
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold">Pay $313.50</button>
                </form>
            </div>

            <!-- Rental Summary -->
            <div class="w-1/3 bg-white shadow-md rounded-lg p-5">
                <h2 class="text-xl font-semibold mb-4">Rental Summary</h2>
                <img src="../images/car1.jpg" class="rounded-lg mb-4" alt="Tesla Model 3">
                <h3 class="text-lg font-semibold">Tesla Model 3</h3>
                <p class="text-gray-500 text-sm">📅 2024-03-15 - 2024-03-18</p>
                <p class="text-gray-500 text-sm">📍 San Francisco Airport</p>
                <hr class="my-3">
                <p class="text-gray-700 flex justify-between"><span>Base Price</span> <span>$240.00</span></p>
                <p class="text-gray-700 flex justify-between"><span>Insurance</span> <span>$45.00</span></p>
                <p class="text-gray-700 flex justify-between"><span>Taxes & Fees</span> <span>$28.50</span></p>
                <hr class="my-3">
                <p class="text-lg font-semibold flex justify-between"><span>Total</span> <span>$313.50</span></p>
            </div>
        </div>
    </div>
</body>
</html>
<!-- <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $card_number = $_POST['card_number'];
//     $expiry_date = $_POST['expiry_date'];
//     $cvv = $_POST['cvv'];
//     $cardholder_name = $_POST['cardholder_name'];

//     // Basic validation (in real-world, use secure payment gateways)
//     if (empty($card_number) || empty($expiry_date) || empty($cvv) || empty($cardholder_name)) {
//         die("All fields are required.");
//     }

//     // Simulating payment processing
//     $success = true; // This should be replaced with real payment processing logic

//     if ($success) {
//         echo "<script>alert('Payment Successful!'); window.location.href='payment.php';</script>";
//     } else {
//         echo "<script>alert('Payment Failed! Please try again.'); window.location.href='payment.php';</script>";
//     }
// } else {
//     header("Location: payment.php");
//     exit();
// }
?>
 -->