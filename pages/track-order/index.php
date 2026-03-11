<?php include '../../includes/header.php'; ?>

<style>
  .collapsible-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.3s ease;
    opacity: 0;
  }
  .collapsible-content.expanded {
    opacity: 1;
  }
  .rotate-icon {
    transition: transform 0.3s ease;
  }
  .rotate-icon.rotated {
    transform: rotate(180deg);
  }
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(24px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in-up {
    animation: fadeInUp 0.5s ease forwards;
  }
  @keyframes pulse-dot {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.4; }
  }
  .pulse-dot {
    animation: pulse-dot 1.5s ease-in-out infinite;
  }
</style>

<main class="flex-1 py-8 sm:py-12">
  <div class="container-responsive">
    <div id="pageContent">
      <!-- Loading State -->
      <div id="loadingState" class="flex flex-col items-center justify-center py-20">
        <div class="w-16 h-16 bg-sky-50 rounded-2xl flex items-center justify-center mb-4">
          <i class="fas fa-spinner fa-spin text-2xl text-sky-500"></i>
        </div>
        <p class="text-slate-500 font-medium text-sm">Loading order details...</p>
      </div>
    </div>
  </div>
</main>

<script>
(function() {
  const API_BASE = 'https://laundry-backend-two.vercel.app/api/v1/website';
  const accessToken = localStorage.getItem('accessToken');
  const user = JSON.parse(localStorage.getItem('user') || '{}');
  const params = new URLSearchParams(window.location.search);
  const orderIdParam = params.get('orderid') || params.get('orderId');
  const pageContent = document.getElementById('pageContent');

  const isLoggedIn = !!(accessToken && user && user.fullName);

  // Route to the correct view
  if (isLoggedIn && orderIdParam) {
    // Case 1: Logged in + orderId → full details with user info
    renderLoggedInWithOrder();
  } else if (!isLoggedIn && orderIdParam) {
    // Case 2: Not logged in + orderId → basic order info
    renderGuestWithOrder();
  } else if (isLoggedIn && !orderIdParam) {
    // Case 4: Logged in only → user details + last order
    renderLoggedInNoOrder();
  } else {
    // Case 3: Neither logged in nor orderId → not found
    renderNotFound();
  }

  // ─── CASE 1: Logged In + Order ID ────────────────────────────
  async function renderLoggedInWithOrder() {
    try {
      const [profileRes, orderRes] = await Promise.all([
        fetch(`${API_BASE}/profile`, { headers: { Authorization: `Bearer ${accessToken}` } }),
        fetch(`${API_BASE}/orders/${orderIdParam}`, { headers: { Authorization: `Bearer ${accessToken}` } })
      ]);

      if (!orderRes.ok) throw new Error('Order not found');

      const profileData = await profileRes.json();
      const order = await orderRes.json();
      const userData = profileData.user || user;

      pageContent.innerHTML = `
        <div class="animate-fade-in-up">
          <!-- Page Header -->
          <div class="mb-8">
            <p class="text-xs font-black tracking-[0.2em] text-sky-500 uppercase mb-1">Track Order</p>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Order Details</h1>
          </div>

          <div class="grid lg:grid-cols-3 gap-6">
            <!-- Left: User Details Card -->
            <div class="lg:col-span-1">
              <div class="bg-white rounded-2xl border border-slate-200 p-5 sm:p-6 shadow-sm sticky top-24">
                <div class="text-center mb-5">
                  <div class="w-16 h-16 bg-sky-50 rounded-full flex items-center justify-center text-sky-600 text-xl mx-auto mb-3 border-4 border-white shadow-md">
                    <i class="fas fa-user"></i>
                  </div>
                  <h3 class="text-lg font-black text-slate-800">${escapeHtml(userData.fullName || '')}</h3>
                  <p class="text-xs text-slate-400 font-medium">Customer</p>
                </div>
                <div class="space-y-3 border-t border-slate-100 pt-4">
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                      <i class="fas fa-envelope text-[10px]"></i>
                    </div>
                    <div class="min-w-0">
                      <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Email</p>
                      <p class="text-sm text-slate-700 font-medium truncate">${escapeHtml(userData.email || 'N/A')}</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                      <i class="fas fa-phone text-[10px]"></i>
                    </div>
                    <div>
                      <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Phone</p>
                      <p class="text-sm text-slate-700 font-medium">${escapeHtml(userData.phone || 'Not provided')}</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                      <i class="fas fa-map-marker-alt text-[10px]"></i>
                    </div>
                    <div>
                      <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Address</p>
                      <p class="text-sm text-slate-700 font-medium">${escapeHtml(userData.address || 'No address saved')}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right: Order Details -->
            <div class="lg:col-span-2">
              ${renderFullOrderCard(order)}
            </div>
          </div>
        </div>
      `;

      attachCollapsibleListeners();

    } catch (error) {
      pageContent.innerHTML = renderErrorState(error.message);
    }
  }

  // ─── CASE 2: Guest + Order ID ────────────────────────────────
  async function renderGuestWithOrder() {
    try {
      const response = await fetch(`${API_BASE}/orders/track/${orderIdParam}`);

      if (!response.ok) {
        // If public endpoint fails, try another common pattern
        const altResponse = await fetch(`${API_BASE}/orders/public/${orderIdParam}`);
        if (!altResponse.ok) throw new Error('Order not found');
        var order = await altResponse.json();
      } else {
        var order = await response.json();
      }

      pageContent.innerHTML = `
        <div class="animate-fade-in-up">
          <div class="mb-8">
            <p class="text-xs font-black tracking-[0.2em] text-sky-500 uppercase mb-1">Track Order</p>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Order Status</h1>
            <p class="text-sm text-slate-500 mt-1">Viewing limited order information. <a href="../login/index.php" class="text-sky-500 font-bold hover:underline">Login</a> for full details.</p>
          </div>

          <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm">
              <!-- Order Status Badge -->
              <div class="flex items-center justify-between mb-6 pb-6 border-b border-slate-100">
                <div>
                  <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Order Number</p>
                  <p class="text-xl font-black text-slate-900">${escapeHtml(order.orderNumber || String(orderIdParam))}</p>
                </div>
                <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full text-xs font-black uppercase tracking-wider ${statusClass(getOrderStatus(order))}">
                  <span class="w-1.5 h-1.5 rounded-full bg-current pulse-dot"></span>
                  ${escapeHtml(getOrderStatus(order))}
                </span>
              </div>

              <!-- Basic Info Grid -->
              <div class="grid sm:grid-cols-2 gap-4">
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                  <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Amount</p>
                  <p class="text-2xl font-black text-slate-900 tracking-tighter">₹${parseFloat(order.totalAmount || 0).toFixed(2)}</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                  <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1">Order Date</p>
                  <p class="text-sm font-bold text-slate-700">${formatDate(order.createdAt)}</p>
                </div>
              </div>

              <!-- Login Prompt -->
              <div class="mt-6 p-4 bg-sky-50 rounded-xl border border-sky-100 flex items-center gap-4">
                <div class="w-10 h-10 bg-sky-100 rounded-full flex items-center justify-center text-sky-600 shrink-0">
                  <i class="fas fa-lock text-sm"></i>
                </div>
                <div>
                  <p class="text-sm font-bold text-sky-800">Want to see more details?</p>
                  <p class="text-xs text-sky-600">Login to view item breakdown, payment info, and full order history.</p>
                </div>
                <a href="../login/index.php" class="ml-auto px-5 py-2.5 bg-sky-500 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-sky-600 transition-colors shrink-0 shadow-md">Login</a>
              </div>
            </div>
          </div>
        </div>
      `;

    } catch (error) {
      // If guest tracking fails, show a search form instead
      pageContent.innerHTML = `
        <div class="animate-fade-in-up">
          <div class="mb-8">
            <p class="text-xs font-black tracking-[0.2em] text-sky-500 uppercase mb-1">Track Order</p>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Order Status</h1>
          </div>

          <div class="max-w-lg mx-auto">
            <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm text-center">
              <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-amber-500">
                <i class="fas fa-search text-2xl"></i>
              </div>
              <h2 class="text-xl font-black text-slate-800 mb-2">Order Not Found</h2>
              <p class="text-sm text-slate-500 mb-6">We couldn't find order "<span class="font-bold">${escapeHtml(orderIdParam)}</span>". Please check the order ID or login to your account.</p>
              <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="../login/index.php" class="px-6 py-3 bg-sky-500 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-sky-600 transition-colors shadow-md">Login to Account</a>
                <a href="../../index.php" class="px-6 py-3 bg-slate-100 text-slate-700 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-slate-200 transition-colors">Go Home</a>
              </div>
            </div>
          </div>
        </div>
      `;
    }
  }

  // ─── CASE 3: Not Found (no login, no orderId) ────────────────
  function renderNotFound() {
    pageContent.innerHTML = `
      <div class="animate-fade-in-up">
        <div class="max-w-lg mx-auto text-center py-12">
          <div class="w-24 h-24 bg-slate-100 rounded-[32px] flex items-center justify-center mx-auto mb-6 text-slate-300">
            <i class="fas fa-compass text-4xl"></i>
          </div>
          <h1 class="text-3xl sm:text-4xl font-black text-slate-900 mb-3 tracking-tight">Page Not Found</h1>
          <p class="text-slate-500 text-sm mb-8 max-w-sm mx-auto leading-relaxed">You need to login or provide an order ID to track your order. Please login to view your orders or use a direct tracking link.</p>
          <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="../login/index.php" class="px-8 py-4 bg-sky-500 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-sky-600 transition-colors shadow-xl shadow-sky-500/20">
              <i class="fas fa-sign-in-alt mr-2"></i>Login
            </a>
            <a href="../../index.php" class="px-8 py-4 bg-white text-slate-700 border-2 border-slate-200 rounded-2xl text-xs font-black uppercase tracking-widest hover:border-sky-500 hover:text-sky-600 transition-all">
              <i class="fas fa-home mr-2"></i>Go Home
            </a>
          </div>
        </div>
      </div>
    `;
  }

  // ─── CASE 4: Logged In Only (no orderId) → user + last order ─
  async function renderLoggedInNoOrder() {
    try {
      const [profileRes, ordersRes] = await Promise.all([
        fetch(`${API_BASE}/profile`, { headers: { Authorization: `Bearer ${accessToken}` } }),
        fetch(`${API_BASE}/orders`, { headers: { Authorization: `Bearer ${accessToken}` } })
      ]);

      const profileData = await profileRes.json();
      const ordersPayload = await ordersRes.json();
      const userData = profileData.user || user;
      const orders = normalizeOrderCollection(ordersPayload);

      // Get last order (most recent)
      const lastOrder = orders.length > 0 ? orders[0] : null;

      pageContent.innerHTML = `
        <div class="animate-fade-in-up">
          <div class="mb-8">
            <p class="text-xs font-black tracking-[0.2em] text-sky-500 uppercase mb-1">My Account</p>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Welcome back, ${escapeHtml(userData.fullName || 'User')}</h1>
            <p class="text-sm text-slate-500 mt-1">Here's your account overview and latest order.</p>
          </div>

          <div class="grid lg:grid-cols-3 gap-6">
            <!-- User Details Card -->
            <div class="lg:col-span-1">
              <div class="bg-white rounded-2xl border border-slate-200 p-5 sm:p-6 shadow-sm sticky top-24">
                <div class="text-center mb-5">
                  <div class="w-16 h-16 bg-sky-50 rounded-full flex items-center justify-center text-sky-600 text-xl mx-auto mb-3 border-4 border-white shadow-md">
                    <i class="fas fa-user"></i>
                  </div>
                  <h3 class="text-lg font-black text-slate-800">${escapeHtml(userData.fullName || '')}</h3>
                  <p class="text-xs text-slate-400 font-medium">Customer</p>
                </div>
                <div class="space-y-3 border-t border-slate-100 pt-4">
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                      <i class="fas fa-envelope text-[10px]"></i>
                    </div>
                    <div class="min-w-0">
                      <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Email</p>
                      <p class="text-sm text-slate-700 font-medium truncate">${escapeHtml(userData.email || 'N/A')}</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                      <i class="fas fa-phone text-[10px]"></i>
                    </div>
                    <div>
                      <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Phone</p>
                      <p class="text-sm text-slate-700 font-medium">${escapeHtml(userData.phone || 'Not provided')}</p>
                    </div>
                  </div>
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0">
                      <i class="fas fa-map-marker-alt text-[10px]"></i>
                    </div>
                    <div>
                      <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Address</p>
                      <p class="text-sm text-slate-700 font-medium">${escapeHtml(userData.address || 'No address saved')}</p>
                    </div>
                  </div>
                </div>

                <div class="mt-5 pt-4 border-t border-slate-100">
                  <div class="flex items-center justify-between">
                    <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Total Orders</span>
                    <span class="text-lg font-black text-sky-600">${orders.length}</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Last Order or Empty -->
            <div class="lg:col-span-2">
              ${lastOrder ? `
                <div class="mb-4 flex items-center justify-between">
                  <h2 class="text-lg font-black text-slate-800">Latest Order</h2>
                  <a href="../profile/index.php" class="text-xs font-black text-sky-500 uppercase tracking-widest hover:text-sky-600 transition-colors">View Profile <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
                ${renderFullOrderCard(lastOrder)}
              ` : `
                <div class="bg-white rounded-2xl border border-slate-200 p-8 sm:p-12 shadow-sm text-center">
                  <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                    <i class="fas fa-shopping-basket text-3xl"></i>
                  </div>
                  <h3 class="text-xl font-black text-slate-800 mb-2">No Orders Yet</h3>
                  <p class="text-sm text-slate-500 mb-6 max-w-sm mx-auto">You haven't placed any orders yet. Start your first laundry order today!</p>
                  <a href="../order/index.php" class="inline-flex items-center gap-2 px-8 py-4 bg-sky-500 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-sky-600 transition-colors shadow-xl shadow-sky-500/20">
                    <i class="fas fa-plus"></i>Place Order
                  </a>
                </div>
              `}
            </div>
          </div>
        </div>
      `;

      attachCollapsibleListeners();

    } catch (error) {
      pageContent.innerHTML = renderErrorState(error.message);
    }
  }

  // ─── Render Full Order Card (with table + collapsible) ───────
  function renderFullOrderCard(order) {
    const orderId = order.id || order.orderId || order._id || order.order_id;
    const orderNumber = order.orderNumber || orderId || '-';
    const status = getOrderStatus(order);
    const createdAt = formatDate(order.createdAt || order.created_at);
    const totalAmount = parseFloat(order.totalAmount || 0).toFixed(2);
    const paidAmount = parseFloat(order.paidAmount || 0).toFixed(2);
    const items = order.items || order.orderItems || order.details || [];

    return `
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <!-- Order Header -->
        <div class="px-5 sm:px-6 py-5 border-b border-slate-100">
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
              <div class="flex items-center gap-3 mb-1">
                <h3 class="text-lg font-black text-slate-900">${escapeHtml(String(orderNumber))}</h3>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider ${statusClass(status)}">
                  <span class="w-1.5 h-1.5 rounded-full bg-current pulse-dot"></span>
                  ${escapeHtml(status).replace(/_/g, ' ')}
                </span>
              </div>
              <p class="text-xs text-slate-400 font-medium"><i class="far fa-calendar-alt mr-1"></i>${escapeHtml(createdAt)}</p>
            </div>
            <div class="text-right">
              <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Total Amount</p>
              <p class="text-2xl font-black text-sky-600 tracking-tighter">₹${totalAmount}</p>
            </div>
          </div>
        </div>

        <!-- Order Info Grid -->
        <div class="px-5 sm:px-6 py-4 bg-slate-50/50 border-b border-slate-100">
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div>
              <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Status</p>
              <p class="text-sm font-bold text-slate-700">${escapeHtml(status).replace(/_/g, ' ')}</p>
            </div>
            <div>
              <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Amount</p>
              <p class="text-sm font-bold text-slate-700">₹${totalAmount}</p>
            </div>
            <div>
              <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Paid</p>
              <p class="text-sm font-bold ${parseFloat(paidAmount) >= parseFloat(totalAmount) ? 'text-emerald-600' : 'text-amber-600'}">₹${paidAmount}</p>
            </div>
            <div>
              <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-0.5">Items</p>
              <p class="text-sm font-bold text-slate-700">${items.length} item${items.length !== 1 ? 's' : ''}</p>
            </div>
          </div>
        </div>

        <!-- View Details Button -->
        <div class="px-5 sm:px-6 py-4 border-b border-slate-100">
          <button type="button" class="view-details-btn flex items-center justify-between w-full text-left group" data-target="items-${escapeHtml(String(orderId))}">
            <div class="flex items-center gap-3">
              <div class="w-9 h-9 bg-sky-50 rounded-xl flex items-center justify-center text-sky-500 group-hover:bg-sky-100 transition-colors">
                <i class="fas fa-box-open text-sm"></i>
              </div>
              <div>
                <p class="text-sm font-bold text-slate-800 group-hover:text-sky-600 transition-colors">View Details</p>
                <p class="text-[10px] text-slate-400">Click to see all order items and quantities</p>
              </div>
            </div>
            <div class="w-8 h-8 bg-slate-100 rounded-lg flex items-center justify-center text-slate-400 group-hover:bg-sky-100 group-hover:text-sky-500 transition-all">
              <i class="fas fa-chevron-down text-xs rotate-icon"></i>
            </div>
          </button>
        </div>

        <!-- Collapsible Items Section -->
        <div class="collapsible-content" id="items-${escapeHtml(String(orderId))}">
          <div class="px-5 sm:px-6 py-5 bg-slate-50">
            ${renderItemsTable(items)}
          </div>
        </div>

        <!-- Payment Status Footer -->
        <div class="px-5 sm:px-6 py-4 bg-white border-t border-slate-100">
          <div class="flex flex-wrap items-center gap-3">
            <div class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest flex items-center gap-2 ${parseFloat(paidAmount) >= parseFloat(totalAmount) ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : 'bg-amber-50 text-amber-600 border border-amber-100'}">
              <i class="fas ${parseFloat(paidAmount) >= parseFloat(totalAmount) ? 'fa-check-circle' : 'fa-clock'}"></i>
              ${parseFloat(paidAmount) >= parseFloat(totalAmount) ? 'Fully Paid' : 'Payment Pending'}
            </div>
            ${order.tagNumber ? `
              <div class="px-4 py-2 bg-sky-50 border border-sky-100 rounded-xl text-[10px] font-black text-sky-600 uppercase tracking-widest">
                <i class="fas fa-tag mr-1"></i>Tag: ${escapeHtml(order.tagNumber)}
              </div>
            ` : ''}
          </div>
        </div>
      </div>
    `;
  }

  // ─── Render Items Table ──────────────────────────────────────
  function renderItemsTable(items) {
    if (!Array.isArray(items) || items.length === 0) {
      return `
        <div class="text-center py-6 text-slate-400">
          <i class="fas fa-inbox text-2xl mb-2"></i>
          <p class="text-sm font-medium">No item details available.</p>
        </div>
      `;
    }

    const rows = items.map((item, i) => {
      const name = item.product?.name || item.name || item.itemName || item.serviceName || `Item ${i + 1}`;
      const service = item.service?.name || item.serviceType || '';
      const qty = item.quantity || item.qty || item.count || 1;
      const price = parseFloat(item.price || 0).toFixed(2);
      const tagNum = item.productTagNumber || '';

      return `
        <tr class="border-b border-slate-200 last:border-b-0 hover:bg-white transition-colors">
          <td class="py-3 pl-4 pr-3">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 shrink-0 text-[10px] font-black">${i + 1}</div>
              <div>
                <p class="text-sm font-bold text-slate-800">${escapeHtml(name)}</p>
                ${service ? `<p class="text-[10px] text-slate-400 font-medium">${escapeHtml(service)}</p>` : ''}
              </div>
            </div>
          </td>
          <td class="py-3 px-3 text-center">
            <span class="inline-flex items-center justify-center w-8 h-8 bg-sky-50 text-sky-700 rounded-lg text-sm font-black">${qty}</span>
          </td>
          <td class="py-3 px-3 text-right">
            <span class="text-sm font-bold text-slate-800">₹${price}</span>
          </td>
          <td class="py-3 pl-3 pr-4 text-right">
            ${tagNum ? `<span class="text-[10px] font-bold text-sky-500 bg-sky-50 px-2 py-1 rounded">${escapeHtml(tagNum)}</span>` : '<span class="text-slate-300">—</span>'}
          </td>
        </tr>
      `;
    }).join('');

    return `
      <div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
        <table class="w-full">
          <thead>
            <tr class="bg-slate-50 border-b border-slate-200">
              <th class="text-left text-[9px] font-black text-slate-400 uppercase tracking-widest py-3 pl-4 pr-3">Product</th>
              <th class="text-center text-[9px] font-black text-slate-400 uppercase tracking-widest py-3 px-3">Qty</th>
              <th class="text-right text-[9px] font-black text-slate-400 uppercase tracking-widest py-3 px-3">Price</th>
              <th class="text-right text-[9px] font-black text-slate-400 uppercase tracking-widest py-3 pl-3 pr-4">Tag</th>
            </tr>
          </thead>
          <tbody>${rows}</tbody>
        </table>
      </div>
    `;
  }

  // ─── Attach Collapsible Listeners ────────────────────────────
  function attachCollapsibleListeners() {
    document.querySelectorAll('.view-details-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        const content = document.getElementById(targetId);
        const icon = this.querySelector('.rotate-icon');

        if (content.classList.contains('expanded')) {
          content.style.maxHeight = '0px';
          content.classList.remove('expanded');
          icon.classList.remove('rotated');
        } else {
          content.style.maxHeight = content.scrollHeight + 'px';
          content.classList.add('expanded');
          icon.classList.add('rotated');
        }
      });
    });
  }

  // ─── Error State ─────────────────────────────────────────────
  function renderErrorState(message) {
    return `
      <div class="animate-fade-in-up max-w-lg mx-auto text-center py-12">
        <div class="w-20 h-20 bg-rose-50 rounded-2xl flex items-center justify-center mx-auto mb-4 text-rose-400">
          <i class="fas fa-exclamation-triangle text-3xl"></i>
        </div>
        <h2 class="text-xl font-black text-slate-800 mb-2">Something went wrong</h2>
        <p class="text-sm text-slate-500 mb-6">${escapeHtml(message || 'Could not load the requested information.')}</p>
        <button onclick="location.reload()" class="px-6 py-3 bg-sky-500 text-white rounded-xl text-xs font-black uppercase tracking-widest hover:bg-sky-600 transition-colors">
          <i class="fas fa-redo mr-2"></i>Try Again
        </button>
      </div>
    `;
  }

  // ─── Helpers ─────────────────────────────────────────────────
  function normalizeOrderCollection(payload) {
    if (Array.isArray(payload)) return payload;
    if (Array.isArray(payload?.orders)) return payload.orders;
    if (Array.isArray(payload?.data)) return payload.data;
    return [];
  }

  function getOrderStatus(order) {
    return order?.status || order?.orderStatus || 'Pending';
  }

  function formatDate(value) {
    if (!value) return 'Date not available';
    const parsed = new Date(value);
    return isNaN(parsed.getTime()) ? String(value) : parsed.toLocaleString('en-IN', { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
  }

  function statusClass(status) {
    const s = String(status || '').toLowerCase();
    if (s.includes('complete') || s.includes('deliver')) return 'bg-emerald-100 text-emerald-700';
    if (s.includes('cancel')) return 'bg-rose-100 text-rose-700';
    if (s.includes('process') || s.includes('progress') || s.includes('picked')) return 'bg-amber-100 text-amber-700';
    if (s.includes('pickup') || s.includes('pending')) return 'bg-sky-100 text-sky-700';
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
