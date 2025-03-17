<?php
// conexion.php debería estar incluido en este archivo
include('conexion.php');

// Realizar la consulta para obtener los hoteles con más de 2 reservas
$sql = "
    SELECT h.nombre, COUNT(r.id_reserva) AS num_reservas
    FROM HOTEL h
    JOIN RESERVA r ON h.id_hotel = r.id_hotel
    GROUP BY h.id_hotel
    HAVING num_reservas > 2
";
$query = $pdo->query($sql);
$hoteles = $query->fetchAll(PDO::FETCH_ASSOC);

// Devolver los resultados
echo "<h2>Hoteles reservas</h2>";
if (count($hoteles) > 0) {
    echo "<ul>";
    foreach ($hoteles as $hotel) {
        echo "<li>" . htmlspecialchars($hotel['nombre']) . " - " . $hotel['num_reservas'] . " reservas</li>";
    }
    echo "</ul>";
} else {
    echo "No hay hoteles con más de 2 reservas.";
}
?>


