<?php
require_once __DIR__ . '/../config/config.php';
?>
<!-- Footer -->
<footer id="contact" class="text-white position-relative" style="background: hsl(var(--primary));">
    <!-- Main Footer -->
    <div class="container py-5">
        <div class="row g-5">
            <!-- Brand -->
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: hsl(var(--primary-foreground) / 0.1);">
                        <?php echo renderTentIcon('text-white'); ?>
                    </div>
                    <div class="d-flex flex-column">
                        <span class="fw-bold lh-sm" style="font-size: 1.25rem; font-family: var(--font-display);">Camp Traveler's</span>
                        <span class="fw-semibold lh-sm" style="font-size: 1.125rem; font-family: var(--font-display); color: hsl(var(--secondary));">Nest</span>
                    </div>
                </div>
                <p class="mb-4" style="font-family: var(--font-body); opacity: 0.85; line-height: 1.7;">
                    Experience the perfect blend of adventure and comfort. Your gateway to unforgettable camping memories awaits.
                </p>
                <div class="d-flex gap-2">
                    <a href="<?php echo SOCIAL_FACEBOOK; ?>" class="social-icon rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: hsl(var(--primary-foreground) / 0.1); color: white; text-decoration: none; transition: all 0.3s;">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="social-icon rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: hsl(var(--primary-foreground) / 0.1); color: white; text-decoration: none; transition: all 0.3s;">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="<?php echo SOCIAL_TWITTER; ?>" class="social-icon rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: hsl(var(--primary-foreground) / 0.1); color: white; text-decoration: none; transition: all 0.3s;">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="<?php echo SOCIAL_YOUTUBE; ?>" class="social-icon rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: hsl(var(--primary-foreground) / 0.1); color: white; text-decoration: none; transition: all 0.3s;">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-3">
                <h4 class="mb-4" style="font-family: var(--font-display); font-size: 1.25rem; font-weight: 700;">Quick Links</h4>
                <ul class="list-unstyled">
                    <?php foreach ($nav_links as $link): ?>
                    <li class="mb-3">
                        <a href="<?php echo $link['href']; ?>" class="footer-link text-white text-decoration-none d-flex align-items-center gap-2" style="font-family: var(--font-body); opacity: 0.85; transition: all 0.3s;">
                            <span class="footer-link-line" style="width: 0; height: 2px; background: hsl(var(--secondary)); transition: width 0.3s;"></span>
                            <?php echo $link['label']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3">
                <h4 class="mb-4" style="font-family: var(--font-display); font-size: 1.25rem; font-weight: 700;">Contact Us</h4>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="text-white text-decoration-none d-flex align-items-start gap-3" style="font-family: var(--font-body); opacity: 0.85; transition: opacity 0.3s;">
                            <i class="bi bi-envelope mt-1"></i>
                            <span><?php echo CONTACT_EMAIL; ?></span>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="tel:<?php echo str_replace([' ', '-'], '', CONTACT_PHONE_1); ?>" class="text-white text-decoration-none d-flex align-items-center gap-3" style="font-family: var(--font-body); opacity: 0.85; transition: opacity 0.3s;">
                            <i class="bi bi-telephone"></i>
                            <span><?php echo CONTACT_PHONE_1; ?></span>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="tel:<?php echo str_replace(' ', '', CONTACT_PHONE_2); ?>" class="text-white text-decoration-none d-flex align-items-center gap-3" style="font-family: var(--font-body); opacity: 0.85; transition: opacity 0.3s;">
                            <i class="bi bi-telephone"></i>
                            <span><?php echo CONTACT_PHONE_2; ?></span>
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>" target="_blank" class="text-white text-decoration-none d-flex align-items-center gap-3" style="font-family: var(--font-body); opacity: 0.85; transition: opacity 0.3s;">
                            <i class="bi bi-whatsapp"></i>
                            <span>+<?php echo substr(WHATSAPP_NUMBER, 0, 2) . ' ' . substr(WHATSAPP_NUMBER, 2); ?></span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Location -->
            <div class="col-lg-3">
                <h4 class="mb-4" style="font-family: var(--font-display); font-size: 1.25rem; font-weight: 700;">Location</h4>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <i class="bi bi-geo-alt mt-1" style="color: hsl(var(--secondary));"></i>
                    <p class="mb-0" style="font-family: var(--font-body); opacity: 0.85; line-height: 1.7;">
                        <?php echo LOCATION_ADDRESS; ?>
                    </p>
                </div>
                <div class="mt-4 p-3 rounded-3" style="background: hsl(var(--primary-foreground) / 0.05); border: 1px solid hsl(var(--primary-foreground) / 0.1);">
                    <p class="small mb-0" style="font-family: var(--font-body); opacity: 0.75;">
                        <span style="color: hsl(var(--secondary)); font-weight: 500;">Open:</span> 24/7, All Year Round
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div style="border-top: 1px solid hsl(var(--primary-foreground) / 0.1);">
        <div class="container py-4">
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <p class="small mb-0" style="font-family: var(--font-body); opacity: 0.65;">
                    © <?php echo date('Y'); ?> Camp Traveler's Nest. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
.social-icon:hover {
    background: hsl(var(--secondary)) !important;
    transform: scale(1.1);
}

.footer-link:hover {
    opacity: 1 !important;
    color: hsl(var(--secondary)) !important;
}

.footer-link:hover .footer-link-line {
    width: 12px;
}

footer a:hover {
    opacity: 1 !important;
    color: hsl(var(--secondary)) !important;
}
</style>
