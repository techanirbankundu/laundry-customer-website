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
                @apply inline-flex items-center justify-center px-6 py-3 rounded-xl font-semibold transition-all duration-300 gap-2;
            }

            .btn-primary {
                @apply bg-gradient-to-r from-sky-500 to-indigo-600 text-white shadow-lg shadow-sky-500/30 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-sky-500/40;
            }

            .btn-outline {
                @apply bg-transparent border-2 border-sky-500 text-sky-600 hover:bg-sky-500 hover:text-white;
            }

            .card {
                @apply bg-white rounded-xl p-8 border border-gray-200 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:border-sky-500;
            }

            .service-icon {
                @apply w-16 h-16 bg-sky-100 rounded-full flex items-center justify-center text-sky-500 text-3xl mb-6;
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col">
  <?php
  $base_path = '/laundry-customer-website/laundry-customer-website';
  $current_page = $_SERVER['SCRIPT_NAME'];
  ?>
  <header class="bg-white/90 backdrop-blur-lg border-b border-gray-200 sticky top-0 z-50 py-4">
    <div class="container mx-auto px-6">
      <nav class="flex justify-between items-center">
        <a href="<?php echo $base_path; ?>/" class="flex items-center gap-2 text-2xl font-extrabold text-sky-500">
          <i class="fas fa-soap"></i> FreshSpin
        </a>
        <ul class="flex gap-8 items-center" id="navLinks">
          <li>
            <form action="#" method="GET" class="relative">
              <input type="text" placeholder="Search..." class="bg-gray-100 text-gray-700 px-4 py-2 pl-10 rounded-full focus:outline-none focus:ring-2 focus:ring-sky-500 w-48 transition-all hover:bg-white hover:shadow-sm">
              <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </form>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/" class="font-medium hover:text-sky-500 transition-colors <?php echo $current_page == $base_path . '/index.php' ? 'text-sky-600 font-bold' : 'text-gray-600'; ?>">Home</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/services/index.php" class="font-medium hover:text-sky-500 transition-colors <?php echo strpos($current_page, '/services/') !== false ? 'text-sky-600 font-bold' : 'text-gray-600'; ?>">Services</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/order/index.php" class="font-medium hover:text-sky-500 transition-colors <?php echo strpos($current_page, '/order/') !== false ? 'text-sky-600 font-bold' : 'text-gray-600'; ?>">Order</a>
          </li>
          <li>
            <a href="<?php echo $base_path; ?>/pages/contact/index.php" class="font-medium hover:text-sky-500 transition-colors <?php echo strpos($current_page, '/contact/') !== false ? 'text-sky-600 font-bold' : 'text-gray-600'; ?>">Contact</a>
          </li>
          <li id="authLink"><a href="<?php echo $base_path; ?>/pages/login/index.php" class="btn btn-primary">Login</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const token = localStorage.getItem('token');
      const user = JSON.parse(localStorage.getItem('user') || '{}');
      const authLink = document.getElementById('authLink');

      if (token && user) {
        authLink.innerHTML = `
          <div class="flex items-center gap-4">
            <div class="flex flex-col items-end">
              <span class="text-sm font-bold text-slate-800">${user.fullName || 'User'}</span>
              <button onclick="logout()" class="text-xs text-red-500 hover:text-red-700 font-semibold">Logout</button>
            </div>
            <div class="w-10 h-10 bg-sky-100 rounded-full flex items-center justify-center text-sky-600 border border-sky-200">
              <i class="fas fa-user"></i>
            </div>
          </div>
        `;
      }
    });

    function logout() {
      localStorage.removeItem('token');
      localStorage.removeItem('user');
      window.location.reload();
    }
  </script>
