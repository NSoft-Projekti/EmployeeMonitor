<?php
include 'indeks.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert title here</title>
    <link type="text/css" href="prva_stranica.css" rel="stylesheet"/>

</head>

<body class="prostorija_body">

<div class="prostorija">
    <h1>Please, choose room!</h1>

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

?>
</div>

</body>
</html>