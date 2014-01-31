<?php include '../includes/indeks.php';?>
<html>
<head>
<meta charset="utf-8">
<title>Employee Monitor</title>
<link type="text/css" href="../assets/css/UpdateEmployee.css" rel="stylesheet"/>
<link type="text/css" href="../assets/css/administration.css" rel="stylesheet"/>
</head>
<body>


<div class="header">
    <ul>

        <li><a href="UpdateEmployee.php">Personal information</a></li>
        <li><a href="Time.php">Working time review</a></li>
        <li><a href="../includes/functions/logout.php">Log out</a></li>

    </ul>
</div>


<?php 

session_start();
$curUsername = $_SESSION['Username'];
$query = "SELECT * FROM employees WHERE Username = '$curUsername'";
$result = mysql_query($query) or die (mysql_error());
$row = mysql_fetch_array ( $result );
$currEmpId=$row['EmployeeID'];
$query=("SELECT * FROM employeerooms WHERE EmployeeID = '$currEmpId'");

$raw_results = mysql_query($query);

if(mysql_num_rows($raw_results) > 0)
{
	$output="";
	echo "<table class='Table' border='1px'>";

	echo "<tr bgcolor='#CAEDF7'>";
	echo "<td>" . "Time" . "</td>";
	echo "<td>" . "Status" . "</td>";
	echo "<td>" . "Room" . "</td>";
	echo "</tr>";

	while($results = mysql_fetch_array($raw_results))

	{
		{
			echo "<tr>";
			echo "<td>" .htmlspecialchars($results['LogTime'] ). "</td>";
			echo "<td>" .htmlspecialchars($results['LoggedIn'] ). "</td>";
			echo "<td>" .htmlspecialchars($results['RoomID'] ). "</td>";
			echo "</tr>";
		}
	}
	echo "</table> ";
}



?>


</body>
</html>
