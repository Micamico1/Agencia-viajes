<?php
    // Incluir el archivo que contiene la definición de la clase FiltroViaje
    include 'FiltroViaje.php';

    // Verificar que se hayan enviado los datos por POST desde el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar los datos del formulario para enviarlos como parametros al constructor
        $nombreHotel = isset($_POST['nombreHotel']) ? trim($_POST['nombreHotel']) : "";
        $ciudad      = isset($_POST['ciudad']) ? trim($_POST['ciudad']) : "";
        $pais        = isset($_POST['pais']) ? trim($_POST['pais']) : "";
        $fechaViaje  = isset($_POST['fechaViaje']) ? trim($_POST['fechaViaje']) : "";
        $duracion    = isset($_POST['duracion']) ? (int) $_POST['duracion'] : 0;

        // Crear una instancia de FiltroViaje con los datos recibidos
        $filtro = new FiltroViaje($nombreHotel, $ciudad, $pais, $fechaViaje, $duracion);

        // Obtener el resultado de la búsqueda utilizando el método de la clase
        $resultadoCotizacion = $filtro->mostrarCotizacion();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de la Cotización de viaje</title>
</head>
<body>
    <h1>Resultados de la Cotización</h1>
    <?php
    // Mostrar el resultado de la cotizacion
    if (isset($resultadoCotizacion)) {
        echo "<p>{$resultadoCotizacion}</p>";
    } else {
        echo "<p>No se recibieron datos del formulario.</p>";
    }
    ?>
    <br>
    <a href="index.php">Volver a la página principal</a>
</body>
</html>






