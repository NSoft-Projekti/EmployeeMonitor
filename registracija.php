<?php
echo'<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert title here</title>
<link type="text/css" href="registracija.css" rel="stylesheet"/>
</head>
<body>
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
  <div class="reguser">
				    <input type="text" name="username" placeholder="Korisnièko ime"/>
				</div>
            <div class="password">
					<input type="password" name="pass" placeholder="Lozinka"/>
				</div>	
             <div class="password">
					<input type="password" name="pass" placeholder="Potvrdi lozinku"/>
				</div>				
				<div class="regime">
					<input type="text" name="ime" placeholder="Ime"/>
				</div>
				<div class="regprezime">
					<input type="text" name="prezime" placeholder="Prezime"/>
				</div>
				<div class="regemail">
					<input type="email" name="email" placeholder="E-mail"/>
				</div>
				<div class="regmjesto">
				<input type="text" name=mjesto" placeholder="Adresa"/>
				</div>
				<div class="regtel">
				<input type="text" name=mjesto" placeholder="Telefon"/>
				</div>
				<div class="rodendan">
					Roðendan:
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
                   <option value="direktor">Direktor</option>
                   <option value="ekonomist">Ekonomist</option>
                   <option value="programer">Programer</option>
                  
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
				<form>
					<input type="radio" name="sex" value="Žensko">
					Žensko 
					<input type="radio" name ="sex" value="Muško" style="margin-left:15px;"/>
					Muško
					</form>
				</div>
				
				<div class="registrirajse">
					<a href="#"><input type="submit" name="button2" value="Registracija"/></a>
				</div>
	</div>

</div>
</body>
</html>';