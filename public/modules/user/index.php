<?php
require 'PHPMailerAutoload.php';

ob_start();
include '../../includes/header.php';
 
        $mysql_hostname = '';
        $mysql_username = '';
        $mysql_password = '';
        $mysql_dbname = '';
        
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/
 
        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        /*** preparing the select statement ***/
         $stmt = $dbh->prepare("SELECT id, firstname, lastname, email FROM tb_user WHERE sub_status='SUBSCRIBED' LIMIT 6");
 
        /*** executing my prepared statement ***/
        $stmt->execute();
 
        while($row = $stmt->fetch()) {
            //$id = $row['id'];
            $name = $row['firstname'];
            $email = $row['email'];
            $promoCode = $row['lastname'];
            //call send email function
            sendEmail($email, $name, $promoCode);
        }
         
    function sendEmail($email, $name, $promoCode){
 
        $mail = new PHPMailer;
 
        $htmlversion=htmlspecialchars($_POST['messagecontent']);
        $textVersion="Hi ".$name.",.\r\n This is your promo code:  ".$promoCode."text Version";
        $mail->isSMTP();                                             // Set mailer to use SMTP
        $mail->Host = 'in-v3.mailjet.com';                                  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                // Enable SMTP authentication
        $mail->Username = '5c618951f7a3019d474f7e6fe4ec20ea';                    // SMTP username
        $mail->Password = '8f623b35fb28dcaaff9ea2711ea53930';                      // SMTP password
        $mail->Port = 587;                                   // TCP port to connect to
        $mail->setFrom('', 'Test Email');
        $mail->addAddress($email);               // Name is optional
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Test Email Subject';
        $mail->Body    = $htmlversion;
        $mail->AltBody = $textVersion;
 
    if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent to User name : '.$name.' Email:  '.$email.'<br><br>';
    }
}


include '../../includes/footer.php';

?>