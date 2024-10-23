<?php
$host = 'localhost';
$db = 'gestión_usuarios';
$user = 'root'; // Cambia esto según tu configuración de MySQL
$pass = ''; // Cambia esto según tu configuración de MySQL

try {
    // Crear una instancia de PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
