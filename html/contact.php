<?php

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    $email_from = 'Keith Portfolio';
    $email_subject = 'New Message From Portfolio';
    $email_body = "Emailer: $email\n".
                  "Body: $body";

    $to = 'keithritterportfolio@gmail.com';
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $email";

    mail($to,$email_subject,$email_body,$headers);

    header("location: index.html");
?>