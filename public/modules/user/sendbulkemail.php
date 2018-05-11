<?php

use classes\entity\User;
use classes\data\UserManagerDB;

?>

<link rel="stylesheet">
<h2>Basic HTML Table</h2>

<table style="width:100%, border:1px solid black">
  <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
    <th>Email</th>
    <th>Check the box to send</th>
  </tr>
  <tr>
    <td>Jill</td>
    <td>Smith</td>
    <td>50</td>
    <input type="checkbox" name="">
  </tr>
  <tr>
    <td>Eve</td>
    <td>Jackson</td>
    <td>94</td>
  </tr>
  <tr>
    <td>John</td>
    <td>Doe</td>
    <td>80</td>
  </tr>
</table>