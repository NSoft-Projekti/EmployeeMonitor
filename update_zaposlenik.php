<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>

<link type="text/css" href="user_registration.css" rel="stylesheet"/>
</head>
<body>

<div class="container">
<img src="http://placehold.it/200x200" style="padding-right:40px; padding-top:60px;" align="right">
<div class="header">
    <ul>

        <li><a href="update_zaposlenik.php">Personal information</a></li>
        <li><a href="#pregled_vremena">Working time review</a></li>
        <li><a href="logout.php">Log out</a></li>

    </ul>
</div>
<?php
include 'indeks.php';
@session_start();
$currentUsername=$_SESSION ['Username'];
$query = "SELECT * FROM zaposlenici WHERE korisnicko_ime ='$currentUsername'";
$result = mysql_query ( $query ) or die ( "Query Failed : " . mysql_error () );
$row = mysql_fetch_array ( $result );
$id=$row['zaposlenikID'];
$userName= $row ['korisnicko_ime'];
$password= $row ['lozinka'];
$firstName= $row ['ime'];
$lastName= $row ['prezime'];
$email= $row ['email'];
$address= $row ['adresa'];
//$dateTime = date("Y-m-d");
$dateTime = $row['datum_rodjenja'];


$pieces = explode("-", $dateTime); //posto je datum napisan u formatu "Y-m-d" funkcija explode dijeli string $dateTime na mjestima gdje se nalazi znak -
$year = $pieces[0]; 
$month = $pieces[1];
$day = $pieces[2]; 
$pos = strpos($day,0); //ukoliko je dan manji od 10 ispisuje se kao 04 a ne 4 i funkcijom strpos odbacivamo prvi karakter da bi naknadno mogli vrsiti provjeru
if($pos==0)
{
	$day=substr($day, 1);
}



$cityId = $row ['gradID'];
$positionId = $row['radno_mjestoID'];
$gender = $row['spol'];


$i = 0;
while ( $rows = mysql_fetch_array ( $result ) ) {
	$roll [$i] = $rows ['zaposlenikID'];
	$i ++;
}
$total_elmt = count ( $roll );
?>
<form method="get" action="">

<div class="registration">

<div class="headline">
<h1>User information</h1>

</div>
<div class="reguser">
<input type="text" id="username" name="username"  value="<?php echo htmlentities($userName); ?>"/><br />
<img id="utick" src="tick.png" width="16" height="16"/>
<img id="ucross" src="cross.png" width="16" height="16"/>
</div>

<div class="password">
<input type="text" name="password" value="<?php echo htmlentities($password); ?>"/><br />
</div>

<div class="name">
<input type="text" name="name" value="<?php echo htmlentities($firstName); ?>" /><br />
</div>

<div class="surname">
<input type="text" name="surname" value="<?php echo htmlentities($lastName); ?>"/><br />
</div>

<div class="email">
<input type="email" id="email" name="email" value="<?php echo htmlentities($email); ?>"/><br />
<img id="etick" src="tick.png" width="16" height="16"/>
<img id="ecross" src="cross.png" width="16" height="16"/>
</div>

<div class="address">
<input type="text" name="address" value="<?php echo htmlentities($address); ?>"/><br />
</div>

<div class="birth">
Birthday:
</div>
<div class="dmg">
<select name="dan" id="dan" style="width:70px;">
<option value="dan">Dan:</option>
<?php
for ($i=1; $i<=31; $i++) {
	if($i==$day){
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
</select>

<select name="mjesec" id="mjesec" style="width:70px;">
<option value="mjesec">Mjesec:</option>
<?php
for ($i=1; $i<=12; $i++) {
	if($i==$month){
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
</select>


<select name="godina" id="godina" style="width:70px;">
<option value="godina">Godina:r</option>
<?php
$curYear = date('Y');
for ($i=$curYear; $i>=1950; $i--) {
	if($i==$year){
		echo '<option value="'.$i.'" selected>'.$i.'</option>';
	}
	else{
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
</select>


</div>
<div class="regrm">
Radno mjesto: <select name="radno_mjesto" class="textfields" id="radno_mjesto">

<?php
        $getAllRadnaMjesta = mysql_query("SELECT * FROM radna_mjesta;");
        while($viewAllRadnaMjesta=mysql_fetch_array($getAllRadnaMjesta)){
			if($viewAllRadnaMjesta['radno_mjestoID']==$positionId){
				echo '<option value='.$viewAllRadnaMjesta['radno_mjestoID'].' selected>'.$viewAllRadnaMjesta['naziv']. '</option>';
			}
			else{
				echo '<option value='.$viewAllRadnaMjesta['radno_mjestoID'].' >'.$viewAllRadnaMjesta['naziv']. '</option>';
			}
		}
	
?> 
</select>
</div>


<div class="reggrad">
Grad: 
 <select name="grad" class="textfields" id="grad">




<?php
        $getAllCities = mysql_query("SELECT * FROM gradovi;");
        while($viewAllCities=mysql_fetch_array($getAllCities)){
			if($viewAllCities['gradID']==$cityId){
				echo '<option value='.$viewAllCities['gradID'].' selected>'.$viewAllCities['naziv']. '</option>';
			}
			else{
				echo '<option value='.$viewAllCities['gradID'].' >'.$viewAllCities['naziv']. '</option>';
			}
		}
	
?> 
</select>


</div>
<div class="spol">
<?php
if($gender=="male"){ 
	echo 'Male';
	echo '<input type="radio" name="sex" value='.$gender.' checked>';
	}
else{
	echo 'Male';
	echo '<input type="radio" name="sex" value="male">';
	}

if($gender=="female"){
	echo 'Female';
	echo '<input type="radio" name="sex" value='.$gender.' checked>';
	}
else{
	echo 'Female';
	echo '<input type="radio" name="sex" value="female">';
	}

?>

</div>


<div>
<input name="submit" type="submit" value="Update" /><br /> 
<input name="reset" type="reset" value="Reset" />
</div>
	
	</div>
	</form>
</div>		

<?php

if (isset ( $_GET ['submit'] )) {

	$_SESSION ['Username']= $_GET ['username'];
	$korisnicko_ime = $_GET ['username'];
	$lozinka = $_GET ['password'];
	$ime = $_GET ['name'];
	$prezime = $_GET ['surname'];
	$email = $_GET ['email'];
	$adresa = $_GET ['address'];
	$radno_mjesto=$_GET ['radno_mjesto'];
	$spol=$_GET['sex'];
	$grad=$_GET['grad'];
	
	$s_year = $_GET['godina'];
	$s_month = $_GET['mjesec'];
	$s_day = $_GET['dan'];
	
	$datumrodjenja = "$s_year-$s_month-$s_day";

	
	
	
	$query2 = "UPDATE zaposlenici SET korisnicko_ime='$korisnicko_ime', lozinka='$lozinka' ,
	ime='$ime', prezime='$prezime', email='$email', adresa='$adresa', radno_mjestoID='$radno_mjesto',
	spol='$spol', gradID='$grad', datum_rodjenja='$datumrodjenja'
	WHERE  zaposlenikID='$id' ";
	
	$result2 = mysql_query ( $query2 ) or die ( "Query Failed : " . mysql_error () );
	
	if($query2){

		echo "<script type='text/javascript'>alert('Successfully updated!');</script>";
	
	}
	else{
		echo "<script type='text/javascript'>alert('Error!');</script>";
	
	}
	
	echo "<script type='text/javascript'>window.location.href='update_zaposlenik.php'</script>";
	
	
	}
	

?>

</body>

</html>

