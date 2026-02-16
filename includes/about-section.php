<?php
require_once __DIR__ . '/decorations.php';
?>
<!-- About Section -->
<section id="about" class="py-5 position-relative overflow-hidden" style="background: hsl(var(--background));">
    <!-- Decorative Elements -->
    <?php echo renderLeafDecoration('position-absolute animate-float opacity-25'); ?>
    <?php echo renderFloatingShape1('position-absolute animate-float-slow opacity-15'); ?>

    <div class="container py-md-5">
        <div class="row g-5 align-items-center reveal">
            <!-- Text Content -->
            <div class="col-lg-6 reveal-left">
                <div class="mb-4">
                    <span class="badge rounded-pill px-4 py-2" style="background: hsl(var(--primary) / 0.1); color: hsl(var(--primary)); font-family: var(--font-body); font-weight: 500; font-size: 0.875rem;">
                        <span class="rounded-circle d-inline-block me-2" style="width: 6px; height: 6px; background: hsl(var(--secondary));"></span>
                        Our Story
                    </span>
                </div>

                <h2 class="mb-4" style="font-family: var(--font-display); font-size: clamp(2rem, 5vw, 4rem); font-weight: 700; color: hsl(var(--foreground)); line-height: 1.1;">
                    Where Adventure Meets <span style="color: hsl(var(--primary));">Comfort</span>
                </h2>

                <p class="mb-4" style="font-family: var(--font-body); font-size: 1.125rem; color: hsl(var(--muted-foreground)); line-height: 1.7;">
                    Nestled in the heart of pristine wilderness, Camp Traveler's Nest was born from a passion for authentic outdoor experiences combined with modern luxury. We believe that camping should be accessible, comfortable, and unforgettable.
                </p>

                <p class="mb-4" style="font-family: var(--font-body); font-size: 1.125rem; color: hsl(var(--muted-foreground)); line-height: 1.7;">
                    Whether you're a solo adventurer seeking solitude, a biker group looking for the perfect pit stop, or a family wanting to reconnect with nature, we've crafted spaces that feel like home while keeping you immersed in the beauty of the outdoors.
                </p>

                <div class="d-flex flex-wrap gap-4 pt-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: hsl(var(--primary) / 0.1);">
                            <i class="bi bi-check-lg" style="font-size: 1.5rem; color: hsl(var(--primary));"></i>
                        </div>
                        <span style="font-family: var(--font-body); font-weight: 500; color: hsl(var(--foreground));">Eco-Friendly</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: hsl(var(--primary) / 0.1);">
                            <i class="bi bi-check-lg" style="font-size: 1.5rem; color: hsl(var(--primary));"></i>
                        </div>
                        <span style="font-family: var(--font-body); font-weight: 500; color: hsl(var(--foreground));">24/7 Support</span>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: hsl(var(--primary) / 0.1);">
                            <i class="bi bi-check-lg" style="font-size: 1.5rem; color: hsl(var(--primary));"></i>
                        </div>
                        <span style="font-family: var(--font-body); font-weight: 500; color: hsl(var(--foreground));">Premium Quality</span>
                    </div>
                </div>
            </div>

            <!-- Visual Content -->
            <div class="col-lg-6 reveal-right">
                <div class="position-relative">
                    <!-- Main Visual -->
                    <div class="rounded-4 overflow-hidden shadow-elevated position-relative" style="aspect-ratio: 4/5;">
                        <img src="assets/images/IMG_2395.jpeg" alt="Camp Traveler's Nest" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.2) 100%);"></div>
                        
                    </div>

                    <!-- Floating Stats Card -->
                    <div class="position-absolute bg-white rounded-3 p-2 shadow-elevated" style="bottom: -1rem; left: -1rem; border: 1px solid hsl(var(--border)); max-width: 160px;">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; background: hsl(var(--secondary) / 0.2);">
                                <span style="font-family: var(--font-display); font-size: 1rem; font-weight: 700; color: hsl(var(--secondary));">5+</span>
                            </div>
                            <div>
                                <div style="font-family: var(--font-display); font-size: 0.9rem; font-weight: 700; color: hsl(var(--foreground)); line-height: 1.1;">Years</div>
                                <div class="small" style="font-family: var(--font-body); font-size: 0.7rem; color: hsl(var(--muted-foreground)); line-height: 1.1;">of Excellence</div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="position-absolute rounded-pill px-4 py-2 shadow-sm" style="top: -1rem; right: -1rem; background: hsl(var(--primary)); color: hsl(var(--primary-foreground));">
                        <span style="font-family: var(--font-body); font-weight: 600; font-size: 0.875rem;">Top Rated</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
#about .position-absolute:first-of-type {
    top: 2.5rem;
    right: 2.5rem;
    width: 5rem;
    height: 5rem;
}

#about .position-absolute:nth-of-type(2) {
    bottom: 5rem;
    left: 0;
    width: 8rem;
    height: 4rem;
    transform: translateX(-50%);
}

/* Hide stats card on mobile */
@media (max-width: 768px) {
    #about .bg-white.shadow-elevated {
        display: none !important;
    }
}
</style>
