<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <!-- Agrega la referencia de Bootstrap (puedes cambiar a la versión que prefieras) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <?php echo "<h1><strong>Bienvenido:</strong> " . $profesor['nombre'] . "</h1>";?>

    <?php
    // Mostrar la información del profesor con estilos de Bootstrap
    echo "<br/>";
    echo "<p><strong>Tus datos: </strong>";
    echo "<p><strong>Nombre:</strong> " . $profesor['nombre'] . "</p>";
    echo "<p><strong>Dependencia:</strong> " . $profesor['dependencia'] . "</p>";
    echo "<p><strong>Distinción:</strong> " . $profesor['distincion'] . "</p>";
    echo "<p><strong>Categoría:</strong> " . $profesor['categoria'] . "</p>";
    echo "<p><strong>CURP:</strong> " . $profesor['curp'] . "</p>";
    echo "<p><strong>Asistencia confirmada:</strong> " . ($profesor['asistire'] ? 'Sí' : 'No') . "</p>";
    echo "<p><strong>¿Requieres apoyo? :</strong> " . $profesor['discapacidad'] . "</p>";
    echo "<p><strong>Acompañante:</strong> " . ($profesor['acompanante'] ? 'Sí' : 'No') . "</p>";
    echo "<p><strong>Acompañante discapacitado:</strong> "  . $profesor['acompanante_discapacitado'] . "</p>";

    // Agrega el botón de cierre de sesión
    echo '<a href="index.php?action=logout" class="btn btn-primary">Cerrar Sesión</a>';

    
    ?>

    <div>
        <a href="fpdf/PruebaV.php" class="btn btn-primary">Generar reporte</a>
    </div>

    <!-- Agrega el script de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
