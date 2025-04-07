<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mailpit';                              // Mailpit host
    $mail->Port       = 1025;                                   // Mailpit port
    $mail->SMTPAuth   = false;                                  // No authentication needed for Mailpit

    // Recipients
    $mail->setFrom('from@example.com', 'Sender Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');     // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is a test email sent using <b>PHPMailer</b> through Mailpit.';
    $mail->AltBody = 'This is a test email sent using PHPMailer through Mailpit.';

    $mail->send();
    echo "Message has been sent successfully\n";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}\n";
} 