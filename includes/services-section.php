<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/decorations.php';
?>
<!-- Services Section -->
<section id="services" class="py-5 position-relative overflow-hidden" style="background: hsl(var(--muted) / 0.3);">
    <!-- Decorative -->
    <?php echo renderFloatingShape2('position-absolute animate-float opacity-10'); ?>

    <div class="container py-md-5">
        <!-- Section Header -->
        <div class="text-center mx-auto mb-5 reveal">
            <span class="badge rounded-pill px-4 py-2 mb-4" style="background: hsl(var(--primary) / 0.1); color: hsl(var(--primary)); font-family: var(--font-body); font-weight: 500;">
                <span class="rounded-circle d-inline-block me-2" style="width: 6px; height: 6px; background: hsl(var(--secondary));"></span>
                Our Accommodations
            </span>
            <h2 class="mb-4" style="font-family: var(--font-display); font-size: clamp(2rem, 5vw, 4rem); font-weight: 700; color: hsl(var(--foreground));">
                Choose Your Perfect <span style="color: hsl(var(--primary));">Stay</span>
            </h2>
            <p class="mx-auto" style="font-family: var(--font-body); font-size: 1.125rem; color: hsl(var(--muted-foreground)); max-width: 48rem;">
                From group adventures to intimate retreats, we have the ideal accommodation for every type of traveler.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="row g-4 g-lg-5 justify-content-center">
            <?php foreach ($services as $index => $service): ?>
            <div class="col-lg-6 mx-auto reveal" style="animation-delay: <?php echo $index * 0.2; ?>s;">
                <div class="card border-0 rounded-4 overflow-hidden shadow-card card-hover h-100">
                    <!-- Image -->
                    <div class="position-relative overflow-hidden" style="height: 16rem;">
                        <img src="<?php echo $service['image']; ?>" alt="<?php echo $service['title']; ?>" class="w-100 h-100 object-fit-cover service-image">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to top, hsl(var(--card) / 0.9), transparent);"></div>
                        
                        <!-- Price Badge -->
                        <div class="position-absolute top-0 end-0 m-3 rounded-pill px-4 py-2 shadow-sm" style="background: hsl(var(--secondary)); color: hsl(var(--secondary-foreground)); font-family: var(--font-body); font-weight: 600; font-size: 0.875rem;">
                            <?php echo $service['price']; ?>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="card-body p-4">
                        <span class="text-uppercase small fw-medium mb-2 d-block" style="color: hsl(var(--secondary)); letter-spacing: 0.05em; font-family: var(--font-body);">
                            <?php echo $service['subtitle']; ?>
                        </span>
                        <h3 class="mb-3 service-title" style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; color: hsl(var(--foreground)); transition: color 0.3s;">
                            <?php echo $service['title']; ?>
                        </h3>
                        <p class="mb-4" style="font-family: var(--font-body); color: hsl(var(--muted-foreground)); line-height: 1.7;">
                            <?php echo $service['description']; ?>
                        </p>

                        <!-- Features -->
                        <div class="d-flex flex-wrap gap-3 mb-4">
                            <?php foreach ($service['features'] as $feature): ?>
                            <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3" style="background: hsl(var(--muted));">
                                <i class="<?php echo $feature['icon']; ?>" style="color: hsl(var(--primary)); font-size: 1rem;"></i>
                                <span class="small" style="font-family: var(--font-body); color: hsl(var(--foreground));"><?php echo $feature['text']; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="d-flex flex-column flex-sm-row gap-3">
                            <button type="button" class="btn btn-outline-primary flex-fill py-3 rounded-3 service-btn" style="border-width: 2px; font-family: var(--font-body); font-weight: 500; transition: all 0.3s;" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                Book Your Stay
                            </button>
                            <a href="<?php echo $service['slug']; ?>.php" class="btn btn-hero flex-fill py-3 rounded-3 d-flex align-items-center justify-content-center" style="font-family: var(--font-body); font-weight: 500;">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
#services .position-absolute:first-of-type {
    top: 5rem;
    right: 0;
    width: 20rem;
    height: 20rem;
    transform: translateX(50%);
}

.service-image {
    transition: transform 0.7s ease;
}

.card-hover:hover .service-image {
    transform: scale(1.1);
}

.card-hover:hover .service-title {
    color: hsl(var(--primary));
}

.service-btn {
    border-color: hsl(var(--primary));
    color: hsl(var(--primary));
}

.card-hover:hover .service-btn {
    background: hsl(var(--primary));
    color: hsl(var(--primary-foreground));
    border-color: hsl(var(--primary));
}
</style>
