<?php include '../../includes/header.php'; ?>

<section class="py-16 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-6 text-center">
    <h1 class="text-5xl font-bold mb-4">Our Services & Pricing</h1>
    <p class="text-gray-600 text-lg">Transparent pricing for premium care</p>
  </div>
</section>

<section class="py-20">
  <div class="container mx-auto px-6">
    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Service 1 -->
      <div class="card">
        <div class="flex justify-between items-start mb-4">
          <div class="service-icon mb-0"><i class="fas fa-tshirt"></i></div>
          <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-600 text-sm font-semibold">Starting at ₹80/kg</span>
        </div>
        <h3 class="text-2xl font-bold mb-4">Wash & Fold</h3>
        <p class="text-gray-600 mb-6">Perfect for your everyday laundry. We wash, dry, and neatly fold your clothes.</p>
        <ul class="mb-6 space-y-2 text-gray-600 text-sm">
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> 48hr Turnaround</li>
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Premium Detergent</li>
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Color Sorting</li>
        </ul>
        <a href="<?php echo $base_path; ?>/pages/order/index.php" class="btn btn-outline w-full">Book Now</a>
      </div>

      <!-- Service 2 -->
      <div class="card">
        <div class="flex justify-between items-start mb-4">
          <div class="service-icon mb-0"><i class="fas fa-wind"></i></div>
          <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-600 text-sm font-semibold">Per Item Pricing</span>
        </div>
        <h3 class="text-2xl font-bold mb-4">Dry Cleaning</h3>
        <p class="text-gray-600 mb-6">Expert care for your delicate fabrics, suits, and dresses.</p>
        <ul class="mb-6 space-y-2 text-gray-600 text-sm">
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> 72hr Turnaround</li>
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Spot Treatment</li>
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Pressed & Hanged</li>
        </ul>
        <a href="<?php echo $base_path; ?>/pages/order/index.php" class="btn btn-outline w-full">Book Now</a>
      </div>

      <!-- Service 3 -->
      <div class="card">
        <div class="flex justify-between items-start mb-4">
          <div class="service-icon mb-0"><i class="fas fa-soap"></i></div>
          <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-600 text-sm font-semibold">Starting at ₹100/item</span>
        </div>
        <h3 class="text-2xl font-bold mb-4">Ironing Only</h3>
        <p class="text-gray-600 mb-6">Hate ironing? Let us give your clothes that crisp, professional look.</p>
        <ul class="mb-6 space-y-2 text-gray-600 text-sm">
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> 24hr Turnaround</li>
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Steam Pressing</li>
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Hanged or Folded</li>
        </ul>
        <a href="<?php echo $base_path; ?>/pages/order/index.php" class="btn btn-outline w-full">Book Now</a>
      </div>

      <!-- Service 4 -->
      <div class="card">
        <div class="flex justify-between items-start mb-4">
          <div class="service-icon mb-0"><i class="fas fa-socks"></i></div>
          <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-600 text-sm font-semibold">Special Care</span>
        </div>
        <h3 class="text-2xl font-bold mb-4">Household Items</h3>
        <p class="text-gray-600 mb-6">Bedding, curtains, and other large household items that need a deep clean.</p>
        <ul class="mb-6 space-y-2 text-gray-600 text-sm">
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> 3-5 Days</li>
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Deep Cleaning</li>
          <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Sanitizing</li>
        </ul>
        <a href="<?php echo $base_path; ?>/pages/order/index.php" class="btn btn-outline w-full">Book Now</a>
      </div>
    </div>
  </div>
</section>

<?php include '../../includes/footer.php'; ?>
