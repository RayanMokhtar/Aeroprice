<?php 
session_start();
include('config.php'); // Assurez-vous que ce fichier contient les informations de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $token = $_POST['token'];

    if ($new_password !== $confirm_password) {
        // Les mots de passe ne correspondent pas
        exit("Les mots de passe ne correspondent pas.");
    }

    // Vérifiez si le token est valide et non expiré
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE reset_token = :token AND token_expiry > NOW()");
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();

        // Mise à jour du mot de passe
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE utilisateurs SET mot_de_passe = :hashed_password, reset_token = NULL, token_expiry = NULL WHERE id = :id");
        $stmt->bindParam(':hashed_password', $hashed_password);
        $stmt->bindParam(':id', $user['id']);
        $stmt->execute();

        // Stockez le message de succès dans la session
        $_SESSION['password_reset_success'] = "Votre mot de passe a été réinitialisé avec succès.";

        // Redirigez vers la page de connexion
        header("Location: htmlconnexion.php");
        exit();
    } else {
        echo "Le lien de réinitialisation est invalide ou a expiré.";
    }
} else {
    echo "Erreur dans la demande de réinitialisation du mot de passe.";
}
?>
