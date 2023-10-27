<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazonite</title>

    <link rel="stylesheet" href="./css/index.css">
    <?php include "./include/links.php" ?>

    <script src="./js/index.js" defer></script>

</head>

<body>
    <bg>
        <navbar>
            <nav-left>
                <a href="./index.php" id="home"><i class="fa-solid fa-house"></i></a>
            </nav-left>
            <nav-right>
                <i id="basket" class="fa-solid fa-basket-shopping">
                    <count></count>
                </i>
                <a href="./informatie.php" id="informatie"><i class="fa-solid fa-info"></i></a>
            </nav-right>
            <winkelmand>
                <winkelmand-items>
                </winkelmand-items>
                <totaal-prijs-box>
                    <hr>
                    <totaal-prijs></totaal-prijs>
                    <button>Koop</button>
                </totaal-prijs-box>
            </winkelmand>
        </navbar>

        <main-box>
            <?php
            $db = new SQLite3(filename: "./db/db.db");
            $db->busyTimeout(milliseconds: 3000);

            $query = "SELECT * FROM items";
            $result = $db->query($query);

            while ($row = $result->fetchArray()) {
                $id = $row['id'];
                $foto = $row['foto'];
                $naam = $row['naam'];
                $prijs = $row['prijs'];
                $grootte = $row['grootte'];
                $gewicht = $row['gewicht'];
                $informatie = $row['informatie'];
                ?>

                <items>
                    <img src="<?php echo $foto ?>" alt="">
                    <naam>
                        <?php echo $naam ?>
                    </naam>
                    <grootte>
                        <?php echo $grootte . " cm" ?>
                    </grootte>
                    <gewicht>
                        <?php echo $gewicht . " gram" ?>
                    </gewicht>
                    <prijs>
                        <?php echo "€ " . $prijs . ",-" ?>
                    </prijs>
                    <info>
                        <?php echo $informatie ?>
                    </info>
                    <button></button>
                </items>

                <?php
            }
            ?>
        </main-box>
    </bg>
    <selected-item>
        <button id="weg"><i class="fa-solid fa-x"></i></button>
        <img id="img" src="" alt="" class="foto">
        <informatie-item>
            <p id="naam"></p>
            <p id="info"></p>
            <extra-info>
                <p id="gewicht"></p>
                <p id="grootte"></p>
            </extra-info>
            <p id="prijs"></p>
            <button id="add" onclick="addToCart()">Voeg toe <i class="fa-solid fa-basket-shopping"></i></button>
        </informatie-item>
    </selected-item>
</body>

</html>