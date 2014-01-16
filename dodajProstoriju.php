<?php
include_once "indeks.php";

if(!empty($_POST['name'])  and !empty($_POST['sat']) and !empty($_POST['comment'])){
//and !empty($_POST['state'])
	$name = $_POST['name'];
	//$state= $_POST['state'];
	$sat = $_POST['sat'];
	$comment = $_POST['comment'];

	$checkroom = mysql_query("SELECT * FROM room WHERE naziv = '".$name."'");
    
    if(mysql_num_rows($checkroom) == 1){
    	echo "<h1>Greska</h1>";
    	echo "<p>Ta prostorija je vec u bazi.</p>";
    }
    else {
    	$dodajprostorijurquery = mysql_query("INSERT INTO rooms (title,state,limitation,description) 
    			VALUES('$name', '0',  '$sat', '$comment')");
            
        
        if($dodajprostorijurquery)
        {
            echo "<h1>Uspjeh</h1>";
            echo "<p>Uspjesno ste se dodali prostoriju u bazu.</p>";
        }
        else
        {
            echo "<h1>Greska</h1>";
            echo "<p>Prostoriju nije moguce dodati u bazu.</p>";   
        }  
    }
}
else {
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		echo '<script>alert("Greska polja su prazna");</script>';
		//header ('Location dodajProstoriju.php');
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=dodajProstoriju.php">';  // Header nije htjelo radi pa radi redirect na ovaj nacin.
	}
 }
 
?>
