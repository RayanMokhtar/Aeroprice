<?php
session_start(); // Démarre la session

// Détruit toutes les variables de session
$_SESSION = array();

// Détruit la session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy(); // Détruit la session

header("Location: htmlconnexion.php"); // Redirige vers la page de connexion
exit();
?>
