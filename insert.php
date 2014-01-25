<?php

require 'database_connect.php';
require_once 'src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '515352681892554',
  'secret' => '5ecffc0f15dc16855c133d2c8694cf43',
));






$fbuser = $facebook->getUser();

if(!$fbuser)
{
	die("Insert Dies");
}



if (isset($_POST['gym']))
	$gym = $_POST['gym'];
if (isset($_POST['days']))
	$days = $_POST['days'];
if (isset($_POST['phone']))
	$phone = $_POST['phone'];


$result = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=" . urlencode($gym));

$geocodedinfo = json_decode($result,true);
$lat = $geocodedinfo['results'][0]['geometry']['location']['lat'];
$long = $geocodedinfo['results'][0]['geometry']['location']['lng'];



$sql = "INSERT INTO `users`(`fbuser`, `gym`, `timesweek`, `PhoneNum`, `lat`, `long`) VALUES ('$fbuser','$gym','$days','$phone','$lat','$long')";


$result = mysql_query($sql, $db_server);

if (!$result) die ("fatal error/ access to db denied");

header('Location: checkin.php');



?>
