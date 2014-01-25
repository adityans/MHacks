<?php
require_once 'src/facebook.php';
require 'database_connect.php';

$facebook = new Facebook(array(
  'appId'  => '515352681892554',
  'secret' => '5ecffc0f15dc16855c133d2c8694cf43',
));



$fbuser = $facebook->getUser();

if(!$fbuser)
{
  die("Profile Dies");
}
else
{
  echo $fbuser;
}

?>



<html>
<head>

 <title> fitness app </title>

<style>.post {
    border: 1px solid #999999;
    font: normal 14px helvetica; color: #444444;  
    margin-left: auto;
    margin-right:auto;
  }
  .header{
    font-family: cursive;
  }
  </style>

</head>

<div> <h1 class = "header"><center> Welcome to fitness app! </center></center></div>

  
<table class = "post" border = "0" cellpadding = "2"
    cell spacing = "5" bgcolor = "#47D1FF">
<th colspan = "2" align  = "center"> Post a Spot </th>
<form name = "fit" method = "post" action = "insert.php">

  <tr><td>whats your Gym?:</td><td> <input type = "text" name = "gym" /> </td></tr>
  <tr><td>how often will you go a week?:</td><td> <input type = "text" value = "1" name = "days" /></td></tr>
  <tr><td>Phone number (optional):</td><td><input type = "text" name = "phone" /></td></tr>

  

  
  

  <tr><td colspan = "2" align = "center" />
  <input type = "submit" value = "submit form" /></td>
</tr></form></table>

</html>




