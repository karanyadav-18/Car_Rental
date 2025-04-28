<?php
include('../common/navbar.php');
include('../common/connect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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

<div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-6" id="car-list">
  <?php
    $sql = "SELECT * FROM cars";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
  ?>
  <div class="bg-white shadow-md rounded-lg overflow-hidden p-5">
    <img src="../uploads/<?php echo $row['image']; ?>" alt="Car Image" class="w-full h-52 object-cover rounded">
    <div class="mt-4">
      <h3 class="text-xl font-semibold mb-2"><?php echo $row['model']; ?></h3>
      <div class="flex flex-wrap gap-2 mb-3">
        <span class="bg-gray-200 px-3 py-1 rounded-full text-sm"><?php echo $row['seats']; ?> Seater</span>
        <span class="bg-gray-200 px-3 py-1 rounded-full text-sm">Diesel</span>
      </div>
      <div class="text-gray-700 font-semibold">₹<?php echo $row['rent']; ?>/day</div>
      <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded w-full btn-view-details" data-id="<?php echo $row['id']; ?>">View Details</button>
    </div>
  </div>
  <?php
      }
    }
  ?>
</div>

<!-- Car Details Modal -->
<div id="car-details-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
  <div class="bg-white w-full max-w-4xl rounded-lg shadow-lg overflow-y-auto max-h-[90vh]">
    <div class="p-6 relative">
      <button class="absolute top-3 right-3 text-gray-500 hover:text-gray-700" onclick="closeModal()">&times;</button>
      <div id="car-details-content">
        <!-- Car Details Load Here via AJAX -->
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
    $(".btn-view-details").click(function(){
        var id = $(this).data('id');
        $.ajax({
            url: "load_car_details.php", // create this file separately
            method: "POST",
            data: { car_id: id },
            success: function(data){
                $("#car-details-content").html(data);
                $("#car-details-modal").removeClass('hidden');
            }
        });
    });
});

function closeModal() {
    $("#car-details-modal").addClass('hidden');
}
</script>

</body>
</html>