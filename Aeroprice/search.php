<?php



$client_id = 'A1SXDA05xhsGTFamscdbwLAgdKaneHt2';
$client_secret = 'Mnlx3TIfjmcMALOL';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://test.api.amadeus.com/v1/security/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=$client_id&client_secret=$client_secret");
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AEROPRICE | Recherche</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>AEROPRICE | Recherche</title>
    <link rel="icon" href="./icone.ico">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
      @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
    </style>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
      

    <!-- load stylesheets -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
            <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/templatemo-styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
                
    
        
    <script>
$(function() {
    $("#departure_location, #arrival_location").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "iatas.php",
                dataType: "json",
                data: {
                    city: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        minLength: 3 // Nombre minimum de caractères pour déclencher l'autocomplétion
    });
});


function updateReturnDateMin() {
    var departureDate = document.getElementById('departure_date').value;
    document.getElementById('return_date').min = departureDate;
}

// INTERCEPTER LA SOUMISSION SANS AJAX
document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: 'api-service.php',
        type: 'GET',
        data: formData,
        success: function(data) {
            if (data.length === 0) {
                // Affichez votre message d'erreur ici
                alert('Aucun vol trouvé.');
            } else {
                // Redirigez vers la page de résultats
                window.location.href = 'api-service.php';
            }
        },
        error: function() {
            // Affichez votre message d'erreur ici
            alert('Une erreur est survenue lors de la recherche de vols.');
        },
        processData: false,
        contentType: false
    });
});
</script>

      </head>

      <body>
      <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./temp/accueil.php" style="margin-right: 5px;font-weight: bold;font-family:Poppins"> <!-- Ajustez la marge ici si nécessaire -->
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

    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <div class="booking-form">
                            <form action="api-service.php" method="get">

                            <div class="form-group">
                                <div class="form-checkbox">
                                    <label for="aller-retour">
                                        <input type="radio" id="aller-retour" name="tripType" value="roundtrip" checked>
                                        <span></span>Aller-Retour
                                    </label>
                                    <label for="aller-simple">
                                        <input type="radio" id="aller-simple" name="tripType" value="oneway">
                                        <span></span>Aller-Simple
                                    </label>
                                </div>
                            </div>
                                
                                <div class="form-group">
                                    <div class="form-check">
                                        <label for="escale">
                                            <input type="checkbox" id="escale" name="escale">
                                            <span></span>Sans escales
                                        </label>
                                    </div>
                                </div>





<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <span class="form-label">Départ</span>
            <input class="form-control" type="text" placeholder="ville ou aeroport" id="departure_location" name="departure_location" required autocomplete="off" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <span class="form-label">Destination</span>
            <input class="form-control" type="text" id="arrival_location" name="arrival_location" placeholder="ville ou aeroport" required autocomplete="off" required>
        </div>
    </div>
</div>






<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <span class="form-label">Jour-Départ</span>
            <input class="form-control" type="date" min="<?php echo date('Y-m-d'); ?>" id="departure_date" name="departure_date" required onchange="updateReturnDateMin()">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" id="return-date-field">
            <span class="form-label">Jour-Retour</span>
            <input class="form-control" type="date" id="return_date" name="return_date" >
        </div>
    </div>
</div>
                                

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Adultes (12+)</span>
                                            <input class="form-control" type="number" min="1" value="1" name="adults" required>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Enfants (2-12)</span>
                                            <input class="form-control" type="number" min="0" value="0" name="children">
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Nourrissons (-2)</span>
                                            <input class="form-control" type="number" min="0" value="0" name="nourissant">
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <span class="form-label">Classe de Voyage</span>
                                            <select class="form-control" name="classe">
                                                <option value="ECONOMY">ECONOMY</option>
                                                <option value="PREMIUM_ECONOMY">PREMIUM_ECONOMY</option>
                                                <option value="BUSINESS">BUSINESS</option>
                                                <option value="FIRST">FIRST</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-btn">
                                    <button class="submit-btn" type="submit">Chercher billet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                        <li ><a style="color: black;" href="#top">Accueil</a></li>
                        <li  ><a  style="color: black;" href="#">Services</a></li>
                        <li ><a style="color: black;" href="#">Contact</a></li>
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
              <script>
    // Fonction pour montrer/masquer le champ de la date de retour
    function toggleReturnDateField() {
        var allerRetourChecked = document.getElementById('aller-retour').checked;
        var returnDateField = document.getElementById('return-date-field');

        if (allerRetourChecked) {
            returnDateField.style.display = 'block'; // Montrer le champ
        } else {
            returnDateField.style.display = 'none'; // Masquer le champ
        }
    }

    // Écouteurs d'événements pour les changements sur les boutons radio
    document.getElementById('aller-retour').addEventListener('change', toggleReturnDateField);
    document.getElementById('aller-simple').addEventListener('change', toggleReturnDateField);

    // Appel initial pour définir l'état correct au chargement de la page
    toggleReturnDateField();
    </script>

</body>

</html>

