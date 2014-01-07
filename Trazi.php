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



<?php
include ('indeks.php');

$query = $_POST['query'];
$min_length = 3;

 if(strlen($query) >= $min_length){ 
	 
	$query = htmlspecialchars($query);
	$query = mysql_real_escape_string($query);

	
	$raw_results = mysql_query("SELECT * FROM zaposlenici
            WHERE (`korisnicko_ime` LIKE '%".$query."%')  OR (`ime` = '%".$query."%')  OR (`prezime` LIKE '%".$query."%')") or die(mysql_error());
	 
	if(mysql_num_rows($raw_results) > 0)
	{ 
		 $output="";
		 echo "<table class='Table' border='1px'>";
		 
		 while($results = mysql_fetch_array($raw_results))
		 {
		 	{
		 
		 
		 		echo "<tr>";
		 		echo "<td>" . "Korisnicko ime" . "</td>";
		 		echo "<td>" . "Ime" . "</td>";
		 		echo "<td>" . "Prezime" . "</td>";
		 		echo "<td>" . "Adresa" . "</td>";
		 		echo "<td>" . "Spol" . "</td>";
		 		echo "<td>" . "E-mail" . "</td>";
		 		echo "<td>" . "Datum registracije" . "</td>";
		 		echo "</tr>";
		 
		 		echo "<tr>";
		 		echo "<td>" .htmlspecialchars($results['korisnicko_ime'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['ime']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['prezime'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['adresa']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['spol'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['email']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['datum_registracije']) . "</td>";
		 		echo "</tr>";
		 
		 	}
		 	echo "</table> ";
		 }
	}
			else{ 
				echo "No results";
			}
			
		
 }
			?>
			