<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/decorations.php';
?>
<!-- Why Choose Us Section -->
<section id="why-us" class="py-5 position-relative overflow-hidden" style="background: hsl(var(--background));">
    <!-- Decorative -->
    <?php echo renderLeafDecoration('position-absolute animate-float opacity-15'); ?>

    <div class="container py-md-5">
        <!-- Section Header -->
        <div class="text-center mx-auto mb-5 reveal">
            <span class="badge rounded-pill px-4 py-2 mb-4" style="background: hsl(var(--primary) / 0.1); color: hsl(var(--primary)); font-family: var(--font-body); font-weight: 500;">
                <span class="rounded-circle d-inline-block me-2" style="width: 6px; height: 6px; background: hsl(var(--secondary));"></span>
                Why Camp With Us
            </span>
            <h2 class="mb-4" style="font-family: var(--font-display); font-size: clamp(2rem, 5vw, 4rem); font-weight: 700; color: hsl(var(--foreground));">
                The <span style="color: hsl(var(--primary));">Perfect</span> Camping Partner
            </h2>
            <p class="mx-auto" style="font-family: var(--font-body); font-size: 1.125rem; color: hsl(var(--muted-foreground)); max-width: 48rem;">
                We've thought of everything so you can focus on what matters most - creating unforgettable memories in nature.
            </p>
        </div>

        <!-- Reasons Grid -->
        <div class="row g-4">
            <?php foreach ($reasons as $index => $reason): ?>
            <div class="col-md-6 col-lg-3 reveal" style="animation-delay: <?php echo $index * 0.1; ?>s;">
                <div class="reason-card p-4 rounded-4 border h-100" style="background: hsl(var(--card)); border-color: hsl(var(--border)) !important; transition: all 0.5s ease;">
                    <!-- Icon -->
                    <div class="reason-icon rounded-4 mb-4 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: hsl(var(--primary) / 0.1); transition: all 0.5s;">
                        <i class="<?php echo $reason['icon']; ?> reason-icon-svg" style="font-size: 2rem; color: hsl(var(--primary)); transition: color 0.5s;"></i>
                    </div>

                    <!-- Content -->
                    <h3 class="reason-title mb-3" style="font-family: var(--font-display); font-size: 1.25rem; font-weight: 700; color: hsl(var(--foreground)); transition: color 0.3s;">
                        <?php echo $reason['title']; ?>
                    </h3>
                    <p style="font-family: var(--font-body); color: hsl(var(--muted-foreground)); line-height: 1.7;">
                        <?php echo $reason['description']; ?>
                    </p>

                    <!-- Hover accent -->
                    <div class="reason-accent position-absolute bottom-0 start-0 end-0 rounded-bottom-4" style="height: 4px; background: hsl(var(--secondary)); transform: scaleX(0); transform-origin: left; transition: transform 0.5s;"></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
#why-us .position-absolute:first-of-type {
    bottom: 2.5rem;
    left: 2.5rem;
    width: 6rem;
    height: 6rem;
}

.reason-card {
    position: relative;
}

.reason-card:hover {
    border-color: hsl(var(--primary) / 0.5) !important;
    box-shadow: var(--shadow-elevated);
    transform: translateY(-8px);
}

.reason-card:hover .reason-icon {
    background: hsl(var(--primary));
    transform: scale(1.1);
}

.reason-card:hover .reason-icon-svg {
    color: hsl(var(--primary-foreground));
}

.reason-card:hover .reason-title {
    color: hsl(var(--primary));
}

.reason-card:hover .reason-accent {
    transform: scaleX(1);
}
</style>
