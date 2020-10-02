<?php

// set location of the file
require "PHPMailerAutoload.php";
// function which will send email
function smtpmailer($to, $from, $from_name, $subject, $body)
{
    $mail = new PHPMailer();
    $mail->SMTPAuth = true;

    // host information can be found under the section of the add devices in Email section
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'host from which you are sending a mail';
    $mail->Port = 465;  // should be checked from the host info
    $mail->Username = $from;
    $mail->Password = 'aogkaryana';

    $mail->isHTML(true);
    $mail->From = $from;
    $mail->FromName = $from_name;
    $mail->Sender = $from;
    $mail->AddReplyTo($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    if (!$mail->Send()) {
        $error = true;
    } else {
        $error = false;
    }
    return $error;
}

$to   = 'the person whom you want to send mail';
$from = 'your email address';
$name = 'Name of Sender';
$subj = 'Subject Of The Mail';
$msg = 'Your Message';

// if there will be an error then it will be $error = false otherwise will be true
$error = smtpmailer($to, $from, $name, $subj, $msg);
?>
