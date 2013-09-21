<?php
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
			'http://localhost/MHacks/itstime.mp3' // The URL Twilio will request when the call is answered
		);
		echo 'Started call: ' . $call->sid;
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
