<?php

    require 'phpmailer/PHPMailerAutoload.php';

    //variables

    $senderUserName = 'UserMailId@gmail.com';
    $senderName = 'UserName';
    $senderPassword = 'UserPassword';

    $recieverID = 'reciever@gmail.com';

    $mail = new PHPMailer;
    $mail->isSMTP(); //disable line in case of live hosting server

    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';

    //assign username and password of the sender
    $mail->Username= $senderUserName;
    $mail->Password= $senderPassword;

    $mail->setFrom($senderUserName, $senderName);

    $mail->addAddress($recieverID); //target email id

    $mail->addReplyTo($senderUserName);

    $mail->isHTML(true);
    $mail->Subject='Subject of the Email';
    $mail->Body='<center><h1>Hello</h1><br><h3>This is a test mail</h3></center>';
    
    if(!$mail->send()){
        echo "Mail could not be sent!";
    }
    else {
        echo "Mail has been sent!";
    }
?>