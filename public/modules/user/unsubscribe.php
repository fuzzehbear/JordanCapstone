<?php
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

        $confirmation = htmlspecialchars($_POST['confirmation']);
 
        /*** preparing the select statement ***/
         $stmt = $dbh->prepare("UPDATE tb_user SET sub_status ='UNSUBSCRIBED' WHERE email = '$confirmation';");
 
        /*** executing my prepared statement ***/
        $stmt->execute();

?>

<html>
    
     <center>
        <form method="post" action="unsubscribe.php">
        <label>To confirm unsubscribing from newsletter, please enter your email.</label><br>
        <input type="input" name="confirmation" value="" id="confirm"/><br>
        <input style="margin-top: 1.5em" type="submit" name="submit" value="Unsubscribe"/>
        </form>
    </center>

</html>

<?php
include '../../includes/footer.php';
?>