<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/decorations.php';
?>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg fixed-top py-3 <?php echo (isset($forceDarkHeader) && $forceDarkHeader) ? 'navbar-scrolled navbar-always-scrolled' : 'bg-transparent'; ?>" <?php echo (isset($forceDarkHeader) && $forceDarkHeader) ? 'data-bs-theme="light"' : ''; ?>>
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center gap-3 text-decoration-none" href="#home">
            <div class="position-relative">
                <div class="rounded-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: var(--gradient-emerald);">
                    <?php echo renderTentIcon('text-white'); ?>
                </div>
                <div class="position-absolute top-0 end-0 translate-middle-y rounded-circle animate-pulse-soft" style="width: 12px; height: 12px; background: hsl(var(--secondary));"></div>
            </div>
            <div class="d-flex flex-column navbar-brand-text">
                <span class="fw-bold lh-sm" style="font-size: 1.25rem; font-family: var(--font-display); letter-spacing: -0.02em;">Camp Traveler's</span>
                <span class="fw-semibold lh-sm" style="font-size: 1.125rem; font-family: var(--font-display); color: hsl(var(--secondary));">Nest</span>
            </div>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-4">
                <?php 
                $currentPage = basename($_SERVER['PHP_SELF']);
                $isHomePage = ($currentPage === 'index.php' || $currentPage === '');
                
                foreach ($nav_links as $link): 
                    $href = $link['href'];
                    // If not on homepage and link is an anchor (starts with #), prepend index.php
                    if (!$isHomePage && strpos($href, '#') === 0) {
                        $href = 'index.php' . $href;
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link fw-medium position-relative nav-link-custom" href="<?php echo $href; ?>">
                        <?php echo $link['label']; ?>
                        <span class="nav-link-underline"></span>
                    </a>
                </li>
                <?php endforeach; ?>
                <li class="nav-item mt-3 mt-lg-0">
                    <button type="button" class="btn btn-hero px-4 py-2 rounded-3" data-bs-toggle="modal" data-bs-target="#bookingModal">Book Now</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* Navigation Specific Styles */
.navbar {
    transition: all 0.5s ease;
}

.navbar-brand-text span {
    transition: color 0.3s ease;
}

.navbar-scrolled .navbar-brand-text span:first-child,
.navbar-always-scrolled .navbar-brand-text span:first-child {
    color: hsl(var(--foreground)) !important;
}

.navbar:not(.navbar-scrolled):not(.navbar-always-scrolled) .navbar-toggler-icon {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.9)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

.nav-link-custom {
    color: hsl(var(--primary-foreground) / 0.9);
    transition: all 0.3s ease;
}

.navbar-scrolled .nav-link-custom,
.navbar-always-scrolled .nav-link-custom {
    color: hsl(var(--foreground));
}

.nav-link-custom:hover {
    color: hsl(var(--primary-foreground));
    transform: scale(1.05);
}

.navbar-scrolled .nav-link-custom:hover,
.navbar-always-scrolled .nav-link-custom:hover {
    color: hsl(var(--primary));
}

.nav-link-underline {
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: hsl(var(--primary-foreground));
    transition: width 0.3s ease;
}

.navbar-scrolled .nav-link-underline,
.navbar-always-scrolled .nav-link-underline {
    background: hsl(var(--primary));
}

.nav-link-custom:hover .nav-link-underline {
    width: 100%;
}

/* Mobile Menu Styles */
@media (max-width: 991.98px) {
    .navbar-collapse {
        background: hsl(var(--background) / 0.98);
        backdrop-filter: blur(20px);
        margin-top: 1rem;
        padding: 1rem;
        border-radius: 1rem;
        box-shadow: var(--shadow-soft);
   }
    
    .nav-link-custom {
        color: hsl(var(--foreground));
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
    }
    
    .nav-link-custom:hover {
        background: hsl(var(--muted));
        color: hsl(var(--primary));
    }
}
</style>
