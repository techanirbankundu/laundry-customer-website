<?php include 'includes/header.php'; ?>

<!-- Hero Section (Redesigned) -->
<section class="relative min-h-[70vh] flex items-center overflow-hidden py-12 lg:py-20 bg-slate-50">
  <div class="absolute inset-0 bg-cover bg-right sm:bg-center opacity-10 grayscale" style="background-image: url('https://images.unsplash.com/photo-1545173153-520312a1c3e3?q=80&w=2070&auto=format&fit=crop');"></div>
  <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
  
  <div class="container-responsive relative z-10">
    <div class="flex flex-col lg:flex-row items-center gap-12">
      <div class="lg:w-[55%] text-center lg:text-left">
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-sky-50 text-sky-600 rounded-full text-[10px] sm:text-xs font-black uppercase tracking-[0.2em] mb-6 animate-fade-in">
          <span class="relative flex h-2 w-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-sky-500"></span>
          </span>
          Award Winning Care in India
        </div>
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black mb-6 leading-[1.1] tracking-tight text-slate-900">
          Professional Laundry <br><span class="text-sky-500">Beyond Ordinary.</span>
        </h1>
        <p class="text-slate-500 text-sm sm:text-lg mb-8 leading-relaxed max-w-xl mx-auto lg:mx-0 font-medium">
          World-class fabric rejuvenation and dry cleaning for your daily wear and premium silk sarees. Pick-up to delivery, handled with purity.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
          <a href="<?php echo $base_path; ?>/pages/order/index.php" class="btn btn-primary py-4 px-8 text-sm shadow-2xl shadow-sky-500/40">
            BOOK A PICKUP <i class="fas fa-truck ml-2 text-xs"></i>
          </a>
          <a href="<?php echo $base_path; ?>/pages/services/index.php" class="btn btn-outline py-4 px-8 text-sm bg-white/50 backdrop-blur-sm">
            OUR PRICING
          </a>
        </div>
        
        <div class="mt-10 flex items-center justify-center lg:justify-start gap-8 opacity-60 grayscale hover:grayscale-0 transition-all">
          <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Google_Reviews_logo.svg" alt="Google" class="h-5 sm:h-6">
          <div class="h-8 w-px bg-slate-200"></div>
          <div class="flex items-center gap-1 text-slate-900 font-black text-sm">
            <span class="text-sky-500">4.9/5</span> Rating
          </div>
        </div>
      </div>
      
      <div class="lg:w-[45%] relative group">
        <div class="absolute -inset-4 bg-sky-500/10 rounded-[40px] blur-3xl group-hover:bg-sky-500/20 transition-all duration-700"></div>
        <div class="relative bg-white p-2 rounded-[32px] shadow-2xl overflow-hidden border border-slate-100 transform lg:rotate-2 hover:rotate-0 transition-transform duration-500">
           <img src="https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?q=80&w=2070&auto=format&fit=crop" alt="Laundry Care" class="rounded-[28px] w-full h-[400px] object-cover">
           <div class="absolute bottom-6 left-6 right-6 p-5 bg-white/90 backdrop-blur-md rounded-2xl border border-white shadow-xl">
             <div class="flex items-center justify-between mb-2">
               <span class="text-[10px] font-black text-sky-600 uppercase tracking-widest">Specialized Care</span>
               <div class="flex -space-x-2">
                 <div class="w-6 h-6 rounded-full bg-slate-100 border-2 border-white flex items-center justify-center text-[8px] font-bold">AJ</div>
                 <div class="w-6 h-6 rounded-full bg-sky-100 border-2 border-white flex items-center justify-center text-[8px] font-bold">MK</div>
               </div>
             </div>
             <p class="text-sm font-black text-slate-800 tracking-tight">Expert Saree Polishing & Dry Cleaning</p>
             <p class="text-[10px] text-slate-500 mt-1">Starting from ₹199 per unit</p>
           </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Trust Bar -->
