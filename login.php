
<html>
<head></head>
<body>

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
  'secret' => '5ecffc0f15dc16855c133d2c8694cf43',
));




//$result = mysql_query($sql);


  $params = array(
  'scope' => 'read_stream, friends_likes, user_checkins, publish_actions',
  'redirect_uri' => 'http://localhost/MHacks/profile.html'
  );




//set login credentials
$loginUrl = $facebook->getLoginUrl($params);

echo "<a href=$loginUrl> LOGIN WITH FACEBOOK </a>";

print_r($facebook->getUser());













?>


