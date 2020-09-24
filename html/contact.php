<?php
    $api_key = "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";

require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$emailer = $_POST['email'];
$subject = $_POST['subject'];
$body = $_POST['body'];
$message = "From: $emailer\n" . "Message: $message";


$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("keithritterportfolio@gmail.com", "Portfolio Inquiry");
$email->setSubject($subject);
$email->addTo("keithritterportfolio@gmail.com", "Portfolio Inquiry");
$email->addContent("text/plain", $message);
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid($_ENV["SENDGRID_API_KEY"]);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>