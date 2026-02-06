<?php include '../../includes/header.php'; ?>

<section class="min-h-screen flex items-center py-8 sm:py-12 bg-slate-50">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="max-w-4xl mx-auto bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl overflow-hidden flex flex-col md:flex-row min-h-[400px] sm:min-h-[500px]">
      <!-- Left Side: Branding -->
      <div class="hidden md:flex w-1/2 bg-gradient-to-br from-sky-500 to-indigo-600 p-8 lg:p-12 flex-col justify-center text-white relative">
        <div class="absolute inset-0 bg-white/10 opacity-30 pattern-dots"></div>
        <div class="relative z-10 text-center">
          <div class="w-16 h-16 lg:w-20 lg:h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 lg:mb-6">
            <i class="fas fa-soap text-2xl lg:text-4xl"></i>
          </div>
          <h2 class="text-2xl lg:text-4xl font-bold mb-3 lg:mb-4">FreshSpin Laundry</h2>
          <p class="text-sky-100 text-sm lg:text-lg leading-relaxed">Premium laundry services delivered right to your doorstep.</p>
          <div class="mt-6 lg:mt-8 flex justify-center gap-2">
            <div class="w-2 h-2 rounded-full bg-white opacity-50"></div>
            <div class="w-2 h-2 rounded-full bg-white"></div>
            <div class="w-2 h-2 rounded-full bg-white opacity-50"></div>
          </div>
        </div>
      </div>

      <!-- Right Side: Form -->
      <div class="w-full md:w-1/2 p-6 sm:p-8 lg:p-10">
        <!-- Mobile branding -->
        <div class="md:hidden text-center mb-6">
          <div class="w-12 h-12 bg-gradient-to-br from-sky-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-3 text-white">
            <i class="fas fa-soap text-xl"></i>
          </div>
        </div>
        <div class="text-center mb-6 sm:mb-8">
          <h2 class="text-2xl sm:text-3xl font-bold mb-1 sm:mb-2 text-slate-800">Welcome Back!</h2>
          <p class="text-gray-500 text-sm sm:text-base">Login to manage your orders</p>
        </div>
        <form id="loginForm">
          <div class="mb-4 sm:mb-5">
            <label class="block mb-1.5 sm:mb-2 font-semibold text-xs sm:text-sm text-slate-600">Email Address</label>
            <div class="relative">
              <i class="fas fa-envelope absolute left-3 sm:left-4 top-3 sm:top-3.5 text-gray-400 text-sm"></i>
              <input type="email" name="email" class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="you@example.com" required>
            </div>
          </div>
          <div class="mb-4 sm:mb-5">
            <label class="block mb-1.5 sm:mb-2 font-semibold text-xs sm:text-sm text-slate-600">Password</label>
            <div class="relative">
              <i class="fas fa-lock absolute left-3 sm:left-4 top-3 sm:top-3.5 text-gray-400 text-sm"></i>
              <input type="password" name="password" class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="••••••••" required>
            </div>
          </div>
          <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 sm:gap-0 mb-5 sm:mb-6 text-xs sm:text-sm">
            <label class="flex items-center gap-2 cursor-pointer text-gray-600 hover:text-gray-800">
              <input type="checkbox" class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-sky-600 rounded focus:ring-sky-500 border-gray-300"> <span>Remember me</span>
            </label>
            <a href="#" class="text-sky-600 hover:text-sky-700 font-medium">Forgot password?</a>
          </div>
          <button type="submit" id="loginBtn" class="btn btn-primary w-full text-base sm:text-lg shadow-lg shadow-sky-500/20">Login</button>
        </form>
        <div class="text-center mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-gray-100">
          <p class="text-gray-500 text-sm sm:text-base">Don't have an account? <a href="<?php echo $base_path; ?>/pages/signup/index.php" class="text-sky-600 hover:text-sky-700 font-bold">Sign up</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.getElementById('loginForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  
  const loginBtn = document.getElementById('loginBtn');
  const formData = new FormData(this);
  const data = Object.fromEntries(formData.entries());

  loginBtn.disabled = true;
  loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Logging in...';

  try {
    const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    });

    const result = await response.json();

    if (response.ok) {
      // Store accessToken and user data as per provided response structure
      localStorage.setItem('accessToken', result.accessToken);
      localStorage.setItem('user', JSON.stringify(result.user));
      
      alert(result.message || 'Login successful!');
      window.location.href = '<?php echo $base_path; ?>/index.php';
    } else {
      alert('Login failed: ' + (result.message || 'Invalid credentials. Please check your email and password.'));
    }
  } catch (error) {
    console.error('Error:', error);
    alert('An error occurred while connecting to the server. Please check your internet connection and try again.');
  } finally {
    loginBtn.disabled = false;
    loginBtn.innerHTML = 'Login';
  }
});
</script>

<?php include '../../includes/footer.php'; ?>
