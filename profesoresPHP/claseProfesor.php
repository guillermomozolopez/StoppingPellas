<?php
    require "../Config/conexion.php";

    class Profesor extends Conexion {
        
        public function __construct() {
            parent::__construct();
        }

        // Lista las asignaturas en las que esta matriculado un DNI

        public function listarAsignaturas($dni) {
            $sql = "SELECT * FROM ASIGNATURAS WHERE DNI_PROFESOR = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $listaAsignaturas = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAsignaturas;
        }

        // Lista los alumnos de una asignatura

        public function listarAlumnos($cod_asignatura) {
            $sql = "SELECT * FROM ALUMNOS INNER JOIN ALUMNOS_ASIGNATURAS ON ALUMNOS.DNI = ALUMNOS_ASIGNATURAS.DNI_ALUMNO WHERE COD_ASIGNATURA = \"$cod_asignatura\" ORDER BY APELLIDO1";
            $resultado = $this->conexion_db->query($sql);
            $listaAlumnos = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAlumnos;
        }

        // Lista las faltas de un alumno

        public function listarAlFaltas($dniAlumno) {
                $sql = "SELECT * FROM faltas  WHERE dni_alumno = \"$dniAlumno\" ";
                $resultado = $this->conexion_db->query($sql);
                $listaAlFaltas = $resultado->fetch_all(MYSQLI_ASSOC);
                return $listaAlFaltas;
        }

        // Inserta en la tabla faltas con los datos correspondientes

        public function ponerFalta($cod_asignatura, $dni_alumno, $dni_profesor, $fecha) {
            $sql = "INSERT INTO FALTAS (COD_ASIGNATURA, DNI_ALUMNO, DNI_PROFESOR, FECHA) VALUES (".$cod_asignatura.", '".$dni_alumno."', '".$dni_profesor."',  '".$fecha."')";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "<p class='correcto'>Faltas guardadas";
            } else {
                echo "<p class='error'>Error: " . $sql . "</p>" . "<p class='error'>".$conexion_db->error."</p>";
            }
        }

        // Muestra el nombre del profesor

        public function nombre($dni) {
            $sql = "SELECT * FROM PROFESORES WHERE DNI = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $nombre = $resultado->fetch_all(MYSQLI_ASSOC);
            return $nombre;
        }
    }

?>