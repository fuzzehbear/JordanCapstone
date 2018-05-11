<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\data\UserManagerDB;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();

if(isset($users)){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/>Below is the list of Developers registered in community portal <br/><br/>
    <table class="pure-table pure-table-bordered" width="800" align="center">
            <tr>
			<thead>
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
			   <th><b>Operation</b></th>
			   </thead>
            </tr>   

    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
               <td><?=$user->id?></td>
               <td><?=$user->firstName?></td>
               <td><?=$user->lastName?></td>
               <td><?=$user->email?></td>
			   <td>
					<a href='editusersprofile.php?id=<?php echo $user->id ?>'>Edit</a>
          <a href='deleteuser.php?id=<?php echo $user->id ?>'>Delete</a>
			   </td>
            </tr>
            <?php 
        }
    }
    ?>
    </table><br/><br/>
    <?php 
}
?>

<
<form name="search" method="post" class="pure-table pure-table-bordered" width="800" align="center">
  Search: <input name="search" type="search" autofocus>
  <input type="submit" name="button">
</form>


<!--
<table class="pure-table pure-table-bordered" width="800" align="center">
  <tr><td><b>First Name &nbsp; </td><td></td><td><b>&nbsp; Last Name</td></tr>
-->




<?php

$search = ''; //Search input from 

if(isset($_POST['button'])){    //trigger button click
  $search=$_POST['search'];
  echo $search;
  $UM2 = new UserManager();
  $result2 = $UM2 -> searchUser($search);
  print "John Lee john@hotmail.com";
  
/*
  foreach ($users as $use) {
        if($use!=null){
          print "$use->firstName \t $use->lastName \t $use->email <br>";
    }
}*/
}


?>
</table>
<br><br>


<?php
include '../../includes/footer.php';
?>