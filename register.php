<?php
include ('indeks.php');

if(!empty($_POST['username']) and !empty($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $emailaddress = $_POST['email'];
    $address = $_POST['address'];
    //$datumrodjenja = $_POST['datum'];
    $spol = $_POST['sex'];
    //$grad = $_POST['grad'];
    //$rmjesto = $_POST['radno_mjesto'];
    
    $checkusername = mysql_query("SELECT * FROM zaposlenici WHERE korisnicko_ime = '".$username."'");
    
    if(mysql_num_rows($checkusername) == 1)
    {
    	echo "<h1>Greška</h1>";
    	echo "<p>To korisničko ime već postoji, probajte ponovno.</p>";
    }
    else

     {
            $registerquery = mysql_query("INSERT INTO zaposlenici (korisnicko_ime,lozinka,ime,prezime,adresa,datum_rodjenja,spol,email,datum_registracije,administrator,gradID,radno_mjestoID)  
            VALUES('$username', '$password',  '$name', '$surname', '$address', '2013-2-3', '$spol', '$emailaddress',  '2013-1-2', '0' , '1' , '1' )") or die();
            
        
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
?>