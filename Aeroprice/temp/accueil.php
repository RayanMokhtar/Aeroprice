<?php
session_start();
include('../config.php'); // Assurez-vous que ce fichier contient les informations de connexion à la base de données

// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: htmlconnexion.php");
    exit();
}

// Récupérez l'ID de l'utilisateur à partir de la session
$user_id = $_SESSION['user_id'];

// Préparez une déclaration de sélection pour récupérer les informations de l'utilisateur
$stmt = $conn->prepare("SELECT nom, prenom, email FROM utilisateurs WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// S'il n'y a pas d'utilisateur avec cet ID, redirigez vers la page de connexion
if (!$user) {
    header("Location: htmlconnexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="AeroPrice, votre compagnon idéal pour trouver les meilleures offres de vols et explorer le monde.">
    <meta name="keywords" content="aeroprice, billets d'avion, voyages, vols pas chers, voyager, tourisme, explorer, destinations de voyage, comparaison de vols, AERO PRICE,Explorez le ciel avec AeroPrice, votre complice pour dénicher les meilleures offres de billets d'avion!">
    
    <link rel="icon" href="../icone.ico">
    <title>AEROPRICE</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="css/datepicker.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/templatemo-styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <style>
        
        @import url('https://fonts.googleapis.com/css?family=Poppins');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body{
            background-color: #0C274E;
            background-size: cover;
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
        .leaflet-map {
            height: 400px;
        }
        .custom-size {
    padding: 10px; /* Réduisez le padding selon vos besoins */
    /* Ajoutez d'autres propriétés de mise en forme si nécessaire */
}

.exp {
    background-color: #0C274E;
    color: #FFFFFF; /* Couleur du texte */
    border: none; /* Enlever les bordures */
    padding: 10px 20px; /* Ajustement du padding */
    border-radius: 5px; /* Coins arrondis */
    font-family: 'Roboto', sans-serif; /* Police Roboto */
    font-weight: 700; /* Épaisseur de la police */
    transition: background-color 0.3s; /* Effet de transition doux */
    text-transform: uppercase; /* Texte en majuscules */
    letter-spacing: 1px; /* Espacement des lettres */
}
.exp:hover {
    background-color: #437EB1;
}
.tm-banner-header {
    text-align: center; /* Centre les éléments dans .tm-banner-header */
}

    
      </style>
      </head>

      <body>
      <header style="font-family: Poppins;font-weight:bold;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="margin-right: 5px;"> <!-- Ajustez la marge ici si nécessaire -->
                <img src="../logo1.png" width="55" alt="Site logo">
                AEROPRICE
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 custom-nav-links">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="#">Accueil</a> <!-- Ajustez la marge ici si nécessaire -->
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" style="font-weight:700; margin-right: 5px;font-size:17px" href="../search.php">Recherche de vol</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" style="font-weight:700; margin-right: 5px;font-size:17px" href="../favori.php">Favoris</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="../contacts/contact.php">Contacts</a> <!-- Ajustez la marge ici si nécessaire -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../avatar.png" class="rounded-circle" alt="Avatar" style="width: 30px; height: 30px; margin-right: 5px;"> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../profil.php">Profil</a></li>
                            <li><a class="dropdown-item" href="../logout.php">Se déconnecter</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<div class="tm-page-wrap mx-auto">
            <section class="tm-banner">
                <div class="tm-container-outer tm-banner-bg custom-size">
                    <div class="container">

                        <div class="row tm-banner-row tm-banner-row-header">
                            <div class="col-xs-12">
                                <div class="tm-banner-header">
    <h1 class="text-uppercase tm-banner-title">Commençons dès maintenant!</h1>
    <img src="img/dots-3.png" alt="Dots">
    <p class="tm-banner-subtitle" style="font-size: 25px;">
        Explorez le ciel avec AeroPrice, votre complice pour dénicher les meilleures offres de billets d'avion!
    </p>
    <a href="../search.php" class="btn btn-primary exp" id="redirection-btn">Découvrir plus</a>
    <a href="javascript:void(0)" class="tm-down-arrow-link"><i class="fa fa-2x fa-angle-down tm-down-arrow"></i></a>
</div>    
                            </div>  <!-- col-xs-12 -->                      
                        </div> <!-- row -->
                        <div class="row tm-banner-row" id="tm-section-search">

                               
                                    
                                </div> <!-- form-row -->
                                <div class="form-row tm-search-form-row">

                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                        
                                        <input   id="inputCheckIn" style="display: none;" >
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-3">
                                    
                                        <input  class="form-control" id="inputCheckOut" style="display:none;" >
                                    </div>
                                    <div class="form-group tm-form-group tm-form-group-pad tm-form-group-1">
                                        <label for="btnSubmit">&nbsp;</label>
                                        
                                    </div>
                                </div>                              
                            </form>                             

                        </div> <!-- row -->
                        <div class="tm-banner-overlay"></div>
                    </div>  <!-- .container -->                   
                </div>     <!-- .tm-container-outer -->                 
            </section>

            <section class="p-5 tm-container-outer tm-bg-gray">            
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 mx-auto tm-about-text-wrap text-center">                        
                            <h2 class="text-uppercase mb-4">Votre <strong>Voyage</strong> est notre priorité</h2>
                            <p class="mb-4">Chez AeroPrice, nous nous engageons à faire de votre voyage une priorité, en vous offrant les meilleures options de billets d'avion pour une expérience sans souci</p>
                            <a href="../search.php" class="text-uppercase btn-primary tm-btn" style="font-weight: 600;">Prêts au décollage ? Attachez vos ceintures avec AeroPrice</a>                              
                        </div>
                    </div>
                </div>            
            </section>
            
            <div class="tm-container-outer" id="tm-section-2">
                <section class="tm-slideshow-section">
                    <div class="tm-slideshow">
                        <img src="img/tm-img-01.jpg" alt="Image">
                        <img src="img/tm-img-02.jpg" alt="Image">
                        <img src="img/tm-img-03.jpg" alt="Image">    
                    </div>
                    <div class="tm-slideshow-description tm-bg-primary">
                        <h2 class="">Les endroits les plus visités d'Europe</h2>
                        <p> Découvrez la richesse culturelle de l'Europe en explorant ses endroits les plus visités. Des sites emblématiques chargés d'histoire aux destinations pittoresques, l'Europe offre une expérience inoubliable pour les voyageurs en quête d'aventure et de découvertes.</p>
                        <a href="../aeroPrice/europe.php" class="text-uppercase tm-btn tm-btn-white tm-btn-white-primary">Poursuivez votre lecture </a>
                    </div>
                </section>
                <section class="clearfix tm-slideshow-section tm-slideshow-section-reverse">

                    <div class="tm-right tm-slideshow tm-slideshow-highlight">
                        <img src="img/tm-img-02.jpg" alt="Image">
                        <img src="img/tm-img-03.jpg" alt="Image">
                        <img src="img/tm-img-01.jpg" alt="Image">
                    </div> 
                    <div id="cookieConsentPopup" style="display: none; position: fixed; bottom: 20px; right: 20px; background-color: white; padding: 15px; border-radius: 5px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);">
                        <p>Nous utilisons des cookies pour améliorer votre expérience. Acceptez-vous les cookies?</p>
                        <button id="acceptCookies">Accepter</button>
                        <button id="declineCookies">Refuser</button>
                    </div>

                    <div class="tm-slideshow-description tm-slideshow-description-left tm-bg-highlight">
                        <h2 class="">Les endroits les plus populaires d'Asie</h2>
                        <p>Explorez la diversité fascinante de l'Asie en visitant ses lieux les plus prisés. De la majesté des temples anciens aux paysages naturels époustouflants, l'Asie offre une palette riche d'expériences culturelles et de découvertes à chaque coin de rue. Plongez dans l'aventure et laissez-vous emporter par la magie de l'Asie.</p>
                        <a href="../aeroPrice/asie.php" class="text-uppercase tm-btn tm-btn-white tm-btn-white-highlight">Poursuivez votre lecture </a>
                    </div>                        

                </section>
                <section class="tm-slideshow-section">
                    <div class="tm-slideshow">
                        <img src="img/tm-img-03.jpg" alt="Image">
                        <img src="img/tm-img-02.jpg" alt="Image">
                        <img src="img/tm-img-01.jpg" alt="Image">
                    </div>
                    <div class="tm-slideshow-description tm-bg-primary">
                        <h2 class="">Les endroits les plus célébres d'Amérique</h2>
                        <p> Plongez dans l'histoire vibrante de l'Amérique en explorant ses lieux les plus emblématiques. Des gratte-ciels imposants aux sites historiques chargés de signification, l'Amérique offre une expérience unique qui mêle modernité et héritage. Découvrez la diversité captivante de ce continent et laissez-vous inspirer par la grandeur de ses destinations les plus célèbres.</p>
                        <a href="../aeroPrice/amerique.php" class="text-uppercase tm-btn tm-btn-white tm-btn-white-primary">Poursuivez votre lecture</a>
                    </div>
                </section>
            </div>        
            <div class="tm-container-outer" id="tm-section-3">
            <ul class="nav nav-pills tm-tabs-links">
                    <li class="tm-tab-link-li">
                        <a href="../aeroPrice/amerique.php" class="tm-tab-link">
                            <img src="img/north-america.png" alt="Image" class="img-fluid">
                            Amérique
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="../aeroPrice/europe.php"  class="tm-tab-link">
                            <img src="img/europe.png" alt="Image" class="img-fluid">
                            Europe
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="../aeroPrice/asie.php"  class="tm-tab-link active"><!-- Current Active Tab -->
                            <img src="img/asia.png" alt="Image" class="img-fluid">
                            Asie
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="../aeroPrice/afrique.php"  class="tm-tab-link">
                            <img src="img/africa.png" alt="Image" class="img-fluid">
                            Afrique
                        </a>
                    </li>
                    <li class="tm-tab-link-li">
                        <a href="../aeroPrice/antartique.php"  class="tm-tab-link">
                            <img src="img/antartica.png" alt="Image" class="img-fluid">
                            Antarctique
                        </a>
                    </li>
                </ul>
                <div class="tab-content clearfix">
                	
                   
                </div>
            </div>

            <div class="tm-container-outer tm-position-relative" id="tm-section-4">
                <div id="leaflet-map" class="leaflet-map"></div>   
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
                          <li ><a style="color: black;" href="../services.php">Services</a></li>
                          <li  ><a  style="color: black;" href="../contacts/contact.php">Contact</a></li>
                          <li ><a style="color: black;" href="../about.php">à propos</a></li>
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
        </div>
    </div>
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>             
    <script src="js/popper.min.js"></script>                    
    <script src="js/bootstrap.min.js"></script>               
    <script src="js/datepicker.min.js"></script>                
    <script src="js/jquery.singlePageNav.min.js"></script>      
    <script src="slick/slick.min.js"></script>                  
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>           
    <script> 
       var leafletMap = L.map('leaflet-map').setView([49.0359, 2.0608], 13); // Coordonnées de Cergy avec un zoom initial
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(leafletMap);

        /* DOM is ready
        ------------------------------------------------*/
        $(function(){

            // Change top navbar on scroll
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {                    
                 $(".tm-top-bar").removeClass("active");
                }
            });

            // Smooth scroll to search form
            $('.tm-down-arrow-link').click(function(){
                $.scrollTo('#tm-section-search', 300, {easing:'linear'});
            });

            // Date Picker in Search form
            var pickerCheckIn = datepicker('#inputCheckIn');
            var pickerCheckOut = datepicker('#inputCheckOut');

            // Update nav links on scroll
            $('#tm-top-bar').singlePageNav({
                currentClass:'active',
                offset: 60
            });

            // Close navbar after clicked
            $('.nav-link').click(function(){
                $('#mainNav').removeClass('show');
            });

            // Slick Carousel
            $('.tm-slideshow').slick({
                infinite: true,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
            

            loadGoogleMap();                                       // Google Map                
            $('.tm-current-year').text(new Date().getFullYear());             
        });
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else { 
                alert("La géolocalisation n'est pas prise en charge par ce navigateur.");
            }
        }

        // Afficher la position actuelle de l'utilisateur
        function showPosition(position) {
            var userLat = position.coords.latitude;
            var userLng = position.coords.longitude;
            var userLocation = L.latLng(userLat, userLng);

            leafletMap.setView(userLocation, 13);
            L.marker(userLocation).addTo(leafletMap)
                .bindPopup("Votre position actuelle").openPopup();
        }

        // Gérer les erreurs de géolocalisation
        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("L'utilisateur a refusé la demande de géolocalisation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Les informations de localisation ne sont pas disponibles.");
                    break;
                case error.TIMEOUT:
                    alert("La demande de localisation a expiré.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("Une erreur inconnue s'est produite.");
                    break;
            }
        }

        // Demander la géolocalisation à l'utilisateur
        getLocation();

    </script> 
</body>
</html>