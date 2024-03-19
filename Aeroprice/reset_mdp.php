
<!DOCTYPE html>
<!-- page de vérification de boite de récéption-->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérifiez votre boîte de réception</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('fond1.png');
            background-size: cover; /* Ceci garantit que l'image couvre tout l'écran */
            background-position: center; /* Centrer l'image */
            background-repeat: no-repeat; /* Pour ne pas répéter l'image */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message-box {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin: auto;
            width: 90%;
            max-width: 500px;
        }
        .message-box h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .message-box p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
        }
        .message-box a {
            color: #007bff;
            text-decoration: none;
        }
        .message-box a:hover {
            text-decoration: underline;
        }
        @media (max-width: 576px) {
            .message-box {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="message-box text-center">
        <h2>Vérifiez votre boîte de réception</h2>
        <p>Validez votre adresse email pour utiliser votre compte.</p>
        <p>Nous avons envoyé à l'adresse <strong><?php echo htmlspecialchars($_GET['email']); ?></strong> un email contenant un bouton permettant de valider votre adresse email.</p>
        <p>Avez-vous reçu cet email ? Si ce n'est pas le cas, consultez votre dossier de courriers indésirables ou <a href="resend_email.php"> demandez l'envoi d'un nouvel email </a>de validation  qui sera valable 3 jours. Si votre adresse email n'a pas été validée dans les 3 jours, il est possible que vous deviez créer un nouveau compte. Si vous rencontrez des problèmes, consultez l'Aide sur votre compte.</p>
        
        <a href="politique.html" target="_blank"> d'utilisation et confidentialité</a> | 
        <a href="politique.html" target="_blank">Préférences en matière de cookies</a>
    </div>
</body>
</html>
