<?php
// POST-Daten aktualisieren
include "config.php";

$List = $_POST['list'];
$ID = $_POST['id'];

mysqli_query($con, "UPDATE `einkaufsliste` SET `list`='$List' WHERE id= $ID ");

header("location: index.php");
?>
