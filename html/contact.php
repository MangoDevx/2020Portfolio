<?php

require 'vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("keithritterportfolio@gmail.com", "Portfolio Inquiry");
$email->setSubject("subject");
$email->addTo("keithritterportfolio@gmail.com", "Portfolio Inquiry");
$email->addContent("text/plain", "Test works");

$sendgrid = new \SendGrid($_ENV["sendgrid"]);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>