<?php
require_once __DIR__ . '/decorations.php';
?>
<!-- Hero Section -->
<section id="home" class="position-relative d-flex align-items-center justify-content-center overflow-hidden" style="min-height: 100vh;">
    <!-- Parallax Background Image -->
    <div class="parallax-bg position-absolute top-0 start-0 w-100 h-100" style="background-image: url('assets/images/hero-camping.jpg'); background-size: cover; background-position: center; transform: scale(1.1); z-index: 0;"></div>

    <!-- Gradient Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, hsl(158 45% 22% / 0.8), hsl(158 45% 22% / 0.6), hsl(158 45% 22% / 0.9)); z-index: 1;"></div>

    <!-- Floating Decorative Shapes -->
    <?php echo renderFloatingShape1('position-absolute animate-float' . ' opacity-50'); ?>
    <?php echo renderFloatingShape2('position-absolute animate-float-delayed opacity-25'); ?>
    <?php echo renderFloatingShape1('position-absolute animate-float-slow opacity-25'); ?>

    <!-- Content -->
    <div class="container position-relative text-center" style="z-index: 3;">
        <div class="mx-auto" style="max-width: 56rem;">


            <!-- Main Heading -->
            <h1 class="text-white mb-4 animate-fade-in-up" style="font-family: var(--font-display); font-size: clamp(2.5rem, 8vw, 6rem); font-weight: 700; line-height: 1.1;">
                Escape to <span class="text-gradient">Nature's</span><br>Embrace
            </h1>

            <!-- Subheading -->
            <p class="text-white mb-5 mx-auto animate-fade-in-up delay-200" style="font-family: var(--font-body); font-size: clamp(1rem, 2vw, 1.25rem); opacity: 0.85; max-width: 42rem; line-height: 1.6;">
                Discover the perfect blend of adventure and luxury at Camp Traveler's Nest. Premium domes for bikers and personal tents with modern amenities await you.
            </p>

            <!-- CTA Buttons -->
            <!-- CTA Buttons -->
            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center align-items-center mb-5 animate-fade-in-up delay-400">
                <button type="button" class="btn btn-hero px-5 py-3 rounded-3" style="font-size: 1.125rem;" data-bs-toggle="modal" data-bs-target="#bookingModal">
                    <i class="bi bi-calendar-check me-2"></i>Book Your Stay
                </button>
                <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>" target="_blank" class="btn btn-whatsapp px-5 py-3 rounded-3" style="font-size: 1.125rem;">
                    <i class="bi bi-whatsapp me-2"></i>WhatsApp
                </a>

            </div>

            <!-- Stats -->
            <div class="row g-4 mt-5 pt-4 animate-fade-in-up delay-600" style="border-top: 1px solid hsl(var(--primary-foreground) / 0.2);">
                <div class="col-4 text-center">
                    <div class="mb-2" style="font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; color: hsl(var(--secondary));">500+</div>
                    <div class="text-white small" style="opacity: 0.7; font-family: var(--font-body);">Happy Campers</div>
                </div>
                <div class="col-4 text-center">
                    <div class="mb-2" style="font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; color: hsl(var(--secondary));">15+</div>
                    <div class="text-white small" style="opacity: 0.7; font-family: var(--font-body);">Premium Domes</div>
                </div>
                <div class="col-4 text-center">
                    <div class="mb-2" style="font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; color: hsl(var(--secondary));">4.9</div>
                    <div class="text-white small" style="opacity: 0.7; font-family: var(--font-body);">Star Rating</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <a href="#about" class="position-absolute bottom-0 start-50 translate-middle-x text-white text-decoration-none animate-bounce-soft mb-3" style="z-index: 3; opacity: 0.7; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.7'">
        <i class="bi bi-chevron-down" style="font-size: 2rem;"></i>
    </a>

    <!-- Wave Bottom -->
    <?php echo renderHeroWaveShape(); ?>
</section>

<style>
/* Hero specific styles */
#home .position-absolute:nth-child(3) {
    top: 5rem;
    left: 2.5rem;
    width: 12rem;
    height: 12rem;
    z-index: 2;
}

#home .position-absolute:nth-child(4) {
    bottom: 8rem;
    right: 2.5rem;
    width: 16rem;
    height: 16rem;
    z-index: 2;
}

#home .position-absolute:nth-child(5) {
    top: 33%;
    right: 25%;
    width: 8rem;
    height: 8rem;
    z-index: 2;
}

@media (max-width: 768px) {
    #home .position-absolute:nth-child(3),
    #home .position-absolute:nth-child(4),
    #home .position-absolute:nth-child(5) {
        display: none;
    }
}
</style>
