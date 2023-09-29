<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazonite</title>

    <link rel="stylesheet" href="./css/index.css">

    <?php include "./include/links.php" ?>

</head>

<body>
    <navbar>
        <nav-left>
            <a href="./index.php" id="home"><i class="fa-solid fa-house"></i></a>
        </nav-left>
        <nav-right>
            <a href="./basket.php" id="basket"><i class="fa-solid fa-basket-shopping"></i></a>
            <a href="./informatie.php" id="informatie"><i class="fa-solid fa-info"></i></a> </nav-right>
    </navbar>

    <main-box>
        <!-- <search-bar>
            <input type="text">
            <i class="fa-solid fa-magnifying-glass" id="search-icon"></i>
        </search-bar> -->
        <items>
            <?php
            $db = new SQLite3(filename: "./php/villatekoop.db");
            $db->busyTimeout(milliseconds: 3000);

            $naam = $_GET['naam'];
            $query = "SELECT * FROM items";
            $result = $db->query($query);

            while ($row = $result->fetchArray()) {
                $foto = $row['foto'];
                $naam = $row['naam'];
                $prijs = $row['prijs'];
                $grootte = $row['grootte'];
                $gewicht = $row['gewicht'];
                $informatie = $row['informatie'];
            }
            ?>
        </items>
    </main-box>
</body>

</html>