<?php
session_start();

// Hier sind die festgelegten Benutzernamen und Passwörter
$validUsernames = ["Hannah"];
$validPasswords = ["ON22"];

$loginError = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Überprüfen, ob Benutzername und Passwort gültig sind
    if (in_array($username, $validUsernames) && in_array($password, $validPasswords)) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
        exit;
    } else {
        $loginError = "Ungültige Anmeldeinformationen. Versuchen Sie es erneut.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE, edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
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
        .container {
            margin-top: 50px;
        }
        .login-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #bf5e9d;
            font-family: 'Poppins', sans-serif; 
        }
    </style>
</head>
<body> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-box">
                    <h3 class="text-center">Login</h3>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($loginError)) {
                        echo '<p style="color: red;">' . $loginError . '</p>';
                    }
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Benutzername:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Passwort:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-outline-primary">Anmelden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
