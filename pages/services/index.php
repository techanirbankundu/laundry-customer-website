<?php
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<section class="py-10 sm:py-12 lg:py-14 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-10 xl:px-12 max-w-6xl xl:max-w-[1320px] 2xl:max-w-[1440px] text-center">
    <h1 class="text-3xl sm:text-4xl lg:text-4xl font-bold mb-2 sm:mb-4">Our Services & Pricing</h1>
    <p class="text-gray-600 text-sm sm:text-base lg:text-base">Transparent pricing for premium care</p>
  </div>
</section>

<section class="py-10 sm:py-14 lg:py-16">
  <div class="container mx-auto px-4 sm:px-6 lg:px-10 xl:px-12 max-w-6xl xl:max-w-[1320px] 2xl:max-w-[1440px]">
    <div id="services-grid" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
      <!-- Services will be loaded here -->
      <div class="col-span-full text-center py-20">
        <i class="fas fa-spinner fa-spin text-4xl text-sky-500 mb-4"></i>
        <p class="text-gray-500">Loading services...</p>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', async () => {
    const servicesGrid = document.getElementById('services-grid');
    const shopId = "<?php echo STORE_ID; ?>";

    try {
      const response = await fetch(`https://laundry-backend-two.vercel.app/api/v1/website/services?shopId=${shopId}`);
      const services = await response.json();

      if (services.length > 0) {
        servicesGrid.innerHTML = services.map(service => `
                <div class="card">
                    <div class="flex flex-col sm:flex-row justify-between items-start mb-3 sm:mb-4 gap-2 sm:gap-0">
                        <div class="service-icon mb-0">
                            <i class="${getIcon(service.name)}"></i>
                        </div>
                        <span class="px-2 py-1 sm:px-3 rounded-full bg-sky-100 text-sky-600 text-xs sm:text-sm font-semibold">
                            ₹${parseFloat(service.price).toFixed(2)}
                        </span>
                    </div>
                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-2 sm:mb-4">${service.name}</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
                        Premium care for your garments with professional results guaranteed.
                    </p>
                    <ul class="mb-4 sm:mb-6 space-y-1 sm:space-y-2 text-gray-600 text-xs sm:text-sm">
                        <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> ${service.price > 100 ? 'Express Option Available' : 'Quality Cleaning'}</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Expert Handling</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check text-sky-500"></i> Eco-Friendly</li>
                    </ul>
                    <a href="<?php echo $base_path; ?>/pages/order/index.php" class="btn btn-outline w-full">Book Now</a>
                </div>
            `).join('');
      } else {
        servicesGrid.innerHTML = `
                <div class="col-span-full text-center py-20">
                    <p class="text-gray-500">No services found for this store.</p>
                </div>
            `;
      }
    } catch (error) {
      console.error('Error fetching services:', error);
      servicesGrid.innerHTML = `
            <div class="col-span-full text-center py-20">
                <p class="text-red-500">Failed to load services. Please try again later.</p>
            </div>
        `;
    }
  });

  function getIcon(name) {
    name = name.toLowerCase();
    if (name.includes('wash') || name.includes('iron')) return 'fas fa-tshirt';
    if (name.includes('dry')) return 'fas fa-wind';
    if (name.includes('household') || name.includes('bed')) return 'fas fa-socks';
    return 'fas fa-soap';
  }
</script>

<?php include '../../includes/footer.php'; ?>
