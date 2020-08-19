<?php
require './PHPMailer/PHPMailerAutoload.php';

function sendmail($to, $subject, $body) {
    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'minhcuong16299@gmail.com';                 // SMTP username
    $mail->Password = 'pmc0966254870';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    
    $mail->setFrom('minhcuong16299@gmail.com', 'Helmuth Builders');
    $mail->addAddress($to);     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
}