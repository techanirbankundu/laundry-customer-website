<?php include 'includes/header.php'; ?>

<section class="relative py-10 sm:py-14 lg:py-24 overflow-hidden active">
  <!-- Background Image -->
  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo $base_path; ?>/images/laundry-hero-bg.png');"></div>
  <!-- Gradient Overlay: Solid white on left for text, transparent on right for image -->
  <div class="absolute inset-0 bg-gradient-to-r from-white via-white/90 to-white/70 lg:to-transparent"></div>

  <div class="container mx-auto px-4 sm:px-6 relative z-10">
    <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
      <div class="lg:w-1/2 text-center lg:text-left z-10">
        <div class="inline-block px-3 py-1.5 sm:px-4 sm:py-2 bg-sky-100 text-sky-600 rounded-full text-xs sm:text-sm font-semibold mb-4 sm:mb-6 animate-fade-in-up">
          <i class="fas fa-star mr-1 sm:mr-2"></i> #1 Rated Laundry Service
        </div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-5xl xl:text-5xl font-bold mb-4 sm:mb-6 bg-gradient-to-r from-slate-900 to-sky-600 bg-clip-text text-transparent leading-tight">
          Fresh Clothes,<br>Free Time.
        </h1>
        <p class="text-base sm:text-lg md:text-lg text-gray-600 mb-6 sm:mb-10 leading-relaxed max-w-lg mx-auto lg:mx-0">
          Experience the ultimate convenience with our door-to-door laundry & dry cleaning service. We treat your clothes with the care they deserve.
        </p>
        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center lg:justify-start">
          <a href="<?php echo $base_path; ?>/pages/order/index.php" class="btn btn-primary text-base sm:text-lg shadow-sky-500/30">
            Schedule Pickup <i class="fas fa-arrow-right ml-2 text-sm"></i>
          </a>
          <a href="<?php echo $base_path; ?>/pages/services/index.php" class="btn btn-outline text-base sm:text-lg">
            View Services
          </a>
        </div>
        <div class="mt-8 sm:mt-12 flex items-center justify-center lg:justify-start gap-4 sm:gap-8 text-gray-500">
          <div class="flex items-center gap-1.5 sm:gap-2">
            <div class="bg-green-100 p-1.5 sm:p-2 rounded-full text-green-600"><i class="fas fa-check text-xs sm:text-sm"></i></div>
            <span class="text-xs sm:text-sm font-medium">Eco-Friendly</span>
          </div>
          <div class="flex items-center gap-1.5 sm:gap-2">
            <div class="bg-blue-100 p-1.5 sm:p-2 rounded-full text-blue-600"><i class="fas fa-shipping-fast text-xs sm:text-sm"></i></div>
            <span class="text-xs sm:text-sm font-medium">24h Turnaround</span>
          </div>
        </div>
      </div>
      <div class="lg:w-1/2 relative lg:h-[500px] flex items-center justify-center mt-8 lg:mt-0">
        <!-- Abstract Decorative Elements -->
        <div class="absolute top-0 right-0 w-48 sm:w-72 lg:w-96 h-48 sm:h-72 lg:h-96 bg-sky-200/30 rounded-full blur-3xl -z-10 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 sm:left-10 w-36 sm:w-56 lg:w-72 h-36 sm:h-56 lg:h-72 bg-indigo-200/30 rounded-full blur-3xl -z-10 animate-pulse delay-700"></div>

        <!-- Main Visual Card -->
        <div class="relative bg-sky-50/90 backdrop-blur-xl border border-sky-200 p-4 sm:p-6 lg:p-8 rounded-2xl sm:rounded-3xl shadow-2xl w-full max-w-sm sm:max-w-md transform sm:rotate-2 hover:rotate-0 transition-all duration-500">
          <div class="absolute -top-4 -right-4 sm:-top-6 sm:-right-6 bg-sky-100 p-2 sm:p-4 rounded-xl sm:rounded-2xl shadow-xl animate-bounce delay-1000">
            <span class="text-lg sm:text-2xl">✨</span>
          </div>
          <div class="space-y-3 sm:space-y-4 lg:space-y-6">
            <div class="flex items-center gap-3 sm:gap-4 bg-white/95 p-3 sm:p-4 rounded-lg sm:rounded-xl shadow-sm">
              <div class="w-10 h-10 sm:w-12 sm:h-12 bg-sky-100 rounded-full flex items-center justify-center text-sky-500 flex-shrink-0">
                <i class="fas fa-tshirt text-base sm:text-xl"></i>
              </div>
              <div class="min-w-0">
                <h4 class="font-bold text-slate-800 text-sm sm:text-base">Wash & Fold</h4>
                <p class="text-xs text-gray-500">Premium detergent usage</p>
              </div>
              <span class="ml-auto font-bold text-sky-600 text-sm sm:text-base whitespace-nowrap">₹80/kg</span>
            </div>
            <div class="flex items-center gap-3 sm:gap-4 bg-white/95 p-3 sm:p-4 rounded-lg sm:rounded-xl shadow-sm">
              <div class="w-10 h-10 sm:w-12 sm:h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-500 flex-shrink-0">
                <i class="fas fa-user-tie text-base sm:text-xl"></i>
              </div>
              <div class="min-w-0">
                <h4 class="font-bold text-slate-800 text-sm sm:text-base">Dry Cleaning</h4>
                <p class="text-xs text-gray-500">Expert stain removal</p>
              </div>
              <span class="ml-auto font-bold text-indigo-600 text-sm sm:text-base whitespace-nowrap">₹250+</span>
            </div>
            <div class="bg-gradient-to-r from-sky-500 to-indigo-600 p-4 sm:p-6 rounded-lg sm:rounded-xl text-white text-center">
              <p class="font-medium opacity-90 mb-1 text-sm sm:text-base">Total Savings</p>
              <h3 class="text-2xl sm:text-3xl font-bold">20% OFF</h3>
              <p class="text-xs opacity-75 mt-1 sm:mt-2">On your first order with code: FRESH20</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-12 sm:py-14 lg:py-16">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="text-center mb-8 sm:mb-12">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-3 sm:mb-4">Why Choose FreshSpin?</h2>
      <p class="text-gray-600 text-sm sm:text-base">We treat your clothes with the care they deserve</p>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
      <div class="card">
        <div class="service-icon"><i class="fas fa-truck"></i></div>
        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-2 sm:mb-4">Free Pickup & Delivery</h3>
        <p class="text-gray-600 text-sm sm:text-base">We collect your dirty clothes and drop them off fresh and clean at your convenience.</p>
      </div>
      <div class="card">
        <div class="service-icon"><i class="fas fa-leaf"></i></div>
        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-2 sm:mb-4">Eco-Friendly Cleaning</h3>
        <p class="text-gray-600 text-sm sm:text-base">We use non-toxic, hypoallergenic detergents that are tough on stains but safe for your skin.</p>
      </div>
      <div class="card sm:col-span-2 lg:col-span-1">
        <div class="service-icon"><i class="fas fa-clock"></i></div>
        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-2 sm:mb-4">Fast Turnaround</h3>
        <p class="text-gray-600 text-sm sm:text-base">Get your clothes back in as little as 24 hours with our express service options.</p>
      </div>
    </div>
  </div>
</section>

<section class="py-12 sm:py-14 lg:py-16 bg-blue-50">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="text-center mb-8 sm:mb-12">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-3 sm:mb-4">How It Works</h2>
      <p class="text-gray-600 text-sm sm:text-base">Simple, efficient, and hassle-free</p>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
      <div class="text-center">
        <div class="service-icon bg-white mx-auto"><i class="fas fa-calendar-check"></i></div>
        <h4 class="text-sm sm:text-base lg:text-xl font-semibold">1. Book Online</h4>
      </div>
      <div class="text-center">
        <div class="service-icon bg-white mx-auto"><i class="fas fa-box"></i></div>
        <h4 class="text-sm sm:text-base lg:text-xl font-semibold">2. We Pickup</h4>
      </div>
      <div class="text-center">
        <div class="service-icon bg-white mx-auto"><i class="fas fa-tshirt"></i></div>
        <h4 class="text-sm sm:text-base lg:text-xl font-semibold">3. We Clean</h4>
      </div>
      <div class="text-center">
        <div class="service-icon bg-white mx-auto"><i class="fas fa-smile"></i></div>
        <h4 class="text-sm sm:text-base lg:text-xl font-semibold">4. We Deliver</h4>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
