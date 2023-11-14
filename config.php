<?php
// Datenbankverbindung herstellen
$host = "localhost";
$username = "root";
$password = "";
$database = "einkauf_app";

$con = mysqli_connect($host, $username, $password, $database);

// Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
if (!$con) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
}
?>
