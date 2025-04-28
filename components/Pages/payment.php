<?php
// Include database connection file
include('../common/connect.php');

// Initialize variables to hold car details
$car_id = $car_model = $car_image = $car_rent = $location = $start_date = $number_of_days = $total_price = "";

// Check if the car details were passed from the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get car details from the POST request
    $car_id = intval($_POST['car_id']);
    $car_model = $_POST['car_model'];
    $car_image = $_POST['car_image'];
    $car_rent = $_POST['car_rent'];
    $location = $_POST['location'];
    $start_date = $_POST['start_date'];
    $number_of_days = intval($_POST['number_of_days']);
    $total_price = $car_rent * $number_of_days;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php include '../common/navbar.php'; ?>

    <div class="max-w-4xl mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg p-6 flex justify-between">
            <!-- Payment Form -->
            <div class="w-2/3 pr-6">
                <h2 class="text-2xl font-semibold mb-5">Payment Details</h2>
                <form action="../actions/process_payment.php" method="POST" id="paymentForm">
                    <!-- Hidden Fields for Car Data -->
                    <input type="hidden" name="car_id" value="<?php echo $car_id; ?>">
                    <input type="hidden" name="car_model" value="<?php echo $car_model; ?>">
                    <input type="hidden" name="car_image" value="<?php echo $car_image; ?>">
                    <input type="hidden" name="car_rent" value="<?php echo $car_rent; ?>">
                    <input type="hidden" name="location" value="<?php echo $location; ?>">
                    <input type="hidden" name="start_date" value="<?php echo $start_date; ?>">
                    <input type="hidden" name="number_of_days" value="<?php echo $number_of_days; ?>">
                    <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">

                    <div class="mb-4">
                        <label class="block text-gray-700">Card Number</label>
                        <input 
                            type="text" 
                            name="card_number" 
                            class="w-full border px-4 py-2 rounded-lg mt-1" 
                            placeholder="1234567890123456" 
                            required 
                            pattern="\d{16}" 
                            maxlength="16"
                            title="Please enter a valid 16-digit card number"
                        >
                    </div>

                    <div class="flex gap-4">
                        <div class="mb-4 w-1/2">
                            <label class="block text-gray-700">Expiry Date</label>
                            <input 
                                type="text" 
                                name="expiry_date" 
                                class="w-full border px-4 py-2 rounded-lg mt-1" 
                                placeholder="MM/YY" 
                                required 
                                pattern="(0[1-9]|1[0-2])\/\d{2}" 
                                title="Expiry date must be in MM/YY format"
                            >
                        </div>
                        <div class="mb-4 w-1/2">
                            <label class="block text-gray-700">CVV</label>
                            <input 
                                type="text" 
                                name="cvv" 
                                class="w-full border px-4 py-2 rounded-lg mt-1" 
                                placeholder="123" 
                                required 
                                pattern="\d{3}" 
                                maxlength="3"
                                title="CVV must be 3 digits"
                            >
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Cardholder Name</label>
                        <input 
                            type="text" 
                            name="cardholder_name" 
                            class="w-full border px-4 py-2 rounded-lg mt-1" 
                            required
                        >
                    </div>

                    <hr class="my-6">
                    <h2 class="text-2xl font-semibold mb-5">Address Details</h2>

                    <div class="mb-4">
                        <label class="block text-gray-700">Address</label>
                        <input 
                            type="text" 
                            name="address" 
                            class="w-full border px-4 py-2 rounded-lg mt-1" 
                            required
                        >
                    </div>

                    <div class="flex gap-4">
                        <div class="mb-4 w-1/2">
                            <label class="block text-gray-700">City</label>
                            <input 
                                type="text" 
                                name="city" 
                                class="w-full border px-4 py-2 rounded-lg mt-1" 
                                required
                            >
                        </div>
                        <div class="mb-4 w-1/2">
                            <label class="block text-gray-700">Zip</label>
                            <input 
                                type="text" 
                                name="zip" 
                                class="w-full border px-4 py-2 rounded-lg mt-1" 
                                pattern="\d{5,6}" 
                                title="Please enter a 5 or 6 digit zip code"
                                required
                            >
                        </div>
                    </div>

                    <div class="bg-blue-100 text-blue-600 px-4 py-3 rounded-lg mb-4 flex items-center">
                        <span class="mr-2">🔒</span> Your payment information is encrypted and secure
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold">
                        Pay ₹<?php echo $total_price; ?>
                    </button>
                </form>
            </div>

            <!-- Rental Summary -->
            <div class="w-1/3 bg-white shadow-md rounded-lg p-5">
                <h2 class="text-xl font-semibold mb-4">Rental Summary</h2>
                <img src="../uploads/<?php echo $car_image; ?>" class="rounded-lg mb-4" alt="<?php echo $car_model; ?>">
                <h3 class="text-lg font-semibold"><?php echo $car_model; ?></h3>
                <p class="text-gray-500 text-sm">📅 <?php echo $start_date; ?> - <?php echo date('Y-m-d', strtotime($start_date . ' + ' . $number_of_days . ' days')); ?></p>
                <p class="text-gray-500 text-sm">📍 <?php echo $location; ?></p>
                <hr class="my-3">
                <p class="text-gray-700 flex justify-between"><span>Base Price</span> <span>₹<?php echo $car_rent; ?>/day</span></p>
                <p class="text-gray-700 flex justify-between"><span>Total Days</span> <span><?php echo $number_of_days; ?> days</span></p>
                <hr class="my-3">
                <p class="text-lg font-semibold flex justify-between"><span>Total</span> <span>₹<?php echo $total_price; ?></span></p>
            </div>
        </div>
    </div>

    <!-- JavaScript Validation -->
    <script>
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        const cardNumber = document.querySelector('input[name="card_number"]').value;
        const cvv = document.querySelector('input[name="cvv"]').value;
        const expiryDate = document.querySelector('input[name="expiry_date"]').value;

        if (!/^\d{16}$/.test(cardNumber)) {
            alert('Please enter a valid 16-digit card number.');
            event.preventDefault();
            return;
        }

        if (!/^\d{3}$/.test(cvv)) {
            alert('Please enter a valid 3-digit CVV.');
            event.preventDefault();
            return;
        }

        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiryDate)) {
            alert('Please enter expiry date in MM/YY format.');
            event.preventDefault();
            return;
        }
    });
    </script>

</body>
</html>
