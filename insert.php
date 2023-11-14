<?php
// POST-Daten einfügen
$LIST = $_POST['list'];

include "config.php";

mysqli_query($con, "INSERT INTO `einkaufsliste`(`list`) VALUES ('$LIST')");

header("location: index.php");
mysqli_close($con);
?>
