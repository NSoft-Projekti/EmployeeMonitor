<!DOCTYPE html>
<?php include_once '../includes/indeks.php';?>
<html>
<head>
<meta charset="utf-8">
<title>Employee Monitor</title>
<link type="text/css" href="../assets/css/addRoom.css" rel="stylesheet" />
<link type="text/css" href="../assets/css/administration.css"
	rel="stylesheet" />
</head>
<body>
	<form action="" method="get">
		<div class="container">

			<div class="header">
				<ul>
					<li><a href="#">Employees</a>
						<ul>
							<li><a href="../employee/Registration.php">Register employee</a></li>
						</ul>
						<ul>
							<li><a href="../employee/Search.php">Search employees</a></li>
						</ul></li>
					<li><a href="#">Rooms</a>
						<ul>
							<li><a href="Add.php">Add new room</a></li>
						</ul>
						<ul>
							<li><a href="Search.php">Room list</a></li>
						</ul></li>
					<li><a href="../includes/functions/logout.php">Log out</a></li>
				</ul>
			</div>
    
    <?php
	
	
    $room_id=$_GET['r_id'];
    $query = "SELECT * FROM `rooms` WHERE RoomID ='$room_id'";
    $result = mysql_query ( $query ) or die ( "Query Failed : " . mysql_error () );
    
    $row = mysql_fetch_array ( $result );
    $id=$row['RoomID'];
    $name=$row['Name'];
    $limit= $row ['Limit'];
    $description= $row ['Description'];
    
    $i = 0;
    while ( $rows = mysql_fetch_array ( $result ) ) {
    	$roll [$i] = $rows ['RoomID'];
    	$i ++;
    }
    $total_elmt = count ( $roll );
    ?>
    
  
    
    <div class="naslov">
        <h1>Update room</h1>
    </div>
    <div class="naziv">
        <input type="text" id="name" name="name" value="<?php echo htmlentities($name); ?>"/>
    </div>
    <div class="limit">
        Limit:
    </div>
    <div class="vrijeme">
        <select name="limitation" id="limitation" style="width:70px;">
            <option value="sat">Time:</option>
           
            
            <?php
			for ($i=15; $i<=20; $i++) {
			if($i==$limit){
			echo '<option value="'.$i.'" selected>'.$i.'</option>';
			}
			else{
			echo '<option value="'.$i.'">'.$i.'</option>';
			}
			}	
			?>
            
            
        </select>
    </div>
    <div class="opis">Description:
       <textarea name="description" rows=4 cols=25 wrap=physical ><?php echo htmlentities($description);?></textarea>
    </div>
    <div class="registrirajse">
        <form action="#"> <input type="submit" id="button2" name="button2" value="Update"></form>
    </div>

</div>
</form>

<?php

if (isset ( $_GET ['submit'] )) {

	
	$naziv = $_GET ['name'];
	$limit = $_GET ['limitation'];
	$opis = $_GET ['description'];
	
	
	$query2 = "UPDATE `rooms` SET Name='$naziv', Limit='$limit' , Description='$opis',
	WHERE  RoomID='$room_id' ";

	$result2 = mysql_query ( $query2 ) or die ( "Query Failed : " . mysql_error () );
	
	if($query2){
	
		echo "<script type='text/javascript'>alert('Successfully updated!');</script>";
	
	}
	else{
		echo "<script type='text/javascript'>alert('Error!');</script>";
	
	}
	
	echo "<script type='text/javascript'>window.location.href='Update.php'</script>";
	
	
	}
	
	
	?>
	
</body>
</html>
