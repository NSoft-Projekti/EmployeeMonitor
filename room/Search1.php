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
        }

        .Table th
        {

            background-color:#F0F4FD;
            padding: 8px 12px;
            font-family:Arial;
            font-size:11px;
        }

        .Table td
        {

            padding: 0 9px;
            height:40px;
            width:100px;
            background-color:#F0F4FD;
            border:none;


        }
        .Table .input {
            background:#FFFFFF;
            width: 215px;
            height: 20px;
        }
</style>
</head>
<body> 

<div class="container" margin-top="30px;">
    <div class="header">
        <ul>


                    <li><a href="#">Employees</a>
                        <ul>
                            <li><a href="../employee/Registration.php">Register employee</a></li>
                        </ul>
                        <ul>
                            <li><a href="../employee/Search.php">Search employees</a></li>
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
                echo "<td>" . "Name" . "</td>";
                echo "<td>" . "Limit" . "</td>";
                echo "<td>" . "Description" . "</td>";
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
                echo "<td> <input type='submit' value='Delete'/></td>"; 
                 echo "</form>";
                 
                 echo "<form action='Update.php' method='GET'>";
                 echo "<input type='hidden' name='r_id' value=".$results['RoomID'].">";
                 echo "<td> <input type='submit' value='Update'/></td>";
                 echo "</form>";
                                 
                                 echo "</tr>";
                 
                         }
                 
                 }
                 echo "</table> ";
        }

                
 
                        ?>
                        
</body>
</html>