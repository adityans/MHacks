<?php 
require_once 'login-control.php';


$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if ($db_server)
{
		mysql_select_db($db_database)
		or die ("Unable to conenct to database : critical error");
}
else
{
	die("unable to connect to mySQL");
}
?>
