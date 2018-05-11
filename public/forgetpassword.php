<?php
use classes\business\UserManager;
use classes\business\Validation;
require_once "phpmailer/PHPMailerAutoload.php";
require_once 'includes/autoload.php';
include 'includes/header.php';
$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();
if(isset($_POST["submitted"])){
    $email=$_POST["email"];
	$UM=new UserManager();
	$existuser=$UM->getUserByEmail($email);
	if(isset($existuser)){
			//generate new password
			$newpassword=$UM->randomPassword(8,1,"lower_case,upper_case,numbers");
			//update database with new password
			$hashedpwd = md5($newpassword[0]);

			$UM->updatePassword($email,$hashedpwd);  
			//$formerror="Valid email user. password: ".$newpassword[0];
			//coding for sending email
			// do work here
			$mail = new PHPMailer(true);
			try {
			    //Server settings
			    // $mail->SMTPDebug = 3;                                 // Enable verbose debug output
			    $mail->isSMTP();                                      // Set mailer to use SMTP
			    $mail->Host = 'in-v3.mailjet.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth = true;                               // Enable SMTP authentication
			    $mail->Username = '5c618951f7a3019d474f7e6fe4ec20ea';                 // SMTP username
			    $mail->Password = '8f623b35fb28dcaaff9ea2711ea53930';                           // SMTP password
			    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			    $mail->Port = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom('jordantaiofficial@gmail.com', 'Jordan ABC JOBS');
			    $mail->addAddress('fuzzehbearr@live.com', 'Joe User');     // Add a recipient
			    // $mail->addAddress('ellen@example.com');               // Name is optional
			    $mail->addReplyTo('jordantaiofficial@gmail.com', 'Information');
			    // $mail->addCC('cc@example.com');
			    // $mail->addBCC('bcc@example.com');

			    //Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    //Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'ABCD Jobs';
			    $mail->Body    = '<p><b> This is your new password </b></p>'.$newpassword[0];
			    $mail->AltBody = 'This is the body in plain texttttt for non-HTML mail clientssssss';

			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
			}
	}else{
			$formerror="Invalid email user";
	}
}

?>

<html>
<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<body>

<h1>Forget Password</h1>
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<table border='0' width="100%">
  <tr>    
    <td>Email</td>
    <td><input type="email" name="email" value="<?=$email?>" pattern=".{1,}" required title="Cannot be empty field" size="30"></td>
	<td><?php echo $error_name?>
  </tr> 
  <tr>
    <td></td>
    <td><br><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    </td>
  </tr>
  <tr><p style="color:red;"> <?php echo $formerror?></p></tr>
</table>
</form>
<?php
include 'includes/footer.php';
?>