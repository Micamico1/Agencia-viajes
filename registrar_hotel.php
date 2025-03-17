<?php
$host = 'localhost';
$dbname = 'AGENCIA';
$username = 'root';
$password = 'Pancito23.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombreHotel = $_POST['nombreHotel'];
        $ubicacion = $_POST['ubicacion'];
        $habitaciones = $_POST['habitaciones'];
        $tarifa = $_POST['tarifa'];

        $sql = "INSERT INTO HOTEL (nombre, ubicacion, habitaciones_disponibles, tarifa_noche) 
                VALUES (:nombreHotel, :ubicacion, :habitaciones, :tarifa)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombreHotel', $nombreHotel);
        $stmt->bindParam(':ubicacion', $ubicacion);
        $stmt->bindParam(':habitaciones', $habitaciones);
        $stmt->bindParam(':tarifa', $tarifa);
        
        $stmt->execute();
        echo "Hotel registrado con éxito.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>