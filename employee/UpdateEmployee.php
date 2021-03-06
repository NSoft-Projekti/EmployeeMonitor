<html>
<head>
    <meta charset="utf-8">
    <title>Employee Monitor</title>
    <link type="text/css" href="../assets/css/UpdateEmployee.css" rel="stylesheet"/>
    <link type="text/css" href="../assets/css/administration.css" rel="stylesheet"/>
</head>

<body>

<div class="wrapper">

    <div class="profile"   >
        <img src="<?php echo '../assets/img/profile/'.$image; ?>" height="200" weight="200" >
        <input type="file" name="profile" >
    </div>
	
    <div class="header">
        <ul>

            <li><a href="UpdateEmployee.php">Personal information</a></li>
            <li><a href="Time.php">Working time review</a></li>
            <li><a href="../includes/functions/logout.php">Log out</a></li>

        </ul>
    </div>
    <?php
    include '../includes/indeks.php';
    @session_start();
    $currentUsername=$_SESSION ['Username'];
    $query = "SELECT * FROM employees WHERE Username ='$currentUsername'";
    $result = mysql_query ( $query ) or die ( "Query Failed : " . mysql_error () );
    $row = mysql_fetch_array ( $result );
    $id=$row['EmployeeID'];
    $userName= $row ['Username'];
    $password= $row ['Password'];
    $firstName= $row ['FirstName'];
    $lastName= $row ['LastName'];
    $email= $row ['Email'];
    $address= $row ['Address'];
    //$dateTime = date("Y-m-d");
    $dateTime = $row['Birthday'];


    $pieces = explode("-", $dateTime); //posto je datum napisan u formatu "Y-m-d" funkcija explode dijeli string $dateTime na mjestima gdje se nalazi znak -
    $year = $pieces[0];
    $month = $pieces[1];
    $day = $pieces[2];
    $pos = strpos($day,0); //ukoliko je dan manji od 10 ispisuje se kao 04 a ne 4 i funkcijom strpos odbacivamo prvi karakter da bi naknadno mogli vrsiti provjeru
    if($pos==0)
    {
        $day=substr($day, 1);
    }


	$image = $row['Image'];
    $cityId = $row ['CityID'];
    $positionId = $row['PositionID'];
    $gender = $row['Gender'];

    $i = 0;
    while ( $rows = mysql_fetch_array ( $result ) ) {
        $roll [$i] = $rows ['EmployeeID'];
        $i ++;
    }
    $total_elmt = count ( $roll );
    ?>
    <form method="POST" action="" enctype="multipart/form-data">

        <div class="update">


            <div class="headline">
                <h1>User information</h1>
            </div>

            <div class="user">Username</div>
            <div><input type="text" id="username" name="username"  value="<?php echo htmlentities($userName); ?>"/>

            </div>
            <div class="pass">Password</div>
            <div><input type="text" id="password" name="password" value="<?php echo htmlentities($password); ?>"/>
            </div>
            <div class="name">Name</div>
            <div><input type="text" id="name" name="name" value="<?php echo htmlentities($firstName); ?>" />
            </div>
            <div class="lastname">Last name</div>
            <div><input type="text" id="surname" name="surname" value="<?php echo htmlentities($lastName); ?>"/>
            </div>
            <div class="email">E-mail</div>
            <div><input type="email" id="email" name="email" value="<?php echo htmlentities($email); ?>"/>

            </div>
            <div class="address">Adress</div>
            <div><input type="text" id="adress" name="address" value="<?php echo htmlentities($address); ?>"/><br />
            </div>
            <div class="birth">Date of birth
            </div>
            <div class="dmg">
                <select name="dan" id="dan" >
                    <option value="dan">Day</option>
                    <?php
                    for ($i=1; $i<=31; $i++) {
                        if($i==$day){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }
                        else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                    ?>
                </select>
                <select name="mjesec" id="mjesec" >
                    <option value="mjesec">Month</option>
                    <?php
                    for ($i=1; $i<=12; $i++) {
                        if($i==$month){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }
                        else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                    ?>
                </select>
                <select name="godina" id="godina" >
                    <option value="godina">Year</option>
                    <?php
                    $curYear = date('Y');
                    for ($i=$curYear; $i>=1950; $i--) {
                        if($i==$year){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }
                        else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="regrm">Working place </div>
            <div><select name="radno_mjesto" class="textfields" id="radno_mjesto">

                    <?php
                    $getAllRadnaMjesta = mysql_query("SELECT * FROM positions;");
                    while($viewAllRadnaMjesta=mysql_fetch_array($getAllRadnaMjesta)){
                        if($viewAllRadnaMjesta['PositionID']==$positionId){
                            echo '<option value='.$viewAllRadnaMjesta['PositionID'].' selected>'.$viewAllRadnaMjesta['Name']. '</option>';
                        }
                        else{
                            echo '<option value='.$viewAllRadnaMjesta['PositionID'].' >'.$viewAllRadnaMjesta['Name']. '</option>';
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="reggrad">Town</div>
            <div><select name="grad" class="textfields" id="grad">
                    <?php
                    $getAllCities = mysql_query("SELECT * FROM cities;");
                    while($viewAllCities=mysql_fetch_array($getAllCities)){
                        if($viewAllCities['CityID']==$cityId){
                            echo '<option value='.$viewAllCities['CityID'].' selected>'.$viewAllCities['Name']. '</option>';
                        }
                        else{
                            echo '<option value='.$viewAllCities['CityID'].' >'.$viewAllCities['Name']. '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="spol">
                <?php
                if($gender=="male"){
                    echo 'Male';
                    echo '<input type="radio" name="sex" value='.$gender.' checked>';
                }
                else{
                    echo 'Male';
                    echo '<input type="radio" name="sex" value="male">';
                }

                if($gender=="female"){
                    echo 'Female';
                    echo '<input type="radio" name="sex" value='.$gender.' checked>';
                }
                else{
                    echo 'Female';
                    echo '<input type="radio" name="sex" value="female">';
                }

                ?>
            </div>
            <div class="button">
                <input name="submit" type="submit" value="Update" />
                <input name="reset" type="reset" value="Reset" />
            </div>


        </div>
    </form>
</div>

<?php

if (isset ( $_POST ['submit'] )) {

    $_SESSION ['Username']= $_POST ['username'];
    $korisnicko_ime = $_POST ['username'];
    $lozinka = $_POST ['password'];
    $ime = $_POST ['name'];
    $prezime = $_POST ['surname'];
    $email = $_POST ['email'];
    $adresa = $_POST ['address'];
    $radno_mjesto=$_POST ['radno_mjesto'];
    $spol=$_POST['sex'];
    $grad=$_POST['grad'];

    $s_year = $_POST['godina'];
    $s_month = $_POST['mjesec'];
    $s_day = $_POST['dan'];
    
    $file_name = $_FILES['profile']['name'];
 	if(empty($file_name)===false)
 	{
    $file_extn = strtolower(end(explode('.', $name)));
 
    $file_temp = $_FILES['profile']['tmp_name'];
 
    $hashed_name = substr(md5(time()),0,10).'.'.$file_extn;
 
    $file_path = '../assets/img/profile/'.$hashed_name;
    move_uploaded_file($file_temp, $file_path);
 	}
 	else 
 	{
 		$hashed_name=$image;
 	}
    $datumrodjenja = "$s_year-$s_month-$s_day";




    $query2 = "UPDATE employees SET Username='$korisnicko_ime', Password='$lozinka' ,
	FirstName='$ime', LastName='$prezime', Email='$email', Address='$adresa', PositionID='$radno_mjesto',
	Gender='$spol', CityID='$grad', Birthday='$datumrodjenja', Image='$hashed_name'
	WHERE  EmployeeID='$id' ";

    $result2 = mysql_query ( $query2 ) or die ( "Query Failed : " . mysql_error () );

    if($query2){

        echo "<script type='text/javascript'>alert('Successfully updated!');</script>";

    }
    else{
        echo "<script type='text/javascript'>alert('Error!');</script>";

    }

    echo "<script type='text/javascript'>window.location.href='UpdateEmployee.php'</script>";


}


?>

</body>
</html>