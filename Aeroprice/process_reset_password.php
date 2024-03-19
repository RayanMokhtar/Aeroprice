<?php 
// Démarrer la session au début du script
session_start();

// Envoi du premier mail pour réinitialiser le mot de passe
include('config.php'); // Assurez-vous que ce fichier contient les informations de connexion à la base de données
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('src/Exception.php');
require('src/PHPMailer.php');
require('src/SMTP.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    // Vérifiez si l'e-mail existe dans la base de données
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Générer un token de réinitialisation
        $token = bin2hex(random_bytes(50));

        // Enregistrer le token dans la base de données
        $stmt = $conn->prepare("UPDATE utilisateurs SET reset_token = :token, token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = :email");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Stocker l'adresse e-mail dans la session pour une utilisation ultérieure
        $_SESSION['email_for_reset'] = $email;

        // Envoyer un e-mail à l'utilisateur avec le lien de réinitialisation
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->Username = "ratayab426@gmail.com"; // Remplacez par votre adresse e-mail
            $mail->Password = "sgygqsozegaqjtqx"; // Remplacez par votre mot de passe
            $mail->CharSet = "utf-8";
            $mail->setFrom("ratayab426@gmail.com", "AeroPrice Support");
            $mail->addAddress($email);
            $mail->Subject = "Réinitialisation du mot de passe";
            $mail->Body = "Pour réinitialiser votre mot de passe, veuillez cliquer sur ce lien : https://aeroprice.alwaysdata.net/reinitialisermdp.php?token=" . $token;
            $mail->send();

            // Rediriger l'utilisateur vers une page de confirmation
            header("Location: reset_mdp.php?email=" . urlencode($email));
            exit;
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur de Mailer : {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['error'] = "Aucun utilisateur trouvé avec cet e-mail. Veuillez réessayer.";
        header("Location: nouveau_mdp.php");
        exit;
    }
} else {
    echo "Requête invalide.";
}
?>
