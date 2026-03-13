<?php include '../../includes/header.php'; ?>

<style>
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in-up {
    animation: fadeInUp 0.4s ease forwards;
  }
  .order-row {
    transition: all 0.2s ease;
  }
  .order-row:hover {
    background-color: #f0f9ff;
  }
  @keyframes pulse-dot {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.4; }
  }
  .pulse-dot {
    animation: pulse-dot 1.5s ease-in-out infinite;
  }
</style>

<main class="flex-1 py-8 sm:py-10">
  <div class="container-responsive">
    <div class="animate-fade-in-up">

      <!-- Page Header -->
      <div class="flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between mb-6">
        <div>
          <p class="text-xs font-black tracking-[0.2em] text-sky-500 uppercase mb-1">My Account</p>
          <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">My Orders</h1>
          <p class="text-sm text-slate-500 mt-1" id="ordersSubtext">Loading your orders...</p>
        </div>
      </div>

      <!-- Content Area -->
      <div id="pageState">
        <!-- Loading -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 text-center">
          <i class="fas fa-spinner fa-spin text-3xl text-sky-500 mb-3"></i>
          <p class="text-slate-500 text-sm font-medium">Retrieving your orders...</p>
        </div>
      </div>

      <!-- Orders Table (hidden initially) -->
      <div id="ordersTableWrapper" class="hidden">
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

          <!-- Table Header Summary -->
          <div class="px-5 sm:px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 bg-sky-100 rounded-xl flex items-center justify-center text-sky-600">
                <i class="fas fa-shopping-bag text-sm"></i>
              </div>
              <div>
                <p class="text-sm font-bold text-slate-800">All Orders</p>
                <p class="text-[10px] text-slate-400 font-medium" id="orderCountText">0 orders</p>
              </div>
            </div>
          </div>

          <!-- Responsive Table -->
          <div class="overflow-x-auto">
            <table class="w-full min-w-[640px]">
              <thead>
                <tr class="border-b border-slate-200 bg-slate-50">
                  <th class="text-left text-[9px] font-black text-slate-400 uppercase tracking-widest py-3.5 pl-5 sm:pl-6 pr-3">Order #</th>
                  <th class="text-left text-[9px] font-black text-slate-400 uppercase tracking-widest py-3.5 px-3">Date</th>
                  <th class="text-left text-[9px] font-black text-slate-400 uppercase tracking-widest py-3.5 px-3">Status</th>
                  <th class="text-right text-[9px] font-black text-slate-400 uppercase tracking-widest py-3.5 px-3">Amount</th>
                  <th class="text-center text-[9px] font-black text-slate-400 uppercase tracking-widest py-3.5 px-3">Items</th>
                  <th class="text-center text-[9px] font-black text-slate-400 uppercase tracking-widest py-3.5 pl-3 pr-5 sm:pr-6">Action</th>
                </tr>
              </thead>
              <tbody id="ordersTableBody">
                <!-- Rows injected by JS -->
              </tbody>
            </table>
          </div>

        </div>
      </div>

    </div>
  </div>
</main>

