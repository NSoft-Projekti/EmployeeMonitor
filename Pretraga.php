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


$searchTerm = trim($_GET['query']);

//check whether the name parsed is empty
if($searchTerm == "")
{
	echo "Enter name you are searching for.";
	exit();
}



//MYSQL search statement
$query = "SELECT * FROM zaposlenici WHERE `korisnicko_ime` LIKE '%$searchTerm%'";

$results = mysql_query($query, $conn );

/* check whethere there were matching records in the table
 by counting the number of results returned */
if(mysql_num_rows($results) > 0)
{
	//$output = "";
	
	echo "<table class='Table' >";

	while($row = mysql_fetch_array($results))
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
		echo "<td>" .htmlspecialchars($row['korisnicko_ime'] ). "</td>";
	    echo "<td>" .htmlspecialchars($row['ime']) . "</td>";
	    echo "<td>" .htmlspecialchars($row['prezime'] ). "</td>";
	    echo "<td>" .htmlspecialchars($row['adresa']) . "</td>";
	    echo "<td>" .htmlspecialchars($row['spol'] ). "</td>";
	    echo "<td>" .htmlspecialchars($row['email']) . "</td>";
	    echo "<td>" .htmlspecialchars($row['datum_registracije']) . "</td>";
	    echo "</tr>";

		}
echo "</table> ";
		}
	echo $output;
}
else
	echo "There was no matching record for the name " . $searchTerm;
?>