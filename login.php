<?php

include 'indeks.php';

if(!empty($_SESSION['LoggedIn']) and !empty($_SESSION['Username']))
{
 
echo '<h1>Samo za èlanove</h1>
     <p>Hvala za logiranje! Vi ste <b></b> a Vaša email adresa je: <b></b>.</p>';
 
}
elseif(!empty($_POST['username']) and !empty($_POST['password']))
{
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
 
    $checklogin = mysql_query("SELECT * FROM zaposlenici WHERE korisnicko_ime = '$username' AND lozinka = '$password'");
    
    
    if(mysql_num_rows($checklogin) == 1)
    {
    	$row = mysql_fetch_array($checklogin);
        $email = $row['EmailAddress'];
 
        $_SESSION['Username'] = $username;
        $_SESSION['Emailaddress'] = $email;
        $_SESSION['LoggedIn'] = 1;
 
    	echo "<h1>Uspjeh</h1>";
        echo "<p>Šaljemo Vas u područje za članove.</p>";
        echo "";
    }
    else
    {
    	echo "<h1>Greška</h1>";
        echo "<p>Klik na  <a href=\"index.php\">i probajte ponovno!</a></p>";
    }
}
else
{
	echo '<html>
	<head>
	<title>logiranje</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
 
   <h1>Login</h1>
 
   <p>Hvala na posjeti! Logirajte se, ili <a href="register.php">registrirajte</a>.</p>
 
   <p>Unesite podatke ispod za logiranje.</p>
 
   			
	<form method="post" action="login.php" name="loginform">
	<fieldset>
		<label for="username">Username:</label><input type="text" name="username" /><br />
		<label for="password">Password:</label><input type="text" name="password" /><br />
   		<input type="submit" name="submit" value="submit" />
 
	</fieldset>
	</form>
	
	
	</body>
	</html>';
}
?>