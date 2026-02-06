<?php
require_once __DIR__ . '/decorations.php';
?>
<!-- Booking Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow-elevated" style="background: hsl(var(--card)); border-radius: 1.5rem; overflow: hidden;">
            <!-- Modal Header -->
            <div class="modal-header border-0 pb-0 position-relative" style="background: hsl(var(--background));">
                <div class="w-100 text-center pt-4">
                    <span class="badge rounded-pill px-4 py-2 mb-3" style="background: hsl(var(--primary) / 0.1); color: hsl(var(--primary)); font-family: var(--font-body); font-weight: 500;">
                        <span class="rounded-circle d-inline-block me-2" style="width: 6px; height: 6px; background: hsl(var(--secondary));"></span>
                        Make a Reservation
                    </span>
                    <h2 class="mb-2" style="font-family: var(--font-display); font-size: clamp(1.75rem, 4vw, 2.5rem); font-weight: 700; color: hsl(var(--foreground));">
                        Book Your <span style="color: hsl(var(--primary));">Adventure</span>
                    </h2>
                    <p class="mx-auto mb-4" style="font-family: var(--font-body); font-size: 0.95rem; color: hsl(var(--muted-foreground)); max-width: 32rem;">
                        Fill out the form below and we'll get back to you within 24 hours to confirm your reservation.
                    </p>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4 p-lg-5 pt-3" style="background: hsl(var(--background));">
                <!-- Success Overlay -->
                <div id="modal-success-overlay" class="position-absolute top-0 start-0 w-100 h-100 d-none align-items-center justify-content-center" style="background: hsl(var(--primary) / 0.95); z-index: 10; border-radius: 1.5rem;">
                    <div class="text-center text-white p-4">
                        <i class="bi bi-whatsapp mb-4 animate-scale-in" style="font-size: 4rem;"></i>
                        <h3 class="mb-2" style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700;">Redirecting to WhatsApp!</h3>
                        <p style="font-family: var(--font-body); opacity: 0.9;">Your booking details are ready. We'll chat with you shortly!</p>
                    </div>
                </div>

                <form id="booking-modal-form" method="POST" novalidate>
                    <div class="row g-3">
                        <!-- Full Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Full Name *</label>
                            <input type="text" name="fullName" class="form-control rounded-3 py-2" placeholder="John Doe" required minlength="3" maxlength="100">
                            <div class="invalid-feedback">Please enter your full name (minimum 3 characters).</div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Email Address *</label>
                            <input type="email" name="email" class="form-control rounded-3 py-2" placeholder="john@example.com" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control rounded-3 py-2" placeholder="+91 98765 43210" required pattern="[0-9+\s\-()]{10,15}" title="Please enter a valid phone number (10-15 digits)">
                            <div class="invalid-feedback">Please enter a valid phone number (10-15 digits).</div>
                        </div>

                        <!-- Number of Guests -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Number of Guests</label>
                            <input type="number" name="guests" class="form-control rounded-3 py-2" placeholder="2" min="1" max="20" value="2">
                            <div class="invalid-feedback">Please enter a valid number of guests (1-20).</div>
                        </div>

                        <!-- Check-in Date -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Check-in Date *</label>
                            <input type="date" name="bookingDate" class="form-control rounded-3 py-2" required id="bookingDate">
                            <div class="invalid-feedback">Please select a check-in date (must be today or later).</div>
                        </div>

                        <!-- Check-out Date -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Check-out Date *</label>
                            <input type="date" name="checkoutDate" class="form-control rounded-3 py-2" required id="checkoutDate">
                            <div class="invalid-feedback">Please select a check-out date (must be on or after check-in).</div>
                        </div>

                        <!-- Accommodation Type -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Accommodation Type *</label>
                            <select name="accommodationType" class="form-select rounded-3 py-2" required>
                                <option value="">Select accommodation</option>
                                <option value="dome">Delux Tent</option>
                            </select>
                            <div class="invalid-feedback">Please select an accommodation type.</div>
                        </div>

                        <!-- Special Message -->
                        <div class="col-12">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Special Message</label>
                            <textarea name="message" class="form-control rounded-3" rows="3" placeholder="Any special requests or requirements..." style="resize: none;"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-hero w-100 py-3 rounded-3 d-flex align-items-center justify-content-center gap-2" style="font-size: 1.125rem; background: hsl(var(--secondary)); color: hsl(var(--secondary-foreground));">
                                <i class="bi bi-send"></i>
                                <span>Send Booking Request</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
