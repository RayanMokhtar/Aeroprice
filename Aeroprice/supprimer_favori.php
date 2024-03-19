<?php
include('config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour effectuer cette action.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_favori'])) {
    $idFavori = $_POST['id_favori'];
    $stmt = $conn->prepare("DELETE FROM favoris WHERE id_favori = :idFavori");
    $stmt->bindParam(':idFavori', $idFavori);
    if ($stmt->execute()) {
        echo "Vol supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du vol.";
    }
} else {
    echo "Aucun vol sélectionné pour suppression.";
}
?>