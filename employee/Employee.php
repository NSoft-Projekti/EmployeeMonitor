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
<body onload="bla()">
<div class="container">
	<div class="header">
		
<ul>

<li><a href="UpdateEmployee.php">Personal information</a></li>
<li><a href="#pregled_vremena">Working time review</a></li>
<li><a href="../includes/functions/logout.php">Log out</a></li>

</ul>
		
	</div>
	<div class="registracija">
	</div>


<div id="rooms" class="rooms">
    <h1>Please, choose room!</h1>

    <form action="Employee.php" method="post">
        <div class="regrm">

            Select room:  <select name="room" class="textfields" id="room">
                <option id="0">--Select--</option>

                <?php
                $getAllRooms = mysql_query("SELECT * FROM rooms;");
                while($viewAllRooms=mysql_fetch_array($getAllRooms)){
                    echo "<option value=".$viewAllRooms['RoomID'].">".$viewAllRooms['Name']."</option>";
                }
                ?>
            </select>
            <input type="submit" name="Search_rm" />
        </div>
    </form>

    <?php
    include_once ('../includes/indeks.php');

    $query_room = $_POST['room'];


    $query_room = htmlspecialchars($query_room);
    $query_room = mysql_real_escape_string($query_room);

    $raw_results = mysql_query("SELECT * FROM rooms WHERE RoomID = '$query_room' ") or die(mysql_error());

    ?>
</div>
<script>
    function bla(){$('#rooms').bPopup();}
</script>
 </div>
</body>
</html>