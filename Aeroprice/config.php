<?php
$host = "mysql-aeroprice.alwaysdata.net"; 
$username = 'aeroprice';
$password = 'ahcenerayanziane'; 
$database = 'aeroprice_db'; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    
}
?>
