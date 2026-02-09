<?php
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<section class="py-10 sm:py-12 lg:py-14 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col md:flex-row gap-8 items-start">

        <!-- Sidebar: Profile Info -->
        <div class="w-full md:w-1/3">
          <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 border border-gray-100 sticky top-24">
            <div class="text-center mb-6">
              <div class="w-24 h-24 bg-sky-100 rounded-full flex items-center justify-center text-sky-600 text-3xl mx-auto mb-4 border-4 border-white shadow-md">
                <i class="fas fa-user"></i>
              </div>
              <h2 id="profileName" class="text-2xl font-bold text-slate-800">Loading...</h2>
              <p id="profileEmail" class="text-gray-500 text-sm">Loading...</p>
            </div>

            <div class="space-y-4 border-t border-gray-100 pt-6">
              <div class="flex items-start gap-3">
                <div class="mt-1 w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                  <i class="fas fa-phone text-xs"></i>
                </div>
                <div>
                  <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Phone Number</p>
                  <p id="profilePhone" class="text-slate-700 font-medium">Loading...</p>
                </div>
              </div>

              <div class="flex items-start gap-3">
                <div class="mt-1 w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                  <i class="fas fa-map-marker-alt text-xs"></i>
                </div>
                <div>
                  <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Default Address</p>
                  <p id="profileAddress" class="text-slate-700 font-medium leading-relaxed">Loading...</p>
                </div>
              </div>

              <div class="flex items-start gap-3">
                <div class="mt-1 w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                  <i class="fas fa-store text-xs"></i>
                </div>
                <div>
                  <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Registered Shop</p>
                  <p id="profileShop" class="text-slate-700 font-medium">Loading...</p>
                </div>
              </div>
            </div>

            <button onclick="logout()" class="w-full mt-8 btn btn-outline border-red-200 text-red-500 hover:bg-red-500 hover:text-white lg:mt-10">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </div>
        </div>

        <!-- Main Content: Order History -->
        <div class="w-full md:w-2/3">
          <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 border border-gray-100 min-h-[600px]">
            <div class="flex items-center justify-between mb-8">
              <h3 class="text-xl sm:text-2xl font-bold text-slate-800">Order History</h3>
              <span id="orderCount" class="px-3 py-1 bg-sky-50 text-sky-600 rounded-full text-xs font-bold">0 Orders</span>
            </div>

            <div id="ordersContainer" class="space-y-4">
              <!-- Loading State -->
              <div class="text-center py-20">
                <i class="fas fa-spinner fa-spin text-4xl text-sky-500 mb-4"></i>
                <p class="text-gray-500">Retrieving your orders...</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

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
    }

    // Fetch Orders
    try {
      const ordersRes = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/orders', fetchOptions);
      const orders = await ordersRes.json();

      const ordersContainer = document.getElementById('ordersContainer');
      document.getElementById('orderCount').innerText = `${orders.length} Order${orders.length !== 1 ? 's' : ''}`;

      if (ordersRes.ok && orders.length > 0) {
        ordersContainer.innerHTML = orders.map(order => `
        <div class="p-4 sm:p-5 border border-gray-100 rounded-xl hover:border-sky-300 transition-all group bg-slate-50/50">
          <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
              <div class="flex items-center gap-3 mb-1">
                <span class="text-sm font-bold text-slate-800">${order.orderNumber}</span>
                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase ${getStatusClass(order.status)}">
                    ${order.status.replace('_', ' ')}
                </span>
              </div>
              <p class="text-xs text-gray-500">
                <i class="far fa-calendar-alt mr-1"></i> ${new Date(order.createdAt).toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' })}
              </p>
            </div>
            <div class="flex flex-row sm:flex-col items-center sm:items-end justify-between w-full sm:w-auto mt-2 sm:mt-0 pt-3 sm:pt-0 border-t sm:border-t-0 border-gray-200/50">
                <p class="text-xs text-gray-400 sm:mb-1">Amount</p>
                <p class="text-lg font-bold text-sky-600">₹${parseFloat(order.totalAmount).toFixed(2)}</p>
            </div>
          </div>
        </div>
      `).join('');
      } else {
        ordersContainer.innerHTML = `
        <div class="text-center py-20 bg-slate-50 rounded-2xl border-2 border-dashed border-gray-200">
          <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-gray-300 mx-auto mb-4">
            <i class="fas fa-shopping-basket text-2xl"></i>
          </div>
          <h4 class="text-slate-800 font-bold mb-1">No orders yet</h4>
          <p class="text-gray-500 text-sm mb-6">Experience the best laundry service today.</p>
          <a href="../order/index.php" class="btn btn-primary btn-sm">Place First Order</a>
        </div>
      `;
      }
    } catch (err) {
      console.error('Orders fetch error:', err);
      document.getElementById('ordersContainer').innerHTML = '<p class="text-red-500 text-center py-10">Failed to load order history.</p>';
    }
  });

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
</script>

<?php include '../../includes/footer.php'; ?>
