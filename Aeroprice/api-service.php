<?php
include('config.php');
session_start();
$client_id = 'A1SXDA05xhsGTFamscdbwLAgdKaneHt2';
$client_secret = 'Mnlx3TIfjmcMALOL';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://test.api.amadeus.com/v1/security/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=$client_id&client_secret=$client_secret");
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$result = json_decode($result, true);
$apiKey = $result['access_token'];



$apiUrl = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
$queryParams = [];



if (isset($_GET['escale'])) {
  // La case "escale" a été cochée
  $queryParams['nonStop'] = "true";
} else {
  // La case "escale" n'a pas été cochée
  $queryParams['nonStop'] = "false";
}

if (isset($_GET['escale'])) {
  // La case "escale" a été cochée
  $queryParams['nonStop'] = "true";
} else {
  // La case "escale" n'a pas été cochée
  $queryParams['nonStop'] = "false";
}

if (!empty($_GET['departure_location'])) {
  $location_parts = explode(':', $_GET['departure_location']);
  $queryParams['originLocationCode'] = trim(end($location_parts));
}

if (!empty($_GET['arrival_location'])) {
  $location_parts = explode(':', $_GET['arrival_location']);
  $queryParams['destinationLocationCode'] = trim(end($location_parts));
}

if (!empty($_GET['departure_date'])) {
    $queryParams['departureDate'] = $_GET['departure_date'];
}

if (!empty($_GET['return_date'])) {
    $queryParams['returnDate'] = $_GET['return_date'];
}

if (!empty($_GET['adults'])) {
  $queryParams['adults'] = $_GET['adults'];
}

if (!empty($_GET['children'])) {
  $queryParams['children'] = $_GET['children'];
}

if (!empty($_GET['nourissant'])) {
  $queryParams['infants'] = $_GET['nourissant'];
}

if (!empty($_GET['classe'])) {
  if ($_GET['classe']=='ECONOMY'){
    $queryParams['travelClass'] = 'ECONOMY';
  }elseif($_GET['classe']=='PREMIUM_ECONOMY'){
    $queryParams['travelClass'] = 'PREMIUM_ECONOMY';
  }elseif($_GET['classe']=='BUSINESS'){
    $queryParams['travelClass'] = 'BUSINESS';
  }elseif($_GET['classe']=='FIRST'){
    $queryParams['travelClass'] = 'FIRST';
  }else{
    $queryParams['travelClass'] = 'ECONOMY';
  }
}


$queryParams['max'] = 20;
// $queryParams['currencyCode']="DZD"; 

$requestUrl = $apiUrl . '?' . http_build_query($queryParams);

$curl = curl_init($requestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, [
  'Authorization: Bearer ' . $apiKey,
  'Content-Type: application/json'
]);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

// Afficher les informations des vols
$data = json_decode($response, true);

if (!(isset($data['data']) && !empty($data['data']))) {
  header('Location: ./error.html');
  exit;
}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Affichage des vols</title>
  <link rel="icon" href="./icone.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
     @import url('https://fonts.googleapis.com/css?family=Poppins');
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
  .btn-reserver {
    background-color: #0C274E; /* Couleur de fond */
    color: white; /* Couleur du texte */
    border: none; /* Pas de bordure */
    padding: 10px 20px; /* Espacement interne */
    border-radius: 5px; /* Coins arrondis */
    transition: background-color 0.3s ease; /* Transition douce pour l'effet de survol */
    width: auto;
  }

  .btn-reserver:hover {
    background-color: #082c63; /* Couleur de fond au survol */
    color: #ffd700; /* Couleur de texte au survol */
    text-decoration: none; /* Aucune décoration de texte au survol */
  }
  
  .btn-favori {
    background-color: #0C274E; /* Couleur de fond */
    color: white; /* Couleur du texte */
    border: none; /* Pas de bordure */
    padding: 10px 20px; /* Espacement interne */
    border-radius: 5px; /* Coins arrondis */
    transition: background-color 0.3s ease; /* Transition douce pour l'effet de survol */
    margin-top: 10px; /* Espacement au-dessus du bouton */
  }

  .btn-favori:hover {
    background-color: #082c63; /* Couleur de fond au survol */
    color: #ffd700; /* Couleur de texte au survol */
    text-decoration: none; /* Aucune décoration de texte au survol */
  }

</style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./temp/accueil.php" style="margin-right: 5px;font-weight:bold;font-family:Poppins;">
                <img src="../logo1.png" width="55" alt="Site logo">
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
                            <img src="../avatar.png" class="rounded-circle" alt="Avatar" style="width: 30px; height: 30px; margin-right: 5px;"> 
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
  <h1 class="text-center mt-5">Affichage des vols</h1>
  <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reservationModalLabel">Réservation de vol</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Le message que je viens d'ajouter pour le bouton réserver sera  ici -->
      </div>
    </div>
  </div>
