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
<nav class="bg-white shadow-md px-4 py-3 md:px-8 md:py-4">
  <div class="flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center space-x-2 text-2xl font-bold text-blue-600">
      <marquee behavior="" direction="right"><svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-800" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path><circle cx="7" cy="17" r="2"></circle><path d="M9 17h6"></path><circle cx="17" cy="17" r="2"></circle></svg></marquee>
      <h1 class="text-xl font-bold">CarRental</h1>
    </div>

    <!-- Hamburger Icon -->
    <button id="menu-toggle" class="md:hidden text-gray-700 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <!-- Desktop Nav Links -->
    <div class="hidden md:flex space-x-8 items-center">
      <?php if ($loggedIn): ?>
        <a href="./components/Pages/cars.php" class="relative group text-gray-700 font-semibold">
          <span class="group-hover:text-blue-600 transition-all duration-300">Available Cars</span>
          <span class="absolute left-0 bottom-0 block w-full h-[2px] bg-blue-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300"></span>
        </a>
        <a href="./components/Pages/mybooking.php" class="relative group text-gray-700 font-semibold">
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

    <!-- Right Side -->
    <div class="hidden md:block">
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
          <div id="dropdown" class="absolute right-0 hidden bg-white shadow-lg rounded-md mt-2 w-40 z-50">
            <a href="./components/Pages/logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-100 rounded-md">Logout</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="md:hidden mt-3 hidden flex flex-col space-y-2">
    <?php if ($loggedIn): ?>
      <a href="./components/Pages/cars.php" class="text-gray-700">Available Cars</a>
      <a href="./components/Pages/mybooking.php" class="text-gray-700">My Bookings</a>
      <a href="./components/Pages/settings.php" class="text-gray-700">Settings</a>
      <a href="./components/Pages/logout.php" class="text-red-600">Logout</a>
    <?php else: ?>
      <a href="./index.php" class="text-gray-700">Home</a>
      <a href="./components/Pages/cars.php" class="text-gray-700">Available Cars</a>
      <a href="./components/Pages/aboutus.php" class="text-gray-700">About Us</a>
      <a href="./components/Pages/agent_login.php" class="text-gray-700">Agent Login</a>
      <a href="./components/Authentication/login.php" class="text-blue-600 font-semibold">Login</a>
      <a href="./components/Authentication/signup.php" class="text-blue-600 font-semibold">Signup</a>
    <?php endif; ?>
  </div>
</nav>

<script>
  const menuToggle = document.getElementById("menu-toggle");
  const mobileMenu = document.getElementById("mobileMenu");
  const profileBtn = document.getElementById("userProfileBtn");
  const dropdown = document.getElementById("dropdown");

  menuToggle.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
  });

  if (profileBtn) {
    profileBtn.addEventListener("click", () => {
      dropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
      if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add("hidden");
      }
    });
  }
</script>
