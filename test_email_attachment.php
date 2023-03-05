<?php
include ('config/dbconfig.php');

// Recipient email addresses
$to = 'frogbidofficial@gmail.com';

// Email subject and message body
$subject = 'Test Email Message';
$message = 'This is a test email message';



// Email headers
$headers = "From: mingowhk@gmail.com\r\n";
$headers .= "Reply-To: mingowhk@gmail.com\r\n";
$headers .= "Cc: mingowhk@gmail.com\r\n";
$headers .= "Bcc: mingowhk@gmail.com\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

// Email body
$body = "--boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$body .= $message . "\r\n\r\n";


// Image attachment
$image = 'images/jobs/6 (3).png';

// Attach image
$image_data = file_get_contents($image);
$image_type = mime_content_type($image);
$image_name = basename($image);
$body .= "--boundary\r\n";
$body .= "Content-Type: {$image_type}; name=\"{$image_name}\"\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n";
$body .= "Content-Disposition: attachment; filename=\"{$image_name}\"\r\n\r\n";
$body .= base64_encode($image_data) . "\r\n\r\n";

// Send email to recipients
if(mail($to, $subject, $body, $headers)){
    echo "mail send fuccessfully";
}

?>