</div>

  <div class="container">
    <?php
      if (isset($data['data'])) {
        echo '<div class="row mt-4 container d-flex justify-content-center ">';
        foreach ($data['data'] as $flight) {
          foreach ($flight['itineraries'] as $itinerary) {
            echo '
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card shadow-lg p-3 mb-5 bg-white rounded ">';
              $index = 0;
            foreach ($itinerary['segments'] as $segment) {
             
              
              $heureDepart = date("d-m-Y H:i", strtotime($segment['departure']['at']));
              $heureArrivee = date("d-m-Y H:i", strtotime($segment['arrival']['at']));
              $depart = $segment['departure']['iataCode'] . ' : ' . $heureDepart;
              $arrivee = $segment['arrival']['iataCode'] . ' : ' . $heureArrivee;

              $departCode = $segment['departure']['iataCode'];
              $arriveeCode = $segment['arrival']['iataCode'];


                    // Lire le fichier CSV
                    if (($handle = fopen("airports.csv", "r")) !== FALSE) {
                      while (($data1 = fgetcsv($handle, 1000, ",")) !== FALSE) {
                          if (isset($data1[9]) && $data1[9] == $departCode) {
                              $depart = isset($data1[7]) ? $data1[7] : null;
                          }
                          if (isset($data1[9]) && $data1[9] == $arriveeCode) {
                              $arrivee = isset($data1[7]) ? $data1[7] : null;
                          }
                      }
                      fclose($handle);
                  }

              
              $duree = new DateInterval($segment['duration']);
              $duree_formatee = $duree->format('%hh%i');
              $compagnie_aerienne = $data['dictionaries']['carriers'][$segment['carrierCode']];
              $numeroVol1 = $segment['carrierCode']; 
              $numeroVol2 = $segment['number'];
              $numeroVol = $numeroVol1 . $numeroVol2;
              $prix = $flight['price']['total'] . ' ' . $data['dictionaries']['currencies'][$flight['price']['currency']];
              
              foreach ($flight['travelerPricings'] as $travelerPricing) {
                $travelClass = $travelerPricing['fareDetailsBySegment'][0]['cabin'];
                // Afficher la classe du vol
            }

              echo '
              
                <img src="https://www.skyscanner.net/images/airlines/'.$numeroVol1.'.png" class="card-img-top" alt="Logo de '.$compagnie_aerienne.'" style="width: 160px; height: auto; display: block; margin: 1mm auto;">
                  <div class="card-body">
                  <h5 class="card-title text-center">
                    <ul style="list-style: none; padding: 0;">
                    <li>'.$depart.' &#8594; '.$arrivee.'</li>
                    </ul>
                  </h5>
                    <p class="card-text"><b>Numéro du vol : </b>' . $numeroVol.'</p>
                    <p class="card-text"><b>Départ : </b>' . $heureDepart  . '</p>
                    <p class="card-text"><b>Arrivée : </b>' . $heureArrivee  . '</p>
                    <p class="card-text"><b>Durée de vol : </b>' . $duree_formatee  . '</p>
                    <p class="card-text"><b>Classe du vol : </b>' . $travelClass.'</p>
                    <p class="card-text"><b>Compagnie aérienne : </b>' . $compagnie_aerienne.'</p>
                    <hr>
                    
                    </div>
                    
                    ';echo '<div class="card-footer">';
                    echo '<button class="btn btn-outline-primary btn-sm btn-favori" data-index="' . $index . '" data-vol="' . htmlspecialchars(json_encode($flight), ENT_QUOTES, 'UTF-8') . '">';
                    echo '<i class="fa fa-heart"></i> Ajouter aux favoris';
                    echo '</button>';
                    $index++;
                    echo '</div>';
                  }
                  echo '
                  </div>
                    </div>';
                }
                
                echo '<div class="d-flex justify-content-center ">';
                echo '<p class="card-text" style="font-weight: bold; font-size: 1.5em; text-align: center;">Prix : ' . $prix .'</p>';
                echo '</div>';

                echo '<a href="#" class="btn btn-primary btn-sm mt-3 btn-reserver" data-compagnie="' . $compagnie_aerienne . '" data-numero-vol="' . $numeroVol . '">Comment Réserver ?</a>';
                echo '<p></p>';
                echo '<hr style="margin-bottom: 10px;">';
        }
      } else {
        echo '<p>Aucun vol trouvé</p>';
      }
      ?>
    </div>
  </div>
  
  


  <footer class="footer bg-light text-center">
                <div class="container">
                  <div class="row">
                    <div class="col-md-4">
                      <h5 style="font-weight: bold;color:black">À propos</h5>
                      <p style="color: black;" >
                        Bienvenue sur Aeroprice, votre compagnon de confiance pour trouver les meilleurs tarifs de billets d'avion. Notre mission est de simplifier le processus de recherche et de réservation de vols en vous offrant une plateforme conviviale et intuitive.
                        
                      </p>
                    </div>
                    <div class="col-md-4">
                      <h5 style="font-weight: bold;">Liens utiles</h5>
                      <ul class="list-unstyled">
                        <li ><a style="color: black;" href="temp/accueil.php">Accueil</a></li>
                        <li  ><a  style="color: black;" href="#">Services</a></li>
                        <li ><a style="color: black;" href="contacts/contact.html">Contact</a></li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <h5 style="font-weight: bold;" >Contact</h5>
                      <p style="color: black;">Adresse : 33 bd du port Cergy 95000</p>
                      <p style="color: black;">Téléphone : 01 234 567 89</p>
                      <p style="color: black;">Email : etudiant@cyu.fr</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <p style="color: black;">&copy; 2023 AeroPrice. Tous droits réservés.</p>
                    </div>
                  </div>
                </div>
              </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    var userId = <?php echo $_SESSION['user_id'] ?? 'null'; ?>;


  document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.btn-favori').forEach(button => {
    button.addEventListener('click', function() {
      if (userId === null) {
        alert('Vous devez être connecté pour ajouter des vols aux favoris.');
        return;
      }
      const volData = JSON.parse(this.getAttribute('data-vol'));
      const idUtilisateur=userId;
      

      // Envoyer les données à un script PHP pour enregistrement dans la base de données
      fetch('add_to_favories.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          idUtilisateur: idUtilisateur,
          numeroVol: volData.number, // Modifier selon la structure de votre objet volData
          aeroportDepart: volData.departure.iataCode,
          aeroportArrivee: volData.arrival.iataCode,
          dateDepart: volData.departure.at.split('T')[0],
          dateRetour: volData.return.at.split('T')[0] // Assurez-vous que ces champs correspondent à votre structure de données
        })
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        // Afficher un message de confirmation
        if (data.success) {
          alert('Votre vol a été ajouté en favori.');
        } else {
          alert('Une erreur est survenue lors de l\'ajout du vol en favori.');
        }
      })
      .catch(error => {
        console.error('Erreur:', error);
        alert('Erreur lors de la communication avec le serveur.');
      });
    });
  });
});
function addToFavorites(vol) {
    $.ajax({
        type: 'POST',
        url: 'add_to_favories.php',
        data: JSON.stringify(vol),
        contentType: 'application/json',
        success: function(response) {
            alert(response); // Affiche un message de succès
        },
        error: function() {
            alert('Erreur lors de l\'ajout aux favoris.'); // Affiche un message d'erreur
        }
    });
}

