<?php
// Get the PHP helper library from twilio.com/docs/php/install
require_once('/path/to/twilio-php/Services/Twilio.php'); // Loads the library
 
// Your Account Sid and Auth Token from twilio.com/user/account
$sid = "ACf3dbda4ec2c32335fcf5d71f821abfeb"; 
$token = "{{ 257bb8ae333156a4fc2c2702a5737c33 }}"; 
$client = new Services_Twilio($sid, $token);
 
// Get an object from its sid. If you do not have a sid,
// check out the list resource examples on this page
$queue = $client->account->queues->get("QU32a3c49700934481addd5ce1659f04d2");
$queue->update(array(
        "MaxSize" => "123"
    ));
echo $queue->average_wait_time;


?>
