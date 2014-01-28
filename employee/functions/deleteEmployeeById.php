<?php
include_once '../../includes/indeks.php';

$zaposlenik_id=$_GET['z_id'];

$sql="DELETE FROM zaposlenici WHERE EmployeeID='$zaposlenik_id'";
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


