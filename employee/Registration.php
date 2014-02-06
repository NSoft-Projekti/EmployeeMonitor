<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include_once '../includes/indeks.php';?>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link type="text/css" href="../assets/css/registration.css" rel="stylesheet"/>

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
if(response == 1){
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
<!-- Confirm password -->
<script>
    function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();
    if (password != confirmPassword){
    	$("#ptick").hide();
    	$("#pcross").fadeIn();
    }
    else{
    	$("#pcross").hide();
        $("#ptick").fadeIn();
	}
	}
	$(document).ready(function () {
	   $("#confirm_password").keyup(checkPasswordMatch);
	   $("#pcross").hide();
	   $("#ptick").hide();
	});
</script>
</head>
<body>
<form onSubmit="return validate()" action="functions/register.php" method="POST">
<div class="container">
<img src="http://placehold.it/200x200" style="padding-right:40px; padding-top:60px;" align="right" >
			<div class="header">
				<ul>
					<li><a href="#">Employees</a>
						<ul>
							<li><a href="Registration.php">Register employee</a></li>
						</ul>
						<ul>
							<li><a href="Search.php">Search employees</a></li>
						</ul>
                        <ul>
                            <li><a href="../admin/Tracking.php">Tracking employees</a></li>
                        </ul>
                    </li>
					<li><a href="#">Rooms</a>
						<ul>
							<li><a href="../room/Add.php">Add new room</a></li>
						</ul>
						<ul>
							<li><a href="../room/Search.php">Room list</a></li>
						</ul></li>
					<li><a href="../includes/functions/logout.php">Log out</a></li>
				</ul>
			</div>
<div class="registration">
<div class="headline">
<h1>User registration</h1>
</div>
<div class="reguser">
<input type="text" id="username" name="username" placeholder="Username"/>
<img id="utick" src="tick.png" width="16" height="16"/>
<img id="ucross" src="cross.png" width="16" height="16"/>
</div>
<div class="password">
<input type="password" id="password" name="password" placeholder="Password"/>
<input type="password" id="confirm_password" name="confirm_password" onChange="checkPasswordMatch();" placeholder="Confirm Password"/>
<img id="ptick" src="tick.png" width="16" height="16"/>
<img id="pcross" src="cross.png" width="16" height="16"/>
</div>
<div class="name">
<input type="text" name="name" placeholder="Name"/>
</div>
<div class="lastname">
<input type="text" name="surname" placeholder="Last name"/>
</div>
<div class="email">
<input type="email" id="email" name="email" placeholder="E-mail"/>
<img id="etick" src="tick.png" width="16" height="16"/>
<img id="ecross" src="cross.png" width="16" height="16"/>
</div>
<div class="address">
<input type="text" name="address" placeholder="Address"/>
</div>
<div class="birth">
Date of Birth
</div>
<div class="dmg">
<select name="dan" id="dan" >
<option value="dan">Day</option>
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
<select name="mjesec" id="mjesec" >
<option value="mjesec">Month</option>
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
<select name="godina" id="godina" >
<option value="godina">Year</option>
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
<select name="radno_mjesto" class="textfields" id="radno_mjesto">
<option id="0">Work position</option>
<?php
        $getAllRadnaMjesta = mysql_query("SELECT * FROM positions;");
        while($viewAllRadnaMjesta=mysql_fetch_array($getAllRadnaMjesta)){
?>
<option value="<?php echo $viewAllRadnaMjesta['PositionID']?>"><?php echo $viewAllRadnaMjesta['Name'] ?></option>
<?php } ?>
</select>
</div>
<div class="reggrad">

<select name="grad" class="textfields" id="grad">
<option id="0">Town</option>
<?php
        $getAllCities = mysql_query("SELECT * FROM cities;");
        while($viewAllCities=mysql_fetch_array($getAllCities)){
?>
<option value="<?php echo $viewAllCities['CityID']?>"><?php echo $viewAllCities['Name'] ?></option>
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
<form action="#"> <input type="submit" name="button2" value="Register"></form>
</div>
</div>
</div>
</form>
</body>
</html>