<?php

require_once('src/facebook.php');
require_once('database_connect.php');
//script to calculate if checkins met users desired amount

$facebook = new Facebook(array(
  'appId'  => '515352681892554',
  'secret' => '3cb71a16143b35761b74092cf3aaebd4',
));

$curUser = $facebook->getUser();


//set login credentials
//$me = $facebook->api('/me');
//print_r($me);
$sql = "SELECT lat FROM users WHERE fbuser = '$curUser'";
$result = mysql_query($sql);
$sql = "SELECT lat FROM users WHERE fbuser = '$curUser'";
$long = mysql_query($sql);
$goal = "SELECT timesweek FROM users WHERE fbuser = '$curUser'";
$goals = mysql_query($goal);

$times = mysql_fetch_row($goals);
$row = mysql_fetch_row($result);
$int = mysql_fetch_row($long);
$count = 0;

$val = ($row[0]);
$weekgoal = $times[0];
$longval = round($int[0], 4);


$val = ($row[0]);
$latval = round($val, 4);


$checkin = $facebook->api('me/checkins');

foreach($checkin['data'] as $x)
{
	if (round($x['place']['location']['latitude'], 4) == $latval && round($x['place']['location']['longitude'],4) == $longval)
	{
		$count++;
	}
}

if ($count !=$weekgoal)
{
	$pageId = $curUser;
	$accessToken = $facebook->getAccessToken();
 	$message = "I didnt go to the gym!";

 	$post = array(
 		'access_token' => $accessToken, 
 		'message' => $message,
 		'name' => 'name',
 		'description'=> 'description',
 		'picture' => 'https://www.google.com/search?q=image+url&rlz=1C1ARAB_enUS495US495&um=1&ie=UTF-8&hl=en&tbm=isch&source=og&sa=N&tab=wi&authuser=0&ei=Upg9Uo3XOoiy2wXb_oCoDA#authuser=0&hl=en&q=couch+potato&tbm=isch&um=1&facrc=_&imgdii=_&imgrc=PfjLwNMnuaKdvM%3A%3BBM_NdbXS-sSHrM%3Bhttp%253A%252F%252Fwww.redfm.ie%252Fwp-content%252Fuploads%252F2013%252F08%252Fcouchpotato.gif%3Bhttp%253A%252F%252Fwww.redfm.ie%252Fnews%252Fcouch-potato-lifestyle-is-a-real-pain-in-the-neck%252F%3B428%3B360',
 		'caption' =>'posted by the fitness app');

 
 	$response = $facebook->api('me/feed', 'POST', $post);
 	print_r($response);




}



//print_r($data);






?>
