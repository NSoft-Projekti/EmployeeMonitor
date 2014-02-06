<?php include_once '../includes/indeks.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
 <link type="text/css" href="../assets/css/registration.css" rel="stylesheet"/>
 <style>
.Table
        {
            border:none;
            padding: 5px;
            font-family:Calibri;
            font-size:14px;
        }

        .Table th
        {

            background-color:#B2CAF4;
            padding: 8px 12px;
            font-size:14px;
            border:none;


        }

        .Table td /*citava tablica*/
        {

            padding: 0 9px;
            height:40px;
            width:100px;
            background-color:#F0F4FD;
            border:none;



        }

</style>
</head>
<body> 
<div class="container" >
    <div class="header">
        <ul>


                    <li><a href="#">Employees</a>
                        <ul>
                            <li><a href="../employee/Registration.php">Register employee</a></li>
                        </ul>
                        <ul>
                            <li><a href="../employee/Search.php">Search employees</a></li>
                        </ul>
                        <ul>
                            <li><a href="Tracking.php">Tracking employees</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Rooms</a>
                        <ul>
                            <li><a href="Add.php">Add new room</a></li>
                        </ul>
                        <ul>
                            <li><a href="Search.php">Room list</a></li>
                        </ul>
                    </li>
                    <li><a href="../includes/functions/logout.php">Log out</a></li>
                </ul>
    </div>


<form action="" method="post">
<div class="regrm">
<select name="room" class="textfields" id="room">

<option id="0">Select room</option>
 
<?php 
        $getAllRooms = mysql_query("SELECT * FROM rooms;");
        while($viewAllRooms=mysql_fetch_array($getAllRooms)){
        echo "<option value=".$viewAllRooms['RoomID'].">".$viewAllRooms['Name']."</option>";
   }
?>

</select>
<input type="submit" name="Search_rm" value="Send"/>
</div>
</form> 


 
 <?php
include_once ('../includes/indeks.php');

$query_room = $_POST['room'];

 
        $query_room = htmlspecialchars($query_room);
        $query_room = mysql_real_escape_string($query_room);
        
        
                
    
    if(empty($query_room)==false)
    {
            $query=("SELECT * FROM rooms WHERE RoomID = '$query_room' ");
    }
     else
    {
            $query="SELECT * FROM rooms";
    }
    
    $raw_results = mysql_query($query);
    
        if(mysql_num_rows($raw_results) > 0)
        { 
                $output="";
                echo "<table class='Table' border='1px'>";

                echo "<tr bgcolor='#CAEDF7'>";
                echo "<th>" . "Name" . "</th>";
                echo "<th>" . "Limit" . "</th>";
                echo "<th>" . "Description" . "</th>";
                echo "</tr>";
                
                while($results = mysql_fetch_array($raw_results))
                        
                {
                
                        {
                                 echo "<form action='functions/DeleteRoom.php' method ='GET'>";
                                                  
                                 echo "<tr>";
                                 echo "<td>" .htmlspecialchars($results['Name'] ). "</td>";
                                 echo "<td>" .htmlspecialchars($results['Limit'] ). "</td>";
                                 echo "<td>" .htmlspecialchars($results['Description'] ). "</td>";
                                 
                                 
                echo "<input type='hidden' name='r_id' value=".$results['RoomID'].">";
                echo "<td> <input type='submit' value='Delete' id='del'/></td>";
                 echo "</form>";
                 
                 echo "<form action='Update.php' method='GET'>"; 
                 echo "<input type='hidden' name='r_id' value=".$results['RoomID'].">";
                 echo "<td> <input type='submit' value='Update' id='upd'/></td>";
                 echo "</form>";
                                 
                                 echo "</tr>";
                 
                         }
                 
                 }
                 echo "</table> ";
        }

                
 
                        ?>
                        
</body>
</html>