<?php
include '../indeks.php';

session_start ();
session_destroy ();
header ("location: /EmployeeMonitor/Home.php");
	
	
?>


