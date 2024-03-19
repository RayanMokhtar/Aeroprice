<?php

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['code'])) {
    $code = $_GET['code'];
    try {
        $stmt = $conn->prepare("SELECT * FROM inscription_temp WHERE code = :code");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $row = $stmt->fetch();

        if ($row) {
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $username = $row['username'];
            $email = $row['email'];
            $mot_de_passe = $row['mot_de_passe'];

            $stmt = $conn->prepare("INSERT INTO utilisateurs (nom, prenom, username, email, mot_de_passe) VALUES (:nom, :prenom, :username, :email, :mot_de_passe)");
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mot_de_passe', $mot_de_passe);
            $stmt->execute();

            $stmt = $conn->prepare("DELETE FROM inscription_temp WHERE code = :code");
            $stmt->bindParam(':code', $code);
            $stmt->execute();

            header("Location: premiereconnexion.html");
            exit();
        } else {
            echo "Code de confirmation invalide.";
        }

    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "Mauvaise requête.";
}

?>
