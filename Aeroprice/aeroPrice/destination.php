<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Destination</title>
</head>

<body>
    <!-- Le header -->
    <?php
    require 'headerConnect.php';
    ?>
    <div class="container-fluid">
        <div class="entet ">
            <h2>Expériences de voyages uniques</h2>
            <p>Découvez de nouvelles destinatiosnd ans tout les continants du monde avec AeroPrice!</p>
        </div>
        <div class="card-container">
            <div class="card col-12 col-md-4" >
                <a href="europe.php"> <img src="imageAero/europ.jpg" alt="Europ"></a>
                <div class="card-content px-2">
                    <h3>Europe</h3>
                    <p>
                        L'Europe, un continent chargé d'histoire et de richesse culturelle, invite à l'exploration avec ses monuments emblématiques et ses paysages diversifiés,Plongez dans les traditions culinaires variées et absorbez le dynamisme des places historiques, créant une expérience inoubliable pour les aventuriers en quête d'histoire et de découverte.</p>
                    <a href="europe.php" class="btn">Read More</a>
                </div>
            </div>
            <div class="card col-12 col-md-4" >
                <a href="asie.php"> <img src="imageAero/asian.jpg" alt="Asie"></a>
                <div class="card-content px-2">
                    <h3>Asie</h3>
                    <p>Découvrez la richesse culturelle de l'Asie en explorant ses endroits les plus visités.En soulignant la richesse culturelle, la diversité des paysages, la gastronomie variée et les expériences de voyage uniques qu'elle offre, l'Asie est une destination de choix pour les voyageurs en quête d'aventure et de découvertes.</p>
                    <a href="asie.php" class="btn">Read More</a>
                </div>
            </div>
            <div class="card col-12 col-md-4" >
                <a href="amerique.php"><img src="imageAero/america.jpg" alt="America"></a>
                <div class="card-content px-2">
                    <h3>Amérique</h3>
                    <p>Découvrez l'Amérique, un continent riche en histoire et en diversité culturelle, offrant une expérience inoubliable pour les voyageurs en quête d'aventure et de découvertes.l'Amérique invite à l'exploration, plongeant les visiteurs dans une mosaïque de traditions culinaires variées et de dynamisme culturel.</p>
                    <a href="amerique.php" class="btn">Read More</a>
                </div>
            </div>
            <div class="card col-12 col-md-4" >
                <a href="antartique.php"><img src="imageAero/antartica.jpg" alt="Antartica"></a>
                <div class="card-content px-2">
                    <h3>Antartique</h3>
                    <p>Découvrez l'Antarctique, un continent d'une beauté sauvage et préservée, où la nature règne en maître.Des paysages glacés à perte de vue aux lacs cachés sous l'épaisseur glacée, l'Antarctique offre une expérience unique pour les aventuriers en quête de découvertes extraordinaires.l'Antarctique fascine par sa nature spectaculaire et ses conditions extrêmes qui attirent les scientifiques les voyageurs en quête d'aventure.</p>
                    <a href="antartique.php" class="btn">Read More</a>
                </div>
            </div>
            <div class="card col-md-4">
                <a href="afrique.php"><img src="imageAero/afriqueSud.jpg" alt=""></a>
                <div class="card-content px-2">
                    <h3>Afrique</h3>
                    <p>Découvrez l'Afrique, un continent d'une beauté sauvage et préservée, où la nature règne en maître.Des paysages glacés à perte de vue aux lacs cachés sous l'épaisseur glacée, l'Antarctique offre une expérience unique pour les aventuriers en quête de découvertes extraordinaires.l'Antarctique fascine par sa nature spectaculaire et ses conditions extrêmes qui attirent les scientifiques les voyageurs en quête d'aventure.</p>
                    <a href="afrique.php" class="btn">Read More</a>
                </div>
            </div>
        </div>
        <!-- <div class="card" style="width: 400px;">
            <img src="imageAero/oneanique.jpeg" alt="">
            <div class="card-content px-2">
                <h3>Océanique</h3>
                <p>Découvrez l'Océanique, un continent d'une beauté sauvage et préservée, où la nature règne en maître.Des paysages glacés à perte de vue aux lacs cachés sous l'épaisseur glacée, l'Antarctique offre une expérience unique pour les aventuriers en quête de découvertes extraordinaires.l'Antarctique fascine par sa nature spectaculaire et ses conditions extrêmes qui attirent les scientifiques les voyageurs en quête d'aventure.</p>
                <a href="afrique.php" class="btn">Read More</a>
            </div> -->
        <!-- </div> -->
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>