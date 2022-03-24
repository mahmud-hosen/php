<?php

$to_email = "mahmudhossain582@gmail.com";
$subject = "Mail Test";
$body = "Hi, My name is mahmud. I live in dhaka .";
$headers = "From: mahmudhossain580@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>