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
    
    $s_year = $_POST['godina'];
    $s_month = $_POST['mjesec'];
    $s_day = $_POST['dan'];
    
    $datumrodjenja = "$s_year-$s_month-$s_day";
    
    $spol = $_POST['sex'];
    $grad = $_POST['grad'];
    $gradId = mysql_query("SELECT gradID from gradovi where naziv = '".$grad."'");
    $rmjesto = $_POST['radno_mjesto'];
    $datumreg = date("Y/m/d");
    
    $checkusername = mysql_query("SELECT * FROM zaposlenici WHERE korisnicko_ime = '".$username."'");
    
    if(mysql_num_rows($checkusername) == 1)
    {
    	echo "<h1>Greška</h1>";
    	echo "<p>To Korisnièko ime veæ postoji, probajte ponovno.</p>";
    }
    else

     {
            $registerquery = mysql_query("INSERT INTO zaposlenici (korisnicko_ime,lozinka,ime,prezime,adresa,datum_rodjenja,spol,email,datum_registracije,administrator,gradID,radno_mjestoID)  
            VALUES('$username', '$password',  '$name', '$surname', '$address', '$datumrodjenja', '$spol', '$emailaddress',  '$datumreg', '0' , '$grad' , '$rmjesto' )");
            
        
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