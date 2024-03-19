<!DOCTYPE html>
<!--cette page est le front de la réinitialisation du mot de passe -->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du Mot de Passe - AeroPrice</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="icone.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
        body {
            background-image: url('fond1.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .welcome-text {
            font-size: 36px;
            font-weight: bold;
            color: #000000;
            margin-bottom: 20px;
            text-align: left;
        }
        .right-box {
            padding: 40px 30px 40px 40px;
        }
        input[type="password"] {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 8px; 
            width: 100%; 
        }
        ::placeholder {
            font-size: 16px;
        }
    </style>
</head>
<body>
    
<header>
        <?php include('headered.php'); ?>
          </header>  


    <main class="main-container">
      <div class="container d-flex justify-content-center align-items-center min-vh-100 " >
         <div class="row border rounder-5 p-3 bg-white shadow box-area ">
          <div class="col-md-6 rounded-4 d-flex justify-content-center align align-items-center flex-column left-box " style="background-color: #ffffff; background-size: cover;">    
            <div class="featured-image" style="background: #ffffff;">
              <figure>
              <img src="logo1.png" class="img_fluid" alt="background du body" style="max-width: 100%;
        height: auto; ">
                <figcaption></figcaption>
              </figure>
             </div>
            <p class="text-white fs-2" style="font-family: Arial, Helvetica, sans-serif;font-weight: 700;"></p>
            <small class="text-white text-wrap text-center" style="width: 25rem;font-family: 'Courier New', Courier, monospace; font-size: 20px;font-weight:bold;" >Trouvez les meilleurs tarifs pour vos vols avec AeroPrice</small>
          </div>
                
                <div class="col-md-6 right-box">
                    <div class="header-text mb-3">
                        <h1 class="welcome-text">Réinitialiser votre mot de passe</h1>
                    </div>
                    <form id="resetPasswordForm" action="update_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">

        <div class="mb-3">
            <label for="new_password" class="form-label">Nouveau Mot de Passe:</label>
            <input type="password" id="new_password" class="form-control" name="new_password" required>
            <div id="newPasswordMessage" class="password-message"></div>
        </div>

        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmer le Mot de Passe:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            <div id="confirmPasswordMessage" class="password-message"></div>
        </div>

        <div class="input-group mb-5">
            <button type="submit" class="btn btn-lg btn-primary w-100">Réinitialiser le Mot de Passe</button>
        </div>
            </form>

                </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>À propos</h5>
                    <p>Bienvenue sur Aeroprice, votre compagnon de confiance pour trouver les meilleurs tarifs de billets d'avion. Notre mission est de simplifier le processus de recherche et de réservation de vols en vous offrant une plateforme conviviale et intuitive.</p>
                </div>
                <div class="col-md-4">
                    <h5>Liens utiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="temp/accueil.php">Accueil</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contacts/contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact</h5>
                    <p>Adresse : 33 bd du port Cergy 95000</p>
                    <p>Téléphone : 01 234 567 89</p>
                    <p>Email : etudiant@cyu.fr</p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        document.getElementById('new_password').addEventListener('input', validateNewPassword);
        document.getElementById('confirm_password').addEventListener('input', validateConfirmPassword);

        function validateNewPassword() {
            var password = document.getElementById('new_password').value;
            var messages = [];

            if (password.length < 8) messages.push('Au minimum 8 caractères.');
            if (!/[0-9]/.test(password)) messages.push('Au moins un chiffre.');
            if (!/[A-Z]/.test(password)) messages.push('Au moins une majuscule.');
            if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) messages.push('Au moins un caractère spécial.');

            document.getElementById('newPasswordMessage').innerHTML = messages.join('<br>');
        }

        function validateConfirmPassword() {
            var password = document.getElementById('new_password').value;
            var confirmPassword = document.getElementById('confirm_password').value;

            var message = password === confirmPassword ? '' : 'Les mots de passe ne concordent pas.';
            document.getElementById('confirmPasswordMessage').innerHTML = message;
        }

        document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
            var newPasswordMessage = document.getElementById('newPasswordMessage').innerHTML;
            var confirmPasswordMessage = document.getElementById('confirmPasswordMessage').innerHTML;

            if (newPasswordMessage !== '' || confirmPasswordMessage !== '') {
                event.preventDefault();
                alert('Veuillez corriger les erreurs dans le formulaire.');
            }
        });
    </script>
</body>
</html>
