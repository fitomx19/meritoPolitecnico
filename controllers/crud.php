<?php
// Incluye tu clase ProfesorModel aquí (ajusta la ruta según sea necesario)
require_once '../models/ProfesorModel.php';

// Crea una instancia de la clase ProfesorModel
$profesorModel = new ProfesorModel();

// Agregar nuevo profesor
if (isset($_POST['agregar'])) {
    $nombre = $_POST['nombre'];
    $dependencia = $_POST['dependencia'];
    $distincion = $_POST['distincion'];
    $categoria = $_POST['categoria'];
    $curp = $_POST['curp'];
    $acompanante = $_POST['acompanante'];
    $acompanante_discapacitado = $_POST['acompanante_discapacitado'];
    $asistire = $_POST['asistire'];
    $discapacidad = $_POST['discapacidad'];
   

    $profesorModel->crearProfesor($nombre, $dependencia , $distincion , $categoria, $curp , $acompanante , $acompanante_discapacitado, $asistire, $discapacidad );
    header("Location: ../dashboard.php"); // Redirigir al dashboard después de agregar
    exit();
}

// Editar profesor
if (isset($_GET['id'])) {
    $idProfesor = $_GET['id'];
    $profesor = $profesorModel->obtenerProfesor($idProfesor);

    // Mostrar el formulario de edición
    // Puedes utilizar el mismo formulario que en el dashboard con valores predefinidos
    include '../views/formulario_edicion.php';
    exit();
}

// Actualizar profesor
if (isset($_POST['actualizar'])) {
    $idProfesor = $_POST['id_profesor'];
    $nombre = $_POST['nombre'];
    $nombre = $_POST['nombre'];
    $dependencia = $_POST['dependencia'];
    $distincion = $_POST['distincion'];
    $categoria = $_POST['categoria'];
    $curp = $_POST['curp'];
    $acompanante = $_POST['acompanante'];
    $acompanante_discapacitado = $_POST['acompanante_discapacitado'];
    $asistire = $_POST['asistire'];
    $discapacidad = $_POST['discapacidad'];

    $profesorModel->actualizarProfesor($idProfesor, $nombre, $dependencia , $distincion , $categoria, $curp , $acompanante , $acompanante_discapacitado, $asistire, $discapacidad);
    header("Location: ../dashboard.php"); // Redirigir al dashboard después de actualizar
    exit();
}

// Eliminar profesor
if (isset($_GET['eliminar'])) {
    $idProfesor = $_GET['eliminar'];
    $profesorModel->eliminarProfesor($idProfesor);
    header("Location: ../dashboard.php"); // Redirigir al dashboard después de eliminar
    exit();
}
?>
