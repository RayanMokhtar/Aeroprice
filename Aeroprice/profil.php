<?php
session_start();
include('config.php'); // Inclure le fichier de configuration pour la connexion à la base de données

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: htmlconnexion.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}

// Récupérer l'ID de l'utilisateur de la session
$user_id = $_SESSION['user_id'];

// Préparer une requête pour récupérer les informations de l'utilisateur
$stmt = $conn->prepare("SELECT nom, prenom, email FROM utilisateurs WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) {
    header("Location: htmlconnexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <title>Profil - AeroPrice</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
  
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Arial', sans-serif;
            background-image: url('fondbleu.png'); /* Remplacez avec le chemin réel de votre image */
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            color: #ffffff;
        }
        .profile-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px; /* Augmenter l'espace entre les champs */
    }


    .fa-pencil {
        color: #ffffff;
        cursor: pointer;
    }


        .profile-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            color: #ffffff;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: #000000;
        }

        .btn-save {
            padding: 10px;
            background-color: #FBA708;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: #ffffff;
            width: 100%;
        }

        .btn-save:hover {
            background-color: #e69500;
        }

        label {
            font-weight: 600;
        } 
    </style>
</head>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./temp/accueil.php" style="margin-right: 5px;font-weight:bold;font-family:Poppins;"> <!-- Ajustez la marge ici si nécessaire -->
                <img src="logo1.png" width="55" alt="Site logo">
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
                        <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="contacts/contact.php">Contacts</a> <!-- Ajustez la marge ici si nécessaire -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="avatar.png" class="rounded-circle" alt="Avatar" style="width: 30px; height: 30px; margin-right: 5px;"> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                            <li><a class="dropdown-item" href="logout.php">Se déconnecter</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="profile-container">
                <h2>Profil Utilisateur</h2>
                <div class="profile-info">
        <span id="prenom-text"><strong>Prénom:</strong> <?php echo htmlspecialchars($user['prenom']); ?></span>
        <input type="text" id="prenom-input" value="<?php echo htmlspecialchars($user['prenom']); ?>" style="display: none;" onblur="updateField('prenom')">
        <i class="fa fa-pencil" aria-hidden="true" onclick="makeEditable('prenom')"></i>
    </div>
    <div class="profile-info">
        <span id="nom-text"><strong>Nom: </strong><?php echo htmlspecialchars($user['nom']); ?></span>
        <input type="text" id="nom-input" value="<?php echo htmlspecialchars($user['nom']); ?>" style="display: none;" onblur="updateField('nom')">
        <i class="fa fa-pencil" aria-hidden="true" onclick="makeEditable('nom')"></i>
    </div>
    <div class="profile-info">
        <span id="email-text"><strong>Adresse mail: </strong><?php echo htmlspecialchars($user['email']); ?></span>
        <input type="email" id="email-input" value="<?php echo htmlspecialchars($user['email']); ?>" style="display: none;" onblur="updateField('email')">
        <i class="fa fa-pencil" aria-hidden="true" onclick="makeEditable('email')"></i>
    </div>

               
            </div>
        </div>
    </div>
</div>
<script>
function makeEditable(fieldName) {
    var textElement = document.getElementById(fieldName + '-text');
    var inputElement = document.getElementById(fieldName + '-input');

    textElement.style.display = 'none';
    inputElement.style.display = 'inline-block'; // Affiche l'input

    inputElement.focus(); // Met le focus sur l'input
}
function updateField(fieldName) {
    var inputElement = document.getElementById(fieldName + '-input');
    var textElement = document.getElementById(fieldName + '-text');
    var value = inputElement.value;

    if ((fieldName === 'prenom' || fieldName === 'nom') && value.length > 10) {
        alert('Le prénom et le nom ne doivent pas dépasser 10 caractères.');
        return;
    }

    if (fieldName === 'email' && !validateEmail(value)) {
        alert('Veuillez entrer une adresse email valide.');
        return;
    }
    // AJAX request pour mettre à jour les données
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'update-profil.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status == 200) {
            textElement.innerHTML = value;
            textElement.style.display = 'block';
            inputElement.style.display = 'none';
        }
    };
    xhr.send('field=' + fieldName + '&value=' + value);
    
}
function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
</script>
           
</body>
   
</html>

