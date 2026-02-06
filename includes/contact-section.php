<?php
require_once __DIR__ . '/decorations.php';
?>
<!-- Contact Us Section -->
<section id="contact" class="py-5 position-relative overflow-hidden" style="background: hsl(var(--background));">
    <!-- Decorative -->
    <?php echo renderFloatingShape2('position-absolute animate-float opacity-10'); ?>
    <?php echo renderLeafDecoration('position-absolute animate-float-delayed opacity-15'); ?>

    <div class="container py-md-5">
        <div class="mx-auto" style="max-width: 56rem;">
            <!-- Section Header -->
            <div class="text-center mb-5 reveal">
                <span class="badge rounded-pill px-4 py-2 mb-4" style="background: hsl(var(--primary) / 0.1); color: hsl(var(--primary)); font-family: var(--font-body); font-weight: 500;">
                    <span class="rounded-circle d-inline-block me-2" style="width: 6px; height: 6px; background: hsl(var(--secondary));"></span>
                    Get in Touch
                </span>
                <h2 class="mb-4" style="font-family: var(--font-display); font-size: clamp(2rem, 5vw, 4rem); font-weight: 700; color: hsl(var(--foreground));">
                    Contact <span style="color: hsl(var(--primary));">Us</span>
                </h2>
                <p class="mx-auto" style="font-family: var(--font-body); font-size: 1.125rem; color: hsl(var(--muted-foreground)); max-width: 42rem;">
                    Have questions or ready to plan your camping adventure? Fill out the form below and we'll get back to you within 24 hours.
                </p>
            </div>

            <!-- Contact Form -->
            <div class="position-relative rounded-4 p-4 p-lg-5 border shadow-elevated reveal delay-200" style="background: hsl(var(--card)); border-color: hsl(var(--border)) !important; overflow: hidden;">
                <!-- Success Overlay -->
                <div id="success-overlay" class="position-absolute top-0 start-0 w-100 h-100 d-none d-flex align-items-center justify-content-center rounded-4" style="background: hsl(var(--primary) / 0.95); z-index: 10;">
                    <div class="text-center text-white">
                        <i class="bi bi-check-circle-fill mb-4 animate-scale-in" style="font-size: 5rem;"></i>
                        <h3 class="mb-2" style="font-family: var(--font-display); font-size: 2rem; font-weight: 700;">Thank You!</h3>
                        <p style="font-family: var(--font-body); opacity: 0.9;">Your message has been sent successfully. We'll be in touch soon!</p>
                    </div>
                </div>

                <form id="contact-form" method="POST" novalidate>
                    <div class="row g-4">
                        <!-- Full Name -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Full Name *</label>
                            <input type="text" name="fullName" class="form-control rounded-3 py-3" placeholder="John Doe" required minlength="3" maxlength="100">
                            <div class="invalid-feedback">Please enter your full name (minimum 3 characters).</div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Email Address *</label>
                            <input type="email" name="email" class="form-control rounded-3 py-3" placeholder="john@example.com" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Phone Number *</label>
                            <input type="tel" name="phone" class="form-control rounded-3 py-3" placeholder="+91 98765 43210" required pattern="[0-9+\s\-()]{10,15}" title="Please enter a valid phone number (10-15 digits)">
                            <div class="invalid-feedback">Please enter a valid phone number (10-15 digits).</div>
                        </div>

                        <!-- Subject -->
                        <div class="col-md-6">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Subject *</label>
                            <select name="subject" class="form-select rounded-3 py-3" required>
                                <option value="">Select a subject</option>
                                <option value="booking">Booking Inquiry</option>
                                <option value="general">General Question</option>
                                <option value="facilities">Facilities Information</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select a subject.</div>
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <label class="form-label fw-medium small" style="font-family: var(--font-body); color: hsl(var(--foreground));">Message *</label>
                            <textarea name="message" class="form-control rounded-3" rows="5" placeholder="Tell us how we can help you..." style="resize: none;" required minlength="10" maxlength="1000"></textarea>
                            <div class="invalid-feedback">Please enter your message (minimum 10 characters).</div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-hero w-100 py-3 rounded-3 d-flex align-items-center justify-content-center gap-2" style="font-size: 1.125rem;">
                                <i class="bi bi-send"></i>
                                <span>Send Message</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
#booking .position-absolute:first-of-type {
    top: 0;
    right: 0;
    width: 24rem;
    height: 24rem;
    transform: translate(50%, -50%);
}

#booking .position-absolute:nth-of-type(2) {
    bottom: 5rem;
    left: 2.5rem;
    width: 5rem;
    height: 5rem;
}
</style>
