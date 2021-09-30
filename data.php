<?php


include 'smtp/PHPMailerAutoload.php';

// print_r($_POST);
if (isset($_POST['user_email'])) {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $subject = "An User Submit a Contact Form Now!!";
    $msg = "Name : $name </br> Email : $email";
    sendMail($email, $subject, $msg);
    echo "Your Data is Sumitted Successfully";
} else {
    echo "something went wreong";
}



function sendMail($to, $subject, $msg)
{

    $mail = new PHPMailer();
    // $mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->IsHTML(true);
    //$mail->addAttachment('sample.pdf');
    $mail->CharSet = 'UTF-8';
    $mail->Username = "fantasyinfo.php@gmail.com";
    $mail->Password = 'Azby1928';
    $mail->SetFrom("fantasyinfo.php@gmail.com", "Contact Lead");
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
        // echo 'Sent';
    }
}