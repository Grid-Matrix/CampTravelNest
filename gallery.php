<?php
require_once 'config/config.php';

// Dynamic Gallery Images from assets/images
$galleryImages = [];
$imageDir = 'assets/images/';
$allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
$excludedFiles = ['hero-camping.jpg', 'personal-tent.jpg']; // Files to exclude from gallery

if (is_dir($imageDir)) {
    $files = scandir($imageDir);
    foreach ($files as $file) {
        // Skip excluded files
        if (in_array($file, $excludedFiles)) {
            continue;
        }
        
        $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($extension, $allowedExtensions)) {
            $imagePath = $imageDir . $file;
            
            // Get image dimensions to determine orientation
            $imageInfo = @getimagesize($imagePath);
            $isLandscape = false;
            $width = 0;
            $height = 0;
            
            if ($imageInfo !== false) {
                $width = $imageInfo[0];
                $height = $imageInfo[1];
                
                // Check EXIF orientation (for mobile photos)
                if (function_exists('exif_read_data')) {
                    $exif = @exif_read_data($imagePath);
                    if ($exif && isset($exif['Orientation'])) {
                        $orientation = $exif['Orientation'];
                        // Orientations 5, 6, 7, 8 mean the image is rotated 90° or 270°
                        // In these cases, width and height are swapped
                        if (in_array($orientation, [5, 6, 7, 8])) {
                            // Swap width and height for rotated images
                            $temp = $width;
                            $width = $height;
                            $height = $temp;
                        }
                    }
                }
                
                $isLandscape = ($width >= $height); // Landscape or square
            }
            
            $galleryImages[] = [
                'src' => $imagePath,
                'thumb' => $imagePath,
                'caption' => '',
                'isLandscape' => $isLandscape,
                'width' => $width,
                'height' => $height,
                'filename' => $file
            ];
        }
    }
    
    // Sort images: landscape first, then portrait
    usort($galleryImages, function($a, $b) {
        // If one is landscape and other is portrait, landscape comes first
        if ($a['isLandscape'] && !$b['isLandscape']) {
            return -1; // $a comes first
        }
        if (!$a['isLandscape'] && $b['isLandscape']) {
            return 1; // $b comes first
        }
        // If both same orientation, maintain original order
        return 0;
    });
}

