<!DOCTYPE html>
<?php include_once 'indeks.php';?>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert title here</title>
    <link type="text/css" href="kreiranje.css" rel="stylesheet"/>
    <link type="text/css" href="navigation.css" rel="stylesheet"/>
</head>
<body>
<form action="dodajProstoriju.php" method="POST">
<div class="container">

    <div class="header">
        <ul>
            <li><a href="#">Users</a>
                <ul>
                    <li><a href="registracija.php">Register</a></li>
                </ul>
                <ul>
                    <li><a href="#">User list</a></li>
                </ul>
            </li>
            <li><a href="#">Rooms</a>
                <ul>
                    <li><a href="kreiranje_prostorije.php">Create new room</a></li>
                </ul>
                <ul>
                    <li><a href="lista_prostorija.php">Room list</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="naslov">
        <h1>Create new room</h1>
    </div>
    <div class="naziv">
        <input type="text" id="name" name="name" placeholder="Name"/>
    </div>
    <div class="limit">
        Limit:
    </div>
    <div class="vrijeme">
        <select name="sat" id="sat" style="width:70px;">
            <option value="sat">Time:</option>
            <?php
            for ($i=15; $i<=20; $i++) {
                ?>
                <option value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="opis">Description:
       <textarea name="Komentar" rows=4 cols=25 wrap=physical></textarea>
    </div>
    <div class="registrirajse">
        <form action="#"> <input type="submit" id="button2" name="button2" value="Add"></form>
    </div>

</div>
</form>
</body>
</html>
