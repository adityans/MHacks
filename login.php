<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once 'src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '515352681892554',
  'secret' => '3cb71a16143b35761b74092cf3aaebd4',
));


$curUser = $facebook->getUser();

$sql = "SELECT fbuser FROM users WHERE fbuser = '$curUser'";
$result = mysql_query($sql);

if ($result)
{
 $params = array(
  'scope' => 'read_stream, friends_likes, user_checkins, publish_actions',
  'redirect_uri' => 'http://localhost/MHacks/checkin.php'
);
}
else
{
  $params = array(
  'scope' => 'read_stream, friends_likes, user_checkins, publish_actions',
  'redirect_uri' => 'http://localhost/MHacks/profile.html'
  );
}



//set login credentials
$loginUrl = $facebook->getLoginUrl($params);


        echo '<script type="text/javascript"> 
                window.open("'. $loginUrl .'", "_self"); 
                </script>';
                exit;

?>


