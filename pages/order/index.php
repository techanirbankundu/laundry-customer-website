<?php
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<!-- Custom Styles for Stepper -->
<style>
  .step-node.active .step-icon {
    @apply bg-sky-500 text-white ring-4 ring-sky-100;
  }

  .step-node.completed .step-icon {
    @apply bg-green-500 text-white;
  }

  .step-node.active .step-label {
    @apply text-sky-600 font-bold;
  }

  .step-node.completed .step-label {
    @apply text-green-600;
  }

  .step-line.completed {
    @apply bg-green-500;
  }

  input:read-only {
    @apply bg-gray-50 cursor-not-allowed;
  }

  .animate-slide-in {
    animation: slideIn 0.4s ease-out forwards;
  }

  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<div class="flex-grow">
  <section class="py-10 sm:py-12 bg-gradient-to-b from-sky-50 to-white min-h-[30vh] flex flex-col justify-center">
    <div class="container-responsive text-center">
      <h1 class="text-3xl sm:text-4xl lg:text-4xl font-black text-slate-900 mb-4 tracking-tight">
        Place Your <span class="text-sky-500">Order</span>
      </h1>
      <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto">
        Just a few simple steps to get your laundry picked up and delivered fresh.
      </p>
    </div>
  </section>

  <section class="pb-20 -mt-10">
    <div class="container-responsive">
      <div class="max-w-5xl mx-auto">

        <!-- Stepper Progress -->
        <div class="mb-12 relative px-4 flex justify-between items-center max-w-xl mx-auto">
          <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 -translate-y-1/2 z-0 rounded-full"></div>
          <div id="step-line" class="absolute top-1/2 left-0 h-1 bg-sky-500 -translate-y-1/2 z-0 transition-all duration-500 rounded-full" style="width: 0%"></div>

          <!-- Step 1 -->
          <div class="step-node relative z-10 active" data-step="1">
            <div class="step-icon w-10 h-10 sm:w-12 sm:h-12 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center transition-all duration-300">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <span class="step-label absolute -bottom-8 left-1/2 -translate-x-1/2 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-400 transition-all uppercase tracking-wider">Address</span>
          </div>

          <!-- Step 2 -->
          <div class="step-node relative z-10" data-step="2">
            <div class="step-icon w-10 h-10 sm:w-12 sm:h-12 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center transition-all duration-300">
              <i class="fas fa-tshirt"></i>
            </div>
            <span class="step-label absolute -bottom-8 left-1/2 -translate-x-1/2 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-400 transition-all uppercase tracking-wider">Items</span>
          </div>

          <!-- Step 3 -->
          <div class="step-node relative z-10" data-step="3">
            <div class="step-icon w-10 h-10 sm:w-12 sm:h-12 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center transition-all duration-300">
              <i class="fas fa-check-circle"></i>
            </div>
            <span class="step-label absolute -bottom-8 left-1/2 -translate-x-1/2 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-400 transition-all uppercase tracking-wider">Review</span>
          </div>
        </div>

        <!-- Main Form Container -->
        <div class="bg-white rounded-3xl shadow-2xl p-6 sm:p-8 lg:p-10 border border-slate-100 overflow-hidden relative">
          <form id="orderForm" class="relative">

            <!-- Step 1: Address -->
            <div id="step-content-1" class="step-content transition-all duration-300">
              <div class="mb-10">
                <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Pickup Location</h3>
                <p class="text-slate-500">Confirm where we should collect your laundry.</p>
              </div>

              <div class="grid sm:grid-cols-2 gap-8 mb-10">
                <div class="space-y-3">
                  <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Contact Name</label>
                  <div class="relative group">
                    <i class="fas fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-sky-500 transition-colors"></i>
                    <input type="text" name="name" class="w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 focus:bg-white transition-all outline-none font-semibold text-slate-700" readonly>
                  </div>
                </div>
                <div class="space-y-3">
                  <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Phone Number</label>
                  <div class="relative group">
                    <i class="fas fa-phone absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-sky-500 transition-colors"></i>
                    <input type="tel" name="phone" class="w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 focus:bg-white transition-all outline-none font-semibold text-slate-700" readonly>
                  </div>
                </div>
              </div>

              <div class="space-y-3 mb-12">
                <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Pickup Address</label>
                <div class="relative group">
                  <i class="fas fa-map-marked-alt absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-sky-500 transition-colors"></i>
                  <input type="text" name="address" id="addressInput" class="w-full pl-11 pr-4 py-4 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none font-semibold text-slate-900 placeholder:text-slate-300" placeholder="e.g. 456 Laundry Lane, Building 3B, Apt 12" required>
                </div>
                <p class="text-[11px] text-slate-400 flex items-center gap-2 px-2 italic">
                  <i class="fas fa-info-circle"></i> This address will be used for both pickup and delivery.
                </p>
              </div>
            </div>

            <!-- Step 2: Items -->
            <div id="step-content-2" class="step-content hidden transition-all duration-300">
              <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-10">
                <div>
                  <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Laundry Items</h3>
                  <p class="text-slate-500">Select the garments and services you need.</p>
                </div>
                <button type="button" id="addItemBtn" class="bg-white hover:bg-sky-50 text-sky-600 border-2 border-dashed border-sky-200 hover:border-sky-400 px-6 py-3 rounded-2xl font-bold transition-all flex items-center gap-3 active:scale-95 group">
                  <span class="w-8 h-8 bg-sky-100 rounded-full flex items-center justify-center group-hover:bg-sky-500 group-hover:text-white transition-all">
                    <i class="fas fa-plus text-xs"></i>
                  </span>
                  Add Item
                </button>
              </div>

              <div id="itemsContainer" class="space-y-6 mb-10">
                <!-- Dynamically added items will go here -->
              </div>

              <!-- Empty State -->
              <div id="emptyItems" class="text-center py-20 bg-slate-50 rounded-[40px] border-4 border-dashed border-slate-100 mb-10 hidden">
                <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 text-slate-200 text-4xl shadow-sm ring-8 ring-slate-50/50">
                  <i class="fas fa-shopping-basket"></i>
                </div>
                <h4 class="text-xl font-black text-slate-400">Basket is empty</h4>
                <p class="text-slate-400 mb-8">Add at least one item to proceed.</p>
                <button type="button" onclick="document.getElementById('addItemBtn').click()" class="bg-sky-500 text-white px-10 py-4 rounded-2xl font-black">Add Your First Item</button>
              </div>
            </div>

            <!-- Step 3: Review -->
            <div id="step-content-3" class="step-content hidden transition-all duration-300">
              <div class="mb-10 text-center sm:text-left">
                <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Order Review</h3>
                <p class="text-slate-500">Double check everything before placement.</p>
              </div>

              <div class="grid lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-8">
                  <!-- Address Card -->
                  <div class="bg-slate-50 rounded-[32px] p-8 border border-slate-100">
                    <div class="flex items-center justify-between mb-6">
                      <h4 class="font-black text-slate-800 flex items-center gap-3 uppercase tracking-wider text-sm">
                        <span class="w-8 h-8 bg-sky-500 text-white rounded-lg flex items-center justify-center text-xs"><i class="fas fa-map-marker-alt"></i></span>
                        Pickup Address
                      </h4>
                      <button type="button" onclick="goToStep(1)" class="text-sky-600 text-xs font-black uppercase tracking-widest hover:text-sky-400 p-2">Edit</button>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200">
                      <p id="review-address" class="text-slate-700 font-bold leading-relaxed">-</p>
                    </div>
                  </div>

                  <!-- Items Review -->
                  <div class="bg-slate-50 rounded-[32px] p-8 border border-slate-100">
                    <div class="flex items-center justify-between mb-6">
                      <h4 class="font-black text-slate-800 flex items-center gap-3 uppercase tracking-wider text-sm">
                        <span class="w-8 h-8 bg-sky-500 text-white rounded-lg flex items-center justify-center text-xs"><i class="fas fa-shopping-basket"></i></span>
                        Service Summary
                      </h4>
                      <button type="button" onclick="goToStep(2)" class="text-sky-600 text-xs font-black uppercase tracking-widest hover:text-sky-400 p-2">Edit Basket</button>
                    </div>
                    <div id="review-items" class="space-y-4">
                      <!-- Dynamic review items -->
                    </div>
                  </div>
                </div>

                <!-- Price Summary Side -->
                <div class="lg:col-span-1">
                  <div class="bg-slate-900 text-white rounded-[40px] p-10 lg:sticky lg:top-24 shadow-2xl relative overflow-hidden group">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-sky-500/10 rounded-full blur-3xl"></div>

                    <h3 class="font-black text-2xl mb-8 flex items-center justify-between relative z-10">
                      Grand Total
                      <i class="fas fa-receipt text-sky-500"></i>
                    </h3>

                    <div class="space-y-6 mb-10 relative z-10">
                      <div class="flex justify-between items-center text-slate-400">
                        <span class="text-xs font-black uppercase tracking-widest">Subtotal</span>
                        <span id="summary-subtotal" class="font-bold">₹0.00</span>
                      </div>
                      <div class="flex justify-between items-center text-slate-400">
                        <span class="text-xs font-black uppercase tracking-widest">Delivery</span>
                        <span class="text-green-400 font-bold uppercase tracking-tighter text-xs">Free</span>
                      </div>
                      <div class="h-px bg-slate-800 my-6"></div>
                      <div>
                        <p class="text-[10px] font-black text-sky-500 uppercase tracking-[0.3em] mb-2 text-center">Final Estimate</p>
                        <div class="flex justify-center flex-col items-center gap-1">
                          <span id="summary-total" class="text-5xl font-black text-white tracking-tighter">₹0.00</span>
                        </div>
                      </div>
                    </div>

                    <button type="submit" id="submitBtn" class="w-full py-6 bg-sky-500 hover:bg-sky-400 text-white rounded-3xl font-black text-lg shadow-xl shadow-sky-500/20 transition-all active:scale-95 flex items-center justify-center gap-4 relative z-10">
                      <span>COMPLETE ORDER</span>
                      <i class="fas fa-chevron-right text-sm"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Navigation Buttons -->
            <div id="form-nav" class="flex items-center justify-between mt-16 pt-10 border-t border-slate-50">
              <button type="button" id="prevBtn" class="flex items-center gap-4 text-slate-400 font-black uppercase tracking-widest hover:text-slate-900 transition-all px-6 py-2 invisible group">
                <span class="w-10 h-10 border-2 border-slate-100 rounded-full flex items-center justify-center group-hover:border-slate-900 transition-colors">
                  <i class="fas fa-arrow-left text-xs"></i>
                </span>
                <span>Back</span>
              </button>
              <button type="button" id="nextBtn" class="group relative bg-slate-900 hover:bg-slate-800 text-white px-12 h-16 rounded-3xl font-black transition-all flex items-center gap-4 shadow-xl active:scale-95">
                <span class="tracking-widest uppercase text-sm">Continue</span>
                <div class="w-8 h-8 bg-sky-500 rounded-xl flex items-center justify-center transition-transform group-hover:translate-x-1">
                  <i class="fas fa-chevron-right text-[10px]"></i>
                </div>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Item Template (Hidden) -->
