
<style>

    .Table
    {
        /*border: 1px solid #BBBBBB;*/
        border:none;
        /*border-collapse: collapse;*/
        padding: 5px;

    }

    .Table th
    {

        background-color:red;
        padding: 8px 12px;
        font-family:Arial;
        font-size:11px;
        margin-top:20px;
    }

    .Table td
    {

        padding: 0 5px;
        /*border-right: 1px solid #BBBBBB;*/
        height: 30px;

    }
    .Table .input {
        /*border: 1px solid #BBBBBB;*/
        background:blue;
        width: 215px;
        height: 20px;
    }




</style>

<?php require_once '../includes/indeks.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Employee Monitor</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" href="../assets/css/administration.css" rel="stylesheet"/>

</head>
<body>
<div class="container">

    <div class="header">

        <ul>
            <li><a href="#">Employees</a>
                <ul>
                    <li><a href="Registration.php">Register employee</a></li>
                </ul>
                <ul>
                    <li><a href="Search.php">Search employees</a></li>
                </ul>
            </li>
            <li><a href="#">Rooms</a>
                <ul>
                    <li><a href="../room/Add.php">Add new room</a></li>
                </ul>
                <ul>
                    <li><a href="../room/Search.php">Room list</a></li>
                </ul>
            </li>
            <li><a href="../includes/functions/logout.php">Log out</a></li>
        </ul>

    </div>
    <div class="img">
        <form name="name" action='Search.php' method="POST">
            <div class="submit">
                <input type="text" name="query" placeholder="Username" id="user" />
            </div>
            <div class="regrm">
                <select name="radno_mjesto" class="textfields" id="radno_mjesto">

                    <option id="0">Radno mjesto</option>
                    <?php
                    $getAllRadnaMjesta = mysql_query("SELECT * FROM radna_mjesta;");
                    while($viewAllRadnaMjesta=mysql_fetch_array($getAllRadnaMjesta)){
                        ?>
                        <option value="<?php echo $viewAllRadnaMjesta['radno_mjestoID']?>"><?php echo $viewAllRadnaMjesta['naziv'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="send">
                <input type="submit" name="submit" value="Send"/>
            </div>
        </form>
    </div>


</body>
</html>
<?php
include ('indeks.php');

$query = $_POST['query'];
$query1 = $_POST['naziv'];
$min_length = 3;



if(strlen($query) >= $min_length){

    $query = htmlspecialchars($query);
    $query = mysql_real_escape_string($query);

    $query1 = htmlspecialchars($query1);
    $query1 = mysql_real_escape_string($query1);


    $raw_results = mysql_query("SELECT * FROM zaposlenici
			WHERE (`korisnicko_ime` LIKE '%".$query."%')  OR (`ime` = '%".$query."%')  OR (`prezime` LIKE '%".$query."%')") or die(mysql_error());

    if(mysql_num_rows($raw_results) > 0)
    {
        $output="";
        echo "<table class='Table' border='1px'>";

        echo "<tr bgcolor='6699CC'>";
        echo "<td>" . "Korisnicko ime" . "</td>";
        echo "<td>" . "Ime" . "</td>";
        echo "<td>" . "Prezime" . "</td>";
        echo "<td>" . "Adresa" . "</td>";
        echo "<td>" . "Spol" . "</td>";
        echo "<td>" . "E-mail" . "</td>";
        echo "<td>" . "Datum registracije" . "</td>";
        echo "</tr>";

        while($results = mysql_fetch_array($raw_results))

        {

            {
                echo "<form action='deleteZaposlenikById.php' method ='GET'>";

                echo "<tr>";
                echo "<td>" .htmlspecialchars($results['korisnicko_ime'] ). "</td>";
                echo "<td>" .htmlspecialchars($results['ime']) . "</td>";
                echo "<td>" .htmlspecialchars($results['prezime'] ). "</td>";
                echo "<td>" .htmlspecialchars($results['adresa']) . "</td>";
                echo "<td>" .htmlspecialchars($results['spol'] ). "</td>";
                echo "<td>" .htmlspecialchars($results['email']) . "</td>";
                echo "<td>" .htmlspecialchars($results['datum_registracije']) . "</td>";

                echo "<input type='hidden' name='z_id' value=".$results['zaposlenikID'].">";
                echo "<td><input type='submit' name='submit' value='Delete'></td>";
                echo "</form>";

                echo "</tr>";

            }

        }
        echo "</table> ";
    }
    else{
        echo "No results";
    }

}
?>


