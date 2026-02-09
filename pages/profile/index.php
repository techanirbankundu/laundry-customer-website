<?php
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<section class="py-6 sm:py-8 lg:py-10 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 xl:px-2 max-w-6xl xl:max-w-[1360px] 2xl:max-w-[1440px]">
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col md:flex-row gap-6 items-start">

        <!-- Sidebar: Profile Info -->
        <div class="w-full md:w-1/3">
          <div class="bg-white rounded-2xl shadow-xl p-5 sm:p-6 border border-gray-100 sticky top-24">
            <div class="text-center mb-4">
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
            
            <div class="space-y-3 border-t border-gray-100 pt-5">
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

            <button onclick="logout()" class="w-full mt-6 btn btn-outline py-2 border-red-200 text-red-500 hover:bg-red-500 hover:text-white lg:mt-8 text-xs">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </div>
        </div>

        <!-- Main Content: Order History -->
        <div class="w-full md:w-2/3">
          <div class="bg-white rounded-2xl shadow-xl p-5 sm:p-6 border border-gray-100 min-h-[500px]">
            <div class="flex items-center justify-between mb-6">
              <h3 class="text-lg sm:text-xl font-bold text-slate-800">Order History</h3>
              <span id="orderCount" class="px-2.5 py-0.5 bg-sky-50 text-sky-600 rounded-full text-[10px] font-bold uppercase tracking-wider">0 Orders</span>
            </div>

            <div id="ordersContainer" class="space-y-3">
              <!-- Loading State -->
              <div class="text-center py-16">
                <i class="fas fa-spinner fa-spin text-3xl text-sky-500 mb-3"></i>
                <p class="text-gray-500 text-sm">Retrieving your orders...</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- Order Details Modal -->
<div id="orderModal" class="fixed inset-0 z-[100] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:p-0">
    <!-- Backdrop with stronger blur -->
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-md transition-opacity" aria-hidden="true" onclick="closeModal()"></div>
    
    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    
    <!-- Modal Panel -->
    <div class="inline-block align-middle bg-white rounded-3xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:max-w-2xl sm:w-full relative z-10 border border-white/20">
      <div class="bg-white">
        <!-- Modal Header -->
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between bg-white sticky top-0 z-20">
          <div>
            <h3 class="text-xl font-extrabold text-slate-800" id="modalOrderNumber">Order Details</h3>
            <p id="modalOrderDate" class="text-xs text-gray-500 font-medium mt-0.5 tracking-wide"></p>
          </div>
          <button onclick="closeModal()" class="w-10 h-10 flex items-center justify-center text-gray-400 hover:text-slate-600 hover:bg-slate-100 rounded-full transition-all">
            <i class="fas fa-times text-lg"></i>
          </button>
        </div>
        
        <!-- Modal Content -->
        <div id="modalContent" class="p-6 sm:p-8 max-h-[70vh] overflow-y-auto custom-scrollbar">
           <!-- Dynamically populated -->
           <div class="text-center py-12">
             <div class="w-16 h-16 bg-sky-50 rounded-full flex items-center justify-center mx-auto mb-4">
               <i class="fas fa-spinner fa-spin text-2xl text-sky-500"></i>
             </div>
             <p class="text-slate-500 font-medium">Fetching detailed breakdown...</p>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>

