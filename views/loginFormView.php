<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Agrega la referencia de Bootstrap (puedes cambiar a la versión que prefieras) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 300px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <form class="bg-light rounded p-4" method="post" action="index.php">
        <h1 class="mb-4">Inicio de Sesión</h1>
        <div class="form-group">
            <label for="curp">CURP:</label>
            <input type="text" class="form-control" id="curp" name="curp" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
    </form>

    <!-- Agrega el script de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
