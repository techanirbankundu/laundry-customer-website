<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FreshSpin Laundry</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style type="text/tailwindcss">
    @layer components {
            .btn {
                @apply inline-flex items-center justify-center px-4 py-2 sm:px-6 sm:py-3 rounded-xl font-semibold transition-all duration-300 gap-2 text-sm sm:text-base;
            }

            .btn-primary {
                @apply bg-gradient-to-r from-sky-500 to-indigo-600 text-white shadow-lg shadow-sky-500/30 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-sky-500/40;
            }

            .btn-outline {
                @apply bg-transparent border-2 border-sky-500 text-sky-600 hover:bg-sky-500 hover:text-white;
            }

            .card {
                @apply bg-white rounded-xl p-4 sm:p-6 lg:p-8 border border-gray-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-sky-500;
            }

            .service-icon {
                @apply w-12 h-12 sm:w-14 sm:h-14 lg:w-16 lg:h-16 bg-sky-100 rounded-full flex items-center justify-center text-sky-500 text-xl sm:text-2xl lg:text-3xl mb-4 sm:mb-6;
            }

            .container-responsive {
                @apply container mx-auto px-4 sm:px-6;
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col">
  <?php
  // Determine base path dynamicly or keep it clean
  $base_path = '/laundry-customer-website';
  $current_page = $_SERVER['SCRIPT_NAME'];
  $is_home = $current_page == $base_path . '/index.php' || $current_page == $base_path . '/';
  ?>
  <header class="bg-white/90 backdrop-blur-lg border-b border-gray-200 sticky top-0 z-50 py-3 sm:py-4">
    <div class="container mx-auto px-4 sm:px-6">
      <nav class="flex justify-between items-center">
        <a href="<?php echo $base_path; ?>/" class="flex items-center gap-2 text-xl sm:text-2xl font-extrabold text-sky-500">
          <i class="fas fa-soap"></i> FreshSpin
        </a>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-btn" class="lg:hidden p-2 text-gray-600 hover:text-sky-500 focus:outline-none transition-colors">
          <i class="fas fa-bars text-xl"></i>
        </button>

        <!-- Desktop Navigation -->
        <ul class="hidden lg:flex gap-6 xl:gap-8 items-center" id="navLinks">
          <li>
            <form action="#" method="GET" class="relative group">
              <input type="text" placeholder="Search services..." class="bg-gray-100 text-gray-700 px-4 py-2 pl-10 rounded-full focus:outline-none focus:ring-2 focus:ring-sky-500 w-40 xl:w-48 transition-all hover:bg-gray-200/50 focus:bg-white focus:shadow-sm text-sm border border-transparent focus:border-sky-100">
              <i class="fas fa-search absolute left-3 top-2.5 text-gray-400 group-focus-within:text-sky-500 transition-colors"></i>
            </form>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/" class="font-medium hover:text-sky-500 transition-colors text-sm xl:text-base <?php echo $is_home ? 'text-sky-600 font-bold' : 'text-gray-600'; ?>">Home</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/services/index.php" class="font-medium hover:text-sky-500 transition-colors text-sm xl:text-base <?php echo strpos($current_page, '/services/') !== false ? 'text-sky-600 font-bold' : 'text-gray-600'; ?>">Services</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/order/index.php" class="font-medium hover:text-sky-500 transition-colors text-sm xl:text-base <?php echo strpos($current_page, '/order/') !== false ? 'text-sky-600 font-bold' : 'text-gray-600'; ?>">Order</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/contact/index.php" class="font-medium hover:text-sky-500 transition-colors text-sm xl:text-base <?php echo strpos($current_page, '/contact/') !== false ? 'text-sky-600 font-bold' : 'text-gray-600'; ?>">Contact</a>
          </li>
          <li id="authLinkDesktop"><a href="<?php echo $base_path; ?>/pages/login/index.php" class="btn btn-primary">Login</a></li>
        </ul>
      </nav>

      <!-- Mobile Navigation Menu -->
      <div id="mobile-menu" class="hidden lg:hidden mt-4 pb-4 border-t border-gray-100 pt-4 animate-fade-in">
        <form action="#" method="GET" class="relative mb-4">
          <input type="text" placeholder="Search services..." class="bg-gray-100 text-gray-700 px-4 py-2 pl-10 rounded-full focus:outline-none focus:ring-2 focus:ring-sky-500 w-full transition-all border border-transparent">
          <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
        </form>
        <ul class="flex flex-col gap-2" id="mobileNavLinks">
          <li>
            <a href="<?php echo $base_path; ?>/" class="block py-2.5 px-4 rounded-xl font-medium hover:bg-sky-50 hover:text-sky-500 transition-colors <?php echo $is_home ? 'text-sky-600 font-bold bg-sky-50' : 'text-gray-600'; ?>">Home</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/services/index.php" class="block py-2.5 px-4 rounded-xl font-medium hover:bg-sky-50 hover:text-sky-500 transition-colors <?php echo strpos($current_page, '/services/') !== false ? 'text-sky-600 font-bold bg-sky-50' : 'text-gray-600'; ?>">Services</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/order/index.php" class="block py-2.5 px-4 rounded-xl font-medium hover:bg-sky-50 hover:text-sky-500 transition-colors <?php echo strpos($current_page, '/order/') !== false ? 'text-sky-600 font-bold bg-sky-50' : 'text-gray-600'; ?>">Order</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/contact/index.php" class="block py-2.5 px-4 rounded-xl font-medium hover:bg-sky-50 hover:text-sky-500 transition-colors <?php echo strpos($current_page, '/contact/') !== false ? 'text-sky-600 font-bold bg-sky-50' : 'text-gray-600'; ?>">Contact</a>
          </li>
          <li id="authLinkMobile" class="mt-2 text-center">
            <a href="<?php echo $base_path; ?>/pages/login/index.php" class="btn btn-primary w-full justify-center">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <script>
    // Authentication Logic
    document.addEventListener('DOMContentLoaded', function() {
      const base_path = '<?php echo $base_path; ?>';
      const accessToken = localStorage.getItem('accessToken');
      const user = JSON.parse(localStorage.getItem('user') || '{}');
      const authLinkDesktop = document.getElementById('authLinkDesktop');
      const authLinkMobile = document.getElementById('authLinkMobile');

      if (accessToken && user && user.fullName) {
        // Get initials for profile placeholder
        const initials = user.fullName.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);

        // Update Desktop Auth Link
        authLinkDesktop.innerHTML = `
          <div class="flex items-center gap-3 xl:gap-4 pl-4 border-l border-gray-200">
            <div class="flex flex-col items-end">
              <a href="${base_path}/pages/profile/index.php" class="text-xs xl:text-sm font-bold text-slate-800 line-clamp-1 hover:text-sky-500 transition-colors">${user.fullName}</a>
              <button onclick="logout()" class="text-[10px] xl:text-xs text-red-500 hover:text-red-700 font-semibold cursor-pointer outline-none">Logout</button>
            </div>
            <a href="${base_path}/pages/profile/index.php" class="w-9 h-9 xl:w-11 xl:h-11 bg-sky-50 rounded-full flex items-center justify-center text-sky-600 border border-sky-100 hover:bg-sky-100 hover:shadow-sm transition-all overflow-hidden">
              ${user.avatar ? `<img src="${user.avatar}" class="w-full h-full object-cover">` : `<span class="text-xs xl:text-sm font-bold">${initials}</span>`}
            </a>
          </div>
        `;

        // Update Mobile Auth Link
        authLinkMobile.innerHTML = `
          <div class="p-4 bg-sky-50 rounded-2xl mt-4 border border-sky-100 text-left">
            <div class="flex items-center justify-between mb-4">
              <a href="${base_path}/pages/profile/index.php" class="flex items-center gap-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-sky-600 text-lg font-bold border border-sky-100 shadow-sm overflow-hidden">
                  ${user.avatar ? `<img src="${user.avatar}" class="w-full h-full object-cover">` : initials}
                </div>
                <div>
                  <p class="font-bold text-slate-800 text-sm whitespace-nowrap overflow-hidden text-ellipsis max-w-[150px]">${user.fullName}</p>
                  <p class="text-[11px] text-gray-500 whitespace-nowrap overflow-hidden text-ellipsis max-w-[150px]">${user.email}</p>
                </div>
              </a>
              <button onclick="logout()" class="w-9 h-9 flex items-center justify-center text-red-500 hover:bg-white rounded-xl transition-all shadow-sm border border-transparent hover:border-red-100">
                <i class="fas fa-sign-out-alt"></i>
              </button>
            </div>
            <a href="${base_path}/pages/profile/index.php" class="flex items-center justify-center gap-2 w-full py-2.5 bg-white rounded-xl text-xs font-bold text-sky-600 hover:text-sky-700 border border-sky-100 shadow-sm transition-all hover:-translate-y-0.5">
              <i class="fas fa-user-circle text-sm"></i> View Profile & Orders
            </a>
          </div>
        `;
      }
    });

    function logout() {
      if(confirm('Are you sure you want to logout?')) {
        localStorage.removeItem('accessToken');
        localStorage.removeItem('user');
        window.location.href = '<?php echo $base_path; ?>/index.php';
      }
    }

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
      mobileMenuBtn.addEventListener('click', function() {
        const icon = this.querySelector('i');
        mobileMenu.classList.toggle('hidden');
        
        if (mobileMenu.classList.contains('hidden')) {
          icon.classList.replace('fa-times', 'fa-bars');
          this.classList.remove('bg-gray-100');
        } else {
          icon.classList.replace('fa-bars', 'fa-times');
          this.classList.add('bg-gray-100');
        }
      });
    }
  </script>
