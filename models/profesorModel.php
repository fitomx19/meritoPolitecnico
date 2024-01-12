<?php
class ProfesorModel {
    private $db;

    public function __construct() {
        // Configuración de la conexión a la base de datos
        $host = 'localhost';
        $username = 'root';
        $password = 'kinect123';
        $dbname = 'merito_politecnico';

        // Intenta conectar a la base de datos
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            die();
        }
    }

    // Función para verificar el inicio de sesión
    public function verificarLogin($curp) {
        $stmt = $this->db->prepare("SELECT * FROM profesor WHERE curp = :curp");
        $stmt->bindParam(':curp', $curp);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    private function logError($message) {
        error_log("Error: $message");
    }


     
    public function cambiarAsistire($idProfesor, $asistire, $discapacidad, $acompanante, $asistencia_acompanante) {
        try {
            $stmt = $this->db->prepare("UPDATE profesor SET asistire = ?, discapacidad = ?,  acompanante = ? , acompanante_discapacitado = ?  WHERE id = ?");
            $stmt->execute([$asistire, $discapacidad, $acompanante, $asistencia_acompanante,  $idProfesor]);
        } catch (PDOException $e) {
            $this->logError("Error al actualizar el estatus de asistire: " . $e->getMessage());
        }
    }

    // Función para obtener la información del profesor
    public function obtenerProfesor($idProfesor) {
        $stmt = $this->db->prepare("SELECT * FROM profesor WHERE id = :id");
        $stmt->bindParam(':id', $idProfesor);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    //funcion para obtener la informacion de los profesores
    public function obtenerProfesores() {
        $stmt = $this->db->prepare("SELECT * FROM profesor");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

 

    //funcion para crear un nuevo profesor
    public function crearProfesor($nombre, $dependencia , $distincion , $categoria, $curp , $acompanante , $acompanante_discapacitado, $asistire, $discapacidad) {
        try{
            $stmt = $this->db->prepare("INSERT INTO profesor (nombre, dependencia, distincion, categoria, curp, acompanante, acompanante_discapacitado, asistire, discapacidad) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nombre, $dependencia , $distincion , $categoria, $curp , $acompanante , $acompanante_discapacitado, $asistire, $discapacidad]);
        } catch (PDOException $e) {
            $this->logError("Error al crear el profesor: " . $e->getMessage());
        }
    }

    //funcion para actualizar un profesor
    public function actualizarProfesor($idProfesor, $nombre, $dependencia , $distincion , $categoria, $curp , $acompanante , $acompanante_discapacitado, $asistire, $discapacidad) {
        try {
            $stmt = $this->db->prepare("UPDATE profesor SET nombre = ?, dependencia = ?, distincion = ?, categoria = ?, curp = ?, acompanante = ?, acompanante_discapacitado = ?, asistire = ?, discapacidad = ? WHERE id = ?");
            $stmt->execute([$nombre, $dependencia , $distincion , $categoria, $curp , $acompanante , $acompanante_discapacitado, $asistire, $discapacidad, $idProfesor]);
        } catch (PDOException $e) {
            $this->logError("Error al actualizar el profesor: " . $e->getMessage());
        }
    }

    //funcion para eliminar un profesor
    public function eliminarProfesor($idProfesor) {
        try {
            error_log("Eliminando profesor - ID Profesor: " . $idProfesor);

            $stmt = $this->db->prepare("DELETE FROM profesor WHERE id = ?");
            $stmt->execute([$idProfesor]);
            
             

        } catch (PDOException $e) {
            error_log ( "Error al eliminar el profesor: " . $e->getMessage());
        }
    }

}
