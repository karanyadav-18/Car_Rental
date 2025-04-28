<?php
include('components/common/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Available Cars</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    /* Initial styles for card, image, and content */
    .car-card {
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .car-card:hover {
      transform: translateY(-10px); /* Lift the card a bit on hover */
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }

    .car-image {
      transition: transform 0.5s ease-in-out;
    }

    /* Image hover effect */
    .car-card:hover .car-image {
      transform: scale(1.1);
    }

    /* Rent button hover effect */
    .rent-btn {
      transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .rent-btn:hover {
      transform: translateY(-3px);
      background-color: #2563eb;
    }

  </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <div class="my-10 text-center">
    <h2 class="text-3xl font-bold">Featured Vehicles</h2>
    <div class="w-16 h-1 bg-blue-600 mx-auto mt-2 rounded-full"></div>
    <p class="text-slate-600 max-w-2xl mx-auto mt-4">
      Explore our top-rated vehicles, chosen for their exceptional performance, comfort, and customer satisfaction.
    </p>
  </div>

  <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php
      $sql = "SELECT * FROM cars";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="bg-white shadow-lg rounded-xl car-card">
      <!-- Image Section -->
      <div class="relative h-48 w-full overflow-hidden">
        <img 
          src="components/uploads/<?php echo $row['image']; ?>" 
          alt="Car Image" 
          class="w-full h-full object-cover car-image"
        />
      </div>

      <!-- Car Info Section (Always visible) -->
      <div class="p-6">
        <h3 class="text-xl font-bold text-slate-800 mb-2">
          <?php echo $row['model']; ?>
        </h3>

        <div class="flex items-center mb-4">
          <span class="text-sm text-slate-600">Car Number: <?php echo $row['car_number']; ?></span>
        </div>

        <div class="flex items-center text-slate-600 mb-4">
          <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
          </svg>
          <span class="text-sm"><?php echo $row['seats']; ?> seats</span>
        </div>

        <div class="flex items-center justify-between pt-4 border-t border-slate-200">
          <div>
            <span class="text-2xl font-bold text-slate-800">₹<?php echo $row['rent']; ?></span>
            <span class="text-slate-600">/day</span>
          </div>
          <button id="rent-<?php echo $row['id']; ?>" class="rent-btn bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow-sm">
            Rent Car
          </button>
        </div>
      </div>
    </div>
    <?php
        }
      }
    ?>
  </div>

  <div class="text-center mt-12 mb-12">
    <a href="./components/Pages/cars.php" class="inline-block bg-transparent border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-6 py-2 rounded-lg transition">
      View All Cars
    </a>
  </div>

  <script>
    $(document).on('click', '[id^=rent-]', function() {
      var carId = $(this).attr('id').split('-')[1];
      $.ajax({
        url: "../../modal.php",
        type: "POST",
        data: { id: carId },
        success: function(data) {
          $(".info").html(data);
          $("#book").removeClass("hidden");
        }
      });
    });

    function closeModal() {
      $('#book').addClass('hidden');
    }
  </script>

</body>
</html>
