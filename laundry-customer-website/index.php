<?php include 'includes/header.php'; ?>

<section class="relative py-20 lg:py-28 overflow-hidden active">
  <!-- Background Image -->
  <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo $base_path; ?>/images/laundry-hero-bg.png');"></div>
  <!-- Gradient Overlay: Solid white on left for text, transparent on right for image -->
  <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent"></div>

  <div class="container mx-auto px-6 relative z-10">
    <div class="flex flex-col lg:flex-row items-center gap-16">
      <div class="lg:w-1/2 text-center lg:text-left z-10">
        <div class="inline-block px-4 py-2 bg-sky-100 text-sky-600 rounded-full text-sm font-semibold mb-6 animate-fade-in-up">
          <i class="fas fa-star mr-2"></i> #1 Rated Laundry Service
        </div>
        <h1 class="text-5xl lg:text-7xl font-bold mb-6 bg-gradient-to-r from-slate-900 to-sky-600 bg-clip-text text-transparent leading-tight">
          Fresh Clothes,<br>Free Time.
        </h1>
        <p class="text-xl text-gray-600 mb-10 leading-relaxed max-w-lg mx-auto lg:mx-0">
          Experience the ultimate convenience with our door-to-door laundry & dry cleaning service. We treat your clothes with the care they deserve.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
          <a href="<?php echo $base_path; ?>/pages/order/index.php" class="btn btn-primary text-lg shadow-sky-500/30">
            Schedule Pickup <i class="fas fa-arrow-right ml-2 text-sm"></i>
          </a>
          <a href="<?php echo $base_path; ?>/pages/services/index.php" class="btn btn-outline text-lg">
            View Services
          </a>
        </div>
        <div class="mt-12 flex items-center justify-center lg:justify-start gap-8 text-gray-500">
          <div class="flex items-center gap-2">
            <div class="bg-green-100 p-2 rounded-full text-green-600"><i class="fas fa-check"></i></div>
            <span class="text-sm font-medium">Eco-Friendly</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="bg-blue-100 p-2 rounded-full text-blue-600"><i class="fas fa-shipping-fast"></i></div>
            <span class="text-sm font-medium">24h Turnaround</span>
          </div>
        </div>
      </div>
      <div class="lg:w-1/2 relative lg:h-[600px] flex items-center justify-center">
        <!-- Abstract Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-sky-200/30 rounded-full blur-3xl -z-10 animate-pulse"></div>
        <div class="absolute bottom-0 left-10 w-72 h-72 bg-indigo-200/30 rounded-full blur-3xl -z-10 animate-pulse delay-700"></div>

        <!-- Main Visual Card -->
        <div class="relative bg-sky-50/90 backdrop-blur-xl border border-sky-200 p-8 rounded-3xl shadow-2xl max-w-md transform rotate-2 hover:rotate-0 transition-all duration-500">
          <div class="absolute -top-6 -right-6 bg-sky-100 p-4 rounded-2xl shadow-xl animate-bounce delay-1000">
            <span class="text-2xl">✨</span>
          </div>
          <div class="space-y-6">
            <div class="flex items-center gap-4 bg-white/95 p-4 rounded-xl shadow-sm">
              <div class="w-12 h-12 bg-sky-100 rounded-full flex items-center justify-center text-sky-500">
                <i class="fas fa-tshirt text-xl"></i>
              </div>
              <div>
                <h4 class="font-bold text-slate-800">Wash & Fold</h4>
                <p class="text-xs text-gray-500">Premium detergent usage</p>
              </div>
              <span class="ml-auto font-bold text-sky-600">₹80/kg</span>
            </div>
            <div class="flex items-center gap-4 bg-white/95 p-4 rounded-xl shadow-sm">
              <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-500">
                <i class="fas fa-user-tie text-xl"></i>
              </div>
              <div>
                <h4 class="font-bold text-slate-800">Dry Cleaning</h4>
                <p class="text-xs text-gray-500">Expert stain removal</p>
              </div>
              <span class="ml-auto font-bold text-indigo-600">₹250+</span>
            </div>
            <div class="bg-gradient-to-r from-sky-500 to-indigo-600 p-6 rounded-xl text-white text-center">
              <p class="font-medium opacity-90 mb-1">Total Savings</p>
              <h3 class="text-3xl font-bold">20% OFF</h3>
              <p class="text-xs opacity-75 mt-2">On your first order with code: FRESH20</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-20">
  <div class="container mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold mb-4">Why Choose FreshSpin?</h2>
      <p class="text-gray-600">We treat your clothes with the care they deserve</p>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="card">
        <div class="service-icon"><i class="fas fa-truck"></i></div>
        <h3 class="text-2xl font-bold mb-4">Free Pickup & Delivery</h3>
        <p class="text-gray-600">We collect your dirty clothes and drop them off fresh and clean at your convenience.</p>
      </div>
      <div class="card">
        <div class="service-icon"><i class="fas fa-leaf"></i></div>
        <h3 class="text-2xl font-bold mb-4">Eco-Friendly Cleaning</h3>
        <p class="text-gray-600">We use non-toxic, hypoallergenic detergents that are tough on stains but safe for your skin.</p>
      </div>
      <div class="card">
        <div class="service-icon"><i class="fas fa-clock"></i></div>
        <h3 class="text-2xl font-bold mb-4">Fast Turnaround</h3>
        <p class="text-gray-600">Get your clothes back in as little as 24 hours with our express service options.</p>
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-blue-50">
  <div class="container mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold mb-4">How It Works</h2>
      <p class="text-gray-600">Simple, efficient, and hassle-free</p>
    </div>
    <div class="grid grid-cols-4 gap-8">
      <div class="text-center">
        <div class="service-icon bg-white mx-auto"><i class="fas fa-calendar-check"></i></div>
        <h4 class="text-xl font-semibold">1. Book Online</h4>
      </div>
      <div class="text-center">
        <div class="service-icon bg-white mx-auto"><i class="fas fa-box"></i></div>
        <h4 class="text-xl font-semibold">2. We Pickup</h4>
      </div>
      <div class="text-center">
        <div class="service-icon bg-white mx-auto"><i class="fas fa-tshirt"></i></div>
        <h4 class="text-xl font-semibold">3. We Clean</h4>
      </div>
      <div class="text-center">
        <div class="service-icon bg-white mx-auto"><i class="fas fa-smile"></i></div>
        <h4 class="text-xl font-semibold">4. We Deliver</h4>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
