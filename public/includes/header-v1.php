<!-- Navigation Bar -->
<?php

$path = "/students/m1/run8/jtrajandran/phpcrudsample/";
$path2 = "/projects.lithan.com/students/m1/run8/jtrajandran/phpcrudsample/";

include 'security.php';

   if(isset($_SESSION["role"]))
   {
      if($_SESSION["role"]=="admin")
      {
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src= "<?=$path2;?>public/images/logo.png" align="left" style="width:55px; height:35px">
  <a href="<?=$path;?>public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="<?=$path;?>public/modules/user/updateprofile.php" class="w3-bar-item w3-button w3-mobile">Update Profile</a>
  <a href="<?=$path;?>public/modules/user/userlistadmin.php" class="w3-bar-item w3-button w3-mobile">Manage Users</a>
  <a href="<?=$path;?>public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="<?=$path;?>public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
</div>
<?php 
   } else
   {
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src="http://phpcrudsample/public/images/logo.png" align="left" style="width:55px; height:35px">
  <a href="/students/m1/run8/jtrajandran/phpcrudsample/public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="/students/m1/run8/jtrajandran/phpcrudsample/public/modules/user/updateprofile.php" class="w3-bar-item w3-button w3-mobile">Update Profile</a>
  <a href="/students/m1/run8/jtrajandran/phpcrudsample/public/modules/user/userlist.php" class="w3-bar-item w3-button w3-mobile">View Users</a>
  <a href="/students/m1/run8/jtrajandran/phpcrudsample/public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="/students/m1/run8/jtrajandran/phpcrudsample/public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
</div>
<?php 
  }
   } else
   {
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-black w3-large">
  <img src="<?=$path2;?>public/images/logo.png" align="left" style="width:55px; height:35px">
  <a href="<?=$path;?>public/home.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>Home</a>
  <a href="<?=$path;?>public/aboutus.php" class="w3-bar-item w3-button w3-mobile"><i class="fa fa-bed w3-margin-right"></i>About Us</a>
  <!--<a href="<?=$path;?>public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>-->
  <a href="/students/m1/run8/jtrajandran/phpcrudsample/public/contactus.php" class="w3-bar-item w3-button w3-mobile">Contact</a>
  <a href="<?=$path;?>public/login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Login</a>
</div>
<?php 
   } 
?>