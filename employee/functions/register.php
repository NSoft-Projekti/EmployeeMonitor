<?php
include ('../../includes/indeks.php');

if((!empty($_POST['username']) and !empty($_POST['password'])) and ($_POST['password']==$_POST['confirm_password']))
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
    $gradId = mysql_query("SELECT CityID from cities where Name  = '".$grad."'");
    $rmjesto = $_POST['radno_mjesto'];
    $datumreg = date("Y/m/d");
    
    //$allowed = array('jpg', 'jpeg', 'gif', 'png');

    $file_name = $_FILES['profile']['name'];
    $file_extn = strtolower(end(explode('.', $name)));
    $file_temp = $_FILES['profile']['tmp_name'];
    $hashed_name = substr(md5(time()),0,10).'.'.$file_extn;
    $file_path = '../../assets/img/profile/'.$hashed_name;
    move_uploaded_file($file_temp, $file_path);
    
    /*if(in_array($extn, $allowed) === true){
    	change_profile_image( $file_temp, $file_extn);
    } else{
    	echo 'Incorrect file type.';
    }*/
 
    
    $checkusername = mysql_query("SELECT * FROM employees WHERE Username  = '".$username."'");
    
    if(mysql_num_rows($checkusername) == 1)
    {
    	echo "<h1>Greška</h1>";
    	echo "<p>To Korisnièko ime veæ postoji, probajte ponovno.</p>";
    }
    else

     {
            $registerquery = mysql_query("INSERT INTO `employees` (`Username`, `Password`, `FirstName`, `LastName`, `Address`, `Birthday`, `Gender`, `Email`, `RegistrationDate`, `Administrator`, `CityID`, `PositionID`, `Image`)  
            VALUES('$username', '$password',  '$name', '$surname', '$address', '$datumrodjenja', '$spol', '$emailaddress',  '$datumreg', '0' , '$grad' , '$rmjesto', '$hashed_name' )") or die(mysql_mysql_error());
            
        
        if($registerquery)
        {
        	header("Location: /EmployeeMonitor/admin/Administration.php");
            echo "<h1>Uspjeh</h1>";
            //echo "<p>Uspješno ste se regitrirali. Klik <a href=\"login.php\">ovdje za login</a>.</p>";
        }
        else
        {
            echo "<h1>Greška</h1>";   
        }       
     }
}
?>
