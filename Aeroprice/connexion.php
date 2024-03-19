<?php
include('config.php'); 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
        $email = $_POST['email'];
        $password = $_POST['mot_de_passe'];

        $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: temp/accueil.php");
            exit();
        } else {
            header("Location: htmlconnexion.php?erreur=1"); // Rediriger avec erreur
            exit();
        }
    } else {
        header("Location: htmlconnexion.php?erreur=2"); // Manque de champs à remplir timsa7
        exit();
    }
}
?>
