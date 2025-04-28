<?php
$testimonials = [
    [
        'id' => 1,
        'name' => 'Emily Johnson',
        'image' => 'https://images.pexels.com/photos/1239291/pexels-photo-1239291.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        'role' => 'Business Traveler',
        'rating' => 5,
        'comment' => 'The service was excellent! The car was clean, well-maintained, and exactly what I needed for my business trip. The booking process was seamless, and the staff was extremely helpful.',
    ],
    [
        'id' => 2,
        'name' => 'Michael Rodriguez',
        'image' => 'https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        'role' => 'Family Vacationer',
        'rating' => 4,
        'comment' => 'We rented an SUV for our family vacation and were very satisfied. The vehicle was spacious and comfortable. The only minor issue was a slight delay during pickup, but otherwise, the experience was great.',
    ],
    [
        'id' => 3,
        'name' => 'Sarah Chen',
        'image' => 'https://images.pexels.com/photos/733872/pexels-photo-733872.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
        'role' => 'Weekend Explorer',
        'rating' => 5,
        'comment' => 'I\'ve used CarRental multiple times for weekend getaways, and they never disappoint. The prices are competitive, and the cars are always in pristine condition. Highly recommend!',
    ],
];
?>

<section class="py-16 bg-gradient-to-r from-blue-900 to-slate-900 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                What Our Customers Say
            </h2>
            <p class="text-blue-200 max-w-2xl mx-auto">
                Don't just take our word for it. Here's what our satisfied customers have to say about their experience with us.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $testimonial): ?>
                <div 
                    class="bg-white/10 backdrop-blur-sm rounded-xl p-6 transition-transform duration-500 ease-in-out hover:-translate-y-3 hover:shadow-xl hover:bg-blue-800/50"
                >
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                            <img 
                                src="<?php echo $testimonial['image']; ?>" 
                                alt="<?php echo $testimonial['name']; ?>"
                                class="w-full h-full object-cover" 
                            />
                        </div>
                        <div>
                            <h4 class="font-semibold text-white"><?php echo $testimonial['name']; ?></h4>
                            <p class="text-blue-300 text-sm"><?php echo $testimonial['role']; ?></p>
                        </div>
                    </div>
                    <p class="text-slate-300">
                        "<?php echo $testimonial['comment']; ?>"
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
