<?php include '../../includes/header.php'; ?>

<section class="py-10 sm:py-12 lg:py-16 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-4 sm:px-6 text-center">
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 sm:mb-4">Schedule a Pickup</h1>
    <p class="text-gray-600 text-sm sm:text-base lg:text-lg">Fill out the form below and we'll take care of the rest</p>
  </div>
</section>

<section class="py-12 sm:py-16 lg:py-20">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="max-w-4xl mx-auto bg-white p-6 sm:p-8 lg:p-10 rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl">
      <form action="order_process.php" method="POST">

        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-4 sm:mb-6">1. Contact Information</h3>
        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
          <div>
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Full Name</label>
            <input type="text" name="name" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="John Doe" required>
          </div>
          <div>
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Phone Number</label>
            <input type="tel" name="phone" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="(555) 123-4567" required>
          </div>
        </div>

        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-4 sm:mb-6 mt-6 sm:mt-8">2. Pickup & Delivery Address</h3>
        <div class="mb-4 sm:mb-6">
          <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Address Line 1</label>
          <input type="text" name="address1" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="123 Main St" required>
        </div>
        <!-- <div class="grid md:grid-cols-3 gap-6 mb-8">
          <div>
            <label class="block mb-2 font-medium text-slate-900">City</label>
            <input type="text" name="city" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" required>
          </div>
          <div>
            <label class="block mb-2 font-medium text-slate-900">State</label>
            <input type="text" name="state" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" required>
          </div>
          <div>
            <label class="block mb-2 font-medium text-slate-900">Zip Code</label>
            <input type="text" name="zip" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" required>
          </div>
        </div> -->

        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-4 sm:mb-6 mt-6 sm:mt-8">3. Service & Schedule</h3>
        <div class="mb-4 sm:mb-6">
          <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Service Type</label>
          <select name="service_type" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
            <option value="">Select a service...</option>
            <option value="wash_fold">Wash & Fold</option>
            <option value="dry_clean">Dry Cleaning</option>
            <option value="ironing">Ironing Only</option>
            <option value="household">Household Items</option>
          </select>
        </div>

        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
          <div>
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Pickup Date</label>
            <input type="date" name="pickup_date" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
          </div>
          <div>
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Pickup Time</label>
            <select name="pickup_time" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
              <option value="morning">Morning (8am - 12pm)</option>
              <option value="afternoon">Afternoon (12pm - 4pm)</option>
              <option value="evening">Evening (4pm - 8pm)</option>
            </select>
          </div>
        </div>

        <div class="mb-6 sm:mb-8">
          <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Special Instructions</label>
          <textarea name="instructions" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" rows="3" placeholder="Gate code, specific stains, etc."></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-full text-base sm:text-lg">Confirm Pickup Request</button>
      </form>
    </div>
  </div>
</section>

<?php include '../../includes/footer.php'; ?>
