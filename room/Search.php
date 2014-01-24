<style>
    .Table
    {
        border:none;
    }
    .Table th
    {
        background-color:red;
        padding: 5px 9px;
        font-family:Arial;
        font-size:11px;
        margin-top:20px;
        border:none;
    }
    .Table td
    {
        padding: 0 9px;
        height: 30px;
        background-color:#ECF7F9;
        border:none;
    }
</style>
<?php
include_once '../includes/indeks.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Monitor</title>
    <link type="text/css" href="../assets/css/administration.css" rel="stylesheet"/>


</head>
<body>
<div class="container">
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
    <div class="prostorija">

        <form action="Search.php" method="post">
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
        include ('../includes/indeks.php');

        $query_room = $_POST['room'];


        $query_room = htmlspecialchars($query_room);
        $query_room = mysql_real_escape_string($query_room);




        $raw_results = mysql_query("SELECT * FROM rooms WHERE roomID = '$query_room' ") or die(mysql_error());

        //if(mysql_num_rows($raw_results) > 0)
        {
            $output="";
            echo "<table class='Table' border='1px'>";

            echo "<tr>";
            echo "<td>" . "Title" . "</td>";
            echo "<td>" . "State" . "</td>";
            echo "<td>" . "Limitation" . "</td>";
            echo "<td>" . "Description" . "</td>";
            echo "</tr>";

            //while($results = mysql_fetch_array($raw_results))

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

    </div>


</div>
</body>
</html>