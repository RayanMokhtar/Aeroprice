<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('src/Exception.php');
require('src/PHPMailer.php');
require('src/SMTP.php');

include('config.php');

$recaptcha_secret = "6LcgJOUoAAAAAKG_zcFCHryuc6AKwYxnThRdPGH4";

function generateCode() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code_length = 10;
    $code = '';

    for ($i = 0; $i < $code_length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mot_de_passe = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
            $recaptcha_response = $_POST['g-recaptcha-response'];
            $remoteip = $_SERVER['REMOTE_ADDR'];

            $url = "https://www.google.com/recaptcha/api/siteverify";
            $data = array(
                'secret' => $recaptcha_secret,
                'response' => $recaptcha_response,
                'remoteip' => $remoteip
            );

            $options = array(
                'http' => array(
                    'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method' => 'POST',
                    'content' => http_build_query($data),
                ),
            );

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $responseKeys = json_decode($result, true);
            $code=generateCode();
            if (isset($responseKeys["success"]) && $responseKeys["success"] === true) {
                try {
                    $stmt = $conn->prepare("INSERT INTO inscription_temp (nom, prenom, username, email, mot_de_passe,code) VALUES (:nom, :prenom, :username, :email, :mot_de_passe, :code)");
                    $stmt->bindParam(':nom', $nom);
                    $stmt->bindParam(':nom', $nom);
                    $stmt->bindParam(':prenom', $prenom);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
                    $stmt->bindParam(':code', $code);

                    $stmt->execute();

                    $mail = new PHPMailer(true);
                    
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
                    $mail->Subject = "Confirmation INSCRIPTION";
                    $mail->Body = "VOICI VOTRE CODE POUR CONFIRMER VOTRE INSCRIPTION " . "https://aeroprice.alwaysdata.net/confirmation_inscription.php?code=". $code;
                    $mail->send();

                    echo " Veuillez vérifier votre boîte mail.";
                    
                    header("Location: attente.php?email=" . urlencode($email)); // Redirige vers la page d'attente compte à rebours
                    exit(); 
                    
                } catch (Exception $e) {
                    $message = $mail->ErrorInfo;
                    echo "Erreur : " . $message;
                }
            } else {
                echo "Erreur de validation du reCAPTCHA.";
            }
        } else {
            echo "Veuillez remplir le reCAPTCHA.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
}