<?php include '../../includes/header.php'; ?>

<section class="min-h-screen flex items-center py-12 bg-slate-50">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden flex min-h-[600px]">
      <!-- Left Side: Branding -->
      <div class="hidden md:flex w-1/2 bg-gradient-to-br from-indigo-600 to-sky-500 p-12 flex-col justify-center text-white relative">
        <div class="absolute inset-0 bg-white/10 opacity-30 pattern-dots"></div>
        <div class="relative z-10 text-center">
          <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-user-plus text-3xl"></i>
          </div>
          <h2 class="text-4xl font-bold mb-4">Join FreshSpin</h2>
          <p class="text-sky-100 text-lg leading-relaxed">Create an account today and experience laundry freedom.</p>
          <div class="mt-8 flex justify-center gap-2">
            <div class="w-2 h-2 rounded-full bg-white opacity-50"></div>
            <div class="w-2 h-2 rounded-full bg-white opacity-50"></div>
            <div class="w-2 h-2 rounded-full bg-white"></div>
          </div>
        </div>
      </div>

      <!-- Right Side: Form -->
      <div class="w-full md:w-1/2 p-10">
        <div class="text-center mb-8">
          <h2 class="text-3xl font-bold mb-2 text-slate-800">Create Account</h2>
          <p class="text-gray-500">Join us for premium laundry services</p>
        </div>
        <form action="signup_process.php" method="POST">
          <div class="mb-5">
            <label class="block mb-2 font-semibold text-sm text-slate-600">Full Name</label>
            <div class="relative">
              <i class="fas fa-user absolute left-4 top-3.5 text-gray-400"></i>
              <input type="text" name="fullname" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" placeholder="John Doe" required>
            </div>
          </div>
          <div class="mb-5">
            <label class="block mb-2 font-semibold text-sm text-slate-600">Email Address</label>
            <div class="relative">
              <i class="fas fa-envelope absolute left-4 top-3.5 text-gray-400"></i>
              <input type="email" name="email" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" placeholder="you@example.com" required>
            </div>
          </div>
          <div class="mb-5">
            <label class="block mb-2 font-semibold text-sm text-slate-600">Password</label>
            <div class="relative">
              <i class="fas fa-lock absolute left-4 top-3.5 text-gray-400"></i>
              <input type="password" name="password" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" placeholder="••••••••" required>
            </div>
          </div>
          <div class="mb-6">
            <label class="block mb-2 font-semibold text-sm text-slate-600">Confirm Password</label>
            <div class="relative">
              <i class="fas fa-lock absolute left-4 top-3.5 text-gray-400"></i>
              <input type="password" name="confirm_password" class="w-full pl-11 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all" placeholder="••••••••" required>
            </div>
          </div>

          <button type="submit" class="btn btn-primary w-full text-lg shadow-lg shadow-sky-500/20">Sign Up</button>
        </form>
        <div class="text-center mt-8 pt-6 border-t border-gray-100">
          <p class="text-gray-500">Already have an account? <a href="<?php echo $base_path; ?>/pages/login/index.php" class="text-sky-600 hover:text-sky-700 font-bold">Login</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include '../../includes/footer.php'; ?>
