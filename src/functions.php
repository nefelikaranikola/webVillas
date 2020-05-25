<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function sendCodeViaEmail($email, $username, $activation_code) {
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/SMTP.php';
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'host4.fastpath.gr';
        $mail->SMTPAuth = true;
        $mail->Username = 'info@webvillas.ml';
        $mail->Password = 'Webvillas@@2020!';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('info@webvillas.ml', 'webVillas');
        $mail->addAddress($email, $username);
        $mail->addBCC('nefikaranikola@gmail.com');

        //Content
        $mail->isHTML(true);
        $mail->Subject = "$username please activate your webVillas account";
        $mail->Body = '<strong>Your account has been created successfully!</strong><br><br>Click on the link below to activate your account<br><br>http://localhost/activation.php?email='.$email.'&activation_code='.$activation_code;

        $mail->send();
        header('Location: ../login.php?success=Check your email to activate your account');
        exit();
    } catch (Exception $e) {
        header('Location: ../login.php?error='.$e->errorMessage());
        exit();
    }
}
