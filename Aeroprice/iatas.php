<?php

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
    exit();
}
curl_close($ch);

$result = json_decode($result, true);
$apiKey = $result['access_token'];

$city = $_GET['city'] ?? '';

if (!empty($city) && !empty($apiKey)) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://test.api.amadeus.com/v1/reference-data/locations?subType=AIRPORT&keyword=$city");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $apiKey]);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo json_encode(["error" => 'Erreur lors de la récupération des données des aéroports']);
        exit();
    }
    curl_close($ch);

    $data = json_decode($result);

    if (isset($data->data) && is_array($data->data) && count($data->data) > 0) {
        $airports = $data->data;

        // Préparer les données
        $autocomplete_data = [];
        foreach ($airports as $airport) {
            $autocomplete_data[] = $airport->address->cityName . ', ' . $airport->name . ': ' . $airport->iataCode;        }

        echo json_encode($autocomplete_data);
        exit();
    } else {
        echo json_encode(["error" => "Aucun aéroport trouvé pour cette ville ou cet aéroport."]);
        exit();
    }
} else {
    echo json_encode(["error" => "Veuillez entrer une ville ou un aéroport valide."]);
    exit();
}
?>