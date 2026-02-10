<?php include '../../includes/header.php'; ?>

<section class="py-6 sm:py-8 lg:py-10 bg-gradient-to-b from-blue-50 to-white">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-4 max-w-3xl lg:max-w-4xl xl:max-w-5xl 2xl:max-w-6xl text-center">
    <h1 class="text-2xl sm:text-3xl lg:text-3xl font-bold mb-1.5 sm:mb-3">Get in Touch</h1>
    <p class="text-gray-600 text-xs sm:text-sm lg:text-base">We're here to help with any questions or concerns</p>
  </div>
</section>

<section class="py-6 sm:py-8 lg:py-10">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-4 max-w-3xl lg:max-w-4xl xl:max-w-5xl 2xl:max-w-6xl">
    <div class="grid lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-10 items-start">

      <!-- Contact Info -->
      <div class="space-y-6">
        <div>
          <h2 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Contact Information</h2>
          <p class="text-gray-600 text-xs sm:text-sm mb-4 leading-relaxed">Have a question about our services or your order? Reach out to us using any of the methods below.</p>

          <div class="space-y-3 sm:space-y-4 mb-6">
            <div class="flex gap-3">
              <div class="service-icon w-9 h-9 sm:w-10 sm:h-10 text-sm sm:text-base mb-0 flex-shrink-0 bg-sky-50"><i class="fas fa-map-marker-alt"></i></div>
              <div>
                <h4 class="font-semibold text-sm sm:text-base mb-0.5">Visit Us</h4>
                <p class="text-gray-600 text-xs sm:text-sm">123 Laundry Lane, Suite 100, Clean City, ST 12345</p>
              </div>
            </div>

            <div class="flex gap-3">
              <div class="service-icon w-9 h-9 sm:w-10 sm:h-10 text-sm sm:text-base mb-0 flex-shrink-0 bg-sky-50"><i class="fas fa-phone"></i></div>
              <div>
                <h4 class="font-semibold text-sm sm:text-base mb-0.5">Call Us</h4>
                <p class="text-gray-600 text-xs sm:text-sm">+1 (555) 123-4567 • Mon - Fri: 8am - 8pm</p>
              </div>
            </div>

            <div class="flex gap-3">
              <div class="service-icon w-9 h-9 sm:w-10 sm:h-10 text-sm sm:text-base mb-0 flex-shrink-0 bg-sky-50"><i class="fas fa-envelope"></i></div>
              <div>
                <h4 class="font-semibold text-sm sm:text-base mb-0.5">Email Us</h4>
                <p class="text-gray-600 text-xs sm:text-sm">support@freshspin.com • info@freshspin.com</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="bg-white p-5 sm:p-6 lg:p-8 rounded-2xl shadow-xl border border-gray-50">
        <h3 class="text-lg sm:text-xl font-bold mb-4 sm:mb-6">Send a Message</h3>
        <form action="contact_process.php" method="POST">
          <div class="grid sm:grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block mb-1 font-semibold text-[11px] sm:text-xs text-slate-600 uppercase tracking-wider">Name</label>
              <input type="text" name="name" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm" placeholder="Your Name" required>
            </div>
            <div>
              <label class="block mb-1 font-semibold text-[11px] sm:text-xs text-slate-600 uppercase tracking-wider">Email</label>
              <input type="email" name="email" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm" placeholder="Email@example.com" required>
            </div>
          </div>
          <div class="mb-4">
            <label class="block mb-1 font-semibold text-[11px] sm:text-xs text-slate-600 uppercase tracking-wider">Subject</label>
            <input type="text" name="subject" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm" placeholder="How can we help?" required>
          </div>
          <div class="mb-5">
            <label class="block mb-1 font-semibold text-[11px] sm:text-xs text-slate-600 uppercase tracking-wider">Message</label>
            <textarea name="message" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-transparent transition-all text-sm resize-none" rows="3" placeholder="Tell us more about your inquiry..." required></textarea>
          </div>
          <button type="submit" class="btn btn-primary w-full py-2.5 text-sm sm:text-base">Send Message</button>
        </form>
      </div>

    </div>
  </div>
</section>

<!-- Map Placeholder as full-width section -->
<section class="py-4 sm:py-6 lg:py-8">
  <div class="container mx-auto px-4 sm:px-6 lg:px-8 xl:px-4 max-w-3xl lg:max-w-4xl xl:max-w-5xl 2xl:max-w-6xl">
    <div class="w-full h-40 sm:h-52 lg:h-64 rounded-xl overflow-hidden shadow">
      <iframe
        src="https://www.google.com/maps?q=123+Laundry+Lane,+Clean+City,+ST+12345&output=embed"
        width="100%" height="100%" style="border:0; min-height:160px; height:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>

<script>
  document.querySelector('form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const btn = this.querySelector('button[type="submit"]');
    const originalText = btn.innerHTML;

    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Sending...';

    // Collect form data
    const formData = new FormData(this);
    // Send to backend
    await SendMessage(formData);

    btn.disabled = false;
    btn.innerHTML = originalText;
    this.reset();
  });

  const SendMessage = async (formData) => {
    try {
      const response = await fetch('https://laundry-backend-two.vercel.app/api/v1/website/contact-us', {
        method: 'POST',
        body: formData
      }).then(res => res.json()).then(data => {
        if (data.success) {
          Swal.fire({
            icon: 'success',
            title: 'Message Sent!',
            text: 'Thank you for reaching out. Our team will get back to you shortly.',
            confirmButtonColor: '#0ea5e9',
            customClass: {
              popup: 'rounded-3xl border border-gray-100 shadow-2xl',
              confirmButton: 'rounded-xl font-bold px-8 py-3'
            }
          });
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: data.message || 'There was an issue sending your message. Please try again later.',
            confirmButtonColor: '#0ea5e9',
            customClass: {
              popup: 'rounded-3xl border border-gray-100 shadow-2xl',
              confirmButton: 'rounded-xl font-bold px-8 py-3'
            }
          });
        }
        return data;
      });
      return response;
    } catch (error) {
      console.error('Error sending message:', error);
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'There was an issue sending your message. Please try again later.',
        confirmButtonColor: '#0ea5e9',
        customClass: {
          popup: 'rounded-3xl border border-gray-100 shadow-2xl',
          confirmButton: 'rounded-xl font-bold px-8 py-3'
        }
      });
    }
  }
</script>

<?php include '../../includes/footer.php'; ?>
