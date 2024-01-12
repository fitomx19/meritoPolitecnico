<?php
require_once('controllers/loginController.php');

// Obtener la acción del formulario o de la URL
$action = $_GET['action'] ?? '';

// Inicializar el controlador
$loginController = new LoginController();

// Manejar la acción
if ($action === 'logout') {
    $loginController->cerrarSesion();
} elseif ($action === 'changeAsistire' && isset($_POST['asistire'])) {
    $idprofesor = $_POST['id_profesor'];
    $asistire = $_POST['asistire'];
    $discapacidad = $_POST['discapacidad'] ?? null;
    $acompanante = $_POST['acompanante'] ?? 0;
    $asistencia_acompanante = $_POST['discapacidad_acompanante'] ?? 0;

     
    error_log("Cambiando estatus de asistire - ID Profesor: " . $idprofesor . ", Asistira: $asistire, Discapacidad: $discapacidad, Acompanante: $acompanante, Asistencia Acompanante: $asistencia_acompanante");

    // Guardar los cambios en la base de datos
    $loginController->cambiarAsistire($idprofesor, $asistire, $discapacidad, $acompanante, $asistencia_acompanante);

    

    // Redirigir a la página de bienvenida
    header('Location: index.php');
} else {
    // Resto del código para manejar el inicio de sesión
    $curp = $_POST['curp'] ?? '';

    if (!empty($curp)) {
        // Agrega mensaje de depuración para el inicio de sesión
        error_log("Intento de inicio de sesión - CURP: $curp");

        $loginController->login($curp);
    } else {
        

        include('views/loginFormView.php');
    }
}
