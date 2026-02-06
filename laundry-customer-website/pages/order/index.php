<?php include '../../includes/header.php'; ?>

<section class="py-16 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-6 text-center">
    <h1 class="text-5xl font-bold mb-4">Schedule a Pickup</h1>
    <p class="text-gray-600 text-lg">Fill out the form below and we'll take care of the rest</p>
  </div>
</section>

<section class="py-20">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-xl">
      <form action="order_process.php" method="POST">

        <h3 class="text-2xl font-bold mb-6">1. Contact Information</h3>
        <div class="grid md:grid-cols-2 gap-6 mb-8">
          <div>
            <label class="block mb-2 font-medium text-slate-900">Full Name</label>
            <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" placeholder="John Doe" required>
          </div>
          <div>
            <label class="block mb-2 font-medium text-slate-900">Phone Number</label>
            <input type="tel" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" placeholder="(555) 123-4567" required>
          </div>
        </div>

        <h3 class="text-2xl font-bold mb-6 mt-8">2. Pickup & Delivery Address</h3>
        <div class="mb-6">
          <label class="block mb-2 font-medium text-slate-900">Address Line 1</label>
          <input type="text" name="address1" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" placeholder="123 Main St" required>
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

        <h3 class="text-2xl font-bold mb-6 mt-8">3. Service & Schedule</h3>
        <div class="mb-6">
          <label class="block mb-2 font-medium text-slate-900">Service Type</label>
          <select name="service_type" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" required>
            <option value="">Select a service...</option>
            <option value="wash_fold">Wash & Fold</option>
            <option value="dry_clean">Dry Cleaning</option>
            <option value="ironing">Ironing Only</option>
            <option value="household">Household Items</option>
          </select>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-6">
          <div>
            <label class="block mb-2 font-medium text-slate-900">Pickup Date</label>
            <input type="date" name="pickup_date" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" required>
          </div>
          <div>
            <label class="block mb-2 font-medium text-slate-900">Pickup Time</label>
            <select name="pickup_time" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" required>
              <option value="morning">Morning (8am - 12pm)</option>
              <option value="afternoon">Afternoon (12pm - 4pm)</option>
              <option value="evening">Evening (4pm - 8pm)</option>
            </select>
          </div>
        </div>

        <div class="mb-8">
          <label class="block mb-2 font-medium text-slate-900">Special Instructions</label>
          <textarea name="instructions" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" rows="3" placeholder="Gate code, specific stains, etc."></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-full text-lg">Confirm Pickup Request</button>
      </form>
    </div>
  </div>
</section>

<?php include '../../includes/footer.php'; ?>
