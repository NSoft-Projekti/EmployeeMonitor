<?php
include '../includes/indeks.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Employee Monitor</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../assets/js/jquery.bpopup.js"></script>
<link type="text/css" href="../assets/css/employee.css" rel="stylesheet"/>

<style>

</style>
</head>
<?php 
if(empty($_POST['room']))
{
	echo '<body onload="bla()">';	
}
else 
	echo'<body>';

?>

<div class="container">
	<div class="header">
		
<ul>

<li><a href="UpdateEmployee.php">Personal information</a></li>
<li><a href="Time.php">Working time review</a></li>
<li><a href="../includes/functions/logout.php">Log out</a></li>

</ul>
		
	</div>
	<div class="registracija">
	</div>
		<?php 
		session_start();
		//$_SESSION['currRoom'] = $_POST['room'];
		if(!empty($_POST['room']))
		{
			
    		$currentRoom = $_POST['room'];
    		
    		$currTime = date("Y-m-d H:i:s.u");
    		session_start();
    		$_SESSION['room'] = $currentRoom;
    		$currUsername =  $_SESSION['Username'];
	    	$query = "SELECT * FROM employees WHERE Username = '$currUsername'";
	    	$result = mysql_query($query) or die (mysql_error());
	    	$row = mysql_fetch_array ( $result );
	    	$currEmpId=$row['EmployeeID'];
	    	$isLoggedOutQuerry = "SELECT * FROM employeemonitor.employeerooms where EmployeeID='$currEmpId' ORDER BY LogTime DESC LIMIT 1";
	    	$raw_isLoggedOut = mysql_query($isLoggedOutQuerry);
	    	$isLoggedOut = mysql_fetch_array($raw_isLoggedOut);
	    	
	    	if($isLoggedOut['LoggedIn']==1)
	    	{
	    		$currRoom = $isLoggedOut['RoomID'];
	    		$raw_results = mysql_query("INSERT INTO `employeemonitor`.`employeerooms` (`LogTime`, `LoggedIn`, `EmployeeID`, `RoomID`)
					VALUES('$currTime', '0', '$currEmpId', '$currRoom')") or die (mysql_error());
				
				$raw_results = mysql_query("INSERT INTO `employeemonitor`.`employeerooms` (`LogTime`, `LoggedIn`, `EmployeeID`, `RoomID`)
					VALUES('$currTime', '1', '$currEmpId', '$currentRoom')") or die (mysql_error());
	    	}
	    	else
	    	{
	    	$raw_results = mysql_query("INSERT INTO `employeemonitor`.`employeerooms` (`LogTime`, `LoggedIn`, `EmployeeID`, `RoomID`) 
	    			VALUES('$currTime', '1', '$currEmpId', '$currentRoom')") or die (mysql_error());
	    	}
		die();
		}
		
    ?>
 
	<div id="rooms" class="rooms">
    		<h1>Please, choose room!</h1>

    			<form action="Employee.php" method="POST">
        			<div class="regrm">

            Select room:  <select name="room" class="textfields" id="room">
                <option id="0">--Select--</option>

                <?php 
                $getAllRooms = mysql_query("SELECT * FROM rooms;");
                while($viewAllRooms=mysql_fetch_array($getAllRooms)){
                    echo "<option value=".$viewAllRooms['RoomID'].">".$viewAllRooms['Name']."</option>";
                }?>
                
            </select>
            <input type="submit" name="Enter_rm" value="Enter" />
        			</div>
    			</form>
			</div>
		

		<script>
    		function bla(){$("#rooms").bPopup();}
		</script>
 	</div>
</body>
</html>