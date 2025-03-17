<?php
// Verificamos que se haya enviado el formulario correctamente
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['origen'], $_GET['destino'], $_GET['fecha'])) {
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];
    $fecha = $_GET['fecha'];

    // Simulación de una base de datos con vuelos disponibles
    // En un caso real, aquí iría la consulta a la base de datos.
    $vuelos = [
        ["origen" => "Santiago", "destino" => "Buenos Aires", "fecha" => "2025-03-20", "precio" => 300],
        ["origen" => "Santiago", "destino" => "Lima", "fecha" => "2025-03-21", "precio" => 250],
        ["origen" => "Santiago", "destino" => "Bogotá", "fecha" => "2025-03-22", "precio" => 200],
        // Aquí puedes agregar más vuelos
    ];

    // Filtramos los vuelos según los parámetros de búsqueda
    $resultados = array_filter($vuelos, function($vuelo) use ($origen, $destino, $fecha) {
        return $vuelo['origen'] === $origen && $vuelo['destino'] === $destino && $vuelo['fecha'] === $fecha;
    });

    // Mostrar los resultados
    if (count($resultados) > 0) {
        echo "<h2>Vuelos encontrados:</h2><ul>";
        foreach ($resultados as $vuelo) {
            echo "<li>{$vuelo['origen']} a {$vuelo['destino']} - Fecha: {$vuelo['fecha']} - Precio: \${$vuelo['precio']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron vuelos para la búsqueda.";
    }
}
?>





