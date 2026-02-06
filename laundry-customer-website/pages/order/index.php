<?php 
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<section class="py-10 sm:py-12 lg:py-16 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-4 sm:px-6 text-center">
    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-2 sm:mb-4">Schedule a Pickup</h1>
    <p class="text-gray-600 text-sm sm:text-base lg:text-lg">Fill out the form below and we'll take care of the rest</p>
  </div>
</section>

<section class="py-12 sm:py-16 lg:py-20">
  <div class="container mx-auto px-4 sm:px-6">
    <div class="max-w-4xl mx-auto bg-white p-6 sm:p-8 lg:p-10 rounded-xl sm:rounded-2xl shadow-lg sm:shadow-xl">
      <form id="orderForm">

        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-4 sm:mb-6">1. Contact Information</h3>
        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 mb-6 sm:mb-8">
          <div>
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Full Name</label>
            <input type="text" name="name" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="John Doe" readonly>
          </div>
          <div>
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Phone Number</label>
            <input type="tel" name="phone" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 bg-gray-50 border border-gray-200 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="(555) 123-4567" readonly>
          </div>
        </div>

        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-4 sm:mb-6 mt-6 sm:mt-8">2. Pickup & Delivery Address</h3>
        <div class="mb-4 sm:mb-6">
          <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Address Line 1</label>
          <input type="text" name="address1" id="addressInput" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" placeholder="123 Main St" required>
        </div>

        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-4 sm:mb-6 mt-6 sm:mt-8">3. Items & Services</h3>
        <div class="grid sm:grid-cols-3 gap-4 sm:gap-6 mb-4 sm:mb-6">
          <div class="sm:col-span-1">
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Product</label>
            <select name="product_id" id="productSelect" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
              <option value="">Loading products...</option>
            </select>
          </div>
          <div class="sm:col-span-1">
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Service Type</label>
            <select name="service_id" id="serviceSelect" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
              <option value="">Loading services...</option>
            </select>
          </div>
          <div class="sm:col-span-1">
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Quantity</label>
            <input type="number" name="quantity" id="quantityInput" value="1" min="1" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
          </div>
        </div>

        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-4 sm:mb-6 mt-6 sm:mt-8">4. Schedule</h3>
        <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
          <div>
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Pickup Date</label>
            <input type="date" name="pickup_date" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
          </div>
          <div>
            <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Pickup Time</label>
            <select name="pickup_time" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" required>
              <option value="morning">Morning (8am - 12pm)</option>
              <option value="afternoon">Afternoon (12pm - 4pm)</option>
              <option value="evening">Evening (4pm - 8pm)</option>
            </select>
          </div>
        </div>

        <div class="mb-6 sm:mb-8 text-right bg-sky-50 p-4 rounded-xl hidden" id="priceIndicator">
          <p class="text-gray-600 text-sm">Estimated Total:</p>
          <p class="text-2xl font-bold text-sky-600" id="estimatedPrice">₹0.00</p>
        </div>

        <div class="mb-6 sm:mb-8">
          <label class="block mb-1.5 sm:mb-2 font-medium text-slate-900 text-sm sm:text-base">Special Instructions</label>
          <textarea name="instructions" id="notesInput" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg sm:rounded-xl focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm sm:text-base" rows="3" placeholder="Gate code, specific stains, etc."></textarea>
        </div>

        <button type="submit" id="submitBtn" class="btn btn-primary w-full text-base sm:text-lg">Confirm Pickup Request</button>
      </form>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', async function() {
  const shopId = "<?php echo STORE_ID; ?>";
  const accessToken = localStorage.getItem('accessToken');
  const userStr = localStorage.getItem('user');
  
  // Check if logged in
  if (!accessToken || !userStr) {
    alert('Please login to create an order.');
    window.location.href = '../login/index.php';
    return;
  }

  const user = JSON.parse(userStr);
  const productSelect = document.getElementById('productSelect');
  const serviceSelect = document.getElementById('serviceSelect');
  const quantityInput = document.getElementById('quantityInput');
  const addressInput = document.getElementById('addressInput');
  const notesInput = document.getElementById('notesInput');
  const priceIndicator = document.getElementById('priceIndicator');
  const estimatedPrice = document.getElementById('estimatedPrice');

  // Pre-fill user data
  document.querySelector('input[name="name"]').value = user.fullName || '';
  document.querySelector('input[name="phone"]').value = user.phone || '';
  if (user.address) addressInput.value = user.address;

  // Fetch Products
  try {
    const pResponse = await fetch(`https://laundry-backend-two.vercel.app/api/v1/website/products?shopId=${shopId}`);
    const products = await pResponse.json();
    productSelect.innerHTML = '<option value="">Select a product...</option>' + 
      products.map(p => `<option value="${p.id}">${p.name} (${p.category})</option>`).join('');
  } catch (err) {
    console.error('Error fetching products:', err);
    productSelect.innerHTML = '<option value="">Error loading products</option>';
  }

  // Fetch Services
  try {
    const sResponse = await fetch(`https://laundry-backend-two.vercel.app/api/v1/website/services?shopId=${shopId}`);
    const servicesData = await sResponse.json();
    serviceSelect.innerHTML = '<option value="">Select a service...</option>' + 
      servicesData.map(s => `<option value="${s.id}" data-price="${s.price}">${s.name} - ₹${parseFloat(s.price).toFixed(2)}</option>`).join('');
  } catch (err) {
    console.error('Error fetching services:', err);
    serviceSelect.innerHTML = '<option value="">Error loading services</option>';
  }

  // Price Calculation Preview
  const updatePrice = () => {
    const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
    const unitPrice = selectedOption ? parseFloat(selectedOption.getAttribute('data-price')) : 0;
    const qty = parseInt(quantityInput.value) || 1;
    
    if (unitPrice > 0) {
      priceIndicator.classList.remove('hidden');
      estimatedPrice.innerText = `₹${(unitPrice * qty).toFixed(2)}`;
    } else {
      priceIndicator.classList.add('hidden');
    }
  };

  serviceSelect.addEventListener('change', updatePrice);
  quantityInput.addEventListener('input', updatePrice);

  // Form Submission
  document.getElementById('orderForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const submitBtn = document.getElementById('submitBtn');
    
    const payload = {
      shopId: shopId,
      address: addressInput.value,
      items: [
        {
          productId: productSelect.value,
          serviceId: serviceSelect.value,
          quantity: parseInt(quantityInput.value),
          notes: notesInput.value
        }
      ]
    };

    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Placing Order...';
    
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
        alert('Order placed successfully! Order Number: ' + result.order.orderNumber);
        window.location.href = '../../index.php';
      } else {
        alert('Failed to place order: ' + (result.message || 'Unknown error'));
      }
    } catch (error) {
      console.error('Error placing order:', error);
      alert('An error occurred while placing the order. Please try again.');
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'Confirm Pickup Request';
    }
  });
});
</script>

<?php include '../../includes/footer.php'; ?>
