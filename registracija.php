<?php include_once 'indeks.php';?>

<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link type="text/css" href="registracija.css" rel="stylesheet"/>
<link type="text/css" href="registracija1.css" rel="stylesheet"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<script>
$(document).ready(function(){
$('#username').keyup(username_check);
});
	
function username_check(){	
var username = $('#username').val();
if(username == "" || username.length < 4){
$('#utick').hide();
}else{

jQuery.ajax({
   type: "POST",
   url: "check.php",
   data: 'username='+ username,
   cache: false,
   success: function(response){
if(response == 1){
	$('#utick').hide();
	$('#ucross').fadeIn();
	}else{
	$('#ucross').hide();
	$('#utick').fadeIn();
	     }

}
});
}



}

</script>
<script>
$(document).ready(function(){
$('#email').keyup(email_check);
});
	
function email_check(){	
var email = $('#email').val();
if(email == "" || email.length < 4){
$('#etick').hide();
}else{

jQuery.ajax({
   type: "POST",
   url: "echeck.php",
   data: 'email='+ email,
   cache: false,
   success: function(response){
if(response != 0){
	$('#etick').hide();
	$('#ecross').fadeIn();
	}else{
	$('#ecross').hide();
	$('#etick').fadeIn();
	     }

}
});
}



}

</script>
</head>
<body>
<form action="register.php" method="POST">
<div class="container">
<img src="http://placehold.it/200x200" style="padding-right:40px; padding-top:60px;" align="right">
<div class="header">

<ul>
<li><a href="registracija.html">Registracija</a></li>
<li><a href="lista_korisnika.html">Lista korisnika</a></li>
<li><a href="prva_stranica.php">Log out</a></li>
</ul>

</div>

<div class="registracija">

<div class="naslov">
<h1>Registracija korisnika</h1>
</div>
<div class="reguser">
<input type="text" id="username" name="username" placeholder="Username"/>
<img id="utick" src="tick.png" width="16" height="16"/>
<img id="ucross" src="cross.png" width="16" height="16"/>
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
<input type="email" id="email" name="email" placeholder="E-mail"/>
<img id="etick" src="tick.png" width="16" height="16"/>
<img id="ecross" src="cross.png" width="16" height="16"/>
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
    <form action="#"> <input type="submit" name="button2" value="Registracija">  </form>
</div>
</div>


</div>
</form>
</body>

</html>