<script>
(function() {
  const API_BASE = 'https://laundry-backend-two.vercel.app/api/v1/website';
  const accessToken = localStorage.getItem('accessToken');
  const user = JSON.parse(localStorage.getItem('user') || '{}');
  const pageState = document.getElementById('pageState');
  const ordersTableWrapper = document.getElementById('ordersTableWrapper');
  const ordersTableBody = document.getElementById('ordersTableBody');
  const ordersSubtext = document.getElementById('ordersSubtext');
  const orderCountText = document.getElementById('orderCountText');

  if (!accessToken || !user || !user.fullName) {
    ordersSubtext.textContent = 'Login required to view orders.';
    pageState.innerHTML = `
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 sm:p-12 text-center">
        <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-amber-500">
          <i class="fas fa-lock text-2xl"></i>
        </div>
        <h3 class="text-lg font-black text-slate-800 mb-2">Login Required</h3>
        <p class="text-sm text-slate-500 mb-6 max-w-sm mx-auto">Please login to your account to view your order history.</p>
        <a href="../login/index.php" class="inline-flex items-center gap-2 px-8 py-3.5 bg-sky-500 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-sky-600 transition-colors shadow-lg shadow-sky-500/20">
          <i class="fas fa-sign-in-alt"></i>Login Now
        </a>
      </div>
    `;
    return;
  }

  loadOrders();

  async function loadOrders() {
    try {
      const response = await fetch(`${API_BASE}/orders`, {
        headers: {
          Authorization: `Bearer ${accessToken}`,
          Accept: 'application/json'
        }
      });

      if (!response.ok) throw new Error(`Unable to load orders (${response.status})`);

      const payload = await response.json();
      const orders = normalizeOrderCollection(payload);

      orders.sort((a, b) => {
        const dateA = new Date(a.createdAt || a.created_at || 0);
        const dateB = new Date(b.createdAt || b.created_at || 0);
        return dateB - dateA;
      });

      if (orders.length === 0) {
        ordersSubtext.textContent = 'You have no orders yet.';
        pageState.innerHTML = `
          <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 sm:p-12 text-center">
            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
              <i class="fas fa-shopping-basket text-3xl"></i>
            </div>
            <h3 class="text-xl font-black text-slate-800 mb-2">No Orders Yet</h3>
            <p class="text-sm text-slate-500 mb-6 max-w-sm mx-auto">You haven't placed any orders yet. Start your first laundry order today!</p>
            <a href="../order/index.php" class="inline-flex items-center gap-2 px-8 py-3.5 bg-sky-500 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-sky-600 transition-colors shadow-lg shadow-sky-500/20">
              <i class="fas fa-plus"></i>Place Order
            </a>
          </div>
        `;
        return;
      }

      // Hide loading, show table
      pageState.classList.add('hidden');
      ordersTableWrapper.classList.remove('hidden');

      ordersSubtext.textContent = `Showing ${orders.length} order${orders.length !== 1 ? 's' : ''}`;
      orderCountText.textContent = `${orders.length} order${orders.length !== 1 ? 's' : ''}`;

      ordersTableBody.innerHTML = orders.map((order, index) => {
        const orderId = order.id || order.orderId || order._id || order.order_id;
        const orderNumber = order.orderNumber || orderId || '-';
        const status = order.status || order.orderStatus || 'Pending';
        const createdAt = formatDate(order.createdAt || order.created_at);
        const totalAmount = parseFloat(order.totalAmount || 0).toFixed(2);
        const items = order.items || order.orderItems || order.details || [];
        const itemCount = items.length || '-';

        return `
          <tr class="order-row border-b border-slate-100 last:border-b-0" style="animation-delay: ${index * 40}ms">
            <td class="py-3.5 pl-5 sm:pl-6 pr-3">
              <p class="text-sm font-black text-slate-800">${escapeHtml(String(orderNumber))}</p>
            </td>
            <td class="py-3.5 px-3">
              <p class="text-sm text-slate-600 font-medium">${escapeHtml(createdAt)}</p>
            </td>
            <td class="py-3.5 px-3">
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider ${statusClass(status)}">
                <span class="w-1.5 h-1.5 rounded-full bg-current pulse-dot"></span>
                ${escapeHtml(status.replace(/_/g, ' '))}
              </span>
            </td>
            <td class="py-3.5 px-3 text-right">
              <p class="text-sm font-black text-slate-800">₹${totalAmount}</p>
            </td>
            <td class="py-3.5 px-3 text-center">
              <span class="inline-flex items-center justify-center w-7 h-7 bg-slate-100 text-slate-600 rounded-lg text-xs font-bold">${itemCount}</span>
            </td>
            <td class="py-3.5 pl-3 pr-5 sm:pr-6 text-center">
              <a href="../track-order/index.php?orderId=${escapeHtml(String(orderId))}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-sky-50 text-sky-600 border border-sky-200 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-sky-100 hover:border-sky-300 transition-all">
                <i class="fas fa-eye text-[9px]"></i>Track
              </a>
            </td>
          </tr>
        `;
      }).join('');

    } catch (error) {
      ordersSubtext.textContent = 'Could not load orders.';
      pageState.innerHTML = `
        <div class="bg-white rounded-2xl border border-rose-200 shadow-sm p-8 text-center">
          <div class="w-16 h-16 bg-rose-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-rose-400">
            <i class="fas fa-exclamation-triangle text-2xl"></i>
          </div>
          <h3 class="text-lg font-black text-slate-800 mb-2">Failed to Load Orders</h3>
          <p class="text-sm text-slate-500 mb-6">${escapeHtml(error.message || 'Something went wrong.')}</p>
          <button onclick="location.reload()" class="inline-flex items-center gap-2 px-6 py-3 bg-sky-500 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-sky-600 transition-colors">
            <i class="fas fa-redo"></i>Retry
          </button>
        </div>
      `;
    }
  }

  function normalizeOrderCollection(payload) {
    if (Array.isArray(payload)) return payload;
    if (Array.isArray(payload?.orders)) return payload.orders;
    if (Array.isArray(payload?.data)) return payload.data;
    return [];
  }

  function formatDate(value) {
    if (!value) return '-';
    const parsed = new Date(value);
    if (isNaN(parsed.getTime())) return String(value);
    return parsed.toLocaleDateString('en-IN', { day: 'numeric', month: 'short', year: 'numeric' });
  }

  function statusClass(status) {
    const s = String(status || '').toLowerCase();
    if (s.includes('complete') || s.includes('deliver')) return 'bg-emerald-100 text-emerald-700';
    if (s.includes('cancel')) return 'bg-rose-100 text-rose-700';
    if (s.includes('process') || s.includes('progress') || s.includes('picked')) return 'bg-amber-100 text-amber-700';
    if (s.includes('pickup') || s.includes('pending')) return 'bg-sky-100 text-sky-700';
    if (s.includes('refund')) return 'bg-purple-100 text-purple-700';
    return 'bg-slate-100 text-slate-700';
  }

  function escapeHtml(value) {
    return String(value)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#39;');
  }
})();
</script>

<?php include '../../includes/footer.php'; ?>
