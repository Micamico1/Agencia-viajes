<?php
// mostrar_hoteles.php
include 'conexion.php';

// Consulta para obtener los hoteles con más de 2 reservas
$sql = "
    SELECT H.id_hotel, H.nombre, H.ubicacion, COUNT(R.id_reserva) AS num_reservas
    FROM HOTEL H
    LEFT JOIN RESERVA R ON H.id_hotel = R.id_hotel
    GROUP BY H.id_hotel
    HAVING num_reservas > 2
";

try {
    // Ejecutar la consulta
    $stmt = $pdo->query($sql);
    $hoteles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($hoteles) > 0) {
        echo "<ul>";
        foreach ($hoteles as $hotel) {
            echo "<li>" . $hotel['nombre'] . " - " . $hotel['ubicacion'] . " - Reservas: " . $hotel['num_reservas'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay hoteles con más de 2 reservas.";
    }
} catch (PDOException $e) {
    echo "Error al obtener los hoteles: " . $e->getMessage();
}
?>