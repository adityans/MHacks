<?php

require_once('src/facebook.php');
require_once('database_connect.php');
//script to calculate if checkins met users desired amount

$facebook = new Facebook(array(
  'appId'  => '515352681892554',
  'secret' => '5ecffc0f15dc16855c133d2c8694cf43',
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
	$accessToken = $facebook->getAccessToken();
 	$message = "I didnt go to the gym!";

 	$post = array(
 		'access_token' => $accessToken, 
 		'message' => $message,
 		'name' => 'get off your lazyass',
 		'description'=> 'description',
 		'picture' => 'http://www.digital-literacies.com/wp-content/uploads/2011/09/couch-potato-cat.jpeg',
 		'caption' =>'posted by the fitness app');

 
 	$response = $facebook->api('me/feed', 'POST', $post);
 	print_r($response);

 	// Include the Twilio PHP library
	require 'Services/Twilio.php';

	// Twilio REST API version
	$version = "2010-04-01";

	// Set our Account SID and AuthToken
	$sid = 'ACf3dbda4ec2c32335fcf5d71f821abfeb';
	$token = '257bb8ae333156a4fc2c2702a5737c33';
	
	// A phone number you have previously validated with Twilio
	$phonenumber = '9785183274';
	
	// Instantiate a new Twilio Rest Client
	$client = new Services_Twilio($sid, $token, $version);

	try {
		// Initiate a new outbound call
		$call = $client->account->calls->create(
			$phonenumber, // The number of the phone initiating the call
			'2484100614', // The number of the phone receiving call
			'https://5563754a.ngrok.com/MHacks/playmp3.php' // The URL Twilio will request when the call is answered
		);
		echo 'Started call: ' . $call->sid;
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}



}



//print_r($data);






?>
