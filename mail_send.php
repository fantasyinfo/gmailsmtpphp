<?php
//fantasyinfo.php@gmail.com
//pass =  Azby1928

include 'smtp/PHPMailerAutoload.php';



function sendMail($to, $subject, $msg)
{

    $mail = new PHPMailer();
    $mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->IsHTML(true);
    $mail->addAttachment('sample.pdf');
    $mail->CharSet = 'UTF-8';
    $mail->Username = "fantasyinfo.php@gmail.com";
    $mail->Password = 'Azby1928';
    $mail->SetFrom("EMAIL");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        echo 'Sent';
    }
}