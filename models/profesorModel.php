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

     
    public function cambiarAsistire($idProfesor, $asistire, $discapacidad, $acompanante, $asistencia_acompanante) {
    try {
        error_log("Cambiando estatus de asistire - ID Profesor: 3 " . $idProfesor . ", Asistira: $asistire, Discapacidad: $discapacidad, Acompanante: $acompanante, Asistencia Acompanante: $asistencia_acompanante");

        $stmt = $this->db->prepare("UPDATE profesor SET asistire = ?, discapacidad = ?,  acompanante = ? , acompanante_discapacitado = ?  WHERE id = ?");
        $stmt->execute([$asistire, $discapacidad, $acompanante, $asistencia_acompanante,  $idProfesor]);
        
         

    } catch (PDOException $e) {
        error_log ( "Error al actualizar el estatus de asistire: " . $e->getMessage());
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

}
