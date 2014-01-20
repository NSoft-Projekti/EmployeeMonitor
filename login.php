<?php

include_once 'indeks.php';



if(!empty($_SESSION['LoggedIn']) and !empty($_SESSION['Username']))
{

    echo '<h1>Samo za elanove</h1>
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
        $admin = $row['administrator'];
        @session_start();
        $_SESSION['Username'] = $username;
        $_SESSION['Emailaddress'] = $email;
        $_SESSION['LoggedIn'] = 1;
        $_SESSION['Admin'] = 1;

        if($admin == 1){
            // Redirect Admin
            //header( 'Location: navigacija.php' );
            //exit();
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=navigacija.php">';  // Header nije htjelo radi pa radi redirect na ovaj nacin.
        }
        else {
            // Redirect User
            //header( 'Location: log_korisnika.php' );
            //exit();
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=log_korisnika.php">'; // Header nije htjelo radi pa radi redirect na ovaj nacin.
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Invalid ID or password.Please try again');</script>";

        echo "<script type='text/javascript'>window.location.href='prva_stranica.php'</script>";
    }
}

?>
