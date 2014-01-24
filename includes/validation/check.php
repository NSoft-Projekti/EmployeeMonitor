<?php
include("dbConnector.php");
$connector = new DbConnector();

$username = trim(strtolower($_POST['username']));
$username = mysql_escape_string($username);

$query = "SELECT Username FROM employees WHERE Username = '$username' LIMIT 1";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysql_close();