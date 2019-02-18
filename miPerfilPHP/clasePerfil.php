<?php
    require "../Config/conexion.php";

    class Perfil extends Conexion {
        
        public function __construct() {
            parent::__construct();
        }

        // Comprobamos si un DNI es profesor

        public function comprobarProfe($dni) {
            $sql = "SELECT COUNT(*) AS profe FROM PROFESORES WHERE DNI=\"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $esProfe = $resultado->fetch_all(MYSQLI_ASSOC);
            return $esProfe;
        }

        // Seleccionamos la informacion de un profesor

        public function infoPerfilProfe($dni) {
            $sql = "SELECT * FROM PROFESORES WHERE DNI = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $infoPerfilProfe = $resultado->fetch_all(MYSQLI_ASSOC);
            return $infoPerfilProfe;
        }

        // Seleccionamos la informacion de un alumno

        public function infoPerfilAlumno($dni) {
            $sql = "SELECT * FROM ALUMNOS WHERE DNI = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $infoPerfilAlumno = $resultado->fetch_all(MYSQLI_ASSOC);
            return $infoPerfilAlumno;
        }

        // Editamos los campos email, telefono y direccion de un determinado profesor

        public function editarProfe($email, $tlf,  $direccion, $dni) {
            $sql = "UPDATE PROFESORES SET EMAIL = \"$email\", TELEFONO = ".$tlf.", DIRECCION = \"$direccion\" WHERE DNI = \"$dni\"";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "<p class='correcto'>PROFESOR EDITADO</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "</p>" . "<p class='error'>".$conexion_db->error."</p>";
            }
        }

        // Editamos los campos email, telefono y direccion de un determinado alumno

        public function editarAlumno($email, $tlf,  $direccion, $dni) {
            $sql = "UPDATE ALUMNOS SET EMAIL = \"$email\", TELEFONO = ".$tlf.", DIRECCION = \"$direccion\" WHERE DNI = \"$dni\"";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "<p class='correcto'>ALUMNO EDITADO</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "</p>" . "<p class='error'>".$conexion_db->error."</p>";
            }
        }

    }

?>