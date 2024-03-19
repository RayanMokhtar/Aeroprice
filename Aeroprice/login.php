<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $username; ?> !</h1>
    <a href="logout.php">Se Déconnecter</a>
</body>
</html>