// Fallback if no images found
if (empty($galleryImages)) {
    $galleryImages = [
        [
            'src' => 'https://images.unsplash.com/photo-1499364615650-ec38552f4f34?q=80&w=1200',
            'thumb' => 'https://images.unsplash.com/photo-1499364615650-ec38552f4f34?q=80&w=400',
            'caption' => 'Luxury Tents at Night'
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | <?php echo SITE_NAME; ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css?v=<?php echo time(); ?>">
</head>
<body style="background: hsl(var(--background));">
    <!-- Navigation -->
    <?php 
    $forceDarkHeader = true;
    include 'includes/header.php'; 
    ?>
    
    <main class="min-vh-100">
        <!-- Hero Section -->
        <section class="py-5 mt-5 text-center">
            <div class="container pt-5 reveal">
                <span class="badge rounded-pill px-4 py-2 mb-3" style="background: hsl(var(--secondary) / 0.1); color: hsl(var(--secondary)); font-family: var(--font-body); font-weight: 600;">
                    Our Moments
                </span>
                <h1 class="mb-4" style="font-family: var(--font-display); font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 700; color: hsl(var(--foreground));">
                    Life at <span style="color: hsl(var(--primary));">Camp Traveler's Nest</span>
                </h1>
                <p class="lead mb-0 mx-auto" style="font-family: var(--font-body); color: hsl(var(--muted-foreground)); max-width: 40rem;">
                    A glimpse into the serene landscapes, cozy accommodations, and unforgettable experiences that await you.
                </p>
            </div>
        </section>

        <!-- Gallery Grid -->
        <section class="pb-5 mb-5">
            <div class="container">
                <div class="row g-4">
                    <?php foreach ($galleryImages as $index => $image): ?>
                    <div class="col-md-6 col-lg-4 reveal" style="animation-delay: <?php echo ($index % 3) * 0.1; ?>s;">
                        <div class="gallery-item position-relative overflow-hidden rounded-3 shadow-sm h-100 cursor-pointer" onclick="openGalleryLightbox(<?php echo $index; ?>)">
                            <img src="<?php echo $image['thumb']; ?>" alt="<?php echo htmlspecialchars($image['caption'] ?? 'Gallery Image', ENT_QUOTES); ?>" class="w-100 h-100 object-fit-cover" style="height: 300px; transition: transform 0.5s ease;">
                            <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0 p-3" style="background: hsl(var(--primary) / 0.6); transition: opacity 0.3s ease;">
                                <div class="text-center text-white transform-scale-up">
                                    <i class="bi bi-zoom-in fs-2 mb-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox-modal position-fixed top-0 start-0 w-100 h-100 d-none align-items-center justify-content-center" style="z-index: 2000; background: rgba(0,0,0,0.9);">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-4 fs-4" onclick="closeGalleryLightbox()"></button>
        
        <!-- Previous Button -->
        <button type="button" class="btn btn-light position-absolute start-0 top-50 translate-middle-y ms-3 rounded-circle d-flex align-items-center justify-content-center" 
                onclick="navigateLightbox(-1)" 
                style="width: 50px; height: 50px; opacity: 0.8; z-index: 2001;">
            <i class="bi bi-chevron-left fs-4"></i>
        </button>
        
        <!-- Next Button -->
        <button type="button" class="btn btn-light position-absolute end-0 top-50 translate-middle-y me-3 rounded-circle d-flex align-items-center justify-content-center" 
                onclick="navigateLightbox(1)" 
                style="width: 50px; height: 50px; opacity: 0.8; z-index: 2001;">
            <i class="bi bi-chevron-right fs-4"></i>
        </button>
        
        <div class="lightbox-content position-relative p-2" style="max-width: 90vw; max-height: 90vh;">
            <img id="lightbox-img" src="" alt="" class="img-fluid rounded-2 shadow-lg" style="max-height: 85vh;">
        </div>
    </div>
    
    <!-- Booking Modal -->
    <?php include 'includes/booking-modal.php'; ?>
    
    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Gallery images data
        const galleryImages = <?php echo json_encode(array_map(function($img) {
            return ['src' => $img['src'], 'caption' => $img['caption'] ?? ''];
        }, $galleryImages)); ?>;
        
        let currentImageIndex = 0;
        
        function openGalleryLightbox(index) {
            currentImageIndex = index;
            const lightbox = document.getElementById('lightbox');
            const img = document.getElementById('lightbox-img');
            
            if (lightbox && img && galleryImages[index]) {
                img.src = galleryImages[index].src;
                lightbox.classList.remove('d-none');
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }
        
        function closeGalleryLightbox() {
            const lightbox = document.getElementById('lightbox');
            if (lightbox) {
                lightbox.classList.remove('active');
                lightbox.classList.add('d-none');
                document.body.style.overflow = '';
            }
        }
        
        function navigateLightbox(direction) {
            currentImageIndex += direction;
            
            // Wrap around
            if (currentImageIndex < 0) {
                currentImageIndex = galleryImages.length - 1;
            } else if (currentImageIndex >= galleryImages.length) {
                currentImageIndex = 0;
            }
            
            const img = document.getElementById('lightbox-img');
            if (img && galleryImages[currentImageIndex]) {
                img.src = galleryImages[currentImageIndex].src;
            }
        }
        
        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (lightbox && !lightbox.classList.contains('d-none')) {
                if (e.key === 'ArrowLeft') {
                    navigateLightbox(-1);
                } else if (e.key === 'ArrowRight') {
                    navigateLightbox(1);
                } else if (e.key === 'Escape') {
                    closeGalleryLightbox();
                }
            }
        });
    </script>
    <script src="js/animations.js?v=<?php echo time(); ?>"></script>
</body>
</html>
