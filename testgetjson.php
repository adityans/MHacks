<?php

echo "You have logged in <br />";





$code;

if(isset($_GET['code']))
{
	$code = $_GET['code'];
}
else
{
	die ("Code was not found");
}


$url = "https://runkeeper.com/apps/token?code={$code}&grant_type=authorization_code&client_id={aacc1328145f4cccb62ec484e21c4704}&client_secret={05dd269b21fc4554befd1f1892ce2ca4}&redirect_url=https://localhost/MHack/testgetjson.php";


$postfields = array();


$postfields["grant_type"] = "authorization_code";
$postfields["client_id"] = "aacc1328145f4cccb62ec484e21c4704";
$postfields["client_secret"] = "05dd269b21fc4554befd1f1892ce2ca4";
$postfields["redirect_uri"] = "https://localhost/testgetjson.php";

$fields_string = "grant_type=authorization_code&code=$code&".
				"client_id=aacc1328145f4cccb62ec484e21c4704&".
				"client_secret=05dd269b21fc4554befd1f1892ce2ca4&".
				"redirect_uri=https://localhost/testgetjson.php";


urlencode($fields_string);


//url-ify the data for the POST

rtrim($fields_string,'&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST, 5);
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


//execute post
$result = curl_exec($ch);
print_r($result);




/*if(isset($_GET['code']))
{
    $code = $_GET['code'];
}
else
{
    die ("Code was not found");
}

$url = "https://runkeeper.com/apps/token?code=$code&grant_type=authorization_code&client_id=aacc1328145f4cccb62ec484e21c4704&client_secret=05dd269b21fc4554befd1f1892ce2ca4&redirect_url=https://localhost/MHack/testgetjson.php";
$data = "grant_type=authorization_code&code=$code&".
                "client_id=aacc1328145f4cccb62ec484e21c4704&".
                "client_secret=05dd269b21fc4554befd1f1892ce2ca4&".
                "redirect_uri=https://localhost/testgetjson.php";

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => $data,
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);
*/

?>
