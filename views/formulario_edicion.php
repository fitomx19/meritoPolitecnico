<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <?php
    // Verifica si se proporciona un ID de profesor válido
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        // Incluye tu clase ProfesorModel aquí (ajusta la ruta según sea necesario)
        require_once '../models/ProfesorModel.php';

        // Crea una instancia de la clase ProfesorModel
        $profesorModel = new ProfesorModel();

        // Obtener la información del profesor
        $idProfesor = $_GET['id'];
        $profesor = $profesorModel->obtenerProfesor($idProfesor);

        // Verifica si se encontró el profesor
        if ($profesor) {
            // Asigna los valores a las variables para usarlos en los campos del formulario
            $nombre = $profesor['nombre'];
            $dependencia = $profesor['dependencia'];
            $distincion = $profesor['distincion'];
            $categoria = $profesor['categoria'];
            $curp = $profesor['curp'];
            $acompanante = $profesor['acompanante'];
            $acompanante_discapacitado = $profesor['acompanante_discapacitado'];
            $asistire = $profesor['asistire'];
            $discapacidad = $profesor['discapacidad'];
        } else {
            // Muestra un mensaje de error si no se encuentra el profesor
            echo '<div class="alert alert-danger" role="alert">Profesor no encontrado.</div>';
            exit(); // Detiene la ejecución del script
        }
    } else {
        // Muestra un mensaje de error si no se proporciona un ID de profesor válido
        echo '<div class="alert alert-danger" role="alert">ID de profesor no válido.</div>';
        exit(); // Detiene la ejecución del script
    }
    ?>

    <!-- Formulario de edición con valores prellenados -->
    <h2>Editar Profesor</h2>
    <form action="../controllers/crud.php" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="form-group">
            <label for="dependencia">Dependencia:</label>
            <input type="text" name="dependencia" class="form-control" value="<?php echo $dependencia; ?>" required>
        </div>
       
        <div class="form-group">
            <label for="distincion">Distincion:</label>
            <input type="text" name="distincion" class="form-control" value="<?php echo $distincion; ?>" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" class="form-control" value="<?php echo $categoria; ?>" required>
        </div>

        <div class="form-group">
            <label for="curp">CURP:</label>
            <input type="text" name="curp" class="form-control" value="<?php echo $curp; ?>" required>
        </div>

        <div class="form-group">
            <label for="acompanante">Acompañante:</label>
            <input type="text" name="acompanante" class="form-control" value="<?php echo $acompanante; ?>" required>
        </div>

        <div class="form-group">
            <label for="acompanante_discapacitado">Acompañante Discapacitado:</label>
            <input type="text" name="acompanante_discapacitado" class="form-control" value="<?php echo $acompanante_discapacitado; ?>" required>
        </div>

        <div class="form-group">
            <label for="asistire">Asistire:</label>
            <input type="text" name="asistire" class="form-control" value="<?php echo $asistire; ?>" required>
        </div>

        <div class="form-group">
            <label for="discapacidad">Discapacidad:</label>
            <input type="text" name="discapacidad" class="form-control" value="<?php echo $discapacidad; ?>" required>

        </div>

        <!-- Agrega un campo oculto para el ID del profesor -->
        <input type="hidden" name="id_profesor" value="<?php echo $idProfesor; ?>">
        <!-- Agrega un campo oculto para la acción (actualizar) -->
        <input type="hidden" name="actualizar" value="1">
        <!-- Agrega un botón para enviar el formulario -->
        <a href="dashboard.php" class="btn btn-secondary">Cancelar</a>

        

        <button type="submit" name="editar" class="btn btn-primary form-control">Editar</button>
    </form>
    <br>

    <!-- Agrega el script de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
