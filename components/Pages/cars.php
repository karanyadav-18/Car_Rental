<?php
include('../common/navbar.php');
include('../common/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Available Cars</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <div class="my-10 text-center">
    <h2 class="text-3xl font-bold">AVAILABLE CARS</h2>
    <div class="w-16 h-1 bg-blue-600 mx-auto mt-2 rounded-full"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 gap-6">
    <?php
      $sql = "SELECT * FROM cars";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-5 grid md:grid-cols-3 gap-6">
      <div class="col-span-1">
        <img src="../../images/<?php echo $row['image']; ?>" alt="Car Image" class="w-full h-52 object-cover rounded">
      </div>
      <div class="col-span-1 flex flex-col justify-between">
        <div>
          <h3 class="text-xl font-semibold mb-2"><?php echo $row['model']; ?></h3>
          <div class="mb-3">
            <h4 class="text-sm font-medium">Features</h4>
            <div class="flex flex-wrap gap-2 mt-1">
              <span class="bg-gray-200 px-3 py-1 rounded-full text-sm"><?php echo $row['seats']; ?> Seater</span>
              <span class="bg-gray-200 px-3 py-1 rounded-full text-sm">Diesel</span>
            </div>
          </div>
          <div>
            <h4 class="text-sm font-medium">Vehicle Number</h4>
            <span class="bg-gray-200 px-3 py-1 rounded-full text-sm inline-block mt-1"><?php echo $row['car_number']; ?></span>
          </div>
        </div>
      </div>
      <div class="col-span-1 flex flex-col items-center justify-center text-center">
        <h4 class="text-lg font-semibold mb-3 text-gray-700">₹<?php echo $row['rent']; ?>/day</h4>
        <?php 
        if (isset($_SESSION['name'])) {
          $name = $_SESSION['name'];
          $sqla = "SELECT name FROM customer WHERE name = '$name'";
          $cat = mysqli_query($conn, $sqla);
          if ($cat && mysqli_fetch_assoc($cat)) {
            echo "<button id='{$row['id']}' class='btn-rent bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow-sm transition'>Rent Car</button>";
          }
        } else {
          echo "<button data-modal-target='LoginModal' class='bg-gray-800 text-white px-4 py-2 rounded shadow-sm hover:bg-gray-900 transition'>Book Now</button>";
        } 
        ?>
      </div>
    </div>
    <?php
        }
      }
    ?>
  </div>

  <!-- Rent Modal -->
  <div id="book" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg">
      <div class="flex justify-between items-center px-6 py-4 border-b">
        <h2 class="text-xl font-bold flex items-center gap-2">
          <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M16 2a2 2 0 0 1 2 2v1h2a1 1 0 1 1 0 2h-1.22l-.94 9.42a4 4 0 0 1-3.98 3.58H9.14a4 4 0 0 1-3.98-3.58L4.22 7H3a1 1 0 1 1 0-2h2V4a2 2 0 0 1 2-2h9Zm-9 4h9V4H7v2Zm1.05 13h7.9a2 2 0 0 0 1.98-1.79L18.84 8H5.16l.91 9.21a2 2 0 0 0 1.98 1.79Z"/></svg>
          Rent A Car
        </h2>
        <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">&times;</button>
      </div>
      <div class="p-6">
        <form action="../../actions/booking.php" method="POST">
          <div class="info mb-4"></div>
          <div class="text-center">
            <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">Book</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $(document).on('click', '.btn-rent', function() {
      var id = $(this).attr('id');
      $.ajax({
        url: "../../modal.php",
        type: "POST",
        data: { id: id },
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

<?php //include('../../inc/footer.php'); ?>