<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/decorations.php';
?>
<!-- Facilities Section -->
<section id="facilities" class="py-5 position-relative overflow-hidden" style="background: hsl(var(--primary));">
    <!-- Decorative -->
    <?php echo renderFloatingShape1('position-absolute animate-float opacity-10'); ?>
    <?php echo renderFloatingShape1('position-absolute animate-float-delayed opacity-10'); ?>

    <div class="container py-md-5">
        <!-- Section Header -->
        <div class="text-center mx-auto mb-5 reveal">
            <span class="badge rounded-pill px-4 py-2 mb-4" style="background: hsl(var(--primary-foreground) / 0.1); color: hsl(var(--primary-foreground)); backdrop-filter: blur(10px); border: 1px solid hsl(var(--primary-foreground) / 0.2); font-family: var(--font-body); font-weight: 500;">
                <span class="rounded-circle d-inline-block me-2" style="width: 6px; height: 6px; background: hsl(var(--secondary));"></span>
                What We Offer
            </span>
            <h2 class="mb-4 text-white" style="font-family: var(--font-display); font-size: clamp(2rem, 5vw, 4rem); font-weight: 700;">
                World-Class <span style="color: hsl(var(--secondary));">Facilities</span>
            </h2>
            <p class="mx-auto text-white" style="font-family: var(--font-body); font-size: 1.125rem; opacity: 0.85; max-width: 48rem;">
                Every detail has been carefully designed to enhance your camping experience.
            </p>
        </div>

        <!-- Facilities Grid -->
        <div class="row g-3 g-lg-4">
            <?php foreach ($facilities as $index => $facility): ?>
            <div class="col-6 col-md-4 col-lg-3 reveal" style="animation-delay: <?php echo $index * 0.05; ?>s;">
                <div class="facility-card p-4 rounded-4 text-white h-100" style="background: hsl(var(--primary-foreground) / 0.05); backdrop-filter: blur(10px); border: 1px solid hsl(var(--primary-foreground) / 0.1); transition: all 0.5s;">
                    <!-- Icon -->
                    <div class="facility-icon rounded-3 mb-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: hsl(var(--primary-foreground) / 0.1); transition: all 0.5s;">
                        <i class="<?php echo $facility['icon']; ?> facility-icon-svg" style="font-size: 1.5rem; color: hsl(var(--primary-foreground)); transition: color 0.5s;"></i>
                    </div>

                    <!-- Content -->
                    <h3 class="facility-title mb-1" style="font-family: var(--font-display); font-size: 1.125rem; font-weight: 700; transition: color 0.3s;">
                        <?php echo $facility['name']; ?>
                    </h3>
                    <p class="small mb-0" style="font-family: var(--font-body); opacity: 0.7;">
                        <?php echo $facility['description']; ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Wave Bottom -->
    <?php echo renderWaveBottomShape(); ?>
</section>

<style>
#facilities .position-absolute:first-of-type {
    top: 5rem;
    left: 2.5rem;
    width: 16rem;
    height: 16rem;
}

#facilities .position-absolute:nth-of-type(2) {
    bottom: 5rem;
    right: 2.5rem;
    width: 12rem;
    height: 12rem;
}

.facility-card:hover {
    background: hsl(var(--primary-foreground) / 0.15);
    border-color: hsl(var(--secondary) / 0.5);
    transform: translateY(-4px) scale(1.05);
}

.facility-card:hover .facility-icon {
    background: hsl(var(--secondary));
    transform: rotate(12deg);
}

.facility-card:hover .facility-icon-svg {
    color: hsl(var(--secondary-foreground));
}

.facility-card:hover .facility-title {
    color: hsl(var(--secondary));
}
</style>
