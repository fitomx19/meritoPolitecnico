<?php
require_once('models/profesorModel.php');

class LoginController {
    private $profesorModel;

    public function __construct() {
        $this->profesorModel = new ProfesorModel();
    }

    // Función para manejar el inicio de sesión
    public function login($curp) {
        $profesor = $this->profesorModel->verificarLogin($curp);

        if ($profesor) {
            // Iniciar sesión y redirigir a la página de bienvenida
            $this->mostrarBienvenida($profesor);
        } else {
            // Manejar error de inicio de sesión
            echo "Error: Usuario no encontrado";
        }
    }

    // Función para mostrar la página de bienvenida
    public function mostrarBienvenida($profesor) {
        session_start();
        $_SESSION['profesor'] = $profesor;

        if ($profesor['asistire']) {
            // Mostrar la página de bienvenida cuando ya_inicio es verdadero
            include('views/welcomeTrueView.php');
        } else {
            // Mostrar la página de bienvenida cuando ya_inicio es falso
            include('views/welcomeFalseView.php');
        }
    }

    // Función para cerrar sesión
    public function cerrarSesion() {
        session_start();
        session_destroy();
        // Redirigir a la página de inicio de sesión u otra página de tu elección
        header('Location: index.php');
    }

     
    public function cambiarAsistire($idProfesor, $asistire, $discapacidad, $acompanante, $asistencia_acompanante) {
         
        error_log("Cambiando estatus de asistire 2 - ID Profesor: " . $idProfesor . ", Asistira: $asistire, Discapacidad: $discapacidad, Acompanante: $acompanante, Asistencia Acompanante: $asistencia_acompanante");

        try {
            $this->profesorModel->cambiarAsistire($idProfesor, $asistire, $discapacidad, $acompanante, $asistencia_acompanante);
        } catch (PDOException $e) {
            echo "Error al actualizar el estatus de asistire: " . $e->getMessage();
            error_log("Error al actualizar el estatus de asistire: " . $e->getMessage());
        }
    }

    // Función para obtener el estatus de "asistire" de la base de datos
    public function obtenerEstadoAsistire($idProfesor) {
        $profesor = $this->profesorModel->obtenerProfesor($idProfesor);

        return $profesor['asistire'];
    }



}
