<?php
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<section class="min-h-[85vh] flex items-center py-6 sm:py-10 bg-slate-50">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row min-h-[450px] sm:min-h-[550px] border border-gray-100">
      <!-- Left Side: Branding (Compact) -->
      <div class="hidden md:flex w-[40%] bg-gradient-to-br from-sky-600 to-sky-400 p-8 lg:p-10 flex-col justify-center text-white relative">
        <div class="absolute inset-0 bg-white/5 opacity-20 pattern-dots"></div>
        <div class="relative z-10">
          <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 shadow-inner">
            <i class="fas fa-user-plus text-xl"></i>
          </div>
          <h2 class="text-2xl font-black mb-2 tracking-tight leading-tight">Join the<br>Family</h2>
          <p class="text-sky-100 text-xs leading-relaxed opacity-90">Experience premium laundry services with doorstep pickup and delivery.</p>
          <div class="mt-8 flex gap-1.5">
            <div class="w-1.5 h-1.5 rounded-full bg-white/30"></div>
            <div class="w-6 h-1.5 rounded-full bg-white"></div>
            <div class="w-1.5 h-1.5 rounded-full bg-white/30"></div>
          </div>
        </div>
      </div>

      <!-- Right Side: Form (Compact) -->
      <div class="w-full md:w-[60%] p-6 sm:p-8">
        <div class="mb-6">
          <h2 class="text-xl font-black text-slate-800 tracking-tight">Create Account</h2>
          <p class="text-gray-400 text-[11px] font-medium uppercase tracking-widest mt-1">Get started in seconds</p>
        </div>

        <form id="signupForm" class="space-y-4">
          <div class="space-y-1.5">
            <label class="block px-1 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Full Name</label>
            <div class="relative group">
              <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-sky-500 transition-colors text-xs"></i>
              <input type="text" name="fullName" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-100 rounded-xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 focus:bg-white transition-all outline-none font-semibold text-slate-700 text-sm" placeholder="e.g. John Doe" required>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-1.5">
              <label class="block px-1 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Email Address</label>
              <div class="relative group">
                <i class="fas fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-sky-500 transition-colors text-xs"></i>
                <input type="email" name="email" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-100 rounded-xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 focus:bg-white transition-all outline-none font-semibold text-slate-700 text-sm" placeholder="name@email.com" required>
              </div>
            </div>
            <div class="space-y-1.5">
              <label class="block px-1 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Phone Number</label>
              <div class="relative group">
                <i class="fas fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-sky-500 transition-colors text-xs"></i>
                <input type="text" name="phone" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-100 rounded-xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 focus:bg-white transition-all outline-none font-semibold text-slate-700 text-sm" placeholder="10-digit mobile" required>
              </div>
            </div>
          </div>

          <div class="space-y-1.5">
            <label class="block px-1 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Default Pickup Address</label>
            <div class="relative group">
              <i class="fas fa-map-marker-alt absolute left-4 top-3.5 text-slate-300 group-focus-within:text-sky-500 transition-colors text-xs"></i>
              <textarea name="address" class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-100 rounded-xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 focus:bg-white transition-all outline-none font-semibold text-slate-700 text-xs resize-none" placeholder="Enter your full address..." rows="2" required></textarea>
            </div>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-1.5">
              <label class="block px-1 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Password</label>
              <div class="relative group">
              <i class="fas fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-sky-500 transition-colors text-xs"></i>
              <input type="password" name="password" id="password" class="w-full pl-10 pr-10 py-2.5 bg-slate-50 border border-slate-100 rounded-xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 focus:bg-white transition-all outline-none font-semibold text-slate-700 text-sm" placeholder="••••••••" required>
              <button type="button" onclick="togglePassword('password', 'toggleIcon1')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-300 hover:text-sky-500 transition-colors focus:outline-none">
                <i id="toggleIcon1" class="fas fa-eye text-xs"></i>
              </button>
            </div>
            </div>
            <div class="space-y-1.5">
              <label class="block px-1 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Confirm</label>
              <div class="relative group">
              <i class="fas fa-check-double absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-sky-500 transition-colors text-xs"></i>
              <input type="password" name="confirm_password" id="confirm_password" class="w-full pl-10 pr-10 py-2.5 bg-slate-50 border border-slate-100 rounded-xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 focus:bg-white transition-all outline-none font-semibold text-slate-700 text-sm" placeholder="••••••••" required>
              <button type="button" onclick="togglePassword('confirm_password', 'toggleIcon2')" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-300 hover:text-sky-500 transition-colors focus:outline-none">
                <i id="toggleIcon2" class="fas fa-eye text-xs"></i>
              </button>
            </div>
            </div>
          </div>

          <button type="submit" id="submitBtn" class="w-full py-3.5 bg-sky-500 hover:bg-sky-600 text-white rounded-xl font-black text-sm shadow-lg shadow-sky-500/20 transition-all active:scale-[0.98] flex items-center justify-center gap-2 mt-4">
            <span>CREATE ACCOUNT</span>
            <i class="fas fa-arrow-right text-[10px]"></i>
          </button>
        </form>

        <div class="text-center mt-6 pt-4 border-t border-slate-50">
          <p class="text-slate-400 text-xs font-medium">Already a member? <a href="<?php echo $base_path; ?>/pages/login/index.php" class="text-sky-500 hover:underline font-bold ml-1">Log in here</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- OTP Verification Modal (Hidden) -->
