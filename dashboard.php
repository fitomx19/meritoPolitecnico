<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .profesor-item {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 8px;
        }

        .profesor-item a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        .profesor-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="container mt-5">

    <!-- Mostrar el formulario para agregar un nuevo profesor -->
    <h2>Agregar Nuevo Profesor</h2>
    <form action="./controllers/crud.php" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dependencia">Dependencia:</label>
            <input type="text" name="dependencia" class="form-control" required>
        </div>
       
        <div class="form-group">
            <label for="distincion">Distincion:</label>
            <input type="text" name="distincion" class="form-control" required>

        </div>

        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="curp">CURP:</label>
            <input type="text" name="curp" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="acompanante">Acompañante:</label>
            <input type="text" name="acompanante" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="acompanante_discapacitado">Acompañante Discapacitado:</label>
            <input type="text" name="acompanante_discapacitado" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="asistire">Asistire:</label>
            <input type="text" name="asistire" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="discapacidad">Discapacidad:</label>
            <input type="text" name="discapacidad" class="form-control" required>

        </div>


        <button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
    </form>

    <hr>

    <!-- Mostrar la lista de profesores existentes -->
    <h2>Lista de Profesores</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Distincion</th>
                    <th>Categoria</th>
                    <th>CURP</th>
                    <th>Acompañante</th>
                    <th>Acompañante Discapacitado</th>
                    <th>Asistire</th>
                    <th>Discapacidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Incluye tu clase ProfesorModel aquí (ajusta la ruta según sea necesario)
                require_once 'models/ProfesorModel.php';

                // Crea una instancia de la clase ProfesorModel
                $profesorModel = new ProfesorModel();

                // Obtener todos los profesores
                $profesores = $profesorModel->obtenerProfesores();

                // Mostrar información de todos los profesores
                foreach ($profesores as $profesor) {
                    echo '<tr>';
                    echo "<td>{$profesor['id']}</td>";
                    echo "<td>{$profesor['nombre']}</td>";
                    echo "<td>{$profesor['distincion']}</td>";
                    echo "<td>{$profesor['categoria']}</td>";
                    echo "<td>{$profesor['curp']}</td>";
                    echo "<td>{$profesor['acompanante']}</td>";
                    echo "<td>{$profesor['acompanante_discapacitado']}</td>";
                    echo "<td>{$profesor['asistire']}</td>";
                    echo "<td>{$profesor['discapacidad']}</td>";
                    echo '<td>';
                    echo "<a href='./controllers/crud.php?id={$profesor['id']}' class='btn btn-info'>Editar</a>";
                    echo "<a href='./controllers/crud.php?eliminar={$profesor['id']}' class='btn btn-danger'>Eliminar</a>";
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Agrega el script de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
