<?php
// Gallery Images Data
$sliderImages = [
    [
        'src' => 'assets/images/IMG_2443.jpeg',
        
    ],
    [
        'src' => 'assets/images/IMG_2261.jpeg',
        
    ],
    [
        'src' => 'assets/images/IMG_2258.jpeg',
        
    ],
    [
        'src' => 'assets/images/IMG_3056.jpeg',
        
    ],
    [
        'src' => 'assets/images/IMG_3143.jpeg',
        
    ],
];
?>
<section id="gallery-slider" class="py-5 bg-light">
    <div class="container text-center mb-5">
        <span class="badge rounded-pill px-3 py-2 mb-3 shadow-sm bg-white text-primary">
            <i class="bi bi-camera me-2"></i>Gallery
        </span>
        <h2 class="display-5 fw-bold mb-3" style="font-family: var(--font-display);">Captured Moments</h2>
        <p class="lead text-muted mx-auto" style="max-width: 600px;">
            Experience the beauty and serenity of our campsite through our lens.
        </p>
    </div>

    <div class="container">
        <div id="galleryCarousel" class="carousel slide shadow-lg rounded-4 overflow-hidden" style="max-width: 1100px; margin: auto;" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php foreach ($sliderImages as $index => $image): ?>
                    <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
                <?php endforeach; ?>
            </div>
            
            <div class="carousel-inner">
                <?php foreach ($sliderImages as $index => $image): ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>" data-bs-interval="4000">
                    <img src="<?php echo $image['src']; ?>" class="d-block w-100 " alt="<?php echo $image['caption'] ?? 'Gallery Image'; ?>" style="height: 600px; background-color: #f8f9fa;">
                </div>
                <?php endforeach; ?>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon p-4 rounded-circle bg-dark bg-opacity-25" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon p-4 rounded-circle bg-dark bg-opacity-25" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
