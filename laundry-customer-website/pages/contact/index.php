<?php include '../../includes/header.php'; ?>

<section class="py-10 sm:py-12 lg:py-16 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-4 sm:px-6 text-center">
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 sm:mb-4">Get in Touch</h1>
    <p class="text-gray-600 text-sm sm:text-base lg:text-lg">We're here to help with any questions or concerns</p>
  </div>
</section>

<section class="py-12 sm:py-16 lg:py-20">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="grid lg:grid-cols-2 gap-8 sm:gap-12 lg:gap-16 items-start">

      <!-- Contact Info -->
      <div>
        <h2 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6">Contact Information</h2>
        <p class="text-gray-600 text-sm sm:text-base mb-6 sm:mb-8 leading-relaxed">Have a question about our services or your order? Reach out to us using any of the methods below.</p>

        <div class="space-y-4 sm:space-y-6 mb-6 sm:mb-8">
          <div class="flex gap-3 sm:gap-4">
            <div class="service-icon w-10 h-10 sm:w-12 sm:h-12 text-base sm:text-xl mb-0 flex-shrink-0"><i class="fas fa-map-marker-alt"></i></div>
            <div>
              <h4 class="font-semibold text-base sm:text-lg mb-1 sm:mb-2">Visit Us</h4>
              <p class="text-gray-600 text-sm sm:text-base">123 Laundry Lane<br>Suite 100<br>Clean City, ST 12345</p>
            </div>
          </div>

          <div class="flex gap-3 sm:gap-4">
            <div class="service-icon w-10 h-10 sm:w-12 sm:h-12 text-base sm:text-xl mb-0 flex-shrink-0"><i class="fas fa-phone"></i></div>
            <div>
              <h4 class="font-semibold text-base sm:text-lg mb-1 sm:mb-2">Call Us</h4>
              <p class="text-gray-600 text-sm sm:text-base">+1 (555) 123-4567<br>Mon - Fri: 8am - 8pm</p>
            </div>
          </div>

          <div class="flex gap-3 sm:gap-4">
            <div class="service-icon w-10 h-10 sm:w-12 sm:h-12 text-base sm:text-xl mb-0 flex-shrink-0"><i class="fas fa-envelope"></i></div>
            <div>
              <h4 class="font-semibold text-base sm:text-lg mb-1 sm:mb-2">Email Us</h4>
              <p class="text-gray-600 text-sm sm:text-base">support@freshspin.com<br>info@freshspin.com</p>
            </div>
          </div>
        </div>

        <!-- Map Placeholder -->
        <div class="bg-gray-200 w-full h-48 sm:h-64 lg:h-80 rounded-lg sm:rounded-xl flex items-center justify-center text-gray-500">
          <div class="text-center">
            <i class="fas fa-map text-3xl sm:text-4xl lg:text-5xl mb-2 sm:mb-3"></i>
            <p class="text-sm sm:text-base lg:text-lg">Map Embed Placeholder</p>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="bg-white p-6 sm:p-8 lg:p-10 rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl">
        <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">Send a Message</h3>
        <form action="contact_process.php" method="POST">
          <div class="mb-4 sm:mb-6">
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Name</label>
            <input type="text" name="name" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
          </div>
          <div class="mb-4 sm:mb-6">
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Email</label>
            <input type="email" name="email" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
          </div>
          <div class="mb-4 sm:mb-6">
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Subject</label>
            <input type="text" name="subject" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
          </div>
          <div class="mb-4 sm:mb-6">
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Message</label>
            <textarea name="message" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-full">Send Message</button>
        </form>
      </div>

    </div>
  </div>
</section>

<?php include '../../includes/footer.php'; ?>
