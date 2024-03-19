<!DOCTYPE html>
<html lang="fr">

<head>
<!-- front de la page de connexion après la premiere connexion -->
  <meta charset="UTF-8">
  
  <title>Page Connexion</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/x-icon" href="icone.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
      @import url('https://fonts.googleapis.com/css?family=Poppins');
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body{
          background-image: url('fond1.png');
          background-size: cover;
          background-position: center;
          background-repeat: no-repeat;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            }


        input[type="text"],
        input[type="password"] {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 8px; 
            width: 100%; 
        }
        .welcome-text {
            font-size: 36px;
            font-weight: bold;
            color: #000000;
            margin-bottom: 20px;
            text-align: left;
        }

        .form-check-input {
            width: 1.3em; 
            height: 1.3em;
        }

        .form-check-input:checked {
            background-color: #0C274E;
            border-color: #0C274E; 
        }

        .form-check-input:focus {
            box-shadow: none; 
        }
        .right-box{
            padding:40px 30px 40px 40px;

        }
        ::placeholder{
            font-size: 16px;
        }
        
        footer {
          margin-top: 0; 
        }
        
    </style>
    <script>
      function validerFormulaire() {
        var email = document.getElementById("email").value;
        var motDePasse = document.getElementById("mot_de_passe").value;
  
        if (email === "" || motDePasse === "") {
          alert("Veuillez remplir tous les champs.");
          return false;
        }
  
        return true;
      }
    </script>

</head>
<body> 
  <header>
<?php include('headered.php'); ?>
  </header>  
<main class="main-container">
   <!-- Début du message d'erreur -->
   <?php 
        
        if (isset($_SESSION['password_reset_success'])) {
          session_start();
            echo "<div class='alert alert-success'>" . $_SESSION['password_reset_success'] . "</div>";
            unset($_SESSION['password_reset_success']);
        }
        else{}
        ?>
   <?php if(isset($_GET['erreur'])): ?>
   <div class="alert alert-danger" role="alert">
       <?php
       if($_GET['erreur'] == 1) {
           echo "l'adresse e-mail ou le mot de passe que vous venez d'insérer est incorrect , Veuillez rééssayer .";
       } elseif($_GET['erreur'] == 2) {
           echo "Veuillez remplir tous les champs.";
       }
       ?>
   </div>
<?php endif; ?>

<!-- Fin du message d'erreur -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 ">
      <div class="row border rounder-5 p-3 bg-white shadow box-area ">
        <div class="col-md-6 rounded-4 d-flex justify-content-center align align-items-center flex-column left-box ; background-size: cover;">    
          <div class="featured-image" >
            <figure>
            <img src="logo1.png" class="img_fluid" alt="background du body" style="max-width: 100%;
          height: auto; ">
             <figcaption></figcaption>
            </figure>
          </div>
          <p class="text-white fs-2" style="font-family: Arial, Helvetica, sans-serif;font-weight: 700;"></p>
          <small class="text-white text-wrap text-center" style="width: 25rem;font-family: 'Courier New', Courier, monospace; font-size: 20px;font-weight:bold;" >Trouvez les meilleurs tarifs pour vos vols avec AeroPrice</small>
        </div>
        
        <div class="col-md-6 right-box ">
          <form id="connexionForm" action="connexion.php" method="post">
          <div class="row align-content-center">
            <div class="header-text mb-3">
              <h1 class="welcome-text">Bienvenue chez AeroPrice</h1>
              <p>Si vous avez déjà un compte AeroPrice, votre prochaine aventure n'est qu'à quelques clics. Connectez-vous pour reprendre là où vous vous êtes arrêté, et continuez à explorer, réserver et gérer vos voyages avec facilité </p>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg bg-white fs-6" id="email" name="email" placeholder="Adresse mail">
            </div> 
            <div class="input-group mb-3">
                <input type="password" class="form-control form-control-lg bg-white fs-6" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe">
        
            </div>
            <div class="input-group mb-4 d-flex">
              <div class="form-check">
                
                <label for="formCheck"><small></small></label>
              </div>
              <div class="forgot">
                <small><a href="nouveau_mdp.php"> Mot de passe oublié? </a></small>
              </div>
            </div>
            <div class="input-group mb-5">
              <button class="btn btn-lg btn-primary w-100 fs-6" style="background-color:#437EB1;font-weight: bold;">Se connecter</button>
            </div>
            <div class="row">
              <small>vous n'avez toujours pas de compte ? <a href="inscription.php"> Devenez membre</a> </small>
            </div>
            <div class="row mt-5">
              <small >En vous connectant, vous acceptez que vos données personnelles soient utilisées conformément à notre <a href="politique.php"> politique de confidentialité</a> </small>
            </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </main>

    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h5>À propos</h5>
            <p>
              Bienvenue sur Aeroprice, votre compagnon de confiance pour trouver les meilleurs tarifs de billets d'avion. Notre mission est de simplifier le processus de recherche et de réservation de vols en vous offrant une plateforme conviviale et intuitive.
              
             </p>
          </div>
          <div class="col-md-4">
                        <h5 style="font-weight: bold;">Liens utiles</h5>
                        <ul class="list-unstyled">
                          <li ><a style="color: black;" href="../services.php">Services</a></li>
                          <li  ><a  style="color: black;" href="../contacts/contact.php">Contact</a></li>
                          <li ><a style="color: black;" href="#">à propos</a></li>
                        </ul>
                      </div>
          <div class="col-md-4">
            <h5>Contact</h5>
            <p>Adresse : 33 bd du port Cergy 95000</p>
            <p>Téléphone : 01 234 567 89</p>
          <p>Email : etudiant@cyu.fr</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>&copy; 2023 AeroPrice. Tous droits réservés.</p>
          </div>
        </div>
    </div>
    </footer>
    <!DOCTYPE html>
    <html lang="fr">
    <!-- ... (le reste de votre code HTML) ... -->
    
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("connexionForm").addEventListener("submit", function(e) {
          if (!validerFormulaire()) {
            e.preventDefault(); // Empêche la soumission du formulaire si la validation échoue
          }
        });
      });
    
      function validerFormulaire() {
        var email = document.getElementById("email").value;
        var motDePasse = document.getElementById("mot_de_passe").value;
        var regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
        if (email === "" || motDePasse === "") {
          alert("Veuillez remplir tous les champs.");
          return false;
        } else if (!regexEmail.test(email)) {
          alert("Veuillez entrer une adresse e-mail valide 'exemple@domain.com' ");
          return false;
        }
    
        return true;
      }
    </script>
    
    </body>
    </html>
    
  </body>
</html>
