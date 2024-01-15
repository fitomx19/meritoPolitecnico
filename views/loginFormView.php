<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: space-between;
            height: 100vh;
            margin: 0;
            background-color: #4e293a;
            
        }

        #login-form {
            width: 300px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
        }

        #content-container {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        #header {
            font-size: 24px;
            margin-bottom: 20px;
            color: white;
        }
    </style>
</head>

<body>
    <form id="login-form" method="post" action="index.php">
        <h1 class="mb-4">Inicio de Sesión</h1>
        <div class="form-group">
            <label for="curp">CURP:</label>
            <input type="text" class="form-control" id="curp" name="curp" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
    </form>

    <div id="content-container">
        <div id="header">Merito Politecnico</div>
        <p style="color: white;">La Comisión de Distinciones al Mérito Politécnico del XL Consejo General Consultivo del Instituto Politécnico Nacional, de conformidad con lo establecido en los artículos 3, fracción I y 4 fracciones XXII y XXIII de la Ley Orgánica; 1, 2, 9, 33, 34, 36 y 39 del Reglamento de Distinciones al Mérito Politécnico; 195 y 196 fracción VI del Reglamento Interno y 50 del Reglamento del Consejo General Consultivo, ordenamientos todos del Instituto Politécnico Nacional; con la finalidad de reconocer a las personas integrantes de la comunidad politécnica que destacan por una conducta, trayectoria, servicio o acción ejemplar o sobresaliente que haya tenido por objeto exaltar el prestigio del Instituto, apoyar la realización de sus finalidades, impulsar el desarrollo de la educación técnica en el país o beneficiar a la humanidad </p>
        <img src="https://pbs.twimg.com/media/FfrctteWQAEJTzy.jpg" alt="Imagen Grandota">
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
