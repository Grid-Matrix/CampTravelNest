<?php
/**
 * Email Configuration for PHPMailer
 * Update these values with your SMTP credentials
 */

// SMTP Settings
define('SMTP_HOST', 'smtp.gmail.com'); // Change to your SMTP host
define('SMTP_PORT', 587); // TLS port (use 465 for SSL)
define('SMTP_SECURE', 'tls'); // 'tls' or 'ssl'
define('SMTP_AUTH', true);

// SMTP Authentication
define('SMTP_USERNAME', 'your-email@gmail.com'); // Your email address
define('SMTP_PASSWORD', 'your-app-password'); // Your email password or app-specific password

// Email Settings
define('FROM_EMAIL', 'your-email@gmail.com'); // Sender email
define('FROM_NAME', "Camp Traveler's Nest");
define('REPLY_TO_EMAIL', 'mapl.arbdeepm42@gmail.com');

// Recipient
define('TO_EMAIL', 'mapl.arbdeepm42@gmail.com'); // Where booking requests should be sent

// Alternative: Use PHP mail() function instead of SMTP
define('USE_PHP_MAIL', true); // Set to true to use PHP's mail() instead of SMTP
