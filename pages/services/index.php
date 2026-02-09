<?php
define('STORE_ID', "03a9339c-638f-4d1e-96c8-74aa596fab81");
include '../../includes/header.php'; ?>

<section class="py-6 sm:py-8 lg:py-10 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 xl:px-2 max-w-6xl xl:max-w-[1360px] 2xl:max-w-[1440px] text-center">
    <h1 class="text-2xl sm:text-3xl lg:text-3xl font-bold mb-1.5 sm:mb-3">Our Services & Pricing</h1>
    <p class="text-gray-600 text-xs sm:text-sm lg:text-base">Transparent pricing for premium garment care</p>
  </div>
</section>

<section class="py-6 sm:py-8 lg:py-10">
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 xl:px-2 max-w-6xl xl:max-w-[1360px] 2xl:max-w-[1440px]">
    <div id="services-grid" class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-5">
      <!-- Services will be loaded here -->
      <div class="col-span-full text-center py-16">
        <i class="fas fa-spinner fa-spin text-3xl text-sky-500 mb-3"></i>
        <p class="text-gray-500 text-sm">Loading services breakdown...</p>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', async () => {
    const servicesGrid = document.getElementById('services-grid');
    const shopId = "<?php echo STORE_ID; ?>";
    const base_path = '<?php echo $base_path; ?>';

    try {
      const response = await fetch(`https://laundry-backend-two.vercel.app/api/v1/website/services?shopId=${shopId}`);
      const services = await response.json();

      if (services.length > 0) {
        servicesGrid.innerHTML = services.map(service => `
                <div class="card p-4 sm:p-5">
                    <div class="flex justify-between items-center mb-4">
                        <div class="w-10 h-10 bg-sky-50 rounded-lg flex items-center justify-center text-sky-500 text-lg">
                            <i class="${getIcon(service.name)}"></i>
                        </div>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-600 text-[11px] font-bold">
                            ₹${parseFloat(service.price).toFixed(0)}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold mb-1.5 text-slate-800">${service.name}</h3>
                    <p class="text-gray-500 text-xs leading-relaxed mb-4">
                        Professional grooming for your garments with guaranteed quality.
                    </p>
                    <ul class="mb-5 space-y-2 text-gray-600 text-[11px]">
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-sky-400"></i> Expert Handling</li>
                        <li class="flex items-center gap-2"><i class="fas fa-check-circle text-sky-400"></i> Eco-Friendly Wash</li>
                    </ul>
                    <a href="${base_path}/pages/order/index.php" class="btn btn-primary w-full py-2 text-xs">Order Now</a>
                </div>
            `).join('');
      } else {
        servicesGrid.innerHTML = `
                <div class="col-span-full text-center py-16">
                    <p class="text-gray-500 text-sm">No services available for this location.</p>
                </div>
            `;
      }
    } catch (error) {
      console.error('Error fetching services:', error);
      Swal.fire({
        icon: 'error',
        title: 'Load Error',
        text: 'Failed to fetch services. Please refresh the page.',
        confirmButtonColor: '#0ea5e9'
      });
      servicesGrid.innerHTML = `
            <div class="col-span-full text-center py-16">
                <p class="text-red-500 text-sm">Connection error. Please try again.</p>
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
