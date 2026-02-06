<?php
/**
 * Booking Form Processor
 * Handles booking form submissions from the modal
 */

// Include configuration
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/email-config.php';

// Set JSON response header
header('Content-Type: application/json');

// Initialize response
$response = [
    'success' => false,
    'message' => ''
];

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method.';
    echo json_encode($response);
    exit;
}

// Sanitize and validate form data
$fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$guests = filter_input(INPUT_POST, 'guests', FILTER_SANITIZE_NUMBER_INT);
$bookingDate = filter_input(INPUT_POST, 'bookingDate', FILTER_SANITIZE_STRING);
$checkoutDate = filter_input(INPUT_POST, 'checkoutDate', FILTER_SANITIZE_STRING);
$accommodationType = filter_input(INPUT_POST, 'accommodationType', FILTER_SANITIZE_STRING);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Validate required fields
if (empty($fullName) || empty($email) || empty($phone) || empty($bookingDate) || empty($checkoutDate) || empty($accommodationType)) {
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

// Prepare email content
$accommodationName = 'Delux Tent';
$emailSubject = "Booking Inquiry from $fullName";

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
            <h2>New Booking Inquiry</h2>
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
                <span class='label'>Number of Guests:</span> " . ($guests ?: 'Not specified') . "
            </div>
            <div class='field'>
                <span class='label'>Check-in Date:</span> $bookingDate
            </div>
            <div class='field'>
                <span class='label'>Check-out Date:</span> $checkoutDate
            </div>
            <div class='field'>
                <span class='label'>Accommodation Type:</span> $accommodationName
            </div>
            <div class='field'>
                <span class='label'>Special Message:</span><br>
                " . ($message ? nl2br(htmlspecialchars($message)) : 'No special message') . "
            </div>
        </div>
        <div class='footer'>
            <p>This email was sent from the Camp Traveler's Nest booking form.</p>
        </div>
    </div>
</body>
</html>
";

// Plain text version for email clients that don't support HTML
$emailBodyPlain = "
New Booking Inquiry

Full Name: $fullName
Email: $email
Phone: $phone
Number of Guests: " . ($guests ?: 'Not specified') . "
Check-in Date: $bookingDate
Check-out Date: $checkoutDate
Accommodation Type: $accommodationName
Special Message: " . ($message ?: 'No special message') . "

---
This email was sent from the Camp Traveler's Nest booking form.
";

// Send email using PHP's mail() function or PHPMailer
if (USE_PHP_MAIL) {
    // Using PHP's built-in mail() function
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . FROM_EMAIL . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    if (mail(TO_EMAIL, $emailSubject, $emailBody, $headers)) {
        $response['success'] = true;
        $response['message'] = 'Your booking request has been sent successfully! We will contact you within 24 hours.';
    } else {
        $response['message'] = 'Failed to send email. Please try again or contact us directly.';
    }
} else {
    // Using PHPMailer (requires composer install phpmailer/phpmailer)
    // Uncomment the following code if you want to use PHPMailer
    /*
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USERNAME;
        $mail->Password   = SMTP_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = SMTP_PORT;

        // Recipients
        $mail->setFrom(FROM_EMAIL, SITE_NAME);
        $mail->addAddress(TO_EMAIL);
        $mail->addReplyTo($email, $fullName);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $emailSubject;
        $mail->Body    = $emailBody;
        $mail->AltBody = $emailBodyPlain;

        $mail->send();
        
        $response['success'] = true;
        $response['message'] = 'Your booking request has been sent successfully! We will contact you within 24 hours.';
    } catch (Exception $e) {
        $response['message'] = "Failed to send email. Error: {$mail->ErrorInfo}";
    }
    */
    
    // If PHPMailer is not installed, fall back to mail()
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . FROM_EMAIL . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    if (mail(TO_EMAIL, $emailSubject, $emailBody, $headers)) {
        $response['success'] = true;
        $response['message'] = 'Your booking request has been sent successfully! We will contact you within 24 hours.';
    } else {
        $response['message'] = 'Failed to send email. Please try again or contact us directly.';
    }
}

echo json_encode($response);
