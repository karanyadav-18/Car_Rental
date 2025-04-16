<!-- Sidebar -->
<div class="flex">
<?php
$loggedIn = isset($_SESSION['user']); // check if user is logged in
?>

<aside class="w-64 bg-white h-screen p-5 shadow-lg">
  <div class="flex items-center space-x-2 text-xl font-bold mb-6">
    <img src="images/logo.png" class="w-8" />
    <span>CarRental</span>
  </div>

  <nav class="mt-4 space-y-2">
    <?php if ($loggedIn): ?>
      <!-- Logged-in Sidebar -->
      <a href="./dashboard" class="flex items-center p-3 text-blue-600 bg-gray-100 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/9292/9292669.png" class="w-5 mr-2">
        Dashboard
      </a>
      <a href="./components/Pages/booking.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/747/747310.png" class="w-5 mr-2">
        Bookings
      </a>
      <a href="./components/Pages/customer.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="w-5 mr-2">
        Customers
      </a>
      <a href="/components/Pages/payment.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" class="w-5 mr-2">
        Payments
      </a>
      <a href="./components/Pages/settings.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/2099/2099058.png" class="w-5 mr-2">
        Settings
      </a>
    <?php else: ?>
      <!-- Guest Sidebar -->
      <a href="/index.php" class="flex items-center p-3 text-blue-600 bg-gray-100 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/1946/1946488.png" class="w-5 mr-2">
        Home
      </a>
      <a href="./components/Pages/cars.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/741/741407.png" class="w-5 mr-2">
        Available Cars
      </a>
      <a href="./components/Pages/aboutus.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/1256/1256650.png" class="w-5 mr-2">
        About Us
      </a>
      <a href="./components/Pages/agent_login.php" class="flex items-center p-3 text-gray-700 hover:bg-gray-200 rounded-lg">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="w-5 mr-2">
        Agent Login
      </a>
    <?php endif; ?>
  </nav>
</aside>