<?php
require_once 'config/config.php';

// Get the Delux Tent data from config
$deluxTent = null;
foreach ($services as $service) {
    if ($service['slug'] === 'delux-tent') {
        $deluxTent = $service;
        break;
    }
}

if (!$deluxTent) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $deluxTent['title']; ?> | <?php echo SITE_NAME; ?></title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo $deluxTent['description']; ?>">
    <meta name="author" content="<?php echo SITE_NAME; ?>">
    
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body style="background: hsl(var(--background));">
    <!-- Navigation -->
    <?php 
    $forceDarkHeader = true;
    include 'includes/header.php'; 
    ?>
    
    <main class="min-vh-100">
        <!-- Hero Section -->
        <section class="py-5 mt-5 position-relative overflow-hidden">
            <div class="container pt-5">
                <nav aria-label="breadcrumb" class="mb-4 reveal">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php" style="color: hsl(var(--primary)); text-decoration: none;">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php#services" style="color: hsl(var(--primary)); text-decoration: none;">Accommodations</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $deluxTent['title']; ?></li>
                    </ol>
                </nav>

                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 reveal">
                        <span class="badge rounded-pill px-4 py-2 mb-3" style="background: hsl(var(--secondary) / 0.1); color: hsl(var(--secondary)); font-family: var(--font-body); font-weight: 600;">
                            <?php echo $deluxTent['subtitle']; ?>
                        </span>
                        <h1 class="mb-4" style="font-family: var(--font-display); font-size: clamp(2.5rem, 5vw, 4.5rem); font-weight: 700; color: hsl(var(--foreground));">
                            The Ultimate <span style="color: hsl(var(--primary));"><?php echo $deluxTent['title']; ?></span> Experience
                        </h1>
                        <p class="lead mb-5" style="font-family: var(--font-body); color: hsl(var(--muted-foreground)); font-size: 1.25rem;">
                            <?php echo $deluxTent['description']; ?>
                        </p>
                        
                        <div class="d-flex flex-wrap gap-3 mb-5">
                            <button type="button" class="btn btn-hero px-5 py-3 rounded-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                Book Now (<?php echo $deluxTent['price']; ?>)
                            </button>
                            <a href="https://wa.me/<?php echo WHATSAPP_NUMBER; ?>" target="_blank" class="btn btn-whatsapp px-5 py-3 rounded-3 d-inline-flex align-items-center gap-2">
                                <i class="bi bi-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 reveal" style="animation-delay: 0.2s;">
                        <div class="position-relative">
                            <div class="rounded-4 overflow-hidden shadow-elevated" style="height: 30rem;">
                                <img src="<?php echo $deluxTent['image']; ?>" alt="<?php echo $deluxTent['title']; ?>" class="w-100 h-100 object-fit-cover">
                            </div>
                            <!-- Decorative element -->
                            <div class="position-absolute bottom-0 start-0 translate-middle-x ms-4 mb-4 d-none d-md-block" style="z-index: -1;">
                                <div class="rounded-4" style="width: 200px; height: 200px; background: hsl(var(--secondary) / 0.2); transform: rotate(15deg);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Detailed Features -->
        <section id="details" class="py-5" style="background: hsl(var(--muted) / 0.3);">
            <div class="container py-md-5">
                <div class="text-center mb-5 reveal">
                    <h2 style="font-family: var(--font-display); font-size: 3rem; font-weight: 700;">Premium Amenities</h2>
                    <p class="text-muted">Everything you need for a comfortable stay in nature.</p>
                </div>
                
                <div class="row g-4 justify-content-center">
                    <?php foreach ($deluxTent['features'] as $feature): ?>
                    <div class="col-md-4 reveal">
                        <div class="card h-100 border-0 p-4 rounded-4 shadow-sm text-center">
                            <div class="rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; background: hsl(var(--primary) / 0.1);">
                                <i class="<?php echo $feature['icon']; ?>" style="font-size: 2rem; color: hsl(var(--primary));"></i>
                            </div>
                            <h4 style="font-family: var(--font-display); font-weight: 600;"><?php echo $feature['text']; ?></h4>
                            <p class="text-muted small">Experience the best in class service and comfort with our premium facilities.</p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Gallery Section (Placeholders) -->
        <!-- Gallery Section -->
        <?php include 'includes/gallery-slider.php'; ?>
    </main>

    <!-- Booking Modal -->
    <?php include 'includes/booking-modal.php'; ?>
    
    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/animations.js?v=<?php echo time(); ?>"></script>
</body>
</html>
