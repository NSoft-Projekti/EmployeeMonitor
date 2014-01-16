<!DOCTYPE html>
<?php include_once 'indeks.php';?>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert title here</title>
    <link type="text/css" href="kreiranje.css" rel="stylesheet"/>
    <link type="text/css" href="registracija1.css" rel="stylesheet"/>
</head>
<body>
<div class="container">

    <div class="header">
        <ul>
            <li><a href="registracija.php">Registracija</a></li>
            <li><a href="search.php">Lista korisnika</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </div>
    <div class="naslov">
        <h1>Kreiranje prostorije</h1>
    </div>
    <div class="naziv">
        <input type="text" id="name" name="name" size="30" placeholder="Naziv prostorije"/>
    </div>
    <div class="limit">
        Limit:
    </div>
    <div class="vrijeme">
        <select name="sat" id="sat" style="width:70px;">
            <option value="sat">Vrijeme:</option>
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
    <div class="opis">
        <textarea name="comment" form="" >Opis:</textarea>
    </div>
    <div class="registrirajse">
        <form action="#"> <input type="submit" name="button2" value="Dodaj"></form>
    </div>

</div>
</body>
</html>
