<?php
include('config.php');

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo "Inscription vérifiée avec succès. Vous pouvez maintenant vous connecter.";
    } else {
        echo "Erreur lors de la vérification de l'inscription.";
    }

    $conn = null;
} else {
    echo "Paramètre manquant.";
}
?>
