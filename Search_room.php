<?php 
include 'indeks.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
	
background-color:#D4ECF7;
padding: 8px 12px;
font-family:Arial;
font-size:11px;
}

.Table td
{

padding: 0 5px;
/*border-right: 1px solid #BBBBBB;*/ 
height: 30px;

}
.Table .input {
/*border: 1px solid #BBBBBB;*/ 
background:#FFFFFF;
width: 215px;
height: 20px;
}
</style>
 
<form action="Search_room.php" method="post">
<div class="regrm">
Select room:  <select name="room" class="textfields" id="room">

<option id="0">--Select--</option>
 
<?php 
	$getAllRooms = mysql_query("SELECT * FROM rooms;");
	while($viewAllRooms=mysql_fetch_array($getAllRooms)){
	echo "<option value=".$viewAllRooms['roomID'].">".$viewAllRooms['title']."</option>";
   }
?>

</select>
<input type="submit" name="Search_rm" />
</div>
</form> 


 
 <?php
include ('indeks.php');

$query_room = $_POST['room'];

 
	$query_room = htmlspecialchars($query_room);
	$query_room = mysql_real_escape_string($query_room);
	



	$raw_results = mysql_query("SELECT * FROM rooms WHERE roomID = '$query_room' ") or die(mysql_error());

	if(mysql_num_rows($raw_results) > 0)
	{ 
		$output="";
		echo "<table class='Table' border='1px'>";
		
		echo "<tr>";
		echo "<td>" . "Title" . "</td>";
		echo "<td>" . "State" . "</td>";
		echo "<td>" . "Limitation" . "</td>";
		echo "<td>" . "Description" . "</td>";
		echo "</tr>";
		
		while($results = mysql_fetch_array($raw_results))
			
		{
		
			{
				  	//	echo "<form action='deleteZaposlenikById.php' method ='GET'>";
				  		
		 		echo "<tr>";
		 		echo "<td>" .htmlspecialchars($results['title'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['state']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['limitation'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['description'] ). "</td>";
		 		
		 		
		//echo "<input type='hidden' name='z_id' value=".$results['prostorijaID'].">";
		 //		echo "<td> <input type='submit' value='Delete'/></td>"; 
		 echo "</form>";
		 		
		 		echo "</tr>";
		 
		 	}
		 
		 }
		 echo "</table> ";
	}

		
 
			?>
			
			</body>
</html>