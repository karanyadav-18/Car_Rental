<?php
$steps = [
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12l-8 8-8-8"></path></svg>',
        'title' => 'Find Your Car',
        'description' => 'Browse our wide selection of vehicles and choose the one that fits your needs.',
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20m10-10H2"></path></svg>',
        'title' => 'Choose Dates',
        'description' => 'Select your pick-up and return dates to check availability and get an instant quote.',
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"></path></svg>',
        'title' => 'Book Your Ride',
        'description' => 'Complete your booking in just a few clicks and receive instant confirmation.',
    ],
    [
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-blue-800" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v16m8-8H4"></path></svg>',
        'title' => 'Enjoy Your Trip',
        'description' => 'Pick up your car from our convenient locations and enjoy your journey!',
    ],
];
?>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">
                How It Works
            </h2>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Renting a car with us is simple and hassle-free. Follow these easy steps to get on the road quickly.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($steps as $index => $step): ?>
                <div class="flex flex-col items-center text-center p-6 rounded-lg transition-all duration-500 transform hover:scale-105 hover:shadow-2xl hover:bg-slate-50 opacity-90 hover:opacity-100 ease-in-out">
                    <div class="mb-6 relative transition-transform duration-500 ease-in-out transform hover:scale-110">
                        <div class="w-24 h-24 bg-blue-100 rounded-full flex items-center justify-center">
                            <?php echo $step['icon']; ?>
                        </div>
                        <?php if ($index < count($steps) - 1): ?>
                            <div class="hidden lg:block absolute top-1/2 -right-12 transform -translate-y-1/2 w-24 border-t-2 border-dashed border-blue-200"></div>
                        <?php endif; ?>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-3 transition-all duration-500 ease-in-out transform hover:text-blue-600">
                        <?php echo $step['title']; ?>
                    </h3>
                    <p class="text-slate-600 transition-opacity duration-500 opacity-90 hover:opacity-100">
                        <?php echo $step['description']; ?>
                    </p>
                    <div class="mt-4 w-8 h-8 bg-blue-800 text-white rounded-full flex items-center justify-center font-bold transition-all duration-300 ease-in-out transform hover:scale-110">
                        <?php echo $index + 1; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
