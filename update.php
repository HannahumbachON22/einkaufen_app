<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    
    <!-- Stylesheets und Schriftarten -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- CSS für die gesamte Seite -->
    <style>
        body {
            background-color: #b7d0bb;
            color: #004506;
            font-family: 'Poppins', sans-serif; 
        }
        h3 {
            font-family: 'Poppins', sans-serif; 
        }
        .rounded-box {
            border-radius: 10px; 
        }
    </style>
</head>

<?php
    // Daten aus der URL abrufen 
$id = $_GET['ID'];

include "config.php";
$Rdata = mysqli_query($con,"select * from einkaufsliste where id = $id");
$data = mysqli_fetch_array($Rdata);
?>

<body> 
<form action="update1.php" method="POST">
    <div class="container">

    <!-- Formular-Container -->
        <div class="row justify-content-center m-auto shadow bg-white rounded-box mt-3 py-3 col-md-12">
            <h3 class="text-center">Aktualisierung</h3> 
            <div class="col-10">
                <input type="text" required value="<?php echo $data['list'] ?>" name="list" class="form-control">
            </div>
            <div class="col-2">
                <button class="btn btn-outline-primary">Aktualisieren</button>
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            </div>
        </div>
    </div>
</form>
</body>
</html>
