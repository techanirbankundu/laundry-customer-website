<?php include '../../includes/header.php'; ?>

<section class="min-h-screen flex items-center py-6 sm:py-8 bg-slate-50">
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 xl:px-2 max-w-6xl xl:max-w-[1360px] 2xl:max-w-[1440px]">
    <div class="max-w-4xl mx-auto bg-white rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl overflow-hidden flex flex-col md:flex-row min-h-[350px] sm:min-h-[450px]">
      <!-- Left Side: Branding -->
      <div class="hidden md:flex w-1/2 bg-gradient-to-br from-sky-500 to-indigo-600 p-6 lg:p-8 flex-col justify-center text-white relative">
        <div class="absolute inset-0 bg-white/10 opacity-30 pattern-dots"></div>
        <div class="relative z-10 text-center">
          <div class="w-14 h-14 lg:w-16 lg:h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-3 lg:mb-4">
            <i class="fas fa-soap text-xl lg:text-3xl"></i>
          </div>
          <h2 class="text-xl lg:text-3xl font-bold mb-2 lg:mb-3">FreshSpin Laundry</h2>
          <p class="text-sky-100 text-xs lg:text-base leading-relaxed">Premium laundry services delivered right to your doorstep.</p>
        </div>
      </div>

      <!-- Right Side: Form -->
      <div class="w-full md:w-1/2 p-5 sm:p-6 lg:p-8">
        <!-- Mobile branding -->
        <div class="md:hidden text-center mb-4">
          <div class="w-10 h-10 bg-gradient-to-br from-sky-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-2 text-white">
            <i class="fas fa-soap text-lg"></i>
          </div>
        </div>
        <div class="text-center mb-4 sm:mb-6">
          <h2 class="text-xl sm:text-2xl font-bold mb-1 text-slate-800">Welcome Back!</h2>
          <p class="text-gray-500 text-xs sm:text-sm">Login to manage your orders</p>
        </div>
        <form id="loginForm">
          <div class="mb-3 sm:mb-4">
            <label class="block mb-1 font-semibold text-[11px] sm:text-xs text-slate-600 uppercase tracking-wider">Email Address</label>
            <div class="relative">
              <i class="fas fa-envelope absolute left-3 top-3 text-gray-400 text-xs"></i>
              <input type="email" name="email" class="w-full pl-9 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm" placeholder="you@example.com" required>
            </div>
          </div>
          <div class="mb-3 sm:mb-4">
            <label class="block mb-1 font-semibold text-[11px] sm:text-xs text-slate-600 uppercase tracking-wider">Password</label>
            <div class="relative group">
              <i class="fas fa-lock absolute left-3 top-3 text-gray-400 text-xs"></i>
              <input type="password" name="password" id="passwordInput" class="w-full pl-9 pr-10 py-2 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm" placeholder="••••••••" required>
              <button type="button" onclick="togglePassword('passwordInput', 'toggleIcon')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-sky-500 transition-colors focus:outline-none">
                <i id="toggleIcon" class="fas fa-eye text-xs"></i>
              </button>
            </div>
          </div>
          <div class="flex items-center justify-between mb-4 sm:mb-6 text-[10px] sm:text-xs">
            <label class="flex items-center gap-1.5 cursor-pointer text-gray-600 hover:text-gray-800">
              <input type="checkbox" class="w-3 h-3 text-sky-600 rounded focus:ring-sky-500 border-gray-300"> <span>Remember me</span>
            </label>
            <a href="#" class="text-sky-600 hover:text-sky-700 font-medium">Forgot password?</a>
          </div>
          <button type="submit" id="loginBtn" class="btn btn-primary w-full py-2.5 text-sm sm:text-base shadow-lg shadow-sky-500/20">Login</button>
        </form>
        <div class="text-center mt-5 sm:mt-6 pt-4 border-t border-gray-100">
          <p class="text-gray-500 text-xs sm:text-sm">Don't have an account? <a href="<?php echo $base_path; ?>/pages/signup/index.php" class="text-sky-600 hover:text-sky-700 font-bold">Sign up</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
    } else {
      input.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.add('fa-eye');
    }
  }

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
        localStorage.setItem('accessToken', result.accessToken);
        localStorage.setItem('user', JSON.stringify(result.user));

        Swal.fire({
          icon: 'success',
          title: 'Welcome Back!',
          text: result.message || 'Login successful!',
          showConfirmButton: false,
          timer: 1500,
          background: '#ffffff',
          customClass: {
            popup: 'rounded-3xl border border-gray-100 shadow-2xl'
          }
        }).then(() => {
          window.location.href = '<?php echo $base_path; ?>/index.php';
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Login Failed',
          text: result.message || 'Invalid credentials. Please check your email and password.',
          confirmButtonColor: '#0ea5e9',
          customClass: {
            popup: 'rounded-3xl border border-gray-100 shadow-2xl',
            confirmButton: 'rounded-xl font-bold px-6 py-2'
          }
        });
      }
    } catch (error) {
      console.error('Error:', error);
      Swal.fire({
        icon: 'error',
        title: 'Connection Error',
        text: 'An error occurred while connecting to the server. Please check your internet connection and try again.',
        confirmButtonColor: '#0ea5e9',
        customClass: {
          popup: 'rounded-3xl border border-gray-100 shadow-2xl',
          confirmButton: 'rounded-xl font-bold px-6 py-2'
        }
      });
    } finally {
      loginBtn.disabled = false;
      loginBtn.innerHTML = 'Login';
    }
  });
</script>

<?php include '../../includes/footer.php'; ?>
