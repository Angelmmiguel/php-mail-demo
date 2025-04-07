<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

echo "<p>Trying to send demo email...</p>";

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mailpit';                              // Mailpit host
    $mail->Port       = 1025;                                   // Mailpit port
    $mail->SMTPAuth   = false;                                  // No authentication needed for Mailpit

    $mail->Debugoutput = function($str, $level) { echo '<p>debug level ' . $level . '; message: ' . $str . "</p>"; };

    // Recipients
    $mail->setFrom('from@example.com', 'Sender Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');     // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is a test email sent using <b>PHPMailer</b> through Mailpit.';
    $mail->AltBody = 'This is a test email sent using PHPMailer through Mailpit.';

    $mail->send();
    echo "<p>Message has been sent successfully</p>";
} catch (Exception $e) {
    echo "<p>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
} 