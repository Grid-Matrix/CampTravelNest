<?php
// Load email configuration
require_once __DIR__ . '/config/email-config.php';

// Enable error reporting for debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 0); // Don't display errors to users

// Set JSON response header
header('Content-Type: application/json');

// Response array
$response = [
    'success' => false,
    'message' => ''
];

// Check if request method is POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $response['message'] = "Invalid request method.";
    echo json_encode($response);
    exit;
}

try {
    // Sanitize and validate inputs
    $fullName = filter_var(strip_tags(trim($_POST["fullName"] ?? "")), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"] ?? ""), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(strip_tags(trim($_POST["phone"] ?? "")), FILTER_SANITIZE_STRING);
    $subject = filter_var(strip_tags(trim($_POST["subject"] ?? "")), FILTER_SANITIZE_STRING);
    $message = filter_var(strip_tags(trim($_POST["message"] ?? "")), FILTER_SANITIZE_STRING);

    // Validation checks
    if (empty($fullName) || strlen($fullName) < 3) {
        $response['message'] = "Please enter a valid full name (minimum 3 characters).";
        echo json_encode($response);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = "Please enter a valid email address.";
        echo json_encode($response);
        exit;
    }

    if (empty($phone) || !preg_match('/[0-9+\s\-()]{10,15}/', $phone)) {
        $response['message'] = "Please enter a valid phone number (10-15 digits).";
        echo json_encode($response);
        exit;
    }

    if (empty($subject)) {
        $response['message'] = "Please select a subject.";
        echo json_encode($response);
        exit;
    }

    if (empty($message) || strlen($message) < 10) {
        $response['message'] = "Please enter a message (minimum 10 characters).";
        echo json_encode($response);
        exit;
    }

    // Configure recipient email from config
    $recipient = "malpa.ridershp42@gmail.com";
    
    // Map subject values to readable text
    $subjectMap = [
        'booking' => 'Booking Inquiry',
        'general' => 'General Question',
        'facilities' => 'Facilities Information',
        'feedback' => 'Feedback',
        'other' => 'Other'
    ];
    
    $subjectText = $subjectMap[$subject] ?? 'Contact Form Submission';
    $emailSubject = "Camp Traveler's Nest - " . $subjectText;

    // Create email body
    $email_body = "New Contact Form Submission\n\n";
    $email_body .= "----------------------------------------\n\n";
    $email_body .= "Full Name: " . $fullName . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Phone: " . $phone . "\n";
    $email_body .= "Subject: " . $subjectText . "\n\n";
    $email_body .= "Message:\n" . $message . "\n\n";
    $email_body .= "----------------------------------------\n";
    $email_body .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";

    // Set email headers
    $headers = "From: Camp Traveler's Nest <noreply@camptravelersnest.com>\r\n";
    $headers .= "Reply-To: " . $fullName . " <" . $email . ">\r\n";
    $headers .= "Cc: satyajeet830@gmail.com\r\n"; // Add CC recipient here
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($recipient, $emailSubject, $email_body, $headers)) {
        $response['success'] = true;
        $response['message'] = "Thank you! Your message has been sent successfully. We'll get back to you within 24 hours.";
        
        // Optional: Log successful submissions
        // error_log("Contact form submitted by: " . $email);
    } else {
        $response['message'] = "Sorry, there was an error sending your message. Please try again later or contact us directly.";
        
        // Log the error
        error_log("Failed to send contact form email from: " . $email);
    }

} catch (Exception $e) {
    $response['message'] = "An unexpected error occurred. Please try again later.";
    error_log("Contact form error: " . $e->getMessage());
}

// Return JSON response
echo json_encode($response);
exit;
?>
