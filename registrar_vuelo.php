<?php
$host = 'localhost';
$dbname = 'AGENCIA';
$username = 'root';
$password = 'Pancito23.';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $fecha = $_POST['fecha'];
        $plazas = $_POST['plazas'];
        $precio = $_POST['precio'];

        $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) 
                VALUES (:origen, :destino, :fecha, :plazas, :precio)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':origen', $origen);
        $stmt->bindParam(':destino', $destino);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':plazas', $plazas);
        $stmt->bindParam(':precio', $precio);
        
        $stmt->execute();
        echo "Vuelo registrado con éxito.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
