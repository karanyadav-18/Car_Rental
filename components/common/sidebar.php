<?php
// session_start();
// include('../common/connect.php');

// Default values
// $loggedIn = false;
if (isset($_SESSION['customer_id'])) {
    $loggedIn = true;
    $customer_id = $_SESSION['customer_id'];
}
?>

<!-- Navbar -->
<nav class="flex items-center justify-between px-8 py-4 bg-white shadow-md">
  <!-- Logo -->
  <div class="flex items-center space-x-2 text-2xl font-bold text-blue-600">
    <marquee behavior="" direction="right"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-car w-8 h-8 text-blue-800"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg></marquee>
    <h1 class="text-xl font-bold">CarRental</h1>
  </div>

  <!-- Links -->
  <div class="flex space-x-8 items-center">
    <?php if ($loggedIn): ?>
      <a href="./components/Pages/dashboard.php" class="relative group text-gray-700 font-semibold">
        <span class="group-hover:text-blue-600 transition-all duration-300">Dashboard</span>
        <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
      </a>
      </a>
      <a href="./components/Pages/cars.php" class="relative group text-gray-700 font-semibold">
        <span class="group-hover:text-blue-600 transition-all duration-300">Available Cars</span>
        <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
      <a href="./components/Pages/booking.php" class="relative group text-gray-700 font-semibold">
        <span class="group-hover:text-blue-600 transition-all duration-300">My Bookings</span>
        <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
      </a>
      <a href="./components/Pages/settings.php" class="relative group text-gray-700 font-semibold">
        <span class="group-hover:text-blue-600 transition-all duration-300">Settings</span>
        <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
      </a>
    <?php else: ?>
      <a href="./index.php" class="relative group text-gray-700 font-semibold">
        <span class="group-hover:text-blue-600 transition-all duration-300">Home</span>
        <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
      </a>
      <a href="./components/Pages/cars.php" class="relative group text-gray-700 font-semibold">
        <span class="group-hover:text-blue-600 transition-all duration-300">Available Cars</span>
        <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
      </a>
      <a href="./components/Pages/aboutus.php" class="relative group text-gray-700 font-semibold">
        <span class="group-hover:text-blue-600 transition-all duration-300">About Us</span>
        <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
      </a>
      <a href="./components/Pages/agent_login.php" class="relative group text-gray-700 font-semibold">
        <span class="group-hover:text-blue-600 transition-all duration-300">Agent Login</span>
        <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
      </a>
    <?php endif; ?>
  </div>

  <!-- Right Side (Login/Signup OR User Profile) -->
  <div class="relative">
    <?php if (!$loggedIn): ?>
      <div class="flex space-x-4">
        <a href="./components/Authentication/login.php" class="bg-gradient-to-r from-[#B64870] to-[#4E0080] rounded-[8px] font-bold text-white px-5 py-2 hover:opacity-90 transition transform hover:scale-105">
          Login
        </a>
        <a href="./components/Authentication/signup.php" class="bg-gradient-to-r from-[#B64870] to-[#4E0080] rounded-[8px] font-bold text-white px-5 py-2 hover:opacity-90 transition transform hover:scale-105">
          Signup
        </a>
      </div>
    <?php else: ?>
      <div class="relative">
        <button id="userProfileBtn" class="flex items-center space-x-2 px-4 py-2 rounded-full bg-blue-100 text-blue-600 font-semibold hover:bg-blue-200 transition">
          <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="w-8 h-8 rounded-full">
        </button>

        <!-- Dropdown -->
        <div id="dropdown" class="absolute right-0 hidden bg-white shadow-lg rounded-md mt-2 w-40 z-50">
          <a href="./components/Pages/logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-100 rounded-md">Logout</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</nav>

<script>
  // JavaScript to toggle dropdown visibility on click
  const profileBtn = document.getElementById("userProfileBtn");
  const dropdown = document.getElementById("dropdown");

  profileBtn.addEventListener("click", () => {
    dropdown.classList.toggle("hidden");
  });

  // Close dropdown when clicking outside
  document.addEventListener("click", (e) => {
    if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.add("hidden");
    }
  });
</script>
