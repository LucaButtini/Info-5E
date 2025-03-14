<?php

// mandiamo una mail con phpusando un package (libreria esterna)
//serve un software, composer.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try{
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com'; //gmail smtp server
    $mail->SMTPAuth=true;
}catch (\Exception $e){
    echo $e->getMessage();
}