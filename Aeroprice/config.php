<?php
$host = "mysql-aeroprixxxxxxxxxxxxxxxxxxx.alwaysdata.net"; 
$username = 'aeroprice';
$password = 'identifiant'; 
$database = 'FauxIdentifiants'; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    
}
?>
