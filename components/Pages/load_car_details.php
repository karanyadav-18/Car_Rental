<?php
include('../common/connect.php');

if (isset($_POST['car_id'])) {
    $car_id = intval($_POST['car_id']);
    $query = "SELECT * FROM cars WHERE id = $car_id";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $car = mysqli_fetch_assoc($result);
        ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <!-- Corrected Image Path -->
            <img src="/Car_Rental/Car_Rental/components/uploads/<?php echo $car['image']; ?>" alt="Car" class="w-full h-64 object-cover rounded">
          </div>
          <div>
            <h2 class="text-2xl font-bold mb-4"><?php echo $car['model']; ?></h2>
            <div class="mb-4">
              <span class="bg-gray-200 px-3 py-1 rounded-full"><?php echo $car['seats']; ?> Seats</span>
              <span class="bg-gray-200 px-3 py-1 rounded-full">Diesel</span>
              <span class="bg-gray-200 px-3 py-1 rounded-full"><?php echo $car['car_number']; ?></span>
            </div>

            <div class="mb-4">
              <span class="bg-gray-200 px-3 py-1 rounded-full">Location: <?php echo $car['location']; ?></span>
            </div>

            <div class="text-lg font-bold text-blue-700 mb-6">₹<?php echo $car['rent']; ?>/day</div>
            <p class="text-gray-600 mb-6">This car offers a comfortable ride and excellent fuel efficiency. Book now for your next trip!</p>

            <form action="/Car_Rental/Car_Rental/components/Pages/payment.php" method="POST" id="bookingForm">
              <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">
              <input type="hidden" name="car_model" value="<?php echo $car['model']; ?>">
              <input type="hidden" name="car_image" value="<?php echo $car['image']; ?>">
              <input type="hidden" name="car_rent" id="car_rent" value="<?php echo $car['rent']; ?>">
              <input type="hidden" name="location" value="<?php echo $car['location']; ?>">

              <div class="mb-4">
                <label class="block text-gray-700 mb-2">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="w-full border border-gray-300 p-2 rounded" required min="<?php echo date('Y-m-d'); ?>">
              </div>

              <div class="mb-4">
                <label class="block text-gray-700 mb-2">Number of Days</label>
                <input type="number" name="number_of_days" id="number_of_days" class="w-full border border-gray-300 p-2 rounded" required min="1" value="1">
              </div>

              <div class="mb-6">
                <label class="block text-gray-700 mb-2">Total Price (₹)</label>
                <input type="text" name="total_price" id="total_price" class="w-full border border-gray-300 p-2 rounded bg-gray-100" readonly>
              </div>

              <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Book Now</button>
            </form>
          </div>
        </div>

        <script>
          $(document).ready(function() {
            var rentPerDay = <?php echo $car['rent']; ?>;
            function updateTotalPrice() {
              var days = parseInt($("#number_of_days").val()) || 0;
              $("#total_price").val(rentPerDay * days);
            }

            $("#number_of_days").on('input', updateTotalPrice);
            updateTotalPrice();
          });
        </script>
        <?php
    } else {
        echo "<div class='text-center text-gray-600'>Car not found.</div>";
    }
}
?>
