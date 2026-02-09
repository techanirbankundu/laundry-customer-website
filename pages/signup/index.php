<?php
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<section class="min-h-screen flex items-center py-8 sm:py-12 bg-slate-50">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="max-w-4xl mx-auto bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl overflow-hidden flex flex-col md:flex-row min-h-[500px] sm:min-h-[600px]">
      <!-- Left Side: Branding -->
      <div class="hidden md:flex w-1/2 bg-gradient-to-br from-indigo-600 to-sky-500 p-8 lg:p-12 flex-col justify-center text-white relative">
        <div class="absolute inset-0 bg-white/10 opacity-30 pattern-dots"></div>
        <div class="relative z-10 text-center">
          <div class="w-16 h-16 lg:w-20 lg:h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 lg:mb-6">
            <i class="fas fa-user-plus text-xl lg:text-3xl"></i>
          </div>
          <h2 class="text-2xl lg:text-3xl font-bold mb-3 lg:mb-4">Join FreshSpin</h2>
          <p class="text-sky-100 text-sm lg:text-lg leading-relaxed">Create an account today and experience laundry freedom.</p>
          <div class="mt-6 lg:mt-8 flex justify-center gap-2">
            <div class="w-2 h-2 rounded-full bg-white opacity-50"></div>
            <div class="w-2 h-2 rounded-full bg-white opacity-50"></div>
            <div class="w-2 h-2 rounded-full bg-white"></div>
          </div>
        </div>
      </div>

      <!-- Right Side: Form -->
      <div class="w-full md:w-1/2 p-6 sm:p-8 lg:p-10">
        <!-- Mobile branding -->
        <div class="md:hidden text-center mb-6">
          <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-sky-500 rounded-full flex items-center justify-center mx-auto mb-3 text-white">
            <i class="fas fa-user-plus text-lg"></i>
          </div>
        </div>
        <div class="text-center mb-6 sm:mb-8">
          <h2 class="text-2xl sm:text-2xl font-bold mb-1 sm:mb-2 text-slate-800">Create Account</h2>
          <p class="text-gray-500 text-sm sm:text-base">Join us for premium laundry services</p>
        </div>
        <form id="signupForm">
          <div class="mb-4 sm:mb-5">
            <label class="block mb-1.5 sm:mb-2 font-semibold text-xs sm:text-sm text-slate-600">Full Name</label>
            <div class="relative">
              <i class="fas fa-user absolute left-3 sm:left-4 top-3 sm:top-3.5 text-gray-400 text-sm"></i>
              <input type="text" name="fullName" class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="John Doe" required>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="mb-4 sm:mb-5">
              <label class="block mb-1.5 sm:mb-2 font-semibold text-xs sm:text-sm text-slate-600">Email Address</label>
              <div class="relative">
                <i class="fas fa-envelope absolute left-3 sm:left-4 top-3 sm:top-3.5 text-gray-400 text-sm"></i>
                <input type="email" name="email" class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="you@example.com" required>
              </div>
            </div>
            <div class="mb-4 sm:mb-5">
              <label class="block mb-1.5 sm:mb-2 font-semibold text-xs sm:text-sm text-slate-600">Phone Number</label>
              <div class="relative">
                <i class="fas fa-phone absolute left-3 sm:left-4 top-3 sm:top-3.5 text-gray-400 text-sm"></i>
                <input type="text" name="phone" class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="1234567890" required>
              </div>
            </div>
          </div>

          <div class="mb-4 sm:mb-5">
            <label class="block mb-1.5 sm:mb-2 font-semibold text-xs sm:text-sm text-slate-600">Address</label>
            <div class="relative">
              <i class="fas fa-map-marker-alt absolute left-3 sm:left-4 top-3 sm:top-3.5 text-gray-400 text-sm"></i>
              <textarea name="address" class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="Your Address" rows="2" required></textarea>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="mb-4 sm:mb-5">
              <label class="block mb-1.5 sm:mb-2 font-semibold text-xs sm:text-sm text-slate-600">Password</label>
              <div class="relative">
                <i class="fas fa-lock absolute left-3 sm:left-4 top-3 sm:top-3.5 text-gray-400 text-sm"></i>
                <input type="password" name="password" id="password" class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="••••••••" required>
              </div>
            </div>
            <div class="mb-5 sm:mb-6">
              <label class="block mb-1.5 sm:mb-2 font-semibold text-xs sm:text-sm text-slate-600">Confirm Password</label>
              <div class="relative">
                <i class="fas fa-lock absolute left-3 sm:left-4 top-3 sm:top-3.5 text-gray-400 text-sm"></i>
                <input type="password" name="confirm_password" id="confirm_password" class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="••••••••" required>
              </div>
            </div>
          </div>

          <button type="submit" id="submitBtn" class="btn btn-primary w-full text-base sm:text-lg shadow-lg shadow-sky-500/20">Sign Up</button>
        </form>
        <div class="text-center mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-gray-100">
          <p class="text-gray-500 text-sm sm:text-base">Already have an account? <a href="<?php echo $base_path; ?>/pages/login/index.php" class="text-sky-600 hover:text-sky-700 font-bold">Login</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.getElementById('signupForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
      alert('Passwords do not match!');
      return;
    }

    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());

    // Add shopId
    data.shopId = "<?php echo STORE_ID; ?>";

    // Remove confirm_password before sending
    delete data.confirm_password;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Creating Account...';

    try {
      const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
      });

      const result = await response.json();

      if (response.ok) {
        alert('Registration successful! Please login.');
        window.location.href = '../login/index.php';
      } else {
        alert('Registration failed: ' + (result.message || 'Unknown error'));
      }
    } catch (error) {
      console.error('Error:', error);
      alert('An error occurred. Please try again later.');
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'Sign Up';
    }
  });
</script>

<?php include '../../includes/footer.php'; ?>
