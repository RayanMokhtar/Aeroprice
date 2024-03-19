<?php //envoi d'un autre  mail pour réinitialiser le mot de passe 
session_start();
include('config.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('src/Exception.php');
require('src/PHPMailer.php');
require('src/SMTP.php');

if (isset($_SESSION['email_for_reset'])) {
    $email = $_SESSION['email_for_reset'];

    // Vérifier si l'e-mail existe dans la base de données
    $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Générer un nouveau token de réinitialisation
        $token = bin2hex(random_bytes(50));

        // Enregistrer le nouveau token dans la base de données
        $stmt = $conn->prepare("UPDATE utilisateurs SET reset_token = :token, token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = :email");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Envoyer l'e-mail de réinitialisation
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->Username = "ratayab426@gmail.com"; //adresse mail
            $mail->Password = "sgygqsozegaqjtqx"; //  mot de passe de votre adresse Gmail
            $mail->CharSet = "utf-8";
            $mail->setFrom("ratayab426@gmail.com","AeroPrice Support");
            $mail->addAddress($email);
            $mail->Subject = "Réinitialisation du mot de passe";
            $mail->Body = "Pour réinitialiser votre mot de passe, veuillez cliquer sur ce lien : " . "https://aeroprice.alwaysdata.net/reinitialisermdp.php?token=" . $token;
            $mail->send();

            echo "Un lien de réinitialisation de mot de passe a été envoyé à votre adresse e-mail.";
            header("Location: reset_mdp.php?email=" . urlencode($email));
        } catch (Exception $e) {
            echo "Le message n'a pas pu être envoyé. Erreur de Mailer : {$mail->ErrorInfo}";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet e-mail.";
    }
} else {
    echo "Aucune adresse e-mail fournie pour la réinitialisation.";
}
?>
