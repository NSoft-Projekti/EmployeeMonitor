<!DOCTYPE html>
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

<a href="registracija.html">Registracija</a>
<a href="lista_korisnika.html">Lista korisnika</a>

</div>

<div class="registracija">

<div class="naslov">
<h1>Registracija korisnika</h1>
</div>
<div class="register">
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
<select id="dan">
<option>Dan:</option>
</select>
<select id="mjesec">
<option>Mjesec:</option>
</select>
<select id="godina">
<option>Godina:</option>
</select>
</div>
<div class="regrm">
Radno mjesto: <select>
<option value="direktor"></option>
<option value="ekonomist"></option>
<option value="programer"></option>

</select>
</div>
<div class="reggrad">
Grad: <select>
<option value="mostar"></option>
<option value="sarajevo"></option>
<option value="banjaluka"></option>

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
