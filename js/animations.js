/**
 * Animation handlers for Camp Traveler's Nest
 * Ported from React hooks (useAnimations.ts)
 */

// Initialize all animations when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
  initScrollReveal();
  initParallax();
  initNavbarScroll();
  initSmoothScroll();
  initMobileMenu();
  initBookingModal();
  setMinBookingDate();
});

/**
 * Set minimum booking date to today
 */
function setMinBookingDate() {
  const checkinInput = document.getElementById('bookingDate');
  const checkoutInput = document.getElementById('checkoutDate');

  // Helper to get local ISO string YYYY-MM-DD
  const getTodayString = () => {
    const today = new Date();
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0');
    const day = String(today.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
  };

  const today = getTodayString();

  if (checkinInput) {
    if (!checkinInput.getAttribute('min')) {
      checkinInput.setAttribute('min', today);
    }

    const updateCheckoutMin = () => {
      if (checkoutInput && checkinInput.value) {
        checkoutInput.setAttribute('min', checkinInput.value);
        if (checkoutInput.value && checkoutInput.value < checkinInput.value) {
          checkoutInput.value = checkinInput.value;
        }
      }
    };

    checkinInput.addEventListener('change', updateCheckoutMin);
    checkinInput.addEventListener('input', updateCheckoutMin);
  }

  if (checkoutInput) {
    if (!checkoutInput.getAttribute('min')) {
      checkoutInput.setAttribute('min', today);
    }
  }
}

/**
 * Scroll Reveal Animation
 * Ported from useScrollAnimation hook
 */
function initScrollReveal() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
        // Optionally unobserve after animation triggers
        // observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe all elements with reveal classes
  const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
  revealElements.forEach(el => observer.observe(el));
}

/**
 * Parallax Effect for Hero Section
 * Ported from useParallax hook
 */
function initParallax() {
  const parallaxElement = document.querySelector('.parallax-bg');

  if (!parallaxElement) return;

  window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    const speed = 0.4; // Parallax speed factor
    parallaxElement.style.transform = `translateY(${scrolled * speed}px)`;
  });
}

/**
 * Navbar Scroll Behavior
 * Ported from useNavbarScroll hook
 */
function initNavbarScroll() {
  const navbar = document.querySelector('.navbar');
  const navbarLogo = document.getElementById('navbar-logo');
  const threshold = 50;

  if (!navbar) return;

  // If forced dark header is enabled, don't attach scroll listener
  if (navbar.classList.contains('navbar-always-scrolled')) {
    return;
  }

  window.addEventListener('scroll', () => {
    if (window.scrollY > threshold) {
      navbar.classList.add('navbar-scrolled');

      // Switch to dark logo when scrolled
      if (navbarLogo && navbarLogo.dataset.logoDark) {
        navbarLogo.src = navbarLogo.dataset.logoDark;
      }
    } else {
      navbar.classList.remove('navbar-scrolled');

      // Switch to light logo when at top
      if (navbarLogo && navbarLogo.dataset.logoLight) {
        navbarLogo.src = navbarLogo.dataset.logoLight;
      }
    }
  });
}

/**
 * Smooth Scroll Navigation
 */
function initSmoothScroll() {
  // Handle all navigation links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');

      if (targetId === '#') return;

      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });

        // Close mobile menu if open
        const navbarCollapse = document.querySelector('.navbar-collapse');
        if (navbarCollapse && navbarCollapse.classList.contains('show')) {
          const bsCollapse = new bootstrap.Collapse(navbarCollapse);
          bsCollapse.hide();
        }
      }
    });
  });
}

/**
 * Mobile Menu Toggle
 */
function initMobileMenu() {
  const navbarToggler = document.querySelector('.navbar-toggler');
  const navbarCollapse = document.querySelector('.navbar-collapse');

  if (!navbarToggler || !navbarCollapse) return;

  // Close menu when clicking outside
  document.addEventListener('click', (e) => {
    const isClickInside = navbarToggler.contains(e.target) || navbarCollapse.contains(e.target);

    if (!isClickInside && navbarCollapse.classList.contains('show')) {
      const bsCollapse = new bootstrap.Collapse(navbarCollapse);
      bsCollapse.hide();
    }
  });
}

/**
 * Form Validation & Submission Handler
 */
function initContactForm() {
  // Form submission handler
  const contactForm = document.getElementById('contact-form');

  if (!contactForm) return;

  contactForm.addEventListener('submit', async function (e) {
    e.preventDefault();

    // Basic validation
    if (!this.checkValidity()) {
      e.stopPropagation();
      this.classList.add('was-validated');
      return;
    }

    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';

    // Submit form via AJAX
    const formData = new FormData(this);

    try {
      const response = await fetch('process-contact.php', {
        method: 'POST',
        body: formData
      });

      const data = await response.json();

      if (data.success) {
        showSuccessOverlay();
        this.reset();
        this.classList.remove('was-validated');
      } else {
        showToast('Error', data.message || 'Failed to send message. Please try again.', 'danger');
      }
    } catch (error) {
      console.error('Error:', error);
      showToast('Error', 'An error occurred. Please try again later.', 'danger');
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalText;
    }
  });
}

/**
 * Show Success Overlay
 */
function showSuccessOverlay() {
  const overlay = document.getElementById('success-overlay');
  if (overlay) {
    overlay.classList.remove('d-none');
    overlay.classList.add('animate-fade-in-up');

    // Hide after 3 seconds
    setTimeout(() => {
      overlay.classList.add('d-none');
    }, 3000);
  }
}

/**
 * Show Bootstrap Toast
 */
function showToast(title, message, type = 'success') {
  // Create toast element if doesn't exist
  let toastContainer = document.querySelector('.toast-container');

  if (!toastContainer) {
    toastContainer = document.createElement('div');
    toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
    document.body.appendChild(toastContainer);
  }

  const toastId = 'toast-' + Date.now();
  const bgClass = type === 'danger' ? 'bg-danger' : 'bg-success';

  const toastHTML = `
    <div id="${toastId}" class="toast ${bgClass} text-white" role="alert">
      <div class="toast-header ${bgClass} text-white">
        <strong class="me-auto">${title}</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
      </div>
      <div class="toast-body">
        ${message}
      </div>
    </div>
  `;

  toastContainer.insertAdjacentHTML('beforeend', toastHTML);

  const toastElement = document.getElementById(toastId);
  const toast = new bootstrap.Toast(toastElement, { delay: 5000 });
  toast.show();

  // Remove from DOM after hidden
  toastElement.addEventListener('hidden.bs.toast', () => {
    toastElement.remove();
  });
}

/**
 * Booking Modal Form Handler
 */
function initBookingModal() {
  const bookingForm = document.getElementById('booking-modal-form');

  if (!bookingForm) return;

  bookingForm.addEventListener('submit', function (e) {
    e.preventDefault();

    // Basic validation
    if (!this.checkValidity()) {
      e.stopPropagation();
      this.classList.add('was-validated');
      return;
    }

    // Basic validation
    if (!this.checkValidity()) {
      e.stopPropagation();
      this.classList.add('was-validated');
      return;
    }

    // Get form data
    const formData = new FormData(this);
    const fullName = formData.get('fullName');
    const email = formData.get('email');
    const phone = formData.get('phone');
    const guests = formData.get('guests') || '2';
    const bookingDate = formData.get('bookingDate');
    const checkoutDate = formData.get('checkoutDate');
    const accommodationType = formData.get('accommodationType');
    const message = formData.get('message') || 'No special requests';

    // Map accommodation type to readable name
    const accommodationName = 'Delux Tent';

    // Format WhatsApp message
    const whatsappMessage = `*New Booking Request*

Name: ${fullName}
Email: ${email}
Phone: ${phone}
Number of Guests: ${guests}
Check-in Date: ${bookingDate}
Check-out Date: ${checkoutDate}
Accommodation: ${accommodationName}
Special Message: ${message}

_Sent from Camp Traveler's Nest website_`;

    // WhatsApp number (you can change this to your business number)
    const whatsappNumber = '919459886035'; // Format: country code + number (no + or spaces)

    // Encode message for URL
    const encodedMessage = encodeURIComponent(whatsappMessage);

    // Create WhatsApp URL
    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;

    // Open WhatsApp in new tab
    window.open(whatsappURL, '_blank');

    // Show success overlay
    const successOverlay = document.getElementById('modal-success-overlay');
    if (successOverlay) {
      successOverlay.classList.remove('d-none');
      successOverlay.classList.add('d-flex');

      // Reset form
      this.reset();
      this.classList.remove('was-validated');

      // Close modal after 3 seconds
      setTimeout(() => {
        const modal = bootstrap.Modal.getInstance(document.getElementById('bookingModal'));
        if (modal) {
          modal.hide();
        }
        successOverlay.classList.add('d-none');
        successOverlay.classList.remove('d-flex');
      }, 3000);
    }
  });
}

function openLightbox(src) {
  const lightbox = document.getElementById('lightbox');
  const img = document.getElementById('lightbox-img');

  if (lightbox && img) {
    img.src = src;
    lightbox.classList.remove('d-none');
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden'; // Prevent scrolling
  }
}

function closeLightbox() {
  const lightbox = document.getElementById('lightbox');
  if (lightbox) {
    lightbox.classList.remove('active');
    setTimeout(() => {
      lightbox.classList.add('d-none');
    }, 300); // Wait for fade out (if added to CSS logic, currently instant for safety)
    document.body.style.overflow = '';
  }
}

// Close lightbox on Escape key
document.addEventListener('keydown', function (e) {
  if (e.key === 'Escape') {
    closeLightbox();
  }
});

// Close lightbox when clicking outside image
document.addEventListener('click', function (e) {
  const lightbox = document.getElementById('lightbox');
  if (e.target === lightbox) {
    closeLightbox();
  }
});

// Initialize contact form when DOM is ready
document.addEventListener('DOMContentLoaded', initContactForm);
