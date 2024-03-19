<?php
include('config.php'); // Assurez-vous que ce fichier contient les informations de connexion à la base de données

session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo 'Vous devez être connecté pour effectuer cette action.';
    exit();
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!is_array($data)) {
    http_response_code(400);
    echo 'Données invalides.';
    exit();
}

$idUtilisateur = $_SESSION['user_id'];
$numeroVol = $data['numeroVol'] ?? '';
$aeroportDepart = $data['aeroportDepart'] ?? '';
$aeroportArrivee = $data['aeroportArrivee'] ?? '';
$dateDepart = $data['dateDepart'] ?? '';
$dateRetour = $data['dateRetour'] ?? '';
$imageCompagnie = $data['imageCompagnie'] ?? '';

try {
    // Vérifier si le favori existe déjà
    $checkStmt = $conn->prepare("SELECT id_favori FROM favoris WHERE id_utilisateur = :idUtilisateur AND numero_vol = :numeroVol AND aeroport_depart = :aeroportDepart AND aeroport_arrivee = :aeroportArrivee AND date_depart = :dateDepart AND date_retour = :dateRetour");
    $checkStmt->execute([
        ':idUtilisateur' => $idUtilisateur,
        ':numeroVol' => $numeroVol,
        ':aeroportDepart' => $aeroportDepart,
        ':aeroportArrivee' => $aeroportArrivee,
        ':dateDepart' => $dateDepart,
        ':dateRetour' => $dateRetour
    ]);

    if ($checkStmt->rowCount() > 0) {
        echo 'Ce vol est déjà dans vos favoris.';
    } else {
        // Insérer le nouveau favori
        $stmt = $conn->prepare("INSERT INTO favoris (id_utilisateur, numero_vol, aeroport_depart, aeroport_arrivee, date_depart, date_retour, image_compagnie) VALUES (:idUtilisateur, :numeroVol, :aeroportDepart, :aeroportArrivee, :dateDepart, :dateRetour, :imageCompagnie)");
        $stmt->bindParam(':idUtilisateur', $idUtilisateur);
        $stmt->bindParam(':numeroVol', $numeroVol);
        $stmt->bindParam(':aeroportDepart', $aeroportDepart);
        $stmt->bindParam(':aeroportArrivee', $aeroportArrivee);
        $stmt->bindParam(':dateDepart', $dateDepart);
        $stmt->bindParam(':dateRetour', $dateRetour);
        $stmt->bindParam(':imageCompagnie', $imageCompagnie);

        $stmt->execute();

        echo 'Vol ajouté aux favoris avec succès.';
    }
} catch(PDOException $e) {
    http_response_code(500);
    echo "Erreur d'enregistrement dans la base de données: " . $e->getMessage();
}
?>
