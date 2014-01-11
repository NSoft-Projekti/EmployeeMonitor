
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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form name="name" action='Search.php' method="POST">
<input type="text" name="query" />
<input type="submit" name="Search" />
<div class="regrm">



<select name="radno_mjesto"> 
<option value=" "> Not Selected </option> 
<option value="Direktor"<?=$_SESSION['queryRadno'] == "Direktor" ? 'selected="selected"' : ''?>> Direktor</option>
<option value="Programer"><?=$_SESSION['queryRadno'] == "Programer" ? 'selected="selected"' : ''?>> Programer</option>
<option value="Web dizajner"><?=$_SESSION['queryRadno'] == "Web dizajner" ? 'selected="selected"' : ''?>> Web dizajner</option>
<option value="Raèunovoða"><?=$_SESSION['queryRadno'] == "Raèunovoða" ? 'selected="selected"' : ''?>> Raèunovoða</option>
<option value="Održavatelj"><?=$_SESSION['queryRadno'] == "Održavatelj" ? 'selected="selected"' : ''?>> Održavatelj</option>
</select>



</div>
</form> 

 
</body>
</html>

<?php
include 'indeks.php';

$query = $_POST['query'];
$query1 = $_POST['naziv'];
$min_length = 3;

	

 if(strlen($query) >= $min_length){ 
	 
	$query = htmlspecialchars($query);
	$query = mysql_real_escape_string($query);
	
	$queryRadno = htmlspecialchars($queryRadno);
	$queryRadno = mysql_real_escape_string($queryRadno);

	$raw_results = mysql_query ("SELECT * FROM zaposlenici
WHERE (`korisnicko_ime` LIKE '%".$query."%')  OR (`ime` = '%".$query."%')  OR (`prezime` LIKE '%".$query."%')
	UNION
	(SELECT * FROM radna_mjesta
WHERE ('naziv' LIKE '%".queryRadno."%')")
	
	or die(mysql_error());
	

	if(mysql_num_rows($raw_results) > 0)
	{ 
		$output="";
		echo "<table class='Table' border='1px'>";
		
		echo "<tr>";
		echo "<td>" . "Korisnicko ime" . "</td>";
		echo "<td>" . "Ime" . "</td>";
		echo "<td>" . "Prezime" . "</td>";
		echo "<td>" . "Adresa" . "</td>";
		echo "<td>" . "Spol" . "</td>";
		echo "<td>" . "E-mail" . "</td>";
		echo "<td>" . "Datum registracije" . "</td>";
		echo "</tr>";
		
		while($results = mysql_fetch_array($raw_results))
			
		{
		
			{
				  		echo "<form action='deleteZaposlenikById.php' method ='GET'>";
				  		
		 		echo "<tr>";
		 		echo "<td>" .htmlspecialchars($results['korisnicko_ime'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['ime']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['prezime'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['adresa']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['spol'] ). "</td>";
		 		echo "<td>" .htmlspecialchars($results['email']) . "</td>";
		 		echo "<td>" .htmlspecialchars($results['datum_registracije']) . "</td>";
		 		
		echo "<input type='hidden' name='z_id' value=".$results['zaposlenikID'].">";
		 		echo "<td> <input type='submit' value='Delete'/></td>"; 
		 		echo "</form>";
		 		
		 		echo "</tr>";
		 
		 	}
		 
		 }
		 echo "</table> ";
	}
			else{ 
				echo "No results";
			}
		
 }
			?>
			