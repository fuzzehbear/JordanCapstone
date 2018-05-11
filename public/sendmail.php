<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer;
// use PHPMailer\Exception;
require_once ('PHPMailer\PHPMailerAutoload.php');

//Load Composer's autoloader
// require 'vendor/autoload.php';

$newpassword=$UM->randomPassword(8,1,"lower_case,upper_case,numbers");
//update database with new password
$UM->updatePassword($email,$newpassword[0]);  
//$formerror="Valid email user. password: ".$newpassword[0];

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'in-v3.mailjet.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'NO';                 // SMTP username
    $mail->Password = 'NO';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('');
    $mail->addAddress('', '');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('', '');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'ABCD Jobs';
    $mail->Body    = 'This is the HTML message body <b>in bolddddd!</b>'.$newpassword[0];
    $mail->AltBody = 'This is the body in plain texttttt for non-HTML mail clientssssss';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>