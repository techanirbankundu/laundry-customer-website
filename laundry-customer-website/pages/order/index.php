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
</style>

<div class="flex-grow">
<section class="py-8 sm:py-12 bg-gradient-to-b from-sky-50 to-white min-h-[30vh] flex flex-col justify-center">
  <div class="container-responsive text-center">
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 mb-4 tracking-tight">
      Place Your <span class="text-sky-500">Order</span>
    </h1>
    <p class="text-slate-600 text-base sm:text-lg max-w-2xl mx-auto">
      Just a few simple steps to get your laundry picked up and delivered fresh.
    </p>
  </div>
</section>

<section class="pb-20 -mt-10">
  <div class="container-responsive">
    <div class="max-w-5xl mx-auto">
      
      <!-- Stepper Progress -->
      <div class="mb-12 relative px-4 flex justify-between items-center max-w-3xl mx-auto">
        <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 -translate-y-1/2 z-0 rounded-full"></div>
        <div id="step-line" class="absolute top-1/2 left-0 h-1 bg-sky-500 -translate-y-1/2 z-0 transition-all duration-500 rounded-full" style="width: 0%"></div>
        
        <!-- Step 1 -->
        <div class="step-node relative z-10 active" data-step="1">
          <div class="step-icon w-10 h-10 sm:w-12 sm:h-12 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center transition-all duration-300">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <span class="step-label absolute -bottom-8 left-1/2 -translate-x-1/2 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-400 transition-all uppercase tracking-wider">Details</span>
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
            <i class="fas fa-calendar-alt"></i>
          </div>
          <span class="step-label absolute -bottom-8 left-1/2 -translate-x-1/2 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-400 transition-all uppercase tracking-wider">Schedule</span>
        </div>

        <!-- Step 4 -->
        <div class="step-node relative z-10" data-step="4">
          <div class="step-icon w-10 h-10 sm:w-12 sm:h-12 bg-white border-2 border-gray-200 rounded-full flex items-center justify-center transition-all duration-300">
            <i class="fas fa-check-circle"></i>
          </div>
          <span class="step-label absolute -bottom-8 left-1/2 -translate-x-1/2 whitespace-nowrap text-xs sm:text-sm font-medium text-gray-400 transition-all uppercase tracking-wider">Review</span>
        </div>
      </div>

      <!-- Main Form Container -->
      <div class="bg-white rounded-3xl shadow-2xl p-6 sm:p-10 lg:p-12 border border-slate-100 overflow-hidden relative">
        <form id="orderForm" class="relative">
          
          <!-- Step 1: Details -->
          <div id="step-content-1" class="step-content transition-all duration-300">
            <div class="mb-10">
              <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Service Location</h3>
              <p class="text-slate-500">Confirm your contact info and pickup address.</p>
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
              <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Pickup & Delivery Address</label>
              <div class="relative group">
                <i class="fas fa-map-marked-alt absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-sky-500 transition-colors"></i>
                <input type="text" name="address" id="addressInput" class="w-full pl-11 pr-4 py-4 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none font-semibold text-slate-900 placeholder:text-slate-300" placeholder="e.g. 456 Laundry Lane, Near Central Park, Building 3B, Apt 12">
              </div>
              <p class="text-[11px] text-slate-400 flex items-center gap-2 px-2 italic">
                <i class="fas fa-info-circle"></i> Include landmarks for faster service.
              </p>
            </div>
          </div>

          <!-- Step 2: Items -->
          <div id="step-content-2" class="step-content hidden transition-all duration-300">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-10">
              <div>
                <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Service Selection</h3>
                <p class="text-slate-500">Select the items you want us to handle for you.</p>
              </div>
              <button type="button" id="addItemBtn" class="bg-white hover:bg-sky-50 text-sky-600 border-2 border-dashed border-sky-200 hover:border-sky-400 px-6 py-3 rounded-2xl font-bold transition-all flex items-center gap-3 active:scale-95 group">
                <span class="w-8 h-8 bg-sky-100 rounded-full flex items-center justify-center group-hover:bg-sky-500 group-hover:text-white transition-all">
                  <i class="fas fa-plus text-xs"></i>
                </span>
                Add Another Item
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
              <h4 class="text-xl font-black text-slate-400">Your basket is empty</h4>
              <p class="text-slate-400 mb-8">Please add at least one item to continue.</p>
              <button type="button" onclick="document.getElementById('addItemBtn').click()" class="bg-sky-500 text-white px-10 py-4 rounded-2xl font-black shadow-lg shadow-sky-500/20 hover:bg-sky-600 transition-all translate">Start Adding</button>
            </div>
          </div>

          <!-- Step 3: Schedule -->
          <div id="step-content-3" class="step-content hidden transition-all duration-300">
            <div class="mb-10 text-center sm:text-left">
              <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Pickup Schedule</h3>
              <p class="text-slate-500">Choose a time that fits your busy life.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 mb-10">
              <div class="space-y-4">
                <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Select Date</label>
                <div class="relative group">
                  <i class="fas fa-calendar-day absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none group-focus-within:text-sky-500 transition-colors z-10"></i>
                  <input type="date" name="pickup_date" id="pickup_date" class="w-full pl-14 pr-6 py-5 border-2 border-slate-100 rounded-3xl focus:ring-8 focus:ring-sky-500/5 focus:border-sky-500 outline-none font-bold text-slate-900 transition-all appearance-none cursor-pointer hover:bg-slate-50" required>
                </div>
                <div class="grid grid-cols-3 gap-3">
                  <button type="button" class="quick-date-btn px-4 py-3 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:border-sky-500 hover:text-sky-500 transition-all" data-offset="1">Tomorrow</button>
                  <button type="button" class="quick-date-btn px-4 py-3 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:border-sky-500 hover:text-sky-500 transition-all" data-offset="2">Day After</button>
                  <button type="button" class="quick-date-btn px-4 py-3 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:border-sky-500 hover:text-sky-500 transition-all" data-offset="3">In 3 Days</button>
                </div>
              </div>
              <div class="space-y-4">
                <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Preferred Time Window</label>
                <div class="grid grid-cols-1 gap-4">
                  <label class="relative group cursor-pointer block">
                    <input type="radio" name="pickup_time" value="morning" class="peer sr-only" checked required>
                    <div class="flex items-center gap-5 p-5 border-2 border-slate-100 rounded-3xl peer-checked:bg-sky-50 peer-checked:border-sky-500 transition-all group-hover:bg-slate-50 relative overflow-hidden">
                      <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-2xl flex items-center justify-center text-xl shadow-sm">
                        <i class="fas fa-sun"></i>
                      </div>
                      <div>
                        <p class="font-black text-slate-900 tracking-wide">Morning Slot</p>
                        <p class="text-xs text-slate-500 font-medium italic">8:00 AM - 12:00 PM</p>
                      </div>
                      <i class="fas fa-check-circle ml-auto text-sky-500 opacity-0 peer-checked:opacity-100 transition-all scale-0 peer-checked:scale-100"></i>
                      <div class="absolute -right-4 -bottom-4 text-orange-500/5 text-6xl group-hover:scale-110 transition-transform"><i class="fas fa-sun"></i></div>
                    </div>
                  </label>
                  <label class="relative group cursor-pointer block">
                    <input type="radio" name="pickup_time" value="afternoon" class="peer sr-only">
                    <div class="flex items-center gap-5 p-5 border-2 border-slate-100 rounded-3xl peer-checked:bg-sky-50 peer-checked:border-sky-500 transition-all group-hover:bg-slate-50 relative overflow-hidden">
                      <div class="w-12 h-12 bg-sky-100 text-sky-500 rounded-2xl flex items-center justify-center text-xl shadow-sm">
                        <i class="fas fa-cloud-sun"></i>
                      </div>
                      <div>
                        <p class="font-black text-slate-900 tracking-wide">Afternoon Slot</p>
                        <p class="text-xs text-slate-500 font-medium italic">12:00 PM - 4:00 PM</p>
                      </div>
                      <i class="fas fa-check-circle ml-auto text-sky-500 opacity-0 peer-checked:opacity-100 transition-all scale-0 peer-checked:scale-100"></i>
                      <div class="absolute -right-4 -bottom-4 text-sky-500/5 text-6xl group-hover:scale-110 transition-transform"><i class="fas fa-cloud-sun"></i></div>
                    </div>
                  </label>
                  <label class="relative group cursor-pointer block">
                    <input type="radio" name="pickup_time" value="evening" class="peer sr-only">
                    <div class="flex items-center gap-5 p-5 border-2 border-slate-100 rounded-3xl peer-checked:bg-sky-50 peer-checked:border-sky-500 transition-all group-hover:bg-slate-50 relative overflow-hidden">
                      <div class="w-12 h-12 bg-indigo-100 text-indigo-500 rounded-2xl flex items-center justify-center text-xl shadow-sm">
                        <i class="fas fa-moon"></i>
                      </div>
                      <div>
                        <p class="font-black text-slate-900 tracking-wide">Evening Slot</p>
                        <p class="text-xs text-slate-500 font-medium italic">4:00 PM - 8:00 PM</p>
                      </div>
                      <i class="fas fa-check-circle ml-auto text-sky-500 opacity-0 peer-checked:opacity-100 transition-all scale-0 peer-checked:scale-100"></i>
                      <div class="absolute -right-4 -bottom-4 text-indigo-500/5 text-6xl group-hover:scale-110 transition-transform"><i class="fas fa-moon"></i></div>
                    </div>
                  </label>
                </div>
              </div>
            </div>
          </div>

          <!-- Step 4: Review -->
          <div id="step-content-4" class="step-content hidden transition-all duration-300">
            <div class="mb-10 text-center sm:text-left">
              <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Order Confirmation</h3>
              <p class="text-slate-500">Please review your selections before we finalize your request.</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-10">
              <div class="lg:col-span-2 space-y-8">
                <!-- Address Card -->
                <div class="bg-slate-50 rounded-[32px] p-8 border border-slate-100 relative group">
                  <div class="flex items-center justify-between mb-6">
                    <h4 class="font-black text-slate-800 flex items-center gap-3 uppercase tracking-wider text-sm">
                      <span class="w-8 h-8 bg-sky-500 text-white rounded-lg flex items-center justify-center text-xs"><i class="fas fa-map-marker-alt"></i></span>
                      Pickup Address
                    </h4>
                    <button type="button" onclick="goToStep(1)" class="text-sky-600 text-xs font-black uppercase tracking-widest hover:text-sky-400 p-2">Change</button>
                  </div>
                  <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-4">
                     <i class="fas fa-location-dot text-slate-300 mt-1"></i>
                     <p id="review-address" class="text-slate-700 font-bold leading-relaxed">Let's get this address...</p>
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
                  <div id="review-items" class="grid sm:grid-cols-1 gap-4">
                    <!-- Dynamic review items -->
                  </div>
                </div>

                <div class="space-y-4">
                  <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Special Requests (Optional)</label>
                  <textarea name="instructions" id="notesInput" class="w-full px-6 py-5 border-2 border-slate-100 bg-slate-50 rounded-[28px] focus:ring-8 focus:ring-sky-500/5 focus:border-sky-500 focus:bg-white transition-all outline-none font-medium text-slate-700 placeholder:text-slate-300" rows="4" placeholder="e.g. Please pick up from the back gate, Handle the silk shirt with extra care..."></textarea>
                </div>
              </div>

              <!-- Price Summary Side -->
              <div class="lg:col-span-1">
                <div class="bg-slate-900 text-white rounded-[40px] p-10 lg:sticky lg:top-24 shadow-2xl shadow-slate-900/40 relative overflow-hidden group">
                  <!-- Decor -->
                  <div class="absolute -right-20 -top-20 w-64 h-64 bg-sky-500/10 rounded-full group-hover:scale-110 transition-transform duration-700 blur-3xl"></div>
                  <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-indigo-500/10 rounded-full group-hover:scale-110 transition-transform duration-1000 blur-3xl"></div>

                  <h3 class="font-black text-2xl mb-10 flex items-center justify-between relative z-10">
                    Grand Total
                    <i class="fas fa-file-invoice-dollar text-sky-500"></i>
                  </h3>
                  
                  <div class="space-y-6 mb-10 relative z-10">
                    <div class="flex justify-between items-center text-slate-400">
                      <span class="text-sm font-bold uppercase tracking-widest">Basket Items</span>
                      <span id="summary-subtotal" class="font-black text-white">₹0.00</span>
                    </div>
                    <div class="flex justify-between items-center text-slate-400">
                      <span class="text-sm font-bold uppercase tracking-widest">Store Pickup</span>
                      <span class="text-green-400 font-black text-sm uppercase tracking-tighter">Complimentary</span>
                    </div>
                    <div class="h-px bg-slate-800 my-8 shadow-[0_1px_0_rgba(255,255,255,0.05)]"></div>
                    <div>
                      <p class="text-[10px] font-black text-sky-500 uppercase tracking-[0.3em] mb-2 text-center">Estimated Payment</p>
                      <div class="flex justify-center flex-col items-center gap-1">
                        <span id="summary-total" class="text-5xl font-black text-white tracking-tighter drop-shadow-sm">₹0.00</span>
                        <p class="text-[10px] text-slate-500/80 italic font-medium">To be verified upon collection</p>
                      </div>
                    </div>
                  </div>

                  <button type="submit" id="submitBtn" class="w-full py-6 bg-sky-500 hover:bg-sky-400 text-white rounded-3xl font-black text-lg shadow-xl shadow-sky-500/20 transition-all active:scale-95 flex items-center justify-center gap-4 relative z-10 group/btn overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-sky-400 to-sky-600 opacity-0 group-hover/btn:opacity-100 transition-opacity"></div>
                    <span class="relative z-10">PLACE ORDER NOW</span>
                    <i class="fas fa-chevron-right text-sm relative z-10 group-hover/btn:translate-x-1 transition-transform"></i>
                  </button>
                  
                  <div class="mt-8 flex items-center justify-center gap-4 text-slate-500 relative z-10 opacity-70">
                    <div class="flex items-center gap-1.5 text-[9px] font-black uppercase tracking-widest">
                       <i class="fas fa-shield-halved text-sky-500 text-xs"></i> Secure System
                    </div>
                    <div class="w-1 h-1 bg-slate-700 rounded-full"></div>
                    <div class="flex items-center gap-1.5 text-[9px] font-black uppercase tracking-widest">
                       <i class="fas fa-clock text-sky-500 text-xs"></i> Instant Sync
                    </div>
                  </div>
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
            <button type="button" id="nextBtn" class="group relative bg-slate-900 hover:bg-slate-800 text-white px-12 h-16 rounded-3xl font-black transition-all flex items-center gap-4 shadow-xl shadow-slate-900/10 active:scale-95">
              <span class="tracking-widest uppercase text-sm">Next Step</span>
              <div class="w-8 h-8 bg-sky-500 rounded-xl flex items-center justify-center group-hover:rotate-45 transition-transform">
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
    
    <div class="grid sm:grid-cols-12 gap-6 lg:gap-8 items-end relative z-10">
      <div class="sm:col-span-5 space-y-3">
        <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] px-1">Laundry Product</label>
        <div class="relative">
           <select class="productSelect w-full bg-slate-50 px-6 py-4.5 rounded-2xl border-none focus:ring-4 focus:ring-sky-500/10 focus:bg-white transition-all outline-none font-bold text-slate-800 appearance-none cursor-pointer" required>
             <option value="">Choose item...</option>
           </select>
           <i class="fas fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs"></i>
        </div>
      </div>
      <div class="sm:col-span-4 space-y-3">
        <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] px-1">Service Type</label>
        <div class="relative">
           <select class="serviceSelect w-full bg-slate-50 px-6 py-4.5 rounded-2xl border-none focus:ring-4 focus:ring-sky-500/10 focus:bg-white transition-all outline-none font-bold text-slate-800 appearance-none cursor-pointer disabled:opacity-50" required disabled>
             <option value="">Wait for product...</option>
           </select>
           <i class="fas fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-xs"></i>
        </div>
      </div>
      <div class="sm:col-span-3">
        <div class="flex items-center gap-6">
          <div class="flex-1 space-y-3">
            <label class="block text-xs font-black text-slate-400 uppercase tracking-[0.2em] px-1">Units</label>
            <div class="flex items-center bg-slate-50 rounded-2xl p-1.5 border border-slate-100">
              <button type="button" class="qty-btn minus w-10 h-10 flex items-center justify-center text-slate-500 hover:bg-white hover:text-sky-500 hover:shadow-sm rounded-xl transition-all"><i class="fas fa-minus text-[10px]"></i></button>
              <input type="number" class="quantityInput w-full bg-transparent text-center font-black text-slate-900 outline-none p-1 text-lg" value="1" min="1">
              <button type="button" class="qty-btn plus w-10 h-10 flex items-center justify-center text-slate-500 hover:bg-white hover:text-sky-500 hover:shadow-sm rounded-xl transition-all"><i class="fas fa-plus text-[10px]"></i></button>
            </div>
          </div>
          <div class="text-right min-w-[80px]">
             <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-2 px-1">Line Est.</p>
             <div class="itemPrice font-black text-slate-900 text-xl tracking-tighter bg-sky-50 p-2 rounded-xl text-center border border-sky-100">₹0</div>
          </div>
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

  // Pre-fill user data
  document.querySelector('input[name="name"]').value = user.fullName || '';
  document.querySelector('input[name="phone"]').value = user.phone || '';
  if (user.address) addressInput.value = user.address;

  // Set minimum date for pickup to tomorrow
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  const tomorrowStr = tomorrow.toISOString().split('T')[0];
  document.getElementById('pickup_date').value = tomorrowStr;
  document.getElementById('pickup_date').setAttribute('min', tomorrowStr);

  // Quick Date Buttons
  document.querySelectorAll('.quick-date-btn').forEach(btn => {
    btn.addEventListener('click', () => {
       const offset = parseInt(btn.dataset.offset);
       const date = new Date();
       date.setDate(date.getDate() + offset);
       document.getElementById('pickup_date').value = date.toISOString().split('T')[0];
    });
  });

  // Load Initial Data
  const loadData = async () => {
    try {
      const [pRes, sRes] = await Promise.all([
        fetch(`https://laundry-backend-two.vercel.app/api/v1/website/products?shopId=${shopId}`),
        fetch(`https://laundry-backend-two.vercel.app/api/v1/website/services?shopId=${shopId}`)
      ]);
      products = await pRes.json();
      services = await sRes.json();
      
      // Add first item automatically
      addItem();
    } catch (err) {
      console.error('Data loading error:', err);
      // Fallback or retry
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
    const removeBtn = row.querySelector('.remove-item');

    // Populate Products
    pSelect.innerHTML = '<option value="">Choose item...</option>' + 
      products.map(p => `<option value="${p.id}">${p.name}</option>`).join('');

    // Handlers
    pSelect.addEventListener('change', () => {
      if (pSelect.value) {
        sSelect.disabled = false;
        sSelect.innerHTML = '<option value="">Select Service</option>' + 
          services.map(s => `<option value="${s.id}" data-price="${s.price}">${s.name} - ₹${parseFloat(s.price).toFixed(2)}/unit</option>`).join('');
      } else {
        sSelect.innerHTML = '<option value="">Wait for product...</option>';
        sSelect.disabled = true;
      }
      updateOrderItems();
    });

    sSelect.addEventListener('change', updateOrderItems);
    qInput.addEventListener('change', updateOrderItems);
    qInput.addEventListener('keyup', updateOrderItems);

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
      row.style.transform = 'translateX(50px)';
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
      reviewContainer.innerHTML = `
        <div class="p-10 bg-white border-2 border-dashed border-slate-100 rounded-2xl text-center">
          <p class="text-slate-400 font-bold italic">No services selected yet.</p>
        </div>
      `;
    } else {
      reviewContainer.innerHTML = orderItems.map(item => `
        <div class="flex items-center justify-between p-6 bg-white rounded-2xl border border-slate-100 shadow-sm group hover:border-sky-200 transition-all">
          <div class="flex items-center gap-4">
             <div class="w-12 h-12 bg-sky-50 rounded-xl flex items-center justify-center text-sky-500 font-black">
                ${item.quantity}
             </div>
             <div>
               <p class="font-black text-slate-800 tracking-tight">${item.productName}</p>
               <p class="text-[10px] text-slate-400 font-black uppercase tracking-widest">${item.serviceName}</p>
             </div>
          </div>
          <div class="text-right">
             <p class="font-black text-slate-900 text-lg tracking-tighter">₹${item.rowTotal.toFixed(2)}</p>
          </div>
        </div>
      `).join('');
    }
    
    document.getElementById('review-address').innerText = addressInput.value || 'No address provided';
  };

  const goToStep = (step) => {
    // Validation
    if (step > currentStep) {
      if (currentStep === 1 && !addressInput.value.trim()) {
        alert('Please enter your pickup address.');
        addressInput.focus();
        return;
      }
      if (currentStep === 2 && orderItems.length === 0) {
        alert('Please add at least one valid item to your basket.');
        return;
      }
      if (currentStep === 2 && orderItems.length < itemsContainer.querySelectorAll('.item-row').length) {
         alert('Please complete all item selections.');
         return;
      }
    }

    // Update UI
    const containers = document.querySelectorAll('.step-content');
    containers.forEach(c => {
       c.classList.add('hidden');
       c.style.opacity = '0';
       c.style.transform = 'translateY(10px)';
    });
    
    const target = document.getElementById(`step-content-${step}`);
    target.classList.remove('hidden');
    setTimeout(() => {
       target.style.opacity = '1';
       target.style.transform = 'translateY(0)';
    }, 10);
    
    document.querySelectorAll('.step-node').forEach(node => {
      const stepNum = parseInt(node.dataset.step);
      node.classList.remove('active', 'completed');
      if (stepNum === step) node.classList.add('active');
      if (stepNum < step) node.classList.add('completed');
    });

    document.getElementById('step-line').style.width = `${((step - 1) / 3) * 100}%`;

    currentStep = step;
    
    // Nav Visibility
    prevBtn.classList.toggle('invisible', step === 1);
    
    if (step === 4) {
      nextBtn.classList.add('hidden');
    } else {
      nextBtn.classList.remove('hidden');
      nextBtn.querySelector('span').innerText = 'Next Step';
    }

    window.scrollTo({ top: 0, behavior: 'smooth' });
    updateOrderItems();
  };

  window.goToStep = goToStep; // Expose for breadcrumbs

  // Event Listeners
  nextBtn.addEventListener('click', () => goToStep(currentStep + 1));
  prevBtn.addEventListener('click', () => goToStep(currentStep - 1));
  addItemBtn.addEventListener('click', addItem);
  addressInput.addEventListener('input', updateOrderItems);

  // Form Submission
  document.getElementById('orderForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const submitBtn = document.getElementById('submitBtn');
    
    if (orderItems.length === 0) {
      alert('Your basket is empty.');
      goToStep(2);
      return;
    }

    const payload = {
      shopId: shopId,
      address: addressInput.value,
      pickupDate: document.getElementById('pickup_date').value,
      pickupSlot: document.querySelector('input[name="pickup_time"]:checked').value,
      items: orderItems.map(i => ({
        productId: i.productId,
        serviceId: i.serviceId,
        quantity: i.quantity,
        notes: document.getElementById('notesInput').value
      }))
    };

    submitBtn.disabled = true;
    submitBtn.innerHTML = `
      <div class="flex items-center gap-3">
        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span>SYNCHRONIZING...</span>
      </div>
    `;
    
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
        // Success UI
        document.querySelector('.container-responsive').innerHTML = `
          <div class="max-w-3xl mx-auto py-20 text-center animate-fade-in relative">
            <div class="absolute inset-0 bg-sky-500/5 blur-3xl rounded-full scale-50"></div>
            <div class="relative z-10">
              <div class="w-32 h-32 bg-green-500 text-white rounded-[40px] flex items-center justify-center mx-auto mb-10 text-5xl shadow-2xl shadow-green-500/40 rotate-12 scale-110">
                <i class="fas fa-check"></i>
              </div>
              <h2 class="text-5xl font-black text-slate-900 mb-6 tracking-tighter">Order Success!</h2>
              <div class="inline-block px-8 py-3 bg-slate-900 text-white rounded-2xl font-black text-sm uppercase tracking-[0.3em] mb-10 shadow-lg">
                Ref: #${result.order.orderNumber}
              </div>
              <p class="text-slate-500 mb-12 text-xl max-w-lg mx-auto leading-relaxed">We've received your request. A pickup agent will be assigned to your address for the <span class="text-sky-600 font-bold">${document.getElementById('pickup_date').value}</span> schedule.</p>
              <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="../profile/index.php" class="bg-sky-500 hover:bg-sky-600 text-white px-12 py-5 rounded-2xl font-black transition-all shadow-xl shadow-sky-500/20 active:scale-95">GO TO DASHBOARD</a>
                <a href="../../index.php" class="text-slate-400 hover:text-slate-900 font-black uppercase tracking-widest text-xs transition-colors p-4">Return Home</a>
              </div>
            </div>
          </div>
        `;
        window.scrollTo({ top: 0, behavior: 'smooth' });
      } else {
        throw new Error(result.message || 'Server rejected request');
      }
    } catch (error) {
      console.error('Submission error:', error);
      alert('Error: ' + error.message);
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'PLACE ORDER NOW';
    }
  });

  // Start initialization
  loadData();
});
</script>

<?php include '../../includes/footer.php'; ?>