</style>

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

    // Fetch Orders
    try {
      const ordersRes = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/orders', fetchOptions);
      const orders = await ordersRes.json();

      const ordersContainer = document.getElementById('ordersContainer');
      document.getElementById('orderCount').innerText = `${orders.length} Order${orders.length !== 1 ? 's' : ''}`;

      if (ordersRes.ok && orders.length > 0) {
        ordersContainer.innerHTML = orders.map(order => `
        <div onclick="showOrderDetails('${order.id}')" class="p-3.5 border border-gray-100 rounded-2xl hover:border-sky-300 hover:bg-white hover:shadow-lg transition-all group bg-slate-50/50 cursor-pointer">
          <div class="flex justify-between items-center">
            <div>
              <div class="flex items-center gap-2 mb-0.5">
                <span class="text-xs font-black text-slate-800 tracking-tight">${order.orderNumber}</span>
                <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase tracking-widest ${getStatusClass(order.status)}">
                    ${order.status.replace(/_/g, ' ')}
                </span>
              </div>
              <p class="text-[10px] text-gray-400 font-medium">
                <i class="far fa-calendar-alt mr-1"></i> ${new Date(order.createdAt).toLocaleDateString('en-US', { day: 'numeric', month: 'short' })}
              </p>
            </div>
            <div class="text-right">
                <p class="text-sm font-black text-sky-600 tracking-tighter">₹${parseFloat(order.totalAmount).toFixed(0)}</p>
            </div>
          </div>
        </div>
      `).join('');
      } else {
        ordersContainer.innerHTML = `
        <div class="text-center py-12 bg-slate-50 rounded-2xl border-2 border-dashed border-gray-100">
          <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-gray-300 mx-auto mb-3 shadow-sm">
            <i class="fas fa-shopping-basket text-lg"></i>
          </div>
          <h4 class="text-slate-800 font-bold mb-1 text-sm">No orders yet</h4>
          <p class="text-gray-500 text-[11px] mb-4">Experience the best laundry service today.</p>
          <a href="../order/index.php" class="btn btn-primary py-2 px-6 text-xs shadow-md">Place Order</a>
        </div>
      `;
      }
    } catch (err) {
      console.error('Orders fetch error:', err);
      Swal.fire({
        icon: 'error',
        title: 'History Error',
        text: 'Failed to load order history. Please try refreshing.',
        confirmButtonColor: '#0ea5e9'
      });
      document.getElementById('ordersContainer').innerHTML = '<p class="text-red-500 text-center py-10 text-xs">Failed to load order history.</p>';
    }
  });

  async function showOrderDetails(orderId) {
    const modal = document.getElementById('orderModal');
    const content = document.getElementById('modalContent');
    const title = document.getElementById('modalOrderNumber');
    const date = document.getElementById('modalOrderDate');
    
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    
    content.innerHTML = `
      <div class="text-center py-10">
        <i class="fas fa-spinner fa-spin text-3xl text-sky-500 mb-2"></i>
        <p class="text-gray-500 text-sm">Fetching detailed breakdown...</p>
      </div>
    `;

    try {
      const accessToken = localStorage.getItem('accessToken');
      const res = await fetch(`https://laundry-backend-two.vercel.app/api/v1/website/orders/${orderId}`, {
        headers: {
          'Authorization': `Bearer ${accessToken}`,
          'Content-Type': 'application/json'
        }
      });
      const data = await res.json();

      if (res.ok) {
        title.innerHTML = `${data.orderNumber} ${data.tagNumber ? `<span class="ml-2 text-xs bg-sky-100 text-sky-600 px-2 py-0.5 rounded font-mono">Tag: ${data.tagNumber}</span>` : ''}`;
        date.innerHTML = `<i class="far fa-calendar-alt mr-1"></i> ${new Date(data.createdAt).toLocaleString()}`;
        
        content.innerHTML = `
          <div class="space-y-6">
            <!-- Items Section -->
            <div>
              <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Order Items</h4>
              <div class="space-y-3">
                ${data.items.map(item => `
                  <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-100">
                    <div class="flex items-center gap-3">
                      <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center text-sky-500 shadow-sm border border-slate-100">
                        <i class="fas fa-tshirt"></i>
                      </div>
                      <div>
                        <p class="text-sm font-bold text-slate-800">${item.product.name}</p>
                        <p class="text-xs text-gray-500">${item.service.name} • ${item.quantity} Unit(s)</p>
                      </div>
                    </div>
                    <div class="text-right">
                      <p class="text-sm font-bold text-slate-800">₹${parseFloat(item.price).toFixed(2)}</p>
                      ${item.productTagNumber ? `<p class="text-[10px] text-sky-500 font-medium">Tag: ${item.productTagNumber}</p>` : ''}
                    </div>
                  </div>
                `).join('')}
              </div>
            </div>

            <!-- Shop Info & Payment Summary -->
            <div class="grid sm:grid-cols-2 gap-6 pt-2">
              <div>
                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Shop Information</h4>
                <div class="p-4 bg-sky-50 rounded-xl border border-sky-100">
                  <p class="text-sm font-bold text-sky-900 mb-1">${data.shop.shopName}</p>
                  <p class="text-xs text-sky-700/70 leading-relaxed mb-2">${data.shop.address}</p>
                  <p class="text-xs font-medium text-sky-800"><i class="fas fa-phone-alt mr-1"></i> ${data.shop.phone}</p>
                </div>
              </div>
              <div>
                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Payment Summary</h4>
                <div class="space-y-2">
                  <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Subtotal</span>
                    <span class="font-medium text-slate-700">₹${(parseFloat(data.totalAmount) - parseFloat(data.taxAmount)).toFixed(2)}</span>
                  </div>
                  <div class="flex justify-between text-sm">
                    <span class="text-gray-500">Tax (${data.taxPercentage}%)</span>
                    <span class="font-medium text-slate-700">₹${parseFloat(data.taxAmount).toFixed(2)}</span>
                  </div>
                  <div class="flex justify-between pt-2 border-t border-gray-100">
                    <span class="font-bold text-slate-800 text-base">Total Amount</span>
                    <span class="font-extrabold text-sky-600 text-lg">₹${parseFloat(data.totalAmount).toFixed(2)}</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Status Footer -->
            <div class="pt-4 border-t border-gray-100 flex flex-wrap gap-3">
               <div class="px-4 py-2 bg-slate-100 rounded-lg text-xs font-bold text-slate-600 flex items-center gap-2">
                 <i class="fas fa-info-circle"></i> Status: ${data.status.replace(/_/g, ' ')}
               </div>
               <div class="px-4 py-2 ${parseFloat(data.paidAmount) >= parseFloat(data.totalAmount) ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600'} rounded-lg text-xs font-bold flex items-center gap-2">
                 <i class="fas ${parseFloat(data.paidAmount) >= parseFloat(data.totalAmount) ? 'fa-check-circle' : 'fa-clock'}"></i> 
                 ${parseFloat(data.paidAmount) >= parseFloat(data.totalAmount) ? 'Fully Paid' : 'Payment Pending: ₹' + (parseFloat(data.totalAmount) - parseFloat(data.paidAmount)).toFixed(2)}
               </div>
            </div>
          </div>
        `;
      }
    } catch (err) {
      content.innerHTML = `<p class="text-red-500 text-center py-10">Error loading details. Please try again.</p>`;
    }
  }

  function closeModal() {
    document.getElementById('orderModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
  }

  function getStatusClass(status) {
    switch (status) {
      case 'PICKUP_PENDING':
        return 'bg-amber-100 text-amber-600';
      case 'PICKED_UP':
        return 'bg-blue-100 text-blue-600';
      case 'PROCESSING':
        return 'bg-sky-100 text-sky-600';
      case 'COMPLETED':
        return 'bg-emerald-100 text-emerald-600';
      case 'CANCELLED':
        return 'bg-red-100 text-red-600';
      default:
        return 'bg-gray-100 text-gray-600';
    }
  }

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
