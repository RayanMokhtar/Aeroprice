<?php 
$client_id = '76BbsCTfG3o461S05xFbYapTDTmCJHV0';
$client_secret = 'U3xxZ6zrsEGrtDfV';

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

$access_token = json_decode($result)->access_token;

$ch = curl_init();




function getRandomCityCoordinates() {
    // Chemin vers le fichier JSON
    $jsonFile = 'europe.json';
    
    // Lecture du contenu du fichier JSON
    $json = file_get_contents($jsonFile);
    
    // Transformation en tableau PHP
    $data = json_decode($json, true);
    
    // Choix aléatoire d'une capitale
    $randomCapital = $data['European Capitals'][array_rand($data['European Capitals'])];
    
    // Récupération du nom de la capitale
    $capitalName = $randomCapital['capital_name'];
    
    // Récupération des coordonnées
    $latitude = $randomCapital['latitude'];
    $longitude = $randomCapital['longitude'];
    
    // Retourne les coordonnées de la capitale aléatoire avec son nom
    return [
        'city' => $capitalName,
        'latitude' => $latitude,
        'longitude' => $longitude
    ];
}


$randomCoordinates = getRandomCityCoordinates();

$latitude = $randomCoordinates['latitude'];
$longitude = $randomCoordinates['longitude'];
$ville = $randomCoordinates['city'];
    



curl_setopt($ch, CURLOPT_URL, "https://test.api.amadeus.com/v1/shopping/activities?latitude=$latitude&longitude=$longitude&radius=20");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $access_token"]);

$output = curl_exec($ch);

$attempt = 0;
do {
    $output = curl_exec($ch);
    $attempt++;
} while (empty($output) && $attempt < 5);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    exit;
}

if (empty($output)) {
    echo 'No data received from API after 5 attempts.';
    exit;
}
curl_close($ch);

$data = json_decode($output, true);
/*
while (!(isset($data['data']) && !empty($data['data']))) {
    header('Location: ./europe.php');
    exit;
}
*/
?>




<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <!--  <link rel="stylesheet" id="picostrap-styles-css" href="https://cdn.livecanvas.com/media/css/library/bundle.css" media="all"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/livecanvas-team/ninjabootstrap/dist/css/bootstrap.min.css" media="all">


    <link rel="icon" href="../icone.ico">
    <title>Europe</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
    </style>
    
    
</head>

<body>

<header style="font-family: Poppins;font-weight:bold;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../temp/accueil.php" style="margin-right: 5px;"> <!-- Ajustez la marge ici si nécessaire -->
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
                        <a class="nav-link active" aria-current="page" style="font-weight:700; margin-right: 5px;font-size:17px" href="../contacts/contact.html">Contacts</a> <!-- Ajustez la marge ici si nécessaire -->
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




    <!-- lazily load the Swiper CSS file -->
    <link rel="preload" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <!-- lazily load the Swiper JS file -->
    <script defer="defer" src="https://unpkg.com/swiper@8/swiper-bundle.min.js" onload="initializeSwiperRANDOMID();"></script>

    <!-- lc-needs-hard-refresh -->

    <script>
        function initializeSwiperRANDOMID(){
    const swiper = new Swiper(".mySwiper-RANDOMID", {
        slidesPerView: 1,
        grabCursor: true,
        spaceBetween: 30,
        
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        },
    });
}
    </script>

    <style>
        .mySwiper-RANDOMID .card {max-width:21rem}
    </style>





        <?php echo "<h1 style='text-align:center; margin-top: 50px;'>Bienvenue sur ".$ville."</h1>"; ?>

        <div class="d-flex justify-content-center">
            <a href="europe.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="margin-bottom: 20px; margin-top: 50px;">Encore une autre ville !</a>
        </div>


    <div class="container py-6"><!-- Slider main container -->
        <div class="swiper mySwiper-RANDOMID">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper"><!-- Slides -->
                



                <?php foreach ($data['data'] as $activity) { 
                    
                    
    
                        if (isset($activity['name'])) {
                            $name = $activity['name'];
                        }else{
                            $name = "Nom de l'activité non disponible";
                        }
                        
                        if (isset($activity['shortDescription'])) {
                            $description = $activity['shortDescription'];
                        }else{
                            $description = "Description non disponible";
                        }

                        // Lien de l'image
                        if (isset($activity['pictures'][0]) && filter_var($activity['pictures'][0], FILTER_VALIDATE_URL)) {
                            $image = $activity['pictures'][0];
                        } else {
                            $image = "img.png";
                        }

                        

                        if (isset($activity['bookingLink'])) {
                            $lien = $activity['bookingLink'];
                        }else{
                            $lien = "#";
                        }
                    
                    
                    ?>
                    
                    <div class="swiper-slide h-100 d-flex">
                        <div class="card shadow mx-auto flex-column">
                            <div class="card-body">
                                <div class="lc-block">
                                    <img class="img-fluid" src="<?php echo $image; ?>" alt="Photo : <?php echo $name; ?>" loading="lazy">
                                </div>
                                <div class="card-body">
                                    <div class="lc-block mb-3">
                                        <div editable="rich">
                                            <h2 class="h5"><?php echo $name; ?></h2>
                                            <p><?php echo $description; ?></p>
                                        </div>
                                    </div>
                                    <div class="lc-block">
                                        <a class="btn btn-primary" href="<?php echo $lien; ?>" target="_blank" role="button">Button</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>



            <!-- If we need pagination -->
            <div class="swiper-pagination position-relative pt-5 bottom-0"></div>
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

</body>

</html>