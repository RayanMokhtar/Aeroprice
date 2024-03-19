<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modification du Profil</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> 
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font du -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
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
            <a class="navbar-brand" href="temp/accueil.php" style="margin-right: 5px;"> <!-- Ajustez la marge ici si nécessaire -->
                <img src="logo1.png" width="55" alt="Site logo">
                AEROPRICE

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 custom-nav-links">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="temp/accueil.php">Accueil</a> <!-- Ajustez la marge ici si nécessaire -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="#">Contacts</a> <!-- Ajustez la marge ici si nécessaire -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="avatar.png" class="rounded-circle" alt="Avatar" style="width: 30px; height: 30px; margin-right: 5px;"> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Profil</a></li>
                            <li><a class="dropdown-item" href="logout.php">Se déconnecter</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </header>

  <main class="main-container">
    <form id="modificationForm" action="modifier_profil.php" method="POST">
      <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
          <div class="col-md-12 right-box">
            <h1 class="welcome-text">Modification de votre Profil</h1>
            <div class="mb-3">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" value="Votre nom">
            </div>
            <div class="mb-3">
              <label for="prenom" class="form-label">Prénom</label>
              <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" value="Votre prénom">
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Nom d'utilisateur</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="Nom d'utilisateur" value="Votre nom d'utilisateur">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Adresse Mail</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="Adresse mail" value="votre@mail.com">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Nouveau Mot de Passe</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Nouveau Mot de Passe">
            </div>
            <div class="mb-4">
              <label for="confirmPassword" class="form-label">Confirmer Nouveau Mot de Passe</label>
              <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirmer Nouveau Mot de Passe">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
          </div>
        </div>
      </div>
    </form>
  </main>

  <footer>
    <!-- Pied de page -->
  </footer>

  <!-- Scripts JavaScript -->
  <script>
    // Vos scripts JavaScript pour la validation du formulaire
  </script>
</body>
</html>
