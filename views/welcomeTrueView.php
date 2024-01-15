<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: black;
        }

        .jumbotron {
            background-color: #800000; /* Guinda */
            color: white;
            text-align: center;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 10px;
        }

        .card {
            border: 1px solid #800000; /* Guinda */
            border-radius: 10px;
        }

        .card-body {
            text-align: left;
        }

        .list-group-item {
            border-color: #800000; /* Guinda */
        }

        .btn {
            background-color: #800000; /* Guinda */
            border-color: #800000; /* Guinda */
        }

        .btn:hover {
            background-color: #600000; /* Guinda más oscuro al pasar el mouse */
            border-color: #600000; /* Guinda más oscuro al pasar el mouse */
        }
    </style>
</head>

<body class="container mt-5">
    <div class="jumbotron">
        <?php echo "<h1 class='display-4'>Bienvenido: " . $profesor['nombre'] . "</h1>"; ?>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tus datos</h5>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nombre:</strong> <?php echo $profesor['nombre']; ?></li>
                <li class="list-group-item"><strong>Dependencia:</strong> <?php echo $profesor['dependencia']; ?></li>
                <li class="list-group-item"><strong>Distinción:</strong> <?php echo $profesor['distincion']; ?></li>
                <li class="list-group-item"><strong>Categoría:</strong> <?php echo $profesor['categoria']; ?></li>
                <li class="list-group-item"><strong>CURP:</strong> <?php echo $profesor['curp']; ?></li>
                <li class="list-group-item"><strong>Asistencia confirmada:</strong> <?php echo $profesor['asistire'] ? 'Sí' : 'No'; ?></li>
                <li class="list-group-item"><strong>¿Requieres apoyo? :</strong> <?php echo $profesor['discapacidad']; ?></li>
                <li class="list-group-item"><strong>Acompañante:</strong> <?php echo $profesor['acompanante'] ? 'Sí' : 'No'; ?></li>
                <li class="list-group-item"><strong>Acompañante discapacitado:</strong> <?php echo $profesor['acompanante_discapacitado']; ?></li>
            </ul>

            <!-- Agrega el botón de cierre de sesión -->
            <a href="index.php?action=logout" class="btn btn-danger mt-3">Cerrar Sesión</a>

            <!-- Agrega el enlace para consultar entrada con estilos de Bootstrap -->
            <a href="fpdf/PruebaV.php?nombre=<?php echo urlencode($profesor['nombre']); ?>&dependencia=<?php echo urlencode($profesor['dependencia']); ?>&distincion=<?php echo urlencode($profesor['distincion']); ?>&categoria=<?php echo urlencode($profesor['categoria']); ?>&curp=<?php echo urlencode($profesor['curp']); ?>&asistire=<?php echo urlencode($profesor['asistire']); ?>&discapacidad=<?php echo urlencode($profesor['discapacidad']); ?>&acompanante=<?php echo urlencode($profesor['acompanante']); ?>&acompanante_discapacitado=<?php echo urlencode($profesor['acompanante_discapacitado']); ?>&codigo_acceso=<?php echo rand(1000, 9999); ?>" class="btn btn-primary mt-3">Consultar Entrada</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
