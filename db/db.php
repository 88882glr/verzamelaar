<?php
$db = new SQLite3(filename: "db.db");
$db->busyTimeout(milliseconds: 3000);

// if (isset($_POST["submit"])) {
//     $voornaam = SQLite3::escapeString(($_POST["voornaam"]));
//     $achternaam = SQLite3::escapeString(($_POST["achternaam"]));
//     $tel = SQLite3::escapeString(($_POST["tel"]));
//     $email = SQLite3::escapeString(($_POST["email"]));
//     $bod = SQLite3::escapeString(($_POST["bod"]));
//     $datum = date('d-m-Y');
//     $naam = $_GET['naam'];

//     $query =
//         "INSERT INTO biedingen (voornaam, achternaam, tel, email, bod, datum, naam) 
//     VALUES ('$voornaam','$achternaam','$tel','$email','$bod', '$datum', '$naam')";

//     $db->exec($query);

//     header(header: "Location: ../details.php?naam={$naam}");
// }

// if (isset($_POST["submitVraag"])) {
//     $voornaamvraag = SQLite3::escapeString(($_POST["voornaamvraag"]));
//     $achternaamvraag = SQLite3::escapeString(($_POST["achternaamvraag"]));
//     $telvraag = SQLite3::escapeString(($_POST["telvraag"]));
//     $emailvraag = SQLite3::escapeString(($_POST["emailvraag"]));
//     $vraag = SQLite3::escapeString(($_POST["vraag"]));

//     $query =
//         "INSERT INTO contact (voornaam, achternaam, tel, email, vraag) 
//     VALUES ('$voornaamvraag','$achternaamvraag','$telvraag','$emailvraag','$vraag')";

//     $db->exec($query);

//     header(header: "Location: ../thankyou.php");
// }