<?php
/**
 * Simple email processing script
 * 
 * This script processes form submissions and sends an email.
 * For demonstration purposes only.
 */

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $name = isset($_POST['name']) ? filter_var($_POST['name'], FILTER_SANITIZE_STRING) : '';
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $phone = isset($_POST['phone']) ? filter_var($_POST['phone'], FILTER_SANITIZE_STRING) : '';
    $subject = isset($_POST['subject']) ? filter_var($_POST['subject'], FILTER_SANITIZE_STRING) : '';
    $message = isset($_POST['message']) ? filter_var($_POST['message'], FILTER_SANITIZE_STRING) : '';
    $newsletter = isset($_POST['newsletter']) ? true : false;
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }
    
    // Prepare email content
    $to = "johndoe@example.com"; // Change to your email address
    $email_subject = "New Contact Form Submission: " . $subject;
    
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Phone: " . $phone . "\n";
    $email_body .= "Subject: " . $subject . "\n";
    $email_body .= "Message: " . $message . "\n";
    $email_body .= "Newsletter: " . ($newsletter ? "Subscribed" : "Not subscribed") . "\n";
    
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    // For demonstration purposes, we'll just log the email
    // In a real application, you would use mail() or a library to send the email
    
    // Uncomment this line to actually send the email
    // mail($to, $email_subject, $email_body, $headers);
    
    // Log the submission (for demonstration)
    error_log("Form submission received from " . $name . " (" . $email . ")");
    
    // The form data will be displayed in display.php
}
?>