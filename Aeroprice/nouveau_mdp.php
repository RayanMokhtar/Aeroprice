<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
  <!-- page ou on entre l'adresse mail de l'utilisateur pour changer le mot de passe afin de se connecter-->
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
    background-size: cover; /* Ceci garantit que l'image couvre tout l'écran */
    background-position: center; /* Centrer l'image */
    background-repeat: no-repeat; /* Pour ne pas répéter l'image */
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
        input[type="email"] {
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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand mr-auto" style="font-weight:700;" href="#"> 
              <img src="logo1.png" width="55" alt="Site logo">
              AEROPRICE
          </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0 custom-nav-links">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" style="font-weight:700;" href="temp/index.html" >Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#"  style="font-weight:700;" >Contacts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="htmlconnexion.php" style="font-weight:700;" >Se connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inscription.php" style="font-weight:700;"> S'inscrire</a>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
</header>

    <main class="main-container">
      <div class="container d-flex justify-content-center align-items-center min-vh-100 " style="
      background-size: cover; /* Ceci garantit que l'image couvre tout l'écran */
      background-position: center; /* Centrer l'image */
      background-repeat: no-repeat; /* Pour ne pas répéter l'image */">
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
                        <h1 class="welcome-text">Réinitialisation du Mot de Passe</h1>
                        <p>Entrez votre adresse e-mail pour réinitialiser votre mot de passe</p>
                    </div>
                    <form id="resetPasswordForm" action="process_reset_password.php" method="post">
                        <div class="mb-3">
                            <input type="email" class="form-control form-control-lg bg-white fs-6" id="email" name="email" placeholder="Adresse mail" required>
                        </div>
                        <?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php 
            echo $_SESSION['error']; 
            unset($_SESSION['error']); // Effacer le message d'erreur après l'affichage
        ?>
    </div>
<?php endif; ?>
                        
                        <div class="input-group mb-5">
                            <button class="btn btn-lg btn-primary w-100 fs-6" style="background-color:#437EB1;font-weight: bold;">Envoyer le lien de réinitialisation</button>
                        </div>
                    </form>
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
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
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
</body>
</html>
