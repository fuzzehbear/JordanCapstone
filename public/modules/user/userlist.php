<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();

if(isset($users)){
    ?>
  <link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/><center>Below is the list of Developers registered in community portal</center> <br/><br/>
    <table class="pure-table pure-table-bordered" width="800" align="center">
            <tr>
			<thead>
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
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
            </tr>
            <?php 
        }
    }
    ?>
    </table><br/><br/>
    <?php 
}
?>

<form action="" method="post" class="pure-table pure-table-bordered" width="800" align="center">
  <input name="search" type="search" autofocus><input type="submit" name="button">
</form>

<table class="pure-table pure-table-bordered" width="800" align="center">
  <tr><td><b>First Name &nbsp; </td><td></td><td><b>&nbsp; Last Name</td></tr>




<?php

$con=mysqli_connect('127.0.0.1', 'jtrajandran', 'WyR6f#E','jtrajandran');
//$db=mysqli_select_db('jtrajandran');


if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from tb_user where firstname like '%{$search}%' || lastname like '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['firstname']."</td><td></td><td>".$row['lastname']."</td></tr>";
  }
}else{
    echo "No User Found<br><br>";
  }

// }else{                          //while not in use of search  returns all the values
//   $query=mysql_query("select * from tb_user");

//   while ($row = mysql_fetch_array($query)) {
//     echo "<tr><td>".$row['firstname']."</td><td></td><td>".$row['lastname']."</td></tr>";
//   }
}

mysql_close();
?>
</table>
<br><br>



<?php

include '../../includes/footer.php';
?>