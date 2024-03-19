<?php
$host = "mysql-aeroprice.alwaysdata.net"; 
$username = 'aeroprice';
$password = 'ahcenerayanziane'; 
$database = 'aeroprice_db'; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM utilisateurs WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo json_encode(['exists' => $result['count'] > 0]);
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
