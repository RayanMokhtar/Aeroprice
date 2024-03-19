<?php

function getRandomCityCoordinates() {
    // Chemin vers le fichier JSON
    $jsonFile = 'europe.json';
    
    // Lecture du contenu du fichier JSON
    $json = file_get_contents($jsonFile);
    
    // Transformation en tableau PHP
    $data = json_decode($json, true);
    
    // Choix aléatoire d'une ville
    $randomCity = $data[array_rand($data)];
    
    // Récupération du nom de la ville
    $cityName = $randomCity['city'];
    
    // Extraction du nom du pays à partir du champ 'city'
    $cityParts = explode(',', $cityName);
    $country = trim($cityParts[1]); // Prend le deuxième élément après la virgule (supposé être le pays)
    
    // Récupération et séparation des coordonnées
    $coordinates = explode(",", $randomCity['ll']);
    
    // Retourne les coordonnées de la ville aléatoire avec son nom et le nom du pays
    return [
        'city' => $cityName,
        'country' => $country,
        'latitude' => $coordinates[0],
        'longitude' => $coordinates[1]
    ];
}


// Utilisation de la fonction pour obtenir les coordonnées
$randomCoordinates = getRandomCityCoordinates();

// Affichage des coordonnées, du nom de la ville et du pays
echo "Ville : " . $randomCoordinates['city'] . "<br>";
echo "Pays : " . $randomCoordinates['country'] . "<br>";
echo "Latitude : " . $randomCoordinates['latitude'] . "<br>";
echo "Longitude : " . $randomCoordinates['longitude'];

?>





