<?php

echo "You have logged in";


$code = $_GET['code'];
$ID = 'aacc1328145f4cccb62ec484e21c4704';
$secret = '05dd269b21fc4554befd1f1892ce2ca4';
$uri = 'http://localhost/MHacks/testgetjson.php';



$TokenUrl = 'https://runkeeper.com/apps/token';

$url = $TokenUrl = $TokenUrl . '?grant_type=authorization_code&'.'code=' . urlencode($code) . '&client_id=' . urlencode($ID) . '&client_secret=' . urlencode($secret) . '&redirect_uri=' . urlencode($uri);
echo $url;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
$error = curl_error($ch);


if ($response == null)
{
    echo "null response returned!";
}
else if ($error != '')
{
    echo "Curl error: " . $error;
}
else
{
    print_r($response);
}






?>
