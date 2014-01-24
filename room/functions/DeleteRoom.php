<?php
include_once '../../includes/indeks.php';

$room_id=$_GET['r_id'];

$sql="DELETE FROM rooms WHERE roomID='$room_id'";
$result=mysql_query($sql);

if ($result)
{
	header("Location: ../Search.php");
	//echo "Deleted Successfully";
	//echo "<br>";
	//echo "<a href='Search.php'> Back to search page</a>";
}
else
{
	echo "ERROR!";
	// close connection
	mysql_close();
}
?>