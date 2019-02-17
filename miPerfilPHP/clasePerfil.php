<?php
    require "../Config/conexion.php";

    class Perfil extends Conexion {
        
        public function __construct() {
            parent::__construct();
        }

        public function comprobarProfe($dni) {
            $sql = "SELECT COUNT(*) AS profe FROM PROFESORES WHERE DNI=\"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $esProfe = $resultado->fetch_all(MYSQLI_ASSOC);
            return $esProfe;
        }

        public function infoPerfilProfe($dni) {
            $sql = "SELECT * FROM PROFESORES WHERE DNI = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $infoPerfilProfe = $resultado->fetch_all(MYSQLI_ASSOC);
            return $infoPerfilProfe;
        }

        public function infoPerfilAlumno($dni) {
            $sql = "SELECT * FROM ALUMNOS WHERE DNI = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $infoPerfilAlumno = $resultado->fetch_all(MYSQLI_ASSOC);
            return $infoPerfilAlumno;
        }

        public function editarProfe($email, $tlf,  $direccion, $dni) {
            $sql = "UPDATE PROFESORES SET EMAIL = \"$email\", TELEFONO = ".$tlf.", DIRECCION = \"$direccion\" WHERE DNI = \"$dni\"";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "PROFESOR EDITADO";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion_db->error;
            }
        }

        public function editarAlumno($email, $tlf,  $direccion, $dni) {
            $sql = "UPDATE ALUMNOS SET EMAIL = \"$email\", TELEFONO = ".$tlf.", DIRECCION = \"$direccion\" WHERE DNI = \"$dni\"";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "ALUMNO EDITADO";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion_db->error;
            }
        }

    }

?>