<?php
// Include necessary files for database or session management (if needed)
include('components/common/connect.php');

// Start the session to manage state if needed
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental | Find Your Ride</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    @keyframes fadeIn {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .fade-in {
      animation: fadeIn 1s ease-out forwards;
    }
    @keyframes slideIn {
      0% { transform: translateX(100%); }
      100% { transform: translateX(0); }
    }
    .slide-in {
      animation: slideIn 0.5s ease-out forwards; /* Faster sliding animation */
    }
  </style>
</head>
<body class="bg-gradient-to-r from-slate-900 to-blue-900 text-white font-sans">

  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-slate-900 to-blue-900 text-white min-h-[90vh] flex items-center overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
      <img
        src="https://images.pexels.com/photos/3802510/pexels-photo-3802510.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
        alt="Car on road"
        class="w-full h-full object-cover opacity-30"
      />
    </div>

    <div class="container mx-auto px-4 relative z-10 py-16 md:py-24">
      <div class="max-w-3xl">
        
        <!-- Main Title (Animated Changing Text) -->
        <h1 id="changing-text" class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 opacity-0 translate-x-0 transition-all duration-500">
          Find Your Perfect Ride
        </h1>

        <script>
          const texts = [
            "Find Your Perfect Ride",
            "Rent a Car for Every Journey",
            "Luxury Cars at Affordable Prices",
            "City Drives to Road Trips - We Have It All",
            "Smooth Rides, Unbeatable Deals"
          ];

          let index = 0;
          const textElement = document.getElementById('changing-text');

          function changeText() {
            // Start by sliding out
            textElement.classList.remove('opacity-100', 'translate-x-0');
            textElement.classList.add('opacity-0', 'translate-x-full');

            setTimeout(() => {
              // Change text after fade out
              textElement.innerText = texts[index];
              // Then fade in
              textElement.classList.remove('translate-x-full');
              textElement.classList.add('opacity-100', 'translate-x-0');
              
              index = (index + 1) % texts.length; // Loop back
            }, 500); // Shorter delay for smoother transition
          }

          // Initial load (change immediately after page load)
          setTimeout(() => {
            textElement.classList.remove('opacity-0', 'translate-x-0');
            textElement.classList.add('opacity-100', 'translate-x-0');
          }, 100); // Small delay to avoid glitch

          // Start text change after 0.5 second and change every 3 seconds
          setTimeout(changeText, 500); // Start the first change
          setInterval(changeText, 3000); // Repeat every 3 seconds
        </script>

        <p class="text-lg md:text-xl text-slate-200 mb-10 max-w-2xl fade-in delay-200">
          Discover a wide range of vehicles, from economy to luxury. Get the car that suits your needs for the journey ahead.
        </p>

        <!-- Message Section (without form) -->
        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-6 shadow-xl fade-in delay-400">
          <p class="text-center text-lg md:text-xl text-slate-200">
            Whether you're looking for a quick city ride or a luxurious road trip, we have a car for every occasion.
          </p>
        </div>

        <!-- Key Features -->
        <div class="flex items-center gap-6 mt-10 flex-wrap justify-center md:justify-start fade-in delay-600">
          <div class="flex items-center gap-2">
            <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <span class="text-slate-200">No Hidden Fees</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <span class="text-slate-200">Free Cancellation</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center">
              <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
            </div>
            <span class="text-slate-200">24/7 Support</span>
          </div>
        </div>
        
      </div>
    </div>
  </section>

</body>
</html>
