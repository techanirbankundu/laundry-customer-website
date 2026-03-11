<?php
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<section class="py-6 sm:py-8 lg:py-10 bg-gradient-to-b from-blue-50 to-white min-h-[60vh]">
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 xl:px-2 max-w-6xl xl:max-w-[1360px] 2xl:max-w-[1440px]">
    <div class="max-w-3xl mx-auto">

      <!-- Profile Card -->
      <div class="bg-white rounded-2xl shadow-xl p-5 sm:p-8 border border-gray-100">
        <div class="text-center mb-6">
          <div class="w-20 h-20 bg-sky-100 rounded-full flex items-center justify-center text-sky-600 text-2xl mx-auto mb-3 border-4 border-white shadow-md">
            <i class="fas fa-user"></i>
          </div>
          <h2 id="profileName" class="text-xl font-bold text-slate-800">Loading...</h2>

          <div id="verificationContainer" class="flex flex-col items-center">
            <div id="verificationBadge" class="mt-1.5 inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider">
              <i class="fas fa-circle-notch fa-spin"></i> Checking status
            </div>
            <button id="verifyNowBtn" onclick="initiateVerification()" class="hidden mt-2 text-[10px] font-black text-sky-500 hover:text-sky-600 bg-sky-50 px-3 py-1 rounded-lg uppercase tracking-widest transition-all">
              Verify Now <i class="fas fa-arrow-right ml-1"></i>
            </button>
          </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-4 border-t border-gray-100 pt-6">
          <div class="flex items-start gap-2.5">
            <div class="mt-0.5 w-7 h-7 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
              <i class="fas fa-envelope text-[10px]"></i>
            </div>
            <div class="min-w-0 flex-1">
              <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Email Address</p>
              <p id="profileEmail" class="text-slate-700 font-medium text-sm truncate">Loading...</p>
            </div>
          </div>

          <div class="flex items-start gap-2.5">
            <div class="mt-0.5 w-7 h-7 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
              <i class="fas fa-phone text-[10px]"></i>
            </div>
            <div>
              <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Phone Number</p>
              <p id="profilePhone" class="text-slate-700 font-medium text-sm">Loading...</p>
            </div>
          </div>

          <div class="flex items-start gap-2.5">
            <div class="mt-0.5 w-7 h-7 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
              <i class="fas fa-map-marker-alt text-[10px]"></i>
            </div>
            <div>
              <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Default Address</p>
              <p id="profileAddress" class="text-slate-700 font-medium text-sm leading-snug">Loading...</p>
            </div>
          </div>

          <div class="flex items-start gap-2.5">
            <div class="mt-0.5 w-7 h-7 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
              <i class="fas fa-store text-[10px]"></i>
            </div>
            <div>
              <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Registered Shop</p>
              <p id="profileShop" class="text-slate-700 font-medium text-sm">Loading...</p>
            </div>
          </div>
        </div>

        <button onclick="logout()" class="w-full mt-6 btn btn-outline py-2.5 border-red-200 text-red-500 hover:bg-red-500 hover:text-white text-xs">
          <i class="fas fa-sign-out-alt"></i> Logout
        </button>
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
          <span>VERIFY NOW</span>
          <i class="fas fa-check-circle text-[10px] opacity-50 group-hover:opacity-100"></i>
        </button>

        <p class="text-[10px] font-black text-slate-300 uppercase tracking-widest">
          Didn't receive it?
          <button onclick="resendOtp()" class="text-sky-500 hover:text-sky-600 ml-1 hover:underline active:opacity-70 transition-all">Resend Code</button>
        </p>
      </div>
      <button onclick="closeOtpModal()" class="mt-4 text-xs font-bold text-gray-400 hover:text-slate-600">Cancel</button>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', async function() {
    const accessToken = localStorage.getItem('accessToken');
    if (!accessToken) {
      window.location.href = '../login/index.php';
      return;
    }

    // Common fetch options
    const fetchOptions = {
      headers: {
        'Authorization': `Bearer ${accessToken}`,
        'Content-Type': 'application/json'
      }
    };

    // Fetch Verification Status
    try {
      const verifyRes = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/check-verification', fetchOptions);
      const verifyData = await verifyRes.json();
      const badge = document.getElementById('verificationBadge');

      if (verifyData.isVerified) {
        badge.className = 'mt-2 inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 text-emerald-600 rounded-full text-[10px] font-bold uppercase tracking-wider';
        badge.innerHTML = '<i class="fas fa-check-circle"></i> Verified';
        document.getElementById('verifyNowBtn').classList.add('hidden');
      } else {
        badge.className = 'mt-2 inline-flex items-center gap-1.5 px-3 py-1 bg-amber-100 text-amber-600 rounded-full text-[10px] font-bold uppercase tracking-wider';
        badge.innerHTML = '<i class="fas fa-exclamation-circle"></i> Pending Verification';
        document.getElementById('verifyNowBtn').classList.remove('hidden');
      }
    } catch (err) {
      console.error('Verification check error:', err);
      badge.className = 'hidden';
    }

    // Fetch Profile
    try {
      const profileRes = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/profile', fetchOptions);
      const profileData = await profileRes.json();

      if (profileRes.ok) {
        document.getElementById('profileName').innerText = profileData.user.fullName;
        document.getElementById('profileEmail').innerText = profileData.user.email;
        document.getElementById('profilePhone').innerText = profileData.user.phone || 'Not provided';
        document.getElementById('profileAddress').innerText = profileData.user.address || 'No address saved';
        document.getElementById('profileShop').innerText = profileData.customerProfile.shopId ? 'Main Laundry Store' : 'General';
      }
    } catch (err) {
      console.error('Profile fetch error:', err);
      Swal.fire({
        icon: 'error',
        title: 'Profile Error',
        text: 'Failed to retrieve profile data. Please check your connection.',
        confirmButtonColor: '#0ea5e9'
      });
    }
  });

  // OTP Verification Logic
  let userEmail = '';
  const userStr = localStorage.getItem('user');
  if (userStr) {
    userEmail = JSON.parse(userStr).email;
  }

  function initiateVerification() {
    document.getElementById('otpModal').classList.remove('hidden');
    resendOtp(true); // Silent resend
  }

  function closeOtpModal() {
    document.getElementById('otpModal').classList.add('hidden');
  }

  async function verifyOtp() {
    const otp = document.getElementById('otpCode').value;
    const btn = document.getElementById('verifyOtpBtn');

    if (otp.length !== 6) {
      Swal.fire({ icon: 'warning', title: 'Invalid Code', text: 'Enter 6-digit OTP', toast: true, position: 'top-end', timer: 2000, showConfirmButton: false });
      return;
    }

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Verifying...';

    try {
      const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/verify-otp', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: userEmail, otp: otp })
      });
      const result = await response.json();

      if (response.ok) {
        Swal.fire({ icon: 'success', title: 'Account Verified!', text: 'Your status has been updated.', confirmButtonColor: '#0ea5e9' }).then(() => {
          location.reload();
        });
      } else {
        throw new Error(result.message);
      }
    } catch (err) {
      Swal.fire({ icon: 'error', title: 'Failed', text: err.message, confirmButtonColor: '#0ea5e9' });
    } finally {
      btn.disabled = false;
      btn.innerHTML = 'VERIFY NOW';
    }
  }

  async function resendOtp(silent = false) {
    try {
      const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/resend-otp', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: userEmail })
      });
      if (response.ok && !silent) {
        Swal.fire({ icon: 'success', title: 'Sent!', text: 'Verification code resent.', toast: true, position: 'top-end', timer: 2000, showConfirmButton: false });
      }
    } catch (err) {
      if (!silent) Swal.fire({ icon: 'error', title: 'Error', text: 'Could not resend OTP.', toast: true, position: 'top-end', timer: 2000, showConfirmButton: false });
    }
  }
</script>

<?php include '../../includes/footer.php'; ?>