// Attachez cette fonction aux boutons de favori
$('.btn-favori').click(function() {
    var rawData = $(this).attr('data-vol');
    var volData = JSON.parse(rawData);

    console.log(volData); // Vérifiez la structure des données

    // Vérifiez si les propriétés nécessaires sont disponibles
    if (volData && volData.itineraries && volData.itineraries[0] && volData.itineraries[0].segments && volData.itineraries[0].segments[0]) {
        var segment = volData.itineraries[0].segments[0];
        var numeroVol = segment.carrierCode + segment.number;
        var aeroportDepart = segment.departure.iataCode;
        var aeroportArrivee = segment.arrival.iataCode;
        var dateDepart = segment.departure.at.split('T')[0];
        var dateRetour = volData.itineraries[0].segments[1] ? volData.itineraries[0].segments[1].arrival.at.split('T')[0] : null;
        var imageCompagnie = "https://www.skyscanner.net/images/airlines/" + segment.carrierCode + ".png"; // URL de l'image
        addToFavorites({
            idUtilisateur: userId,
            numeroVol: numeroVol,
            aeroportDepart: aeroportDepart,
            aeroportArrivee: aeroportArrivee,
            dateDepart: dateDepart,
            dateRetour: dateRetour,
            imageCompagnie: imageCompagnie // Ajout de l'URL de l'image
        });
    } else {
        console.error("Données du vol non disponibles ou mal structurées");
    }
});


</script>
<script>
  // le message affiché dans le pop up
  document.querySelectorAll('.btn-reserver').forEach(button => {
    button.addEventListener('click', function() {
      var compagnie = this.getAttribute('data-compagnie');
      var numeroVol = this.getAttribute('data-numero-vol');
      var message = 'Rendez-vous sur le site de ' + compagnie + ' afin de réserver le vol n° ' + numeroVol;
      document.querySelector('#reservationModal .modal-body').textContent = message;
      var modal = new bootstrap.Modal(document.getElementById('reservationModal'));
      modal.show();
    });
  });
</script>
 
</body>
</html> 
