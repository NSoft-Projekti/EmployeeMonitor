
<style>

    .Table
    {
        /*border: 1px solid #BBBBBB;*/
        border:none;
        /*border-collapse: collapse;*/
        padding: 5px;

    }

    .Table th
    {

        background-color:red;
        padding: 8px 12px;
        font-family:Arial;
        font-size:11px;
        margin-top:20px;
    }

    .Table td
    {

        padding: 0 5px;
        /*border-right: 1px solid #BBBBBB;*/
        height: 30px;

    }
    .Table .input {
        /*border: 1px solid #BBBBBB;*/
        background:blue;
        width: 215px;
        height: 20px;
    }




</style>

<?php require_once '../includes/indeks.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Employee Monitor</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" href="../assets/css/administration.css" rel="stylesheet"/>

</head>
<body>
<div class="container">

    <div class="header">

        <ul>
            <li><a href="#">Employees</a>
                <ul>
                    <li><a href="Registration.php">Register employee</a></li>
                </ul>
                <ul>
                    <li><a href="Search.php">Search employees</a></li>
                </ul>
            </li>
            <li><a href="#">Rooms</a>
                <ul>
                    <li><a href="../room/Add.php">Add new room</a></li>
                </ul>
                <ul>
                    <li><a href="../room/Search.php">Room list</a></li>
                </ul>
            </li>
            <li><a href="../includes/functions/logout.php">Log out</a></li>
        </ul>

    </div>
    <div class="img">
 		<form action="../employee/Search.php" method="post">

			<div class="regrm">
			Position:  <select name="position" class="textfields" id="radno_mjesto">

			<option id="0" value=0>--Select--</option>
			<?php 
				$getAllRadnaMjesta = mysql_query("SELECT * FROM positions;");
				while($viewAllRadnaMjesta=mysql_fetch_array($getAllRadnaMjesta)){
					echo "<option value=".$viewAllRadnaMjesta['PositionID'].">".$viewAllRadnaMjesta['Name']."</option>";
   				}
			?>
			</select>
			</div>
			<input type="text" name="name" placeholder="Username" id="user"/>
			<input type="submit" name="Search" />
		</form> 
	</div>

<?php

$txtName = $_POST['name'];
$pos = $_POST['position'];

//$min_length = 3;
$query="";

if(empty($txtName)==false and empty($pos)==false)
{
	$query="SELECT * FROM employees WHERE (PositionID = '$pos' AND FirstName = '$txtName') ";
}
else if(empty($txtName)==true and empty($pos)==false)
{
	$query="SELECT * FROM employees WHERE PositionID = '$pos'";
}
else if(empty($txtName)==false and empty($pos)==true)
{
	$query="SELECT * FROM employees WHERE FirstName = '$txtName'";
}
else{
	$query="SELECT * FROM employees";
}
$raw_results = mysql_query($query);

 //if(strlen($query) >= $min_length){ 
	 
	$txtIme = htmlspecialchars($txtIme);
	$txtIme = mysql_real_escape_string($txtIme);
	
	if(mysql_num_rows($raw_results) > 0)
	{ 
		$output="";
		echo "<table class='Table' border='1px'>";
		
		echo "<tr bgcolor='6699CC'>";
		echo "<td>" . "Username" . "</td>";
		echo "<td>" . "First name" . "</td>";
		echo "<td>" . "Last name" . "</td>";
		echo "<td>" . "Address" . "</td>";
		echo "<td>" . "Gender" . "</td>";
		echo "<td>" . "E-mail" . "</td>";
		echo "<td>" . "Birthday" . "</td>";
		echo "</tr>";
		
		while($results = mysql_fetch_array($raw_results))
			
		{
		
			{
				  		echo "<form action='functions/deleteEmployeeById.php' method ='GET'>";
				  		
		 		echo "<tr>";
		 		echo "<td>" .htmlspecialchars($results['Username'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['FirstName']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['LastName'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['Address']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['Gender'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['Email']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['Birthday']) . "</td>";
		 		
		echo "<input type='hidden' name='z_id' value=".$results['EmployeeID'].">";
		 		echo "<td><input type='submit' name='submit' value='Delete'></td>"; 
		 		echo "</form>";
		 		
		 		echo "</tr>";
		 
		 	}
		 
		 }
		 echo "</table> ";
	
		
 }
?>		
    

</body>
</html>
