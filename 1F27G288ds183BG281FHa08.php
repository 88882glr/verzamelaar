<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazonite</title>

    <?php include "./include/links.php" ?>

    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/admin.css">

</head>

<body>
    <?php
    $db = new SQLite3(filename: "./db/db.db");
    $db->busyTimeout(milliseconds: 3000);
    ?>
    <bg>
        <navbar>
            <nav-left>
                <a href="./index.php" id="home"><i class="fa-solid fa-house"></i></a>
            </nav-left>
            <nav-right>

            </nav-right>
        </navbar>
        <crud-box>
            <crud>
                <form action="./db/db.php" method="post">
                    <h3>Toevoegen</h3>
                    <input type="text" name="foto" placeholder="foto url" required>
                    <input type="text" name="naam" placeholder="naam" required>
                    <input type="text" name="prijs" placeholder="prijs" required>
                    <input type="text" name="grootte" placeholder="grootte" required>
                    <input type="text" name="gewicht" placeholder="gewicht" required>
                    <input type="text" name="informatie" placeholder="informatie" required>
                    <input type="submit" name="toevoegen" value="Toevoegen">
                </form>
                <?php
                if (isset($_POST["nummer"])) {
                    $ingevuldeNummer = SQLite3::escapeString($_POST['nummer']);
                    if (empty($ingevuldeNummer)) {
                        echo "U heeft niks ingevuld";
                    } else {
                        $query = "SELECT * FROM items WHERE id = $ingevuldeNummer";
                        $result = $db->query($query);

                        if ($row = $result->fetchArray()) {
                            $id = $row['id'];
                            $foto = $row['foto'];
                            $naam = $row['naam'];
                            $prijs = $row['prijs'];
                            $grootte = $row['grootte'];
                            $gewicht = $row['gewicht'];
                            $informatie = $row['informatie'];
                            ?>
                            <form method="post" action="./db/db.php">
                                <h3>Wijzig</h3>
                                <input type="text" name="foto" value="<?php echo $foto; ?>" required>
                                <input type="text" name="naam" value="<?php echo $naam; ?>" required>
                                <input type="text" name="prijs" value="<?php echo $prijs; ?>" required>
                                <input type="text" name="grootte" value="<?php echo $grootte; ?>" required>
                                <input type="text" name="gewicht" value="<?php echo $gewicht; ?>" required>
                                <input type="text" name="informatie" value="<?php echo $informatie; ?>" required>
                                <input type="number" name="id" value="<?php echo $id; ?>" id="none">
                                <input type="submit" name="wijzig" value="Wijzigen">
                            </form>
                        <?php }
                    }
                } else {
                    ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <h3>Wijzig</h3>
                        <input type="text" name="nummer" placeholder="Zoek item nummer">
                        <input type="submit" value="Zoeken" name="zoek">
                    </form>
                <?php }
                ?>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["nummerWijzig"])) {
                        $ingevuldeNummerWijzig = SQLite3::escapeString($_POST['nummerWijzig']);

                        if (empty($ingevuldeNummerWijzig)) {
                            echo "U heeft niks ingevuld";
                        } else {
                            $stmt = $db->query("SELECT * FROM items WHERE id = $ingevuldeNummerWijzig");
                            $row = $stmt->fetchArray(SQLITE3_ASSOC);

                            if ($row) {
                                echo '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
                                echo "<h3>Wilt u dit item verwijderen?</h3>";
                                echo '<input type="hidden" name="nummer" value="' . $ingevuldeNummerWijzig . '">';
                                echo '<input type="submit" name="verwijder" class="marginbutton" id="verwijderButton" value="Ja, verwijder taak">';
                                echo '<input type="submit" name="stop" class="marginbutton" id="stopButton" value="Nee">';
                                echo '</form>';
                            } else {
                                echo "<h3>Item niet gevonden</h3>";
                            }
                        }
                    } elseif (isset($_POST["verwijder"])) {
                        $ingevuldeNummerWijzig = SQLite3::escapeString($_POST['nummer']);
                        $db->query("DELETE FROM items WHERE id = $ingevuldeNummerWijzig");
                        header("Location: 1F27G288ds183BG281FHa08.php");
                    } elseif (isset($_POST["stop"])) {
                    }
                }
                ?>


                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h3>Verwijder</h3>
                    <input type="text" name="nummerWijzig" placeholder="Zoek item nummer">
                    <input type="submit" value="Zoeken">
                </form>

            </crud>
            <table>
                <tr id="table_heading">
                    <td>ID</td>
                    <td>Foto url</td>
                    <td>Naam</td>
                    <td>Prijs</td>
                    <td>Grootte</td>
                    <td>Gewicht</td>
                    <td>Informatie</td>
                </tr>
                <?php
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
                    <tr id="table_body">
                        <td>
                            <?php echo $row["id"]; ?>
                        </td>
                        <td id="table_foto">
                            <?php echo $row["foto"]; ?>
                        </td>
                        <td>
                            <?php echo $row["naam"]; ?>
                        </td>
                        <td>
                            <?php echo $row["prijs"]; ?>
                        </td>
                        <td>
                            <?php echo $row["grootte"]; ?>
                        </td>
                        <td>
                            <?php echo $row["gewicht"]; ?>
                        </td>
                        <td id="table_informatie">
                            <?php echo $row["informatie"]; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </crud-box>
    </bg>

</body>

</html>