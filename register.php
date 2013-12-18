<?php
include 'indeks.php';

if(!empty($_POST['username']) and !empty($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $emailaddress = $_POST['e-mail'];
    $address = $_POST['address'];
    $datumrodjenja = $_POST['datum'];
    $spol = $_POST['spol'];
    
    $checkusername = mysql_query("SELECT * FROM zaposlenici WHERE korisnicko_ime = '".$username."'");
    
    if(mysql_num_rows($checkusername) == 1)
    {
    	echo "<h1>Greška</h1>";
    	echo "<p>To korisnièko ime veæ postoji, probajte ponovno.</p>";
    }
    else

     {
            $registerquery = mysql_query("INSERT INTO zaposlenici (korisnicko_ime,lozinka,ime,prezime,adresa,datum_rodjenja,spol,email,datum_registracije,administrator,gradID,radno_mjestoID)  
            VALUES('$username', '$password',  '$name', '$surname', '$address', '$datumrodjenja', '$spol', '$emailaddress',  '$datumrodjenja', '0' , '1' , '1' )");
        
        if($registerquery)
        {
            echo "<h1>Uspjeh</h1>";
            echo "<p>Uspješno ste se regitrirali. Klik <a href=\"login.php\">ovdje za login</a>.</p>";
        }
        else
        {
            echo "<h1>Greška</h1>";   
        }       
     }
}
else
{
 
 
   echo '<h1>Register</h1>
 
   <p>Please enter your details below to register.</p>
 
    <form method="post" action="register.php" name="registerform">
    <fieldset>
        <label for="username">Username:</label><br /><input type="text" name="username" /><br />
        <label for="password">Password:</label><br /><input type="text" name="password" /><br />
        <label for="name">Name:</label><br /><input type="text" name="name" /><br />
        <label for="surname">Surname:</label><br /><input type="text" name="surname" /><br />
        <label for="emailaddress">E-mail:</label><br /><input type="text" name="e-mail" /><br />
        <label for="address">Address:</label><br /><input type="text" name="address" /><br />
        <label for="datumrodjenja">Datum Rodjenja:</label><br /><input type="text" name="datum" /><br />
        <label for="spol">Spol:</label><br /><input type="text" name="spol" /><br />
        <input type="submit" name="submit" value="submit" />

    </fieldset>
    </form>';
}
?>
