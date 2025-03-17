<?php
$host = 'localhost';
$dbname = 'AGENCIA';
$username = 'root'; //usuario de MySQL
$password = 'Pancito23.'; //contraseña de MySQL

try {
    // Establecer la conexión usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar PDO para mostrar errores si los hay
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>
