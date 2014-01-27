<!DOCTYPE html>
<?php include_once '../includes/indeks.php';?>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Monitor</title>
    <link type="text/css" href="../assets/css/addRoom.css" rel="stylesheet" />
    <link type="text/css" href="../assets/css/administration.css" rel="stylesheet" />
</head>
<body>
<form action="functions/AddRoom.php" method="POST">
    <div class="container">

        <div class="header">
            <ul>
                <li><a href="#">Employees</a>
                    <ul>
                        <li><a href="../employee/Registration.php">Register employee</a></li>
                    </ul>
                    <ul>
                        <li><a href="../employee/Search.php">Search employees</a></li>
                    </ul>
                </li>
                <li><a href="#">Rooms</a>
                    <ul>
                        <li><a href="Add.php">Add new room</a></li>
                    </ul>
                    <ul>
                        <li><a href="Search.php">Room list</a></li>
                    </ul>
                </li>
                <li><a href="../includes/functions/logout.php">Log out</a></li>
            </ul>
        </div>
        <div class="naslov">
            <h1>Create new room</h1>
        </div>
        <div class="naziv">
            <input type="text" id="name" name="name" placeholder="Name"/>
        </div>

        <div class="vrijeme" >
            <select name="limitation" id="limitation" placehoder="Limit">
                <option value="sat">Limit</option>
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

        <textarea id="description" name="description" rows=4 cols=25 wrap=physical placeholder="Description"></textarea>

        <div class="registrirajse">
            <input type="submit" id="button2" name="button2" value="Add">
        </div>
    </div>
</form>

</body>
</html>
