<?php
/**
 * Site Configuration
 * Camp Traveler's Nest
 */

// Site Information
define('SITE_NAME', "Camp Traveler's Nest");
define('SITE_TAGLINE', 'Premium Camping Experience');
define('SITE_URL', 'https://camptravelersnest.com');

// Contact Information
define('CONTACT_EMAIL', 'malpa.ridershp42@gmail.com');
define('CONTACT_PHONE_1', '+91 7876000717');
define('CONTACT_PHONE_2', '+91 8580867116');
define('CONTACT_PHONE_3', ''); // Removed third phone as only two were provided
define('WHATSAPP_NUMBER', '919459886035'); // WhatsApp number for bookings (without + or spaces)

// Social Media Links
define('SOCIAL_FACEBOOK', '#');
define('SOCIAL_INSTAGRAM', '#');
define('SOCIAL_TWITTER', '#');
define('SOCIAL_YOUTUBE', '#');

// Location
define('LOCATION_ADDRESS', "Travellers Nest Camp Sarchu Leh Manali Highway, near Ladakh Border, Sarchu, Himachal Pradesh - 175132");

// Navigation Menu
$nav_links = [
    ['href' => '#home', 'label' => 'Home'],
    ['href' => '#about', 'label' => 'About'],
    ['href' => '#services', 'label' => 'Services'],
    ['href' => '#why-us', 'label' => 'Why Us'],
    ['href' => 'gallery.php', 'label' => 'Gallery'],
    ['href' => '#facilities', 'label' => 'Facilities'],
    ['href' => '#contact', 'label' => 'Contact'],
];

// Services/Accommodations
$services = [
    [
        'id' => 'domes',
        'slug' => 'delux-tent',
        'title' => 'Delux Tent',
        'subtitle' => 'Group Adventure Awaits',
        'description' => 'Spacious geodesic domes designed specifically for biker groups. Park your bikes right outside and enjoy the camaraderie with fellow riders in our premium communal spaces.',
        'image' => 'assets/images/dome-bikers.jpg',
        'features' => [
            ['icon' => 'bi-droplet', 'text' => 'Attached Bathroom'],
            ['icon' => 'bi-wifi', 'text' => 'High-speed WiFi'],
            ['icon' => 'bi-cup-hot', 'text' => 'Breakfast & Dinner Included'],
        ],
        'price' => 'From ₹3,500/night',
    ],
];

// Why Choose Us Reasons
$reasons = [
    [
        'icon' => 'bi-geo-alt',
        'title' => 'Prime Location',
        'description' => 'Situated in a breathtaking natural setting with easy access to trails, viewpoints, and local attractions.',
    ],
    [
        'icon' => 'bi-shield-check',
        'title' => 'Safe & Secure',
        'description' => '24/7 security with CCTV monitoring, secure parking, and a dedicated team ensuring your peace of mind.',
    ],
    [
        'icon' => 'bi-heart',
        'title' => 'Personalized Experience',
        'description' => 'Our team goes above and beyond to customize your stay based on your preferences and needs.',
    ],
    [
        'icon' => 'bi-clock',
        'title' => 'Flexible Booking',
        'description' => 'Easy booking process with flexible cancellation policies. We adapt to your travel plans.',
    ],
];

// Facilities
$facilities = [
    ['icon' => 'bi-wifi', 'name' => 'Free WiFi', 'description' => 'High-speed connectivity'],
    ['icon' => 'bi-car-front', 'name' => 'Secure Parking', 'description' => 'Covered & monitored'],
    ['icon' => 'bi-droplet-fill', 'name' => 'Hot Showers', 'description' => '24/7 availability'],
    ['icon' => 'bi-shop', 'name' => 'Dining Area', 'description' => 'Indoor & outdoor'],
    ['icon' => 'bi-fire', 'name' => 'Bonfire Pit', 'description' => 'Evening gatherings'],
    ['icon' => 'bi-tree', 'name' => 'Nature Trails', 'description' => 'Guided hikes'],
    ['icon' => 'bi-camera', 'name' => 'Photo Spots', 'description' => 'Instagram worthy'],
    ['icon' => 'bi-music-note-beamed', 'name' => 'Music Zone', 'description' => 'Acoustic evenings'],
    ['icon' => 'bi-shield-check', 'name' => '24/7 Security', 'description' => 'CCTV monitored'],
    ['icon' => 'bi-brightness-high', 'name' => 'Adventure Sports', 'description' => 'Thrilling activities'],
    ['icon' => 'bi-moon-stars', 'name' => 'Stargazing Deck', 'description' => 'Clear night skies'],
    ['icon' => 'bi-cup-hot', 'name' => 'Café & Bar', 'description' => 'Refreshments'],
];
