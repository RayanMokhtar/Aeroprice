<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8">
  
  <title>Page Inscription</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/x-icon" href="icone.ico">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js"></script>

  

  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins');
    body{
      
    background-image: url('fond1.png');
    background-size: cover;
        background-position: center;
         background-repeat: no-repeat;
        height: 100%;
        font-family: 'Poppins', sans-serif;
    }
    .box-area {
    /* Ajustez ces valeurs selon vos besoins */
    max-width: 1200px; /* Largeur maximale */
    width: 80%; /* Largeur relative */
    padding: 20px; /* Espacement interne */
    margin: auto; /* Centrage */
    background-color: #fff; /* Couleur de fond */
    border-radius: 10px; /* Bordures arrondies */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Ombre */
}

    input[type="text"],
    input[type="password"] {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 8px; 
        width: 100%; 
    }

    .form-check-input {
        width: 1.3em; 
        height: 1.3em;
    }

    .form-check-input:checked {
        background-color: #97E5C0;
        border-color: #97E5C0; 
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
    .welcome-text {
        font-size: 36px;
        font-weight: bold;
        color: #000000;
        margin-bottom: 20px;
        text-align: left;
    }
      .error-border {
        border: 1px solid red !important;
    }
    footer {
      margin-top: 0; 
    }

  </style>

</head>

<body> 
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand mr-auto" href="#">
          <img src="logo1.png" width="55px" alt="Site logo">
          AEROPRICE
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 custom-nav-links">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="temp/index.html">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Contacts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="htmlconnexion.php">Se connecter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <main class="main-container">

    <form id="inscriptionForm" action="inscriptions.php" method="POST">
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
       
        <div class="col-md-6 right-box ">
          <div class="row align-content-center">
            <div class="header-text mb-3">
              <h1 class="welcome-text">Bienvenue chez AeroPrice</h1>
              <p>Nous sommes ravis de vous avoir parmi nous </p>
            </div>
           
            <div class="col-md-6">
              <div class="input-group mb-3">
                <label for="nom"></label>
                <input type="text" id="nom" name="nom" class="form-control form-control-lg bg-white fs-6" placeholder="Nom">
            </div>
            </div>
            <div class="col-md-6">
              <div class="input-group mb-3">
                <input type="text"  id="prenom" name="prenom" class="form-control form-control-lg bg-white fs-6" placeholder="Prénom">
              </div>
            </div>
            <div class="col-md-12">
    <div id="nomMessage" ></div>
    <div id="prenomMessage"></div>
            <div class="input-group mb-3 col-md-12">
              <input type="text" name="username" class="form-control form-control-lg bg-white fs-6" id='username' placeholder="Entrez votre nom d'utilisateur">
            </div>
            <div id="usernameMessage" ></div> <!-- message ajax -->
            </div>
            <div class="input-group mb-3 col-md-12">
              <input type="text" name="email" id='email' class="form-control form-control-lg bg-white fs-6" placeholder="Adresse mail">
            </div>
            <div id="emailMessage" ></div> <!-- message ajax -->
            <div class="input-group mb-3 col-md-12">
              <input type="password" name="password" id="password" class="form-control form-control-lg bg-white fs-6" placeholder="Mot de passe">
            </div>
            <div class="input-group mb-3 col-md-12">
              <input type="password" name="confirmPassword" id="confirmPassword" class="form-control form-control-lg bg-white fs-6" placeholder="Confirmation Mot de passe">
            </div>
            <div id="passwordMessage" style="color: gray;"></div>

            <!-- fin partie input-->
            <div class="input-group mb-4 d-flex">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="formCheck">
                <label for="formCheck"><small></small></label>
              </div>
              <div class="forgot">
                <small>Se souvenir de moi ?</small>
              </div>
            </div>
            <!--button-->
            <div class="input-group mb-5" >
              <button 
              data-sitekey="6LcgJOUoAAAAAGGqnv1vHTj3mtnA3725P2vzGW49" 
              data-callback='onSubmit' 
              data-action='submit' class="g-recaptcha btn btn-lg btn-primary w-100 fs-6" style="background-color:#437EB1;font-weight: bold;">S'inscrire</button>
            </div>
            <div class="row">
              <small>vous disposez déjà d'un compte ? <a href="htmlconnexion.php">Se connecter</a> </small>
            </div>
            <div class="row mt-5">
              <small >En vous connectant, vous acceptez que vos données personnelles soient utilisées conformément à notre <a href="#"> politique de confidentialité</a> </small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </main>

  <footer class="footer bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 style="font-weight: bold;">À propos</h5>
          <p>
            Bienvenue sur Aeroprice, votre compagnon de confiance pour trouver les meilleurs tarifs de billets d'avion. Notre mission est de simplifier le processus de recherche et de réservation de vols en vous offrant une plateforme conviviale et intuitive.
            
          </p>
        </div>
        <div class="col-md-4">
          <h5 style="font-weight: bold;">Liens utiles</h5>
          <ul class="list-unstyled">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5 style="font-weight: bold;" >Contact</h5>
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
  
  
  
  <script>
   var ajaxSuccessLogin = false;
var ajaxSuccessMail = false;
var passwordValid = false;
var passwordMatch = false;
//recaptcha
function onSubmit(token) {
    // Vérifier que toutes les vérifications précédentes ont réussi
    if (ajaxSuccessLogin && ajaxSuccessMail && passwordValid && passwordMatch) {
        // Soumettre le formulaire si tout est valide
        document.getElementById('inscriptionForm').submit();
    } else {
        var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    var errorMessages = [];

    if (!nom || !prenom || !username || !email || !password || !confirmPassword) {
      errorMessages.push('Veuillez remplir tous les champs.');
    }

    if (!ajaxSuccessLogin) {
      errorMessages.push('Veuillez choisir un nouveau nom d\'utilisateur avant de soumettre ce formulaire.');
    }

    if (!ajaxSuccessMail) { 
      errorMessages.push('Veuillez choisir une autre adresse mail qui n\'est pas déjà utilisée');
    }

    if (!passwordValid) {
      errorMessages.push('Le mot de passe que vous avez choisi n\'est pas valide.');
    }

    if (!passwordMatch) {
      errorMessages.push('Les mots de passe ne correspondent pas.');
    }
    if (username.length < 4) {
            errorMessages.push('Le nom d\'utilisateur doit avoir au moins 4 caractères.');
        }

    var domain = email.split('@')[1];
        if (!domain || domain.length < 2) {
            errorMessages.push('syntaxe a@cy.fr');
        }
    if (nom && prenom && username && email && password && confirmPassword && ajaxSuccessLogin && ajaxSuccessMail && passwordValid && passwordMatch) {
      this.submit();
    } else {
      alert(errorMessages.join('\n'));
    }
    }
  }

document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('username').addEventListener('input', function() {
        var username = this.value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.exists) {
                    document.getElementById('usernameMessage').innerHTML = 'Ce nom de login existe déjà';
                    ajaxSuccessLogin = false;
                } else {
                    if (username.length >= 4) {
                        document.getElementById('usernameMessage').innerHTML = '';
                        ajaxSuccessLogin = true;
                    } else {
                        document.getElementById('usernameMessage').innerHTML = 'Le nom d\'utilisateur doit avoir au moins 4 caractères.';
                        ajaxSuccessLogin = false;
                    }
                }
            }
        };
        xhttp.open('GET', 'verifier_nom_utilisateur.php?username=' + username, true);
        xhttp.send();
    });

    document.getElementById('email').addEventListener('input', function() {
        var email = this.value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (response.exists) {
                    document.getElementById('emailMessage').innerHTML = 'Cette adresse mail existe déjà';
                    ajaxSuccessMail = false;
                } else {
                    var domain = email.split('@')[1];
                    if (domain && domain.length >= 2) {
                        document.getElementById('emailMessage').innerHTML = '';
                        ajaxSuccessMail = true;
                    } else {
                        document.getElementById('emailMessage').innerHTML = 'Le nom de domaine du mail doit avoir au moins 2 caractères après @.';
                        ajaxSuccessMail = false;
                    }
                }
            }
        };
        xhttp.open('GET', 'verifier_email.php?email=' + email, true);
        xhttp.send();
    });

    document.getElementById('nom').addEventListener('input', function() {
        var nom = this.value;
        if (nom && nom.length >= 1) {
            document.getElementById('nomMessage').innerHTML = '';
        } else {
            document.getElementById('nomMessage').innerHTML = 'Le nom doit avoir au moins 1 caractère alphabétique.';
        }
    });

    document.getElementById('prenom').addEventListener('input', function() {
        var prenom = this.value;
        if (prenom && prenom.length >= 1) {
            document.getElementById('prenomMessage').innerHTML = '';
        } else {
            document.getElementById('prenomMessage').innerHTML = 'Le prénom doit avoir au moins 1 caractère alphabétique.';
        }
    });

  document.getElementById('password').addEventListener('input', function() {
    var password = this.value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    // Initialisation des messages
    var messages = [];

    // je vérifie la longueur
    if (password.length < 8) {
      messages.push('Le mot de passe doit avoir au minimum 8 caractères.');
      passwordValid = false;
    } else {
      passwordValid = true;
    }

    // je vérifie la présence d'au moins un chiffre
    if (!/[0-9]/.test(password)) {
      messages.push('Le mot de passe doit contenir au moins un chiffre.');
      passwordValid = false;
    } else {
      passwordValid = true;
    }

    // je vérifie de la présence d'au moins une majuscule
    if (!/[A-Z]/.test(password)) {
      messages.push('Le mot de passe doit contenir au moins une majuscule.');
      passwordValid = false;
    } else {
      passwordValid = true;
    }

    // je vérifie de la présence d'au moins un caractère spécial
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
      messages.push('Le mot de passe doit contenir au moins un caractère spécial.');
      passwordValid = false;
    } else {
      passwordValid = true;
    }

    // je vérifie la correspondance avec la confirmation du mot de passe
    if (confirmPassword === password ) {
      messages.push('');
      passwordMatch = true;
    } else {
      passwordMatch = false;
      messages.push('les mots de passes ne concordent pas ');    }

    var messageElement = document.getElementById('passwordMessage');

    if (messages.length > 0) {
      messageElement.innerHTML = messages.join('<br>');
    } else {
      messageElement.innerHTML = '';
    }
  });
  document.getElementById('confirmPassword').addEventListener('input', function() {
        var confirmPassword = this.value;
        var password = document.getElementById('password').value;
        var messages = [];
        if (confirmPassword === password) {
            passwordMatch = true;
        } else {
            passwordMatch = false;
            messages.push('les mots de passes ne concordent pas ');
        }
        var messageElement = document.getElementById('passwordMessage');
        if (messages.length > 0) {
      messageElement.innerHTML = messages.join('<br>');
    } else {
      messageElement.innerHTML = '';
    }
    });

  document.getElementById('inscriptionForm').addEventListener('submit', function(e) {
    e.preventDefault(); 

    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    var errorMessages = [];

    if (!nom || !prenom || !username || !email || !password || !confirmPassword) {
      errorMessages.push('Veuillez remplir tous les champs.');
    }

    if (!ajaxSuccessLogin) {
      errorMessages.push('Veuillez choisir un nouveau nom d\'utilisateur avant de soumettre ce formulaire.');
    }

    if (!ajaxSuccessMail) { 
      errorMessages.push('Veuillez choisir une autre adresse mail qui n\'est pas déjà utilisée');
    }

    if (!passwordValid) {
      errorMessages.push('Le mot de passe que vous avez choisi n\'est pas valide.');
    }

    if (!passwordMatch) {
      errorMessages.push('Les mots de passe ne correspondent pas.');
    }
    if (username.length < 4) {
            errorMessages.push('Le nom d\'utilisateur doit avoir au moins 4 caractères.');
        }

    var domain = email.split('@')[1];
        if (!domain || domain.length < 2) {
            errorMessages.push('syntaxe a@cy.fr');
        }
    if (nom && prenom && username && email && password && confirmPassword && ajaxSuccessLogin && ajaxSuccessMail && passwordValid && passwordMatch) {
      this.submit();
    } else {
      alert(errorMessages.join('\n'));
    }
  });
});





  </script>

</body>
</html>
