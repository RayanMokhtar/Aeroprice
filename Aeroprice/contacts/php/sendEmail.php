<?php //envoi d'un autre  mail pour réinitialiser le mot de passe 
session_start();
include('../../config.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('../../src/Exception.php');
require('../../src/PHPMailer.php');
require('../../src/SMTP.php');
$category = trim(stripslashes($_POST['category']));
$mail = new PHPMailer(true); // Créez une instance de PHPMailer
try {
    // Paramètres du serveur
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Spécifiez votre serveur SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'ratayab426@gmail.com'; // SMTP username
    $mail->Password = 'sgygqsozegaqjtqx'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinataires
    $mail->setFrom($_POST['email'], $_POST['name']); // L'expéditeur sera l'email fourni dans le formulaire
    $mail->addAddress('ratayab426@gmail.com'); // Ajoutez l'adresse de réception

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];

    $mail->send();
    echo 'Le message a été envoyé.';
} catch (Exception $e) {
    echo "Le message n'a pas pu être envoyé. Erreur de Mailer: {$mail->ErrorInfo}";
}
?>
