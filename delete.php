<?php
// Datenbankeintrag löschen
include "config.php";

$id = $_GET['ID'];

mysqli_query($con, "DELETE FROM `einkaufsliste` WHERE id = $id");

header("location: index.php");
mysqli_close($con);
?>