<template id="itemTemplate">
  <div class="item-row relative bg-white border-2 border-slate-100 rounded-[32px] p-6 lg:p-8 shadow-sm hover:shadow-xl hover:border-sky-100 transition-all group/row animate-slide-in">
    <button type="button" class="remove-item absolute -top-4 -right-4 w-10 h-10 bg-white text-red-500 rounded-full flex items-center justify-center border-2 border-slate-50 hover:bg-red-500 hover:text-white transition-all shadow-lg active:scale-90 opacity-0 group-hover/row:opacity-100 z-20">
      <i class="fas fa-trash-can text-sm"></i>
    </button>

    <div class="flex flex-col gap-6 relative z-10">
      <div class="grid sm:grid-cols-12 gap-6 items-end">
        <div class="sm:col-span-4 space-y-3">
          <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] px-1">Clothing Item</label>
          <div class="relative">
            <select class="productSelect w-full bg-slate-50 px-6 py-4 rounded-2xl border-none focus:ring-4 focus:ring-sky-500/10 focus:bg-white transition-all outline-none font-bold text-slate-800 appearance-none cursor-pointer" required>
              <option value="">Choose item...</option>
            </select>
            <i class="fas fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs"></i>
          </div>
        </div>
        <div class="sm:col-span-4 space-y-3">
          <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] px-1">Service Type</label>
          <div class="relative">
            <select class="serviceSelect w-full bg-slate-50 px-6 py-4 rounded-2xl border-none focus:ring-4 focus:ring-sky-500/10 focus:bg-white transition-all outline-none font-bold text-slate-800 appearance-none cursor-pointer disabled:opacity-50" required disabled>
              <option value="">Wait for item...</option>
            </select>
            <i class="fas fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs"></i>
          </div>
        </div>
        <div class="sm:col-span-2 space-y-3">
          <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] px-1">Quantity</label>
          <div class="flex items-center bg-slate-50 rounded-2xl p-1 border border-slate-100">
            <button type="button" class="qty-btn minus w-10 h-10 flex items-center justify-center text-slate-500 hover:bg-white hover:text-sky-500 rounded-xl"><i class="fas fa-minus text-[10px]"></i></button>
            <input type="number" class="quantityInput w-full bg-transparent text-center font-black text-slate-900 outline-none p-1 text-lg" value="1" min="1">
            <button type="button" class="qty-btn plus w-10 h-10 flex items-center justify-center text-slate-500 hover:bg-white hover:text-sky-500 rounded-xl"><i class="fas fa-plus text-[10px]"></i></button>
          </div>
        </div>
        <div class="sm:col-span-2 text-right">
          <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 px-1">Price</p>
          <div class="itemPrice font-black text-slate-900 text-xl tracking-tighter bg-sky-50 p-2.5 rounded-xl text-center border border-sky-100">₹0</div>
        </div>
      </div>

      <!-- Individual Item Note -->
      <div class="space-y-3">
        <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] px-1">Notes for this item (Optional)</label>
        <div class="relative group">
          <i class="fas fa-sticky-note absolute left-5 top-4 text-slate-300 group-focus-within:text-sky-500 transition-colors"></i>
          <textarea class="itemNoteInput w-full bg-slate-50 pl-12 pr-6 py-4 rounded-2xl border-none focus:ring-4 focus:ring-sky-500/10 focus:bg-white transition-all outline-none font-medium text-slate-700 resize-none" rows="2" placeholder="e.g. Remove red wine stain, handle decorative buttons with care..."></textarea>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  document.addEventListener('DOMContentLoaded', async function() {
    const shopId = "<?php echo STORE_ID; ?>";
    const accessToken = localStorage.getItem('accessToken');
    const userStr = localStorage.getItem('user');

    if (!accessToken || !userStr) {
      alert('Session expired. Please log in.');
      window.location.href = '../login/index.php';
      return;
    }

    const user = JSON.parse(userStr);
    let currentStep = 1;
    let products = [];
    let services = [];
    let orderItems = [];

    // DOM Elements
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const itemsContainer = document.getElementById('itemsContainer');
    const emptyItems = document.getElementById('emptyItems');
    const addItemBtn = document.getElementById('addItemBtn');
    const addressInput = document.getElementById('addressInput');

    // Load Initial Data
    const loadData = async () => {
      try {
        const [pRes, sRes, profileRes] = await Promise.all([
          fetch(`https://laundry-backend-two.vercel.app/api/v1/website/products?shopId=${shopId}`),
          fetch(`https://laundry-backend-two.vercel.app/api/v1/website/services?shopId=${shopId}`),
          fetch('https://laundry-backend-two.vercel.app/api/v1/website/profile', {
            headers: {
              'Authorization': `Bearer ${accessToken}`
            }
          })
        ]);

        products = await pRes.json();
        services = await sRes.json();
        const profileData = await profileRes.json();

        if (profileRes.ok && profileData.user) {
          document.querySelector('input[name="name"]').value = profileData.user.fullName || '';
          document.querySelector('input[name="phone"]').value = profileData.user.phone || '';
          if (profileData.user.address) {
            addressInput.value = profileData.user.address;
            updateOrderItems(); // Update review address immediately
          }
        }

        addItem();
      } catch (err) {
        console.error('Data loading error:', err);
        setTimeout(loadData, 3000);
      }
    };

    const addItem = () => {
      const template = document.getElementById('itemTemplate');
      const clone = template.content.cloneNode(true);
      const row = clone.querySelector('.item-row');
      const pSelect = row.querySelector('.productSelect');
      const sSelect = row.querySelector('.serviceSelect');
      const qInput = row.querySelector('.quantityInput');
      const nInput = row.querySelector('.itemNoteInput');
      const removeBtn = row.querySelector('.remove-item');

      pSelect.innerHTML = '<option value="">Choose item...</option>' +
        products.map(p => `<option value="${p.id}">${p.name}</option>`).join('');

      pSelect.addEventListener('change', () => {
        if (pSelect.value) {
          sSelect.disabled = false;
          sSelect.innerHTML = '<option value="">Select Service</option>' +
            services.map(s => `<option value="${s.id}" data-price="${s.price}">${s.name} - ₹${parseFloat(s.price).toFixed(2)}</option>`).join('');
        } else {
          sSelect.innerHTML = '<option value="">Wait for item...</option>';
          sSelect.disabled = true;
        }
        updateOrderItems();
      });

      sSelect.addEventListener('change', updateOrderItems);
      qInput.addEventListener('change', updateOrderItems);
      qInput.addEventListener('keyup', updateOrderItems);
      nInput.addEventListener('input', updateOrderItems);

      row.querySelector('.qty-btn.plus').addEventListener('click', () => {
        qInput.value = parseInt(qInput.value) + 1;
        updateOrderItems();
      });
      row.querySelector('.qty-btn.minus').addEventListener('click', () => {
        if (qInput.value > 1) {
          qInput.value = parseInt(qInput.value) - 1;
          updateOrderItems();
        }
      });

      removeBtn.addEventListener('click', () => {
        row.style.transform = 'translateY(20px)';
        row.style.opacity = '0';
        setTimeout(() => {
          row.remove();
          updateOrderItems();
        }, 300);
      });

      itemsContainer.appendChild(clone);
      updateOrderItems();
    };

    const updateOrderItems = () => {
      const rows = itemsContainer.querySelectorAll('.item-row');
      let total = 0;
      orderItems = [];

      if (rows.length === 0) {
        emptyItems.classList.remove('hidden');
      } else {
        emptyItems.classList.add('hidden');
      }

      rows.forEach(row => {
        const pId = row.querySelector('.productSelect').value;
        const sSelect = row.querySelector('.serviceSelect');
        const sId = sSelect.value;
        const qty = parseInt(row.querySelector('.quantityInput').value) || 0;
        const notes = row.querySelector('.itemNoteInput').value;
        const priceEl = row.querySelector('.itemPrice');

        const sOption = sSelect.options[sSelect.selectedIndex];
        const price = sOption ? parseFloat(sOption.getAttribute('data-price')) : 0;
        const rowTotal = price * qty;

        priceEl.innerText = `₹${rowTotal.toFixed(2)}`;
        total += rowTotal;

        if (pId && sId && qty > 0) {
          orderItems.push({
            productId: pId,
            serviceId: sId,
            quantity: qty,
            notes: notes,
            productName: row.querySelector('.productSelect').options[row.querySelector('.productSelect').selectedIndex].text,
            serviceName: sOption ? sOption.text.split(' - ')[0] : '',
            rowTotal: rowTotal
          });
        }
      });

      document.getElementById('summary-subtotal').innerText = `₹${total.toFixed(2)}`;
      document.getElementById('summary-total').innerText = `₹${total.toFixed(2)}`;

      // Update Review
      const reviewContainer = document.getElementById('review-items');
      if (orderItems.length === 0) {
        reviewContainer.innerHTML = '<div class="p-8 bg-white border border-dashed border-slate-200 rounded-2xl text-center text-slate-400 italic">No products added.</div>';
      } else {
        reviewContainer.innerHTML = orderItems.map(item => `
        <div class="flex flex-col gap-3 p-6 bg-white rounded-3xl border border-slate-100 shadow-sm">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
               <div class="w-10 h-10 bg-sky-50 text-sky-600 rounded-xl flex items-center justify-center font-black">
                  ${item.quantity}
               </div>
               <div>
                 <p class="font-black text-slate-800 tracking-tight">${item.productName}</p>
                 <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest">${item.serviceName}</p>
               </div>
            </div>
            <p class="font-black text-slate-900 text-lg">₹${item.rowTotal.toFixed(2)}</p>
          </div>
          ${item.notes ? `<div class="bg-slate-50 px-4 py-2 rounded-xl text-xs text-slate-500 italic"><i class="fas fa-comment-dots mr-2"></i> ${item.notes}</div>` : ''}
        </div>
      `).join('');
      }

      document.getElementById('review-address').innerText = addressInput.value || 'No address provided';
    };

    const goToStep = (step) => {
      if (step > currentStep) {
        if (currentStep === 1 && !addressInput.value.trim()) {
          alert('Please provide an address.');
          addressInput.focus();
          return;
        }
        if (currentStep === 2 && orderItems.length === 0) {
          alert('Add at least one item.');
          return;
        }
      }

      document.querySelectorAll('.step-content').forEach(c => c.classList.add('hidden'));
      document.getElementById(`step-content-${step}`).classList.remove('hidden');

      document.querySelectorAll('.step-node').forEach(node => {
        const stepNum = parseInt(node.dataset.step);
        node.classList.remove('active', 'completed');
        if (stepNum === step) node.classList.add('active');
        if (stepNum < step) node.classList.add('completed');
      });

      document.getElementById('step-line').style.width = `${((step - 1) / 2) * 100}%`;
      currentStep = step;

      prevBtn.classList.toggle('invisible', step === 1);
      if (step === 3) {
        nextBtn.classList.add('hidden');
      } else {
        nextBtn.classList.remove('hidden');
        nextBtn.querySelector('span').innerText = 'Continue';
      }

      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
      updateOrderItems();
    };

    window.goToStep = goToStep;

    nextBtn.addEventListener('click', () => goToStep(currentStep + 1));
    prevBtn.addEventListener('click', () => goToStep(currentStep - 1));
    addItemBtn.addEventListener('click', addItem);
    addressInput.addEventListener('input', updateOrderItems);

    document.getElementById('orderForm').addEventListener('submit', async function(e) {
      e.preventDefault();
      const submitBtn = document.getElementById('submitBtn');

      const payload = {
        shopId: shopId,
        items: orderItems.map(i => ({
          productId: i.productId,
          serviceId: i.serviceId,
          quantity: i.quantity,
          notes: i.notes || undefined
        })),
        address: addressInput.value
      };

      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Processing...';

      try {
        const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/orders', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${accessToken}`
          },
          body: JSON.stringify(payload)
        });

        const result = await response.json();

        if (response.ok) {
          document.querySelector('.container-responsive').parentElement.innerHTML = `
          <div class="max-w-3xl mx-auto py-20 px-4 text-center animate-fade-in">
            <div class="w-24 h-24 bg-green-500 text-white rounded-[40px] flex items-center justify-center mx-auto mb-10 text-4xl shadow-xl">
              <i class="fas fa-check"></i>
            </div>
            <h2 class="text-5xl font-black text-slate-900 mb-6 tracking-tighter">Ordered Successfully!</h2>
            <div class="inline-block px-8 py-3 bg-slate-900 text-white rounded-2xl font-black text-sm uppercase tracking-widest mb-10">
              ID: #${result.order.orderNumber}
            </div>
            <p class="text-slate-500 mb-12 text-xl max-w-lg mx-auto">Your request has been registered. We'll be in touch soon for collection.</p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
              <a href="../profile/index.php" class="bg-sky-500 hover:bg-sky-600 text-white px-12 py-5 rounded-2xl font-black shadow-xl shadow-sky-500/20">VIEW DASHBOARD</a>
              <a href="../../index.php" class="p-5 text-slate-400 hover:text-slate-900 font-black uppercase tracking-widest text-xs">Home</a>
            </div>
          </div>
        `;
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        } else {
          throw new Error(result.message || 'Error occurred');
        }
      } catch (error) {
        alert(error.message);
        console.log(error);
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'COMPLETE ORDER';
      }
    });

    loadData();
  });
</script>

<?php include '../../includes/footer.php'; ?>
