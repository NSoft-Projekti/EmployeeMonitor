<?php
include '../indeks.php';

session_start ();
if(empty($_SESSION['room'])==false)
{
	$currTime = date("Y-m-d H:i:s");
	$currentRoom = $_SESSION['room'];
	$currUsername =  $_SESSION['Username'];
	$query = "SELECT * FROM employees WHERE Username = '$currUsername'";
	$result = mysql_query($query) or die (mysql_error());
	$row = mysql_fetch_array ( $result );
	$currEmpId=$row['EmployeeID'];
	$raw_results = mysql_query("INSERT INTO `employeemonitor`.`employeerooms` (`LogTime`, `LoggedIn`, `EmployeeID`, `RoomID`)
			VALUES('$currTime', '0', '$currEmpId', '$currentRoom')") or die (mysql_error());
}

session_destroy ();
header ("location: /EmployeeMonitor/Home.php");
	
	
?>


