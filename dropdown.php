<select name="select" class="textfields" id="ddlCity">

<option id="0">--Select City--</option>

<?php 
include 'indeks.php';
header('Content-type: text/plain; charset=utf-8');

	$getAllCities = mysql_query("SELECT * FROM gradovi;");
	while($viewAllCities=mysql_fetch_array($getAllCities)){
?>
<option id="<php echo $viewAllCities['gradID'];?>"><?php echo $viewAllCities['naziv'] ?></option>
<?php } ?>

</select>