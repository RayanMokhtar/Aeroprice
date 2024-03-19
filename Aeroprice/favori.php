<?php
include('config.php');
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour voir cette page.";
    exit;
}

$idUtilisateur = $_SESSION['user_id'];

// Récupérez les vols favoris de l'utilisateur
$stmt = $conn->prepare("SELECT * FROM favoris WHERE id_utilisateur = :idUtilisateur");
$stmt->bindParam(':idUtilisateur', $idUtilisateur);
$stmt->execute();
$favoris = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos Favoris</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
    </style>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./temp/accueil.php" style="margin-right: 5px;font-family: Poppins ; font-weight:bold;"> <!-- Ajustez la marge ici si nécessaire -->
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
                        <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="contacts/contact.php">Contacts</a> <!-- Ajustez la marge ici si nécessaire -->
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
        </div>
    </nav>
    </header>

    <main class="container">
        <h1 class="mt-5">Vols Favoris</h1>
        <div class="row">
        <?php foreach ($favoris as $favori): ?>
    <div class="col-md-6 col-lg-4 mt-3">
        <div class="card">
            <!-- Affichage de l'image de la compagnie aérienne -->
            <img src="<?php echo htmlspecialchars($favori['image_compagnie'] ?? ''); ?>" alt="Image de la compagnie aérienne" class="card-img-top">
            
            <div class="card-body">
                <!-- Affichage du numéro de vol -->
                <h5 class="card-title">Numéro de vol : <?php echo htmlspecialchars($favori['numero_vol'] ?? 'Non spécifié'); ?></h5>

                <p class="card-text">
                    Départ : <?= htmlspecialchars($favori['aeroport_depart'] ?? 'Non spécifié') ?><br>
                    Arrivée : <?= htmlspecialchars($favori['aeroport_arrivee'] ?? 'Non spécifié') ?><br>
                    Date de départ : <?= htmlspecialchars($favori['date_depart'] ?? 'Non spécifié') ?><br>
                    
                </p>
                <button onclick="confirmSuppression(<?= $favori['id_favori'] ?>)" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
<?php endforeach; ?>
        </div>
    </main>

    <footer>
        <!-- Votre pied de page ici -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

function confirmSuppression(idFavori) {
    if (confirm("Voulez-vous vraiment supprimer ce vol de vos favoris ?")) {
        // Envoi de la requête de suppression
        fetch('supprimer_favori.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id_favori=' + idFavori
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            location.reload(); // Recharger la page pour mettre à jour l'affichage
        })
        .catch(error => {
            console.error('Erreur:', error);
        });
    }
}
        </script>
</body>
</html>
