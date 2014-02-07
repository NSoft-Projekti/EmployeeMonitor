<?php
error_reporting(E_WARNING);

$mysql_host = "212.39.106.114:13306";
//$mysql_host = "10.0.0.250";
$mysql_database = "employeemonitor";
$mysql_user = "root";
$mysql_password = "mojapraksa";


/* Povezivanje na bazu - konekcija. */
$conn = mysql_connect($mysql_host, $mysql_user, $mysql_password);
if (!$conn){
	exit("Povezivnje na bazu nije uspjelo: " . $conn);
}



/* Odabir baze. */
$res = mysql_select_db($mysql_database);

if (!$res){
	exit("Nije mogu�e izabrati bazu");
}
?>
