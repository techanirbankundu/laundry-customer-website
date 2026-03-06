<?php include '../../includes/header.php'; ?>

<section class="py-6 sm:py-8 bg-gradient-to-b from-sky-50 to-white min-h-[20vh] flex flex-col justify-center">
  <div class="container-responsive text-center">
    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 mb-2 tracking-tight">
      Track Your <span class="text-sky-500">Order</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-2xl mx-auto">
      Check order status instantly. Login to see full order and customer details.
    </p>
  </div>
</section>

<section class="pb-12 -mt-6">
  <div class="container-responsive">
    <div id="trackLayout" class="max-w-5xl mx-auto grid lg:grid-cols-3 gap-6">
      <div id="userPanelWrapper" class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-xl p-5 sm:p-6 border border-gray-100 sticky top-24">
          <h2 class="text-sm font-black uppercase tracking-widest text-slate-400 mb-4">User Details</h2>

          <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 bg-sky-100 text-sky-600 rounded-full flex items-center justify-center font-black text-sm" id="userInitials">--</div>
            <div class="min-w-0">
              <p id="trackUserName" class="font-bold text-slate-800 truncate">Loading...</p>
              <p id="trackUserEmail" class="text-xs text-slate-500 truncate">Loading...</p>
            </div>
          </div>

          <div class="space-y-3 border-t border-gray-100 pt-4 text-sm">
            <div>
              <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Phone</p>
              <p id="trackUserPhone" class="font-medium text-slate-700">Loading...</p>
            </div>
            <div>
              <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Address</p>
              <p id="trackUserAddress" class="font-medium text-slate-700 leading-relaxed">Loading...</p>
            </div>
          </div>
        </div>
      </div>

      <div id="ordersPanelWrapper" class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-xl p-5 sm:p-6 border border-gray-100 min-h-[420px]">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg sm:text-xl font-bold text-slate-800">Order Status</h3>
            <span id="trackOrderCount" class="px-2.5 py-0.5 bg-sky-50 text-sky-600 rounded-full text-[10px] font-bold uppercase tracking-wider">0 Orders</span>
          </div>

          <div id="trackOrdersContainer" class="space-y-3">
            <div class="text-center py-16">
              <i class="fas fa-spinner fa-spin text-3xl text-sky-500 mb-3"></i>
              <p class="text-gray-500 text-sm">Loading order status...</p>
            </div>
          </div>
        </div>

        <div id="orderDetailsCard" class="hidden bg-white rounded-2xl shadow-xl p-5 sm:p-6 border border-gray-100 mt-6">
          <h3 class="text-lg sm:text-xl font-bold text-slate-800 mb-4">Order Details</h3>
          <div id="trackOrderDetails" class="space-y-4 text-sm text-slate-700"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  let authToken = '';
  const basePath = '<?php echo $base_path; ?>';

  function decodeBase64Id(encoded) {
    if (!encoded) return '';

    try {
      const normalized = String(encoded)
        .trim()
        .replace(/-/g, '+')
        .replace(/_/g, '/');
      const padded = normalized + '='.repeat((4 - (normalized.length % 4)) % 4);
      return atob(padded);
    } catch (error) {
      console.error('Invalid base64 order id:', error);
      return '';
    }
  }

  function buildLoginUrl() {
    const redirectPath = `${basePath}/pages/track-order/index.php${window.location.search}`;
    return `${basePath}/pages/login/index.php?redirect=${encodeURIComponent(redirectPath)}`;
  }

  function formatStatus(status = '') {
    return String(status || 'unknown').replace(/_/g, ' ');
  }

  function getStatusClass(status = '') {
    const key = status.toLowerCase();
    if (key.includes('pending') || key.includes('created')) return 'bg-amber-100 text-amber-600';
    if (key.includes('pickup')) return 'bg-blue-100 text-blue-600';
    if (key.includes('process') || key.includes('wash') || key.includes('clean')) return 'bg-indigo-100 text-indigo-600';
    if (key.includes('deliver') || key.includes('complete') || key.includes('success')) return 'bg-emerald-100 text-emerald-600';
    if (key.includes('cancel') || key.includes('fail') || key.includes('reject')) return 'bg-red-100 text-red-600';
    return 'bg-slate-100 text-slate-600';
  }

  function renderOrderDetails(order) {
    const detailsCard = document.getElementById('orderDetailsCard');
    const detailsContainer = document.getElementById('trackOrderDetails');
    if (!order) {
      detailsCard.classList.add('hidden');
      detailsContainer.innerHTML = '';
      return;
    }

    const createdDate = order.createdAt
      ? new Date(order.createdAt).toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' })
      : 'N/A';

    const items = Array.isArray(order.items) ? order.items : [];
    const itemRows = items.length > 0
      ? items.map(item => {
        const productName = item.product?.name || item.productName || 'Item';
        const serviceName = item.service?.name || item.serviceName || 'Service';
        return `
          <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-100">
            <div>
              <p class="font-semibold text-slate-800">${productName}</p>
              <p class="text-xs text-slate-500">${serviceName}</p>
            </div>
            <span class="text-xs font-black text-sky-600">x${item.quantity || 1}</span>
          </div>
        `;
      }).join('')
      : '<p class="text-xs text-slate-500">Item details not available.</p>';

    detailsContainer.innerHTML = `
      <div class="grid sm:grid-cols-2 gap-4">
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
          <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Order Number</p>
          <p class="font-bold text-slate-900">${order.orderNumber || 'N/A'}</p>
        </div>
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
          <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Status</p>
          <span class="inline-block px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-widest ${getStatusClass(order.status)}">${formatStatus(order.status)}</span>
        </div>
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
          <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Order Date</p>
          <p class="font-semibold text-slate-800">${createdDate}</p>
        </div>
        <div class="p-4 bg-slate-50 rounded-xl border border-slate-100">
          <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Total Amount</p>
          <p class="font-black text-sky-600">₹${parseFloat(order.totalAmount || 0).toFixed(2)}</p>
        </div>
      </div>
      <div>
        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2">Items</p>
        <div class="space-y-2">${itemRows}</div>
      </div>
    `;

    detailsCard.classList.remove('hidden');
  }

  async function fetchOrderById(orderId, token = '') {
    const headers = { 'Content-Type': 'application/json' };
    if (token) {
      headers['Authorization'] = `Bearer ${token}`;
    }

    const response = await fetch(`https://laundry-backend-two.vercel.app/api/v1/website/orders/${orderId}`, { headers });
    let data = null;
    try {
      data = await response.json();
    } catch (error) {
      data = null;
    }

    if (!response.ok) {
      const message = data?.message || 'Unable to fetch order';
      const error = new Error(message);
      error.status = response.status;
      throw error;
    }

    return data;
  }

  async function viewOrderDetails(orderId) {
    if (!authToken) {
      window.location.href = buildLoginUrl();
      return;
    }

    try {
      const order = await fetchOrderById(orderId, authToken);
      renderOrderDetails(order);
      window.scrollTo({ top: document.getElementById('orderDetailsCard').offsetTop - 90, behavior: 'smooth' });
    } catch (error) {
      if (error.status === 401) {
        localStorage.removeItem('accessToken');
        localStorage.removeItem('user');
        window.location.href = buildLoginUrl();
        return;
      }

      Swal.fire({
        icon: 'error',
        title: 'Details Error',
        text: error.message || 'Unable to fetch order details.',
        confirmButtonColor: '#0ea5e9'
      });
    }
  }

  window.viewOrderDetails = viewOrderDetails;

  function renderOrderStatusCards(orders, isLoggedIn) {
    const ordersContainer = document.getElementById('trackOrdersContainer');
    const orderCount = Array.isArray(orders) ? orders.length : 0;
    document.getElementById('trackOrderCount').innerText = `${orderCount} Order${orderCount !== 1 ? 's' : ''}`;

    if (!orderCount) {
      ordersContainer.innerHTML = `
        <div class="text-center py-12 bg-slate-50 rounded-2xl border-2 border-dashed border-gray-100">
          <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-gray-300 mx-auto mb-3 shadow-sm">
            <i class="fas fa-box-open"></i>
          </div>
          <h4 class="text-slate-800 font-bold mb-1 text-sm">No order found</h4>
          <p class="text-gray-500 text-xs mb-4">Please check your tracking link.</p>
          <a href="${buildLoginUrl()}" class="btn btn-primary py-2 px-6 text-xs shadow-md">Login</a>
        </div>
      `;
      return;
    }

    ordersContainer.innerHTML = orders.map(order => {
      const created = order.createdAt
        ? new Date(order.createdAt).toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' })
        : 'N/A';

      return `
        <div class="p-4 border border-gray-100 rounded-2xl bg-slate-50/60 hover:bg-white hover:border-sky-200 transition-all">
          <div class="flex items-start sm:items-center justify-between gap-3">
            <div>
              <p class="text-sm font-black text-slate-800">${order.orderNumber || order.id || 'Order'}</p>
              <p class="text-[11px] text-gray-500 font-medium mt-1">
                <i class="far fa-calendar-alt mr-1"></i>${created}
              </p>
            </div>
            <span class="px-2.5 py-1 rounded-full text-[10px] font-black uppercase tracking-widest ${getStatusClass(order.status)}">
              ${formatStatus(order.status)}
            </span>
          </div>
          <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between">
            <p class="text-xs text-gray-500">Total Amount</p>
            <p class="text-sm font-black text-sky-600">₹${parseFloat(order.totalAmount || 0).toFixed(2)}</p>
          </div>
          <div class="mt-3 flex justify-end">
            <button onclick="viewOrderDetails('${order.id || ''}')" class="btn btn-primary py-2 px-4 text-xs">
              ${isLoggedIn ? 'View Details' : 'View More Details'}
            </button>
          </div>
        </div>
      `;
    }).join('');
  }

  async function loadLoggedInView(decodedOrderId) {
    const fetchOptions = {
      headers: {
        'Authorization': `Bearer ${authToken}`,
        'Content-Type': 'application/json'
      }
    };

    const [profileRes, ordersRes] = await Promise.all([
      fetch('https://laundry-backend-two.vercel.app/api/v1/website/profile', fetchOptions),
      fetch('https://laundry-backend-two.vercel.app/api/v1/website/orders', fetchOptions)
    ]);

    if (profileRes.status === 401 || ordersRes.status === 401) {
      localStorage.removeItem('accessToken');
      localStorage.removeItem('user');
      window.location.href = buildLoginUrl();
      return;
    }

    const profileData = await profileRes.json();
    const orders = await ordersRes.json();

    if (profileRes.ok && profileData.user) {
      const user = profileData.user;
      const initials = (user.fullName || 'U')
        .split(' ')
        .map(part => part.charAt(0))
        .join('')
        .toUpperCase()
        .slice(0, 2);

      document.getElementById('userInitials').innerText = initials || 'U';
      document.getElementById('trackUserName').innerText = user.fullName || 'N/A';
      document.getElementById('trackUserEmail').innerText = user.email || 'N/A';
      document.getElementById('trackUserPhone').innerText = user.phone || 'Not provided';
      document.getElementById('trackUserAddress').innerText = user.address || 'No address saved';
    }

    const orderList = Array.isArray(orders) ? orders : [];
    let visibleOrders = orderList;

    if (decodedOrderId) {
      visibleOrders = orderList.filter(order => order.id === decodedOrderId || order.orderNumber === decodedOrderId);

      if (!visibleOrders.length) {
        try {
          const selectedOrder = await fetchOrderById(decodedOrderId, authToken);
          visibleOrders = [selectedOrder];
        } catch (error) {
          console.error('Specific order load failed:', error);
        }
      }
    }

    renderOrderStatusCards(visibleOrders, true);

    if (visibleOrders.length) {
      const selectedOrderId = visibleOrders[0].id;
      if (selectedOrderId) {
        await viewOrderDetails(selectedOrderId);
      } else {
        renderOrderDetails(visibleOrders[0]);
      }
    }
  }

  async function loadGuestView(decodedOrderId) {
    document.getElementById('userPanelWrapper').classList.add('hidden');
    document.getElementById('ordersPanelWrapper').classList.remove('lg:col-span-2');
    document.getElementById('ordersPanelWrapper').classList.add('lg:col-span-3');
    document.getElementById('orderDetailsCard').classList.add('hidden');

    if (!decodedOrderId) {
      renderOrderStatusCards([], false);
      return;
    }

    try {
      const order = await fetchOrderById(decodedOrderId);
      renderOrderStatusCards([order], false);
    } catch (error) {
      const fallbackOrder = {
        id: decodedOrderId,
        orderNumber: decodedOrderId,
        status: 'status_unavailable',
        totalAmount: 0
      };
      renderOrderStatusCards([fallbackOrder], false);
    }
  }

  document.addEventListener('DOMContentLoaded', async function() {
    authToken = localStorage.getItem('accessToken') || '';
    const params = new URLSearchParams(window.location.search);
    const encodedOrderId = params.get('order') || params.get('orderId') || '';
    const decodedOrderId = decodeBase64Id(encodedOrderId);

    try {
      if (authToken) {
        await loadLoggedInView(decodedOrderId);
      } else {
        await loadGuestView(decodedOrderId);
      }
    } catch (error) {
      console.error('Track order load error:', error);
      document.getElementById('trackOrdersContainer').innerHTML = '<p class="text-red-500 text-center py-10 text-xs">Failed to load tracking details. Please refresh.</p>';
    }
  });
</script>

<?php include '../../includes/footer.php'; ?>
