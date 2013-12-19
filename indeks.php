<?php
error_reporting(E_WARNING);

$mysql_host = "10.0.0.250";
$mysql_database = "employeemonitor";
$mysql_user = "root";
$mysql_password = "mojapraksa";


/* Povezivanje na bazu - konekcija. */
$conn = mysql_connect($mysql_host, $mysql_user, $mysql_password);
if (!$conn){
	exit("Povezivnje na bazu nije uspijelo: " . $conn);
}

echo("Povezivanje na bazu je uspijelo.");

/* Odabir baze. */
$res = mysql_select_db($mysql_database);

if (!$res){
	exit("Nije moguæe izabrati bazu");
}
?>