<section class="py-12 bg-white border-y border-slate-50">
  <div class="container-responsive">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
      <div class="text-center group">
        <h3 class="text-3xl font-black text-slate-900 group-hover:text-sky-500 transition-colors">15k+</h3>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Happy Customers</p>
      </div>
      <div class="text-center group">
        <h3 class="text-3xl font-black text-slate-900 group-hover:text-sky-500 transition-colors">45+</h3>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Store Locations</p>
      </div>
      <div class="text-center group">
        <h3 class="text-3xl font-black text-slate-900 group-hover:text-sky-500 transition-colors">24h</h3>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Express Delivery</p>
      </div>
      <div class="text-center group">
        <h3 class="text-3xl font-black text-slate-900 group-hover:text-sky-500 transition-colors">100%</h3>
        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-1">Stain Removal</p>
      </div>
    </div>
  </div>
</section>

<!-- Indian Market Specialized Services -->
<section class="py-16 sm:py-24">
  <div class="container-responsive">
    <div class="max-w-2xl mb-12">
      <span class="text-sky-500 font-black text-xs uppercase tracking-widest">Premium Catalog</span>
      <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-2 tracking-tight">Mastering Fabric Craft.</h2>
    </div>
    
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
      <!-- Service 1 -->
      <div class="group p-8 rounded-[32px] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl transition-all duration-500">
        <div class="w-14 h-14 bg-white shadow-xl rounded-2xl flex items-center justify-center text-sky-500 text-2xl mb-8 group-hover:scale-110 transition-transform">
          <i class="fas fa-gem"></i>
        </div>
        <h3 class="text-xl font-black text-slate-900 mb-4 tracking-tight">Silk Saree Specialist</h3>
        <p class="text-slate-500 text-sm leading-relaxed mb-6">Expert dry cleaning and roller polishing for Kanchipuram and Banarasi silks. Preserving heritage in every thread.</p>
        <ul class="space-y-3 mb-8">
          <li class="flex items-center gap-3 text-xs font-bold text-slate-600"><i class="fas fa-check-circle text-sky-400"></i> Roller Polishing</li>
          <li class="flex items-center gap-3 text-xs font-bold text-slate-600"><i class="fas fa-check-circle text-sky-400"></i> Safe Stain Removal</li>
        </ul>
        <a href="pages/services/index.php" class="inline-flex items-center text-xs font-black text-sky-500 tracking-widest hover:gap-3 transition-all">VIEW RATES <i class="fas fa-arrow-right ml-2"></i></a>
      </div>

      <!-- Service 2 -->
      <div class="group p-8 rounded-[32px] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl transition-all duration-500">
        <div class="w-14 h-14 bg-white shadow-xl rounded-2xl flex items-center justify-center text-emerald-500 text-2xl mb-8 group-hover:scale-110 transition-transform">
          <i class="fas fa-tshirt"></i>
        </div>
        <h3 class="text-xl font-black text-slate-900 mb-4 tracking-tight">White & Starch Care</h3>
        <p class="text-slate-500 text-sm leading-relaxed mb-6">Traditional starching for cotton kurtas and shirts. Crystal white brilliance with professional crisp finish.</p>
        <ul class="space-y-3 mb-8">
          <li class="flex items-center gap-3 text-xs font-bold text-slate-600"><i class="fas fa-check-circle text-emerald-400"></i> Pure Cotton Starch</li>
          <li class="flex items-center gap-3 text-xs font-bold text-slate-600"><i class="fas fa-check-circle text-emerald-400"></i> Optical Brightening</li>
        </ul>
        <a href="pages/services/index.php" class="inline-flex items-center text-xs font-black text-emerald-500 tracking-widest hover:gap-3 transition-all">VIEW RATES <i class="fas fa-arrow-right ml-2"></i></a>
      </div>

      <!-- Service 3 -->
      <div class="group p-8 rounded-[32px] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl transition-all duration-500">
        <div class="w-14 h-14 bg-white shadow-xl rounded-2xl flex items-center justify-center text-orange-500 text-2xl mb-8 group-hover:scale-110 transition-transform">
          <i class="fas fa-couch"></i>
        </div>
        <h3 class="text-xl font-black text-slate-900 mb-4 tracking-tight">Home Essentials</h3>
        <p class="text-slate-500 text-sm leading-relaxed mb-6">Deep cleaning for heavy curtains, blankets, and sofa covers. Sanitizing your home, one fabric at a time.</p>
        <ul class="space-y-3 mb-8">
          <li class="flex items-center gap-3 text-xs font-bold text-slate-600"><i class="fas fa-check-circle text-orange-400"></i> Blankets & Quilts</li>
          <li class="flex items-center gap-3 text-xs font-bold text-slate-600"><i class="fas fa-check-circle text-orange-400"></i> Sanitized Wash</li>
        </ul>
        <a href="pages/services/index.php" class="inline-flex items-center text-xs font-black text-orange-500 tracking-widest hover:gap-3 transition-all">VIEW RATES <i class="fas fa-arrow-right ml-2"></i></a>
      </div>
    </div>
  </div>
</section>

<!-- How It Works (Micro-steps) -->
<section class="py-16 bg-slate-900 text-white rounded-[40px] sm:rounded-[60px] mx-4 overflow-hidden relative">
  <div class="absolute inset-0 bg-sky-500/5 pattern-dots"></div>
  <div class="container-responsive relative z-10">
    <div class="text-center mb-16">
      <h2 class="text-3xl font-black tracking-tight mb-4">Effortless as a Swipe.</h2>
      <p class="text-slate-400 text-xs uppercase tracking-[0.4em] font-medium">Standard Processing Flow</p>
    </div>
    
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-4 relative">
      <!-- Step 1 -->
      <div class="text-center group">
        <div class="w-16 h-16 bg-white/10 rounded-3xl flex items-center justify-center mx-auto mb-6 text-sky-400 text-2xl shadow-xl group-hover:rotate-12 transition-all">
          <i class="fas fa-calendar-check"></i>
        </div>
        <h4 class="text-sm font-black mb-2 uppercase tracking-widest">Book</h4>
        <p class="text-[10px] text-slate-500 leading-relaxed max-w-[150px] mx-auto">Select a convenient slot on our website.</p>
      </div>
      <!-- Step 2 -->
      <div class="text-center group">
        <div class="w-16 h-16 bg-white/10 rounded-3xl flex items-center justify-center mx-auto mb-6 text-sky-400 text-2xl shadow-xl group-hover:rotate-12 transition-all">
          <i class="fas fa-map-pin"></i>
        </div>
        <h4 class="text-sm font-black mb-2 uppercase tracking-widest">Pickup</h4>
        <p class="text-[10px] text-slate-500 leading-relaxed max-w-[150px] mx-auto">Our agent collects at your doorstep.</p>
      </div>
      <!-- Step 3 -->
      <div class="text-center group">
        <div class="w-16 h-16 bg-white/10 rounded-3xl flex items-center justify-center mx-auto mb-6 text-sky-400 text-2xl shadow-xl group-hover:rotate-12 transition-all">
          <i class="fas fa-sync-alt"></i>
        </div>
        <h4 class="text-sm font-black mb-2 uppercase tracking-widest">Process</h4>
        <p class="text-[10px] text-slate-500 leading-relaxed max-w-[150px] mx-auto">Expert cleaning using eco-detergents.</p>
      </div>
      <!-- Step 4 -->
      <div class="text-center group">
        <div class="w-16 h-16 bg-sky-500 rounded-3xl flex items-center justify-center mx-auto mb-6 text-white text-2xl shadow-xl group-hover:rotate-12 transition-all shadow-sky-500/50">
          <i class="fas fa-truck-loading"></i>
        </div>
        <h4 class="text-sm font-black mb-2 uppercase tracking-widest">Deliver</h4>
        <p class="text-[10px] text-slate-500 leading-relaxed max-w-[150px] mx-auto">Fresh clothes returned in 24-48 hours.</p>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 sm:py-32">
  <div class="container-responsive">
    <div class="text-center mb-16 px-4">
      <h2 class="text-3xl sm:text-5xl font-black text-slate-900 mb-6 tracking-tighter">Loved by thousands.</h2>
      <p class="text-slate-500 text-sm sm:text-lg max-w-xl mx-auto font-medium leading-relaxed">Don't just take our word for it—hear what our regular customers from Bangalore to Delhi have to say.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Testimonial 1 -->
      <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-xl hover:shadow-2xl transition-all">
        <div class="flex gap-1 text-orange-400 mb-6 text-xs">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <p class="text-slate-600 text-sm leading-relaxed mb-8 italic">"FreshSpin changed how I handle my laundry. Their dry cleaning for silk sarees is outstanding—my wedding Banarasi looks like I just bought it. Highly recommended!"</p>
        <div class="flex items-center gap-4 border-t border-slate-50 pt-6">
          <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center font-black text-sky-500 text-sm">AS</div>
          <div>
            <h4 class="text-sm font-black text-slate-800">Anita Sharma</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Elite Member • South Delhi</p>
          </div>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-xl hover:shadow-2xl transition-all">
        <div class="flex gap-1 text-orange-400 mb-6 text-xs">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <p class="text-slate-600 text-sm leading-relaxed mb-8 italic">"The starching on my cotton shirts is perfect—exactly how it used to be back in the day. The pickup agent is always on time, which is rare these days."</p>
        <div class="flex items-center gap-4 border-t border-slate-50 pt-6">
          <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center font-black text-sky-500 text-sm">RV</div>
          <div>
            <h4 class="text-sm font-black text-slate-800">Rajesh Varma</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Verified Customer • Bangalore</p>
          </div>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-xl hover:shadow-2xl transition-all md:col-span-2 lg:col-span-1">
        <div class="flex gap-1 text-orange-400 mb-6 text-xs">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <p class="text-slate-600 text-sm leading-relaxed mb-8 italic">"Extremely satisfied with their premium blanket service. They came back perfectly bagged and sanitized. The mobile-friendly website makes booking so easy!"</p>
        <div class="flex items-center gap-4 border-t border-slate-50 pt-6">
          <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center font-black text-sky-500 text-sm">PM</div>
          <div>
            <h4 class="text-sm font-black text-slate-800">Pooja Mishra</h4>
            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Home Maker • Mumbai</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Final CTA Section -->
<section class="mb-20 container-responsive">
  <div class="relative bg-sky-500 rounded-[40px] sm:rounded-[60px] p-8 sm:p-20 overflow-hidden text-center">
    <div class="absolute inset-0 bg-white/10 opacity-20 pattern-dots"></div>
    <div class="relative z-10 max-w-2xl mx-auto">
      <h2 class="text-3xl sm:text-6xl font-black text-white mb-6 tracking-tighter">Ready for that <br>New-Cloth Feel?</h2>
      <p class="text-sky-100 text-sm sm:text-lg mb-10 leading-relaxed font-medium">Join 15,000+ satisfied Indians who have claimed their weekends back. Your first pickup is just a click away.</p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="pages/order/index.php" class="bg-white text-sky-600 px-10 py-5 rounded-3xl font-black text-sm uppercase tracking-widest shadow-2xl transition-all hover:scale-105 active:scale-95">ORDER NOW</a>
        <a href="pages/contact/index.php" class="bg-sky-600 text-white border border-sky-400 px-10 py-5 rounded-3xl font-black text-sm uppercase tracking-widest transition-all hover:bg-sky-700">NEED HELP?</a>
      </div>
    </div>
    <!-- Decor -->
    <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/20 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-sky-400/50 rounded-full blur-3xl"></div>
  </div>
</section>

<!-- Service Areas (Localized) -->
<section class="py-12 bg-white">
  <div class="container-responsive">
    <div class="flex flex-col lg:flex-row items-center justify-between gap-8 p-8 bg-sky-50 rounded-[40px] border border-sky-100">
      <div class="lg:w-1/2">
        <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-2">Serving 50+ Neighborhoods</h3>
        <p class="text-sm text-slate-600 font-medium leading-relaxed">From South City to North Extension, our logistics network ensures your laundry is never far from professional care.</p>
      </div>
      <div class="flex flex-wrap gap-3 justify-center">
        <span class="px-5 py-2 bg-white text-slate-700 text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm border border-slate-100">South City</span>
        <span class="px-5 py-2 bg-white text-slate-700 text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm border border-slate-100">Civil Lines</span>
        <span class="px-5 py-2 bg-white text-slate-700 text-[10px] font-black uppercase tracking-widest rounded-full shadow-sm border border-slate-100">Model Town</span>
        <span class="px-5 py-2 bg-sky-500 text-white text-[10px] font-black uppercase tracking-widest rounded-full shadow-md">More +</span>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
