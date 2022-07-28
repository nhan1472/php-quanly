<?php
     use PHPMailer\PHPMailer\PHPMailer;

     $mail= new PHPMailer();
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'testemail1472@gmail.com';                     //SMTP username
        $mail->Password   = 'testemail111@';   //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                             //Set email format to HTML  
?>