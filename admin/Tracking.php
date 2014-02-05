<?php include '../includes/indeks.php';?>

    <html>
    <head>
        <meta charset="utf-8">
        <title>Employee Monitor</title>

        <link type="text/css" href="../assets/css/administration.css" rel="stylesheet"/>
        <link type="text/css" href="../assets/css/time.css" rel="stylesheet"/>
    </head>
    <body>

    <div class="container">
        <div class="header">
            <ul>

                <li><a href="UpdateEmployee.php">Personal information</a></li>
                <li><a href="Time.php">Working time review</a></li>
                <li><a href="../includes/functions/logout.php">Log out</a></li>

            </ul>
        </div>
<div class="tracking">
<?php

session_start();

$query = "SELECT * FROM employeemonitor.rooms";
$result = mysql_query($query) or die (mysql_error());

while ($row=mysql_fetch_array($result))
{
	//echo $row['RoomID'];
	echo "<table class='Table'>";
	
	echo "<tr bgcolor='#CAEDF7'>";
	echo "<td>" .htmlspecialchars($row['Name'] )."</td>";
	
	
	$r_query="SELECT * FROM (select * from employeemonitor.employeerooms where RoomID=".$row['RoomID']." and LoggedIn='1' order by LogTime desc ) as emprooms_tmp	group by EmployeeID order by LogTime desc";
	$raw_results = mysql_query($r_query);
	while($res = mysql_fetch_array($raw_results))
	{
		//if($row['RoomID']==$res['RoomID'])
		//{
		$empName = mysql_query("SELECT Username FROM employees WHERE EmployeeID = ".$res['EmployeeID']."");
		$resEmpName = mysql_fetch_array($empName);
			echo "<tr>";
			echo "<td>" .htmlspecialchars($resEmpName['Username']). "</td>";
			echo "<td>" .htmlspecialchars($res['LogTime'] ). "</td>";
			//echo "<td>" .htmlspecialchars($res['LoggedIn'] ). "</td>";
			echo "</tr>";
		//}
	}
	echo "</tr>";
	
	echo "</table> ";
	
$to = 'hary.bb@gmail.com';
$subject = 'test email';
$body = 'body email';

$headers = 'From: nekog <someone@tim9.com>';

/*mail('hary.bb@gmail.com', 'Mercury test mail', 'If you can read this, everything was fine!');

if(mail('hary.bb@gmail.com', 'Mercury test mail', 'If you can read this, everything was fine!')mail($to,$subject,$body,$headers)){
	echo 'poslan mail';
}else{
	echo 'greska :/';

}*/
}
// $row = mysql_fetch_array ( $result );
// $currEmpId=$row['EmployeeID'];
// $query=("SELECT * FROM employeerooms WHERE EmployeeID = '$currEmpId'");

?>

    </div>
    </div>


    </body>
    </html>