<?php
/**
 * Booking Form Processor
 * Handles form submission and sends email
 */

// Set response header to JSON
header('Content-Type: application/json');

// Include configuration
require_once 'config/email-config.php';

// Initialize response
$response = [
    'success' => false,
    'message' => ''
];

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method.';
    echo json_encode($response);
    exit;
}

// Sanitize and validate form data
$fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Validate required fields
if (empty($fullName) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
    $response['message'] = 'Please fill in all required fields.';
    echo json_encode($response);
    exit;
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response['message'] = 'Please enter a valid email address.';
    echo json_encode($response);
    exit;
}

// Prepare subject labels
$subjectLabels = [
    'booking' => 'Booking Inquiry',
    'general' => 'General Question',
    'facilities' => 'Facilities Information',
    'feedback' => 'Feedback',
    'other' => 'Other'
];
$subjectLabel = $subjectLabels[$subject] ?? 'Contact Inquiry';

// Prepare email content
$emailSubject = "Contact Form: $subjectLabel from $fullName";

$emailBody = "
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2d5e4e; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #2d5e4e; }
        .footer { background: #eee; padding: 10px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>New Contact Form Message</h2>
        </div>
        <div class='content'>
            <div class='field'>
                <span class='label'>Full Name:</span> $fullName
            </div>
            <div class='field'>
                <span class='label'>Email:</span> $email
            </div>
            <div class='field'>
                <span class='label'>Phone:</span> $phone
            </div>
            <div class='field'>
                <span class='label'>Subject:</span> $subjectLabel
            </div>
            <div class='field'>
                <span class='label'>Message:</span><br>
                " . nl2br(htmlspecialchars($message)) . "
            </div>
        </div>
        <div class='footer'>
            <p>This email was sent from the Camp Traveler's Nest contact form.</p>
        </div>
    </div>
</body>
</html>
";

// Plain text version for email clients that don't support HTML
$emailBodyPlain = "
New Contact Form Message

Full Name: $fullName
Email: $email
Phone: $phone
Subject: $subjectLabel
Message: $message

---
This email was sent from the Camp Traveler's Nest contact form.
";

// Send email using PHP's mail() function or PHPMailer
if (USE_PHP_MAIL) {
    // Using PHP's built-in mail() function
    $headers = "From: " . FROM_EMAIL . "\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    if (mail(TO_EMAIL, $emailSubject, $emailBody, $headers)) {
        $response['success'] = true;
        $response['message'] = 'Your message has been sent successfully! We will get back to you within 24 hours.';
    } else {
        $response['message'] = 'Failed to send email. Please try again or contact us directly.';
    }
} else {
    // Using PHPMailer (requires PHPMailer library)
    // Uncomment and configure this section if using PHPMailer
    /*
    require 'vendor/autoload.php'; // If using Composer
    // OR
    // require 'vendor/phpmailer/phpmailer/src/Exception.php';
    // require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    // require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    $mail = new PHPMailer(true);
    
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = SMTP_AUTH;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Port = SMTP_PORT;
        
        // Recipients
        $mail->setFrom(FROM_EMAIL, FROM_NAME);
        $mail->addAddress(TO_EMAIL);
        $mail->addReplyTo($email, $fullName);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = $emailSubject;
        $mail->Body = $emailBody;
        $mail->AltBody = $emailBodyPlain;
        
        $mail->send();
        
        $response['success'] = true;
        $response['message'] = 'Your message has been sent successfully! We will get back to you within 24 hours.';
    } catch (Exception $e) {
        $response['message'] = "Failed to send email. Error: {$mail->ErrorInfo}";
    }
    */
    
    $response['message'] = 'PHPMailer is not configured. Please update email-config.php and uncomment the PHPMailer code in process-booking.php, or set USE_PHP_MAIL to true.';
}

// Return JSON response
echo json_encode($response);
