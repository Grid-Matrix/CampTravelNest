# Camp Traveler's Nest - PHP Version

This is the PHP/Bootstrap conversion of the React-based camping website, maintaining 100% design fidelity with the original.

## Features

- ✅ **Bootstrap 5** for responsive layout and components
- ✅ **Tailwind CSS** design tokens and custom animations
- ✅ **Bootstrap Icons** for all iconography
- ✅ **PHPMailer** support for booking form emails
- ✅ **Parallax effects** and scroll animations
- ✅ **100% design fidelity** with fonts, colors, spacing, and animations matching React version

## Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **CSS Framework**: Bootstrap 5.3.2
- **Icons**: Bootstrap Icons 1.11.2
- **Animations**: Tailwind CSS custom animations (via custom.css)
- **Backend**: PHP 7.4+ (for form processing)
- **Email**: PHP mail() or PHPMailer

## Project Structure

```
php-version/
├── index.php                    # Main landing page
├── process-booking.php          # Form submission handler
├── config/
│   ├── config.php              # Site-wide configuration
│   └── email-config.php        # Email/SMTP settings
├── includes/
│   ├── header.php              # Navigation bar
│   ├── footer.php              # Footer section
│   ├── hero-section.php        # Hero with parallax
│   ├── about-section.php       # About section
│   ├── services-section.php    # Accommodations
│   ├── why-choose-us-section.php
│   ├── facilities-section.php
│   ├── booking-section.php     # Booking form
│   └── decorations.php         # SVG shapes
├── assets/
│   ├── images/                 # Images from React version
│   └── favicon.ico
├── css/
│   └── custom.css             # Design tokens & animations
└── js/
    └── animations.js          # JavaScript animations
```

## Setup Instructions

### 1. Server Requirements

- PHP 7.4 or higher
- Web server (Apache, Nginx, or PHP built-in server)
- Optional: Composer (if using PHPMailer)

### 2. Configuration

#### Email Setup

Edit `config/email-config.php`:

**Option A: Using PHP's mail() function (simpler)**
```php
define('USE_PHP_MAIL', true);
```

**Option B: Using PHPMailer with SMTP (recommended for production)**
1. Install PHPMailer via Composer:
   ```bash
   cd php-version
   composer require phpmailer/phpmailer
   ```

2. Update SMTP credentials in `config/email-config.php`:
   ```php
   define('USE_PHP_MAIL', false);
   define('SMTP_HOST', 'smtp.gmail.com');
   define('SMTP_USERNAME', 'your-email@gmail.com');
   define('SMTP_PASSWORD', 'your-app-password');
   ```

3. Uncomment PHPMailer code in `process-booking.php` (lines ~117-157)

#### Site Configuration

Edit `config/config.php` to update:
- Contact email and phone numbers
- Social media links
- Location address

### 3. Running Locally

#### Using PHP Built-in Server
```bash
cd php-version
php -S localhost:8000
```

Then open `http://localhost:8000` in your browser.

#### Using XAMPP/MAMP
1. Copy the `php-version` folder to your htdocs directory
2. Access via `http://localhost/php-version/`

### 4. Deployment

1. Upload all files to your web server
2. Ensure PHP is enabled on your hosting
3. Configure email settings in `config/email-config.php`
4. Test the booking form to ensure emails are being sent

## Design Fidelity

The conversion maintains exact design parity with the React version:

### Fonts
- **Headings**: Cormorant Garamond (loaded from Google Fonts)
- **Body**: Outfit (loaded from Google Fonts)

### Color Palette
- **Primary (Emerald)**: `hsl(158, 45%, 22%)`
- **Secondary (Gold)**: `hsl(42, 80%, 55%)`
- **Background (Cream)**: `hsl(45, 30%, 97%)`

### Animations
All animations from the React version are preserved:
- Parallax hero background
- Scroll reveal animations
- Fade-in effects (up, down, left, right)
- Hover effects on cards and buttons
- Floating decorative shapes
- Navbar scroll behavior

## Features Breakdown

### Navigation
- Fixed navbar with transparent → solid transition on scroll
- Mobile-responsive hamburger menu
- Smooth scroll to sections
- Logo with animated pulse dot

### Hero Section
- Parallax background image effect
- Floating SVG decorative shapes
- Animated content with staggered delays
- Statistics grid
- Scroll indicator

### About Section  
- Two-column layout with scroll animations
- Feature badges
- Floating stats card and badge
- Decorative SVG elements

### Services Section
- Accommodation cards with images
- Hover effects (image zoom, card lift)
- Feature icons
- Pricing badges

### Why Choose Us
- 4-column responsive grid
- Icon hover animations (scale, rotate, color change)
- Bottom accent bar on hover

### Facilities
- 12 facility cards in responsive grid
- Dark emerald background
- Icon rotation on hover
- Wave SVG at bottom

### Booking Form
- Full form validation
- HTML5 date picker
- AJAX submission
- Success overlay animation
- Server-side validation & sanitization

### Footer
- 4-column layout
- Social media icons
- Quick links with smooth scroll
- Contact information
- Copyright and legal links

## Browser Compatibility

Tested and working on:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Performance

- All CSS and JS libraries loaded via CDN
- Optimized images
- Minimal JavaScript for animations
- No build process required

## Support

For issues or questions:
- Email: mapl.arbdeepm42@gmail.com
- Phone: +91 7876010717, +91 8558087716

## License

Copyright © 2026 Camp Traveler's Nest. All rights reserved.
