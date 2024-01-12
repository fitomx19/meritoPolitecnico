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
    <h1 class="mb-4">Bienvenido a el administrador de entradas para boletos de Premio al Mérito Polítecnico </h1>

    <?php
    // Mostrar la información del profesor con estilos de Bootstrap
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<p class='card-text'><strong>Nombre:</strong> " . $profesor['nombre'] . "</p>";
    echo "<p class='card-text'><strong>Dependencia:</strong> " . $profesor['dependencia'] . "</p>";
    echo "<p class='card-text'><strong>Distinción:</strong> " . $profesor['distincion'] . "</p>";
    echo "<p class='card-text'><strong>Categoría:</strong> " . $profesor['categoria'] . "</p>";
    echo "<p class='card-text'><strong>CURP:</strong> " . $profesor['curp'] . "</p>";
    echo "</div>";
    echo "</div>";

    // Mostrar formulario para cambiar el estatus de "asistire"
    echo '<form method="post" action="index.php?action=changeAsistire" class="mt-4">';
    echo '<div class="form-group">';
    echo '<input type="hidden" name="id_profesor" value="' . $profesor["id"] . '">';
    echo '<label for="asistire">Asistiré:</label>';
    echo '<select class="form-control" id="asistire" name="asistire">';
    echo '<option value="0">No</option>';
    echo '<option value="1">Sí</option>';
    echo '</select>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="discapacidad">Asistencia:</label>';
    echo '<select class="form-control" id="discapacidad" name="discapacidad">';
    echo '<option value=""> -Seleccionar- </option>';
    echo '<option value="no"> Ninguna </option>';
    echo '<option value="baston">Bastón</option>';
    echo '<option value="silla">Silla de Ruedas</option>';
    echo '<option value="muleta">Muletas</option>';
    echo '</select>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="acompanante">¿Vas con acompañante?</label>';
    echo '<select class="form-control" id="acompanante" name="acompanante">';
    echo '<option value="0">No</option>';
    echo '<option value="1">Sí</option>';
    echo '</select>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="discapacidad">Asistencia para tu acompañante:</label>';
    echo '<select class="form-control" id="discapacidad_acompanante" name="discapacidad_acompanante">';
    echo '<option value=""> -Seleccionar- </option>';
    echo '<option value="no"> Ninguna </option>';
    echo '<option value="baston">Bastón</option>';
    echo '<option value="silla">Silla de Ruedas</option>';
    echo '<option value="muletas">Muletas</option>';
    echo '</select>';
    echo '</div>';
    echo '<button type="submit" class="btn btn-primary">Guardar Cambios</button>';
    echo '</form>';
    ?>

    <!-- Agrega el script de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