<div id="otpModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4 animate-in fade-in duration-300">
  <div class="bg-white w-full max-w-sm rounded-[32px] shadow-2xl overflow-hidden animate-in zoom-in slide-in-from-bottom-8 duration-500 border border-slate-100">
    <div class="p-8 text-center">
      <div class="w-16 h-16 bg-sky-50 text-sky-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-inner ring-4 ring-sky-50/50">
        <i class="fas fa-shield-alt text-2xl"></i>
      </div>
      <h3 class="text-2xl font-black text-slate-800 mb-2 tracking-tight">Verify Identity</h3>
      <p class="text-slate-400 text-xs font-medium leading-relaxed mb-8">We've sent a 6-digit code to your email.<br>Please enter it below to confirm your account.</p>

      <div class="space-y-6">
        <div class="flex justify-center gap-2" id="otpInputGroup">
          <input type="text" maxlength="6" id="otpCode" class="w-full tracking-[0.5em] text-center text-2xl font-black py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl focus:border-sky-500 focus:bg-white focus:ring-4 focus:ring-sky-500/10 transition-all outline-none text-slate-800 placeholder:text-slate-200" placeholder="000000">
        </div>

        <button id="verifyOtpBtn" onclick="verifyOtp()" class="w-full py-4 bg-slate-900 hover:bg-slate-800 text-white rounded-2xl font-black text-sm tracking-widest shadow-xl active:scale-95 transition-all flex items-center justify-center gap-2 group">
          <span>VERIFY & JOIN</span>
          <i class="fas fa-check-circle text-[10px] opacity-50 group-hover:opacity-100"></i>
        </button>

        <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest">
          Didn't receive it?
          <button onclick="resendOtp()" class="text-sky-500 hover:text-sky-600 ml-1 hover:underline active:opacity-70 transition-all">Resend Code</button>
        </p>
      </div>
    </div>
  </div>
</div>

<script>
  let registeredEmail = '';

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

  document.getElementById('signupForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (password !== confirmPassword) {
      Swal.fire({
        icon: 'warning',
        title: 'Mismatch',
        text: 'Passwords do not match. Please check again.',
        confirmButtonColor: '#0ea5e9',
        toast: true,
        position: 'top-end',
        timer: 3000,
        showConfirmButton: false
      });
      return;
    }

    const formData = new FormData(this);
    const data = Object.fromEntries(formData.entries());
    data.shopId = "<?php echo STORE_ID; ?>";
    delete data.confirm_password;
    registeredEmail = data.email;

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Registering Account...';

    try {
      const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/register', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
      });

      const result = await response.json();

      if (response.ok) {
        // Success - show OTP modal instead of immediate login redirect
        document.getElementById('otpModal').classList.remove('hidden');
        Swal.fire({
          icon: 'success',
          title: 'Account Created',
          text: 'We found your details! Now just verify your email.',
          toast: true,
          position: 'top-end',
          timer: 4000,
          showConfirmButton: false
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Registration Failed',
          text: result.message || 'There was an issue creating your account.',
          confirmButtonColor: '#0ea5e9',
          customClass: { popup: 'rounded-3xl shadow-2xl border border-gray-100' }
        });
      }
    } catch (error) {
      console.error('Error:', error);
      Swal.fire({
        icon: 'error',
        title: 'Connection Error',
        text: 'Failed to connect to the server. Please try again later.',
        confirmButtonColor: '#0ea5e9'
      });
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = '<span>CREATE ACCOUNT</span><i class="fas fa-arrow-right text-[10px]"></i>';
    }
  });

  async function verifyOtp() {
    const otp = document.getElementById('otpCode').value;
    const verifyBtn = document.getElementById('verifyOtpBtn');

    if (otp.length !== 6) {
      Swal.fire({
        icon: 'warning',
        title: 'Invalid Code',
        text: 'Please enter the 6-digit verification code.',
        toast: true,
        position: 'top-end',
        timer: 3000,
        showConfirmButton: false
      });
      return;
    }

    verifyBtn.disabled = true;
    verifyBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Verifying...';

    try {
      const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/verify-otp', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: registeredEmail, otp: otp })
      });
      const result = await response.json();

      if (response.ok) {
        Swal.fire({
          icon: 'success',
          title: 'Verified!',
          text: 'Your account is now active. You can log in.',
          confirmButtonColor: '#0ea5e9',
          customClass: { popup: 'rounded-3xl shadow-2xl border border-gray-100' }
        }).then(() => {
          window.location.href = '../login/index.php';
        });
      } else {
        throw new Error(result.message || 'Verification failed');
      }
    } catch (err) {
      Swal.fire({
        icon: 'error',
        title: 'Verification Failed',
        text: err.message,
        confirmButtonColor: '#0ea5e9'
      });
    } finally {
      verifyBtn.disabled = false;
      verifyBtn.innerHTML = '<span>VERIFY & JOIN</span><i class="fas fa-check-circle text-[10px] opacity-50"></i>';
    }
  }

  async function resendOtp() {
    try {
      const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/resend-otp', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: registeredEmail })
      });
      const result = await response.json();

      if (response.ok) {
        Swal.fire({
          icon: 'success',
          title: 'Code Resent',
          text: 'New verification code has been sent to your email.',
          toast: true,
          position: 'top-end',
          timer: 3000,
          showConfirmButton: false
        });
      } else {
        throw new Error(result.message);
      }
    } catch (err) {
      Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: 'Could not resend code. Please try again.',
        toast: true,
        position: 'top-end',
        timer: 3000,
        showConfirmButton: false
      });
    }
  }
</script>

<?php include '../../includes/footer.php'; ?>
