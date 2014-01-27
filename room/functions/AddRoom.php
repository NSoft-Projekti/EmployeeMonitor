<?php
include '../../includes/indeks.php';

if(!empty($_POST['name'])  and !empty($_POST['limitation']) and !empty($_POST['description'])){
//and !empty($_POST['state'])
	$name = $_POST['name'];
	//$state= $_POST['state'];
	$limitation = $_POST['limitation'];
	$description = $_POST['description'];


	$checkroom = mysql_query("SELECT * FROM rooms WHERE Name = '$name'");
  
    if(mysql_num_rows($checkroom) != 0){
    	echo "<h1>Greska</h1>";
    	echo "<p>Ta prostorija je vec u bazi.</p>";
    }
    else {
    	$qAddRoom = mysql_query("INSERT INTO `rooms` (`Name`, `Limit`, `Description`) 
    			VALUES('$name', '$limitation', '$description')") or die (mysql_error());
    	
           
        
    	
if ($qAddRoom){

		echo "<script type='text/javascript'>alert('Successfully updated!');</script>";
	
	}
	else{
		echo "<script type='text/javascript'>alert('Error!');</script>";
	
	}
	
	echo "<script type='text/javascript'>window.location.href='../Add.php'</script>";
	
	
	

    }
}
else {
 	if($_SERVER['REQUEST_METHOD'] == 'POST'){
  		echo '<script>alert("Greska polja su prazna");</script>';
  		//header ('Location dodajProstoriju.php');
   		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=AddRoom.php">';  // Header nije htjelo radi pa radi redirect na ovaj nacin.
   	}
}
?>