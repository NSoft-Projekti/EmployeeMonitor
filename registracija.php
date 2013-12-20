<?php include_once 'indeks.php';?>

<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link type="text/css" href="registracija.css" rel="stylesheet"/>
</head>
<body>
<form action="register.php" method="POST">
<div class="container">
<img src="http://placehold.it/200x200" style="padding-right:40px; padding-top:60px;" align="right">
<div class="header">

<a href="registracija.php">Registracija</a>
<a href="">Lista korisnika</a>

</div>

<div class="registracija">

<div class="naslov">
<h1>Registracija korisnika</h1>
</div>
<div class="reguser">
<input type="text" name="username" placeholder="Username"/>
</div>
<div class="password">
<input type="password" name="password" placeholder="Password"/>
</div>
<div class="regime">
<input type="text" name="name" placeholder="Name"/>
</div>
<div class="regprezime">
<input type="text" name="surname" placeholder="Surname"/>
</div>
<div class="regemail">
<input type="email" name="email" placeholder="E-mail"/>
</div>
<div class="regmjesto">
<input type="text" name="address" placeholder="Address"/>
</div>
<div class="datumrodjenja">
Birthday:
</div>
<div class="dmg">
<select name="dan" id="dan" stylse="width:70px;">
<option value="dan">Dan:</option>
<?php
for ($i=1; $i<=31; $i++) {
?>
<option value="<?php echo $i; ?>">
<?php echo $i; ?>
</option>
<?php
}
?>
</select>

<select name="mjesec" id="mjesec" style="width:70px;">
<option value="mjesec">Mjesec:</option>
<?php
for ($i=1; $i<=12; $i++) {
?>
<option value="<?php echo $i;?>">
<?php echo $i; ?>
</option>
<?php
}
?>
</select>


<select name="godina" id="godina" style="width:70px;">
<option value="godina">Godina:r</option>
<?php
$curYear = date('Y');
for ($i=$curYear; $i>=1950; $i--) {
?>
<option value="<?php echo $i; ?>">
<?php echo $i; ?>
</option>
<?php
}
?>
</select>


</div>
<div class="regrm">
Radno mjesto:  <select name="radno_mjesto" class="textfields" id="radno_mjesto">

<option id="0">--Select--</option>

<?php 
	$getAllRadnaMjesta = mysql_query("SELECT * FROM radna_mjesta;");
	while($viewAllRadnaMjesta=mysql_fetch_array($getAllRadnaMjesta)){
?>
<option value="<?php echo $viewAllRadnaMjesta['radno_mjestoID']?>"><?php echo $viewAllRadnaMjesta['naziv'] ?></option>
<?php } ?>

</select>
</div>
<div class="reggrad">
Grad: 
 <select name="grad" class="textfields" id="grad">

<option id="0">--Select--</option>

<?php 
	$getAllCities = mysql_query("SELECT * FROM gradovi;");
	while($viewAllCities=mysql_fetch_array($getAllCities)){
?>
<option value="<?php echo $viewAllCities['gradID']?>"><?php echo $viewAllCities['naziv'] ?></option>
<?php } ?>

</select>


</div>
<div class="spol">

<input type="radio" name="sex" value="female">
Female
<input type="radio" name ="sex" value="male" style="margin-left:15px;"/>
Male

</div>

<div class="registrirajse">
<a href="#"><input type="submit" name="submit" value="Registracija"/></a>
</div>
</div>



</div>
</form>
</body>

</html>
