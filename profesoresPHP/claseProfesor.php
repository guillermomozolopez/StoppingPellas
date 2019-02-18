<?php
    require "../Config/conexion.php";

    class Profesor extends Conexion {
        
        public function __construct() {
            parent::__construct();
        }

        public function listarAsignaturas($dni) {
            $sql = "SELECT * FROM ASIGNATURAS WHERE DNI_PROFESOR = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $listaAsignaturas = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAsignaturas;
        }

        public function listarAlumnos($cod_asignatura) {
            $sql = "SELECT * FROM ALUMNOS INNER JOIN ALUMNOS_ASIGNATURAS ON ALUMNOS.DNI = ALUMNOS_ASIGNATURAS.DNI_ALUMNO WHERE COD_ASIGNATURA = \"$cod_asignatura\" ";
            $resultado = $this->conexion_db->query($sql);
            $listaAlumnos = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAlumnos;
        }

        public function listarAlFaltas($dniAlumno) {
                $sql = "SELECT * FROM faltas  WHERE dni_alumno = \"$dniAlumno\" ";
                $resultado = $this->conexion_db->query($sql);
                $listaAlFaltas = $resultado->fetch_all(MYSQLI_ASSOC);
                return $listaAlFaltas;
        }

        public function ponerFalta($cod_asignatura, $dni_alumno, $dni_profesor, $fecha) {
            $sql = "INSERT INTO FALTAS (COD_ASIGNATURA, DNI_ALUMNO, DNI_PROFESOR, FECHA) VALUES (".$cod_asignatura.", '".$dni_alumno."', '".$dni_profesor."',  '".$fecha."')";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "Faltas guardadas";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion_db->error;
            }
        }

        public function nombre($dni) {
            $sql = "SELECT * FROM PROFESORES WHERE DNI = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $nombre = $resultado->fetch_all(MYSQLI_ASSOC);
            return $nombre;
        }
    }

?>