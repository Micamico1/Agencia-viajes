<?php
    // Función para mostrar notificaciones emergentes
    function mostrarNotificacion($mensaje) {
        echo "<script type='text/javascript'>alert('{$mensaje}');</script>";
    }

// Iniciar la sesión
session_start();

// Función para agregar un paquete al carrito
function agregarAlCarrito($paquete) {
    // Si el carrito no existe, crearlo
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    
    // Agregar el paquete seleccionado al carrito
    array_push($_SESSION['carrito'], $paquete);
}

// Si se recibe un paquete para agregar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['paquete'])) {
    $paquete = $_POST['paquete'];
    agregarAlCarrito($paquete);
}

// Mostrar los paquetes en el carrito
function mostrarCarrito() {
    if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
        echo "<ul>";
        foreach ($_SESSION['carrito'] as $paquete) {
            echo "<li>" . htmlspecialchars($paquete) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "El carrito está vacío.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agencia de Viajes - Inicio</title>
</head>
<body>
    <?php
        // Mostrar notificación de oferta especial al cargar la página
        mostrarNotificacion("¡Oferta especial! Reserva ahora y obtén un 20% de descuento en tu viaje.");
    ?>
    
    <h1>Bienvenido a la Agencia de Viajes</h1>
    <h2>Cotización paquete de viaje</h2>
    
    <!-- Formulario para registrar la intención de viaje -->
    <form action="procesarViaje.php" method="POST">
        <label for="nombreHotel">Nombre del Hotel:</label>
        <input type="text" id="nombreHotel" name="nombreHotel" placeholder="Nombre del Hotel"><br><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad"><br><br>

        <label for="pais">País:</label>
        <input type="text" id="pais" name="pais" placeholder="País"><br><br>

        <label for="fechaViaje">Fecha de Viaje:</label>
        <input type="date" id="fechaViaje" name="fechaViaje"><br><br>

        <label for="duracion">Duración del Viaje (días):</label>
        <input type="number" id="duracion" name="duracion" placeholder="Duración"><br><br>

        <input type="submit" value="Cotizar">
    </form>
    <h1>Carrito de Compras</h1>

    <!-- Mostrar los paquetes en el carrito -->
    <h2>Paquetes en tu carrito:</h2>
    <?php mostrarCarrito(); ?>

    <h2>Selecciona un paquete para agregar al carrito:</h2>
    <form method="POST">
        <label for="paquete">Paquete turístico:</label>
        <input type="text" id="paquete" name="paquete" required>
        <button type="submit">Agregar al carrito</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Vuelos y Hoteles</title>
    <script>
        // Validación básica con JavaScript
        function validarFormularioVuelos() {
            const origen = document.getElementById('origen').value;
            const destino = document.getElementById('destino').value;
            const fecha = document.getElementById('fecha').value;
            const plazas = document.getElementById('plazas').value;
            const precio = document.getElementById('precio').value;

            if (origen === '' || destino === '' || fecha === '' || plazas === '' || precio === '') {
                alert('Todos los campos son obligatorios.');
                return false;
            }
            return true;
        }

        function validarFormularioHoteles() {
            const nombre = document.getElementById('nombreHotel').value;
            const ubicacion = document.getElementById('ubicacion').value;
            const habitaciones = document.getElementById('habitaciones').value;
            const tarifa = document.getElementById('tarifa').value;

            if (nombre === '' || ubicacion === '' || habitaciones === '' || tarifa === '') {
                alert('Todos los campos son obligatorios.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Registrar Vuelos</h1>
    <form action="registrar_vuelo.php" method="POST" onsubmit="return validarFormularioVuelos()">
        <label for="origen">Origen:</label>
        <input type="text" id="origen" name="origen" required><br><br>

        <label for="destino">Destino:</label>
        <input type="text" id="destino" name="destino" required><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="plazas">Plazas disponibles:</label>
        <input type="number" id="plazas" name="plazas" required><br><br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required><br><br>

        <input type="submit" value="Registrar Vuelo">
    </form>

    <h1>Registrar Hoteles</h1>
    <form action="registrar_hotel.php" method="POST" onsubmit="return validarFormularioHoteles()">
        <label for="nombreHotel">Nombre del Hotel:</label>
        <input type="text" id="nombreHotel" name="nombreHotel" required><br><br>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" required><br><br>

        <label for="habitaciones">Habitaciones disponibles:</label>
        <input type="number" id="habitaciones" name="habitaciones" required><br><br>

        <label for="tarifa">Tarifa por noche:</label>
        <input type="number" step="0.01" id="tarifa" name="tarifa" required><br><br>

        <input type="submit" value="Registrar Hotel">
    </form>
</body>
</html>

<?php
include('consultar_hoteles.php');
?>


