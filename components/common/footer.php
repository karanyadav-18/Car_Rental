<?php
$currentYear = date('Y');
?>

<footer class="bg-slate-900 text-white pt-16 pb-8">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      
      <!-- CarRental Info Section -->
      <div>
        <div class="flex items-center gap-2 mb-6">
          <svg class="w-8 h-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 18h2a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2h-1V7a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3v1H7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h2v2h8v-2zm-7-5h4v-3h-4v3z"></path>
          </svg>
          <span class="text-2xl font-bold">CarRental</span>
        </div>
        <p class="text-slate-400 mb-6">
          Premium car rental service for all your travel needs. Choose from our wide selection of vehicles.
        </p>
        <div class="flex gap-4">
          <a href="#" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M22 12.1c0 5.3-4.4 9.6-9.8 9.6-5.4 0-9.8-4.3-9.8-9.6 0-5.3 4.4-9.6 9.8-9.6C17.6 2.5 22 6.8 22 12.1z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
          </a>
          <a href="#" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M22 12.1c0 5.3-4.4 9.6-9.8 9.6-5.4 0-9.8-4.3-9.8-9.6 0-5.3 4.4-9.6 9.8-9.6C17.6 2.5 22 6.8 22 12.1z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
          </a>
          <a href="#" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M22 12.1c0 5.3-4.4 9.6-9.8 9.6-5.4 0-9.8-4.3-9.8-9.6 0-5.3 4.4-9.6 9.8-9.6C17.6 2.5 22 6.8 22 12.1z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
          </a>
          <a href="#" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M22 12.1c0 5.3-4.4 9.6-9.8 9.6-5.4 0-9.8-4.3-9.8-9.6 0-5.3 4.4-9.6 9.8-9.6C17.6 2.5 22 6.8 22 12.1z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
          </a>
        </div>
      </div>

      <!-- Quick Links Section -->
      <div>
        <h3 class="text-lg font-semibold mb-6">Quick Links</h3>
        <ul class="space-y-3">
          <li><a href="/" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">Home</a></li>
          <li><a href="/cars" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">Our Cars</a></li>
          <li><a href="/locations" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">Locations</a></li>
          <li><a href="/about" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">About Us</a></li>
          <li><a href="/contact" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">Contact</a></li>
        </ul>
      </div>

      <!-- Car Categories Section -->
      <div>
        <h3 class="text-lg font-semibold mb-6">Car Categories</h3>
        <ul class="space-y-3">
          <li><a href="/cars?category=Economy" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">Economy</a></li>
          <li><a href="/cars?category=SUV" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">SUV</a></li>
          <li><a href="/cars?category=Luxury" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">Luxury</a></li>
          <li><a href="/cars?category=Sports" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">Sports</a></li>
          <li><a href="/cars?category=Van" class="text-slate-400 hover:text-white transition-colors transform duration-300 hover:scale-110">Van</a></li>
        </ul>
      </div>

      <!-- Contact Us Section -->
      <div>
        <h3 class="text-lg font-semibold mb-6">Contact Us</h3>
        <ul class="space-y-4">
          <li class="flex items-start gap-3">
            <svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M19 3L12 12 5 3"></path>
            </svg>
            <span class="text-slate-400">1234 Rental Street, City Name, State 12345</span>
          </li>
          <li class="flex items-center gap-3">
            <svg class="w-5 h-5 text-blue-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 12L2 12L2 14L6 14"></path>
            </svg>
            <span class="text-slate-400">(123) 456-7890</span>
          </li>
          <li class="flex items-center gap-3">
            <svg class="w-5 h-5 text-blue-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M5 8L19 8"></path>
            </svg>
            <span class="text-slate-400">info@carrental.com</span>
          </li>
        </ul>
      </div>
    </div>

    <hr class="border-slate-800 my-8" />

    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-slate-400 text-sm text-center md:text-left">
        &copy; <?php echo $currentYear; ?> CarRental. All rights reserved.
      </p>
      <div class="flex gap-6">
        <a href="/terms" class="text-slate-400 hover:text-white text-sm transition-colors transform duration-300 hover:scale-110">Terms of Service</a>
        <a href="/privacy" class="text-slate-400 hover:text-white text-sm transition-colors transform duration-300 hover:scale-110">Privacy Policy</a>
        <a href="/faq" class="text-slate-400 hover:text-white text-sm transition-colors transform duration-300 hover:scale-110">FAQ</a>
      </div>
    </div>
  </div>
</footer>
