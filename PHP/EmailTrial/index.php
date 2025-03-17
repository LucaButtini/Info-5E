<?php

// mandiamo una mail con phpusando un package (libreria esterna)
//serve un software, composer.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug=2;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com'; //gmail smtp server
    $mail->SMTPAuth=true;
    $mail->Username='luca.buttini@iisviolamarchesini.edu.it';
    $mail->Password= 'snqo ahiq xxse lrpz';
    $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port=587;
    $mail->setFrom('luca.buttini@iisviolamarchesini.edu.it');
    $mail->addAddress('luca.buttini@iisviolamarchesini.edu.it');
    $mail->Subject='Test email via php mailer';
    $mail->Body='ciao messaggio di prova';
    $mail->CharSet='UTF-8';
    $mail->Encoding='base64';
    $mail->send();
    echo 'Email sent successfuly';
}catch (\Exception $e){
    echo "Error: {$mail->ErrorInfo}";
}