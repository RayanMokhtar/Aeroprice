<?php
session_start();
include('config.php'); // Assure-toi que ce chemin est correct

if (!isset($_SESSION['user_id'])) {
    echo "Non autorisé";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $field = $_POST['field']; // 'prenom', 'nom', 'email', etc.
    $value = $_POST['value'];
    $user_id = $_SESSION['user_id'];

    // Validation et assainissement des entrées

    $query = "UPDATE utilisateurs SET $field = :value WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':value', $value);
    $stmt->bindParam(':id', $user_id);

    if ($stmt->execute()) {
        echo "Mise à jour réussie";
    } else {
        echo "Erreur lors de la mise à jour";
    }
}
?>
