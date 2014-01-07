<?php
include ('indeks.php');


$query = $_GET['query'];
$min_length = 3;

 if(strlen($query) >= $min_length){ 
	 
	$query = htmlspecialchars($query);
	$query = mysql_real_escape_string($query);
	$query ="hari";

	
	$raw_results = mysql_query("SELECT * FROM zaposlenici WHERE (`korisnicko_ime` LIKE '%".$query."%')  OR (`ime` = '%".$query."%')  OR (`prezime` LIKE '%".$query."%')")or die(mysql_error());
	 
	if(mysql_num_rows($raw_results) > 0){ 
		 $output="";
		while($results = mysql_fetch_array($raw_results)){
			echo "<p><h3>".$results['korisnicko_ime']."</h3>".$results['ime']."</p>";
			}
				
			}
			else{ 
				echo "No results";
			}
			
			}
			else{ // if query length is less than minimum
				echo "Minimum length is ".$min_length;
			}
			
?>
			

		