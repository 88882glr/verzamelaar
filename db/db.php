<?php
$db = new SQLite3(filename: "db.db");
$db->busyTimeout(milliseconds: 3000);

//winkelmand
if (isset($_POST["submitCookies"])) {
    $cookieData = json_encode($_COOKIE);

    $query = "INSERT INTO bestellingen (bestelling) VALUES (:cookieData)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':cookieData', $cookieData);

    if ($stmt->execute()) {
        header("Location: ../index.php?status=success");
        ;
    } else {
        echo "Error inserting data into the database.";
    }
}

// login
if (isset($_POST["login"])) {
    $usernameInput = SQLite3::escapeString($_POST["username"]);
    $passwordInput = SQLite3::escapeString($_POST["password"]);

    $query = "SELECT * FROM users WHERE username = '$usernameInput'";
    $result = $db->querySingle($query, true);

    if ($result) {
        $storedPassword = $result['password'];
        if ($passwordInput == $storedPassword) {
            header("Location: ../1F27G288ds183BG281FHa08.php");
        } else {
            header("Location: ../login.php");
        }
    } else {
        header("Location: ../login.php");
    }
}

//admin
//toevoegen
if (isset($_POST["toevoegen"])) {
    $toevoegen_foto = SQLite3::escapeString($_POST["foto"]);
    $toevoegen_naam = SQLite3::escapeString($_POST["naam"]);
    $toevoegen_prijs = SQLite3::escapeString($_POST["prijs"]);
    $toevoegen_grootte = SQLite3::escapeString($_POST["grootte"]);
    $toevoegen_gewicht = SQLite3::escapeString($_POST["gewicht"]);
    $toevoegen_informatie = SQLite3::escapeString($_POST["informatie"]);

    $query = "INSERT INTO items (foto, naam, prijs, grootte, gewicht, informatie) 
            VALUES (:toevoegen_foto, :toevoegen_naam, :toevoegen_prijs, :toevoegen_grootte, :toevoegen_gewicht, :toevoegen_informatie)";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':toevoegen_foto', $toevoegen_foto);
    $stmt->bindParam(':toevoegen_naam', $toevoegen_naam);
    $stmt->bindParam(':toevoegen_prijs', $toevoegen_prijs);
    $stmt->bindParam(':toevoegen_grootte', $toevoegen_grootte);
    $stmt->bindParam(':toevoegen_gewicht', $toevoegen_gewicht);
    $stmt->bindParam(':toevoegen_informatie', $toevoegen_informatie);

    try {
        $stmt->execute();
        header("Location: ../1F27G288ds183BG281FHa08.php");
        exit();
    } catch (Exception $e) {
        die("Fout bij het toevoegen van gegevens: " . $e->getMessage());
    }
}
//wijzig
if (isset($_POST["wijzig"])) {
    $wijzig_foto = SQLite3::escapeString($_POST["foto"]);
    $wijzig_naam = SQLite3::escapeString($_POST["naam"]);
    $wijzig_prijs = SQLite3::escapeString($_POST["prijs"]);
    $wijzig_grootte = SQLite3::escapeString($_POST["grootte"]);
    $wijzig_gewicht = SQLite3::escapeString($_POST["gewicht"]);
    $wijzig_informatie = SQLite3::escapeString($_POST["informatie"]);
    $id = SQLite3::escapeString($_POST["id"]);

    $query = "UPDATE items SET foto = :wijzig_foto, naam = :wijzig_naam, prijs = :wijzig_prijs, grootte = :wijzig_grootte, gewicht = :wijzig_gewicht, informatie = :wijzig_informatie  WHERE id = :id";

    $stmt = $db->prepare($query);
    $stmt->bindParam(':wijzig_foto', $wijzig_foto);
    $stmt->bindParam(':wijzig_naam', $wijzig_naam);
    $stmt->bindParam(':wijzig_prijs', $wijzig_prijs);
    $stmt->bindParam(':wijzig_grootte', $wijzig_grootte);
    $stmt->bindParam(':wijzig_gewicht', $wijzig_gewicht);
    $stmt->bindParam(':wijzig_informatie', $wijzig_informatie);
    $stmt->bindParam(':id', $id);

    try {
        $stmt->execute();
        header("Location: ../1F27G288ds183BG281FHa08.php");
        exit();
    } catch (Exception $e) {
        die("Fout bij het wijzig van gegevens: " . $e->getMessage());
    }
}
?>