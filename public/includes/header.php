<!-- Navigation Bar -->
<?php

$path = "/students/m1/run8/jtrajandran/phpcrudsample/";
$logo = "/students/m1/run8/jtrajandran/phpcrudsample/public/images/";

include 'security.php';




   if(isset($_SESSION["role"]))
   {
      if($_SESSION["role"]=="admin")
      {
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src= "<?=$logo;?>logo.png" align="left" style="width:55px; height:35px">
  <a href="<?=$path;?>public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="<?=$path;?>public/modules/user/updateprofile.php" class="w3-bar-item w3-button w3-mobile">Update Profile</a>
  <a href="<?=$path;?>public/modules/user/userlistadmin.php" class="w3-bar-item w3-button w3-mobile">Manage Users</a>
  <a href="<?=$path;?>public/modules/user/sendbulkmail.php" class="w3-bar-item w3-button w3-mobile">Send Mail</a>
  <a href="<?=$path;?>public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="<?=$path;?>public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
</div>
<?php 
   } else
   {
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src= "<?=$logo;?>logo.png" align="left" style="width:55px; height:35px">
  <a href="<?=$path;?>public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="<?=$path;?>public/modules/user/updateprofile.php" class="w3-bar-item w3-button w3-mobile">Update Profile</a>
  <a href="<?=$path;?>public/modules/user/userlist.php" class="w3-bar-item w3-button w3-mobile">View Users</a>
  <a href="<?=$path;?>public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="<?=$path;?>public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
</div>
<?php 
  }
   } else
   {
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src="<?=$logo;?>logo.png" align="left" style="width:55px; height:35px">
  <a href="<?=$path;?>public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="<?=$path;?>public/aboutus.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>About Us</a>
  <a href="<?=$path;?>public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="<?=$path;?>public/login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Login</a>
</div>
<?php 
   } 
?>