<?php
include("dbConnector.php");
$connector = new DbConnector();

$email = $_POST['email'];


$query = "SELECT email FROM zaposlenici WHERE email = '$email'";
$result = $connector->query($query);
$num = mysql_num_rows($result);

echo $num;
mysql_close();