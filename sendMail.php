<?php

    require 'phpmailer/PHPMailerAutoload.php';

    // TODO :: Verify if the entered emailIDs are valid
    // Make compatible with other mail services too

    $senderUserName = $_GET['userMailId'];
    $senderName = $_GET['UserName'];
    $senderPassword = $_GET['userPassword'];

    $recieverID = $_GET['targetMailId'];
    $MailSubject = $_GET['mail_subject'];
    $MailBody = $_GET['mail_body'];


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

    $mail->isHTML(false);
    $mail->Subject=$MailSubject;
    $mail->Body= $MailBody;
    
    if(!$mail->send()){
        echo "<h3>Mail could not be sent!<h3><h3>Please check the details you entered and try again...<h3> <a href='index.html'>Click here to go back</a>";
    }
    else {
        echo "<h3>Mail has been sent!<h3> <a href='index.html'>Click here to go back</a>";
    }
?>