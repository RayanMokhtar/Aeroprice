<?php

session_start(); // Assurez-vous que la session est démarrée

// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Contenu du header pour les utilisateurs connectés
    echo '   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="temp/accueil.php" style="margin-right: 5px;font-family: Poppins ; font-weight:bold;"> <!-- Ajustez la marge ici si nécessaire -->
            <img src="./logo1.png" width="55" alt="Site logo">
            AEROPRICE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 custom-nav-links">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="./temp/accueil.php">Accueil</a> <!-- Ajustez la marge ici si nécessaire -->
                </li>
                <li class="nav-item">
                <a class="nav-link active" style="font-weight:700; margin-right: 5px;font-size:17px" href="./search.php">Recherche de vol</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" style="font-weight:700; margin-right: 5px;font-size:17px" href="./favori.php">Favoris</a>
            </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="./contacts/contact.php">Contacts</a> <!-- Ajustez la marge ici si nécessaire -->
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./avatar.png" class="rounded-circle" alt="Avatar" style="width: 30px; height: 30px; margin-right: 5px;"> 
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                        <li><a class="dropdown-item" href="logout.php">Se déconnecter</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>';
    
} else {
    // Contenu du header pour les visiteurs non connectés
    echo ' <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <a class="nav-link active" aria-current="page" href="contacts/contact.php"  style="font-weight:700;" >Contacts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="htmlconnexion.php" style="font-weight:700;" >Se connecter</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="inscription.php" style="font-weight:700;"> S\'inscrire</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>';
    
}
?>