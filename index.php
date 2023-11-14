<?php
session_start();

// LOGIN überprüft, ob der Benutzer angemeldet ist
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include "config.php";
$rawData = mysqli_query($con, "select * from einkaufsliste");

// CSV-Datei zum herunterladen erstellen
$csvFileName = 'einkaufsliste.csv';
$csvFile = fopen($csvFileName, 'w');

fputcsv($csvFile, ['ID', 'Liste']);

while ($row = mysqli_fetch_array($rawData)) {
    fputcsv($csvFile, [$row['id'], $row['list']]);
}

fclose($csvFile);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE, edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einkaufsliste</title>
    
    <!-- Stylesheets und Schriftarten -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Einbindung von Font Awesome für meine Icons -->
    <script src="https://kit.fontawesome.com/eb2cfeef2f.js" crossorigin="anonymous"></script>

    <!-- CSS für die gesamte Seite -->
    <style>
    body {
        background-color: #f5cae6;
        font-family: 'Poppins', sans-serif;
    }
    h3 {
        color: #bf5e9d;
        font-family: 'Poppins', sans-serif; 
    }
    .table, .table td {
        font-family: 'Poppins', sans-serif; 
    }
    .rounded-box {
        border-radius: 10px; 
    }
    .table tbody tr:nth-child(even) {
        background-color: #ffe6f2 !important;
    }
    </style>
</head>

<body> 
    <?php if (!isset($_SESSION['user'])) : ?>
        <!-- Zeige Login-Formular, wenn der Benutzer nicht angemeldet ist -->
        <form action="login.php" method="POST">
            <div class="container">
                <div class="row justify-content-center m-auto shadow bg-white rounded-box py-3 col-md-12">
                    <h3 class="text-center">Login</h3> 
                    <button type="submit" class="btn btn-outline-primary">Login</button>
                </div>
            </div>
        </form>
    <?php else : ?>
        <!-- Container für das Eingabeformular -->
        <form action="insert.php" method="POST">
            <div class="container">
                <div class="row justify-content-center m-auto shadow bg-white rounded-box py-3 col-md-12">
                    <h3 class="text-center">Einkaufsliste</h3> 
                    <div class="col-10">
                        <input type="text" required name="list" class="form-control">
                    </div>
                    <div class="col-1">
                        <button class="btn btn-outline-primary"><i class="fas fa-plus-square"></i></button>
                    </div>
                    <div class="col-1">
                        <a href="einkaufsliste.csv" class="btn btn-outline-primary" download><i class="fas fa-download"></i></a>
                    </div>
                </div>
            </div>
        </form>

        <!-- Container für die Tabellenausgabe -->
        <div class="container">
            <div class="col-8 bg-white m-auto rounded-box mt-3">
                <table class="table">
                    <tbody class="fs-3 text-primary shadow">
                        <?php
                        $rawData = mysqli_query($con, "select * from einkaufsliste");
                        while ($row = mysqli_fetch_array($rawData)) {
                        ?>
                            <tr>
                                <td><?php echo $row['list'] ?></td>
                                <td style="width: 10%;"> <a href="delete.php?ID=<?php echo $row['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a></td>
                                <td style="width: 10%;"> <a href="update.php?ID=<?php echo $row['id'] ?>" class="btn btn-outline-success"><i class="fas fa-pencil-alt"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>

