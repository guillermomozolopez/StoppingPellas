<?php
    require "../Config/conexion.php";

    class Alumno extends Conexion {
        
        public function __construct() {
            parent::__construct();
        }

        public function listarAsignaturas($dni) {
            $sql = "SELECT * FROM ASIGNATURAS INNER JOIN ALUMNOS_ASIGNATURAS ON ALUMNOS_ASIGNATURAS.COD_ASIGNATURA=ASIGNATURAS.COD_ASIGNATURA WHERE ALUMNOS_ASIGNATURAS.DNI_ALUMNO = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $listaAsignaturas = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAsignaturas;
        }

        public function listarFaltas($dni, $cod_asig) {
            $sql = "SELECT ASIGNATURAS.NOMBRE AS asignaturas, FALTAS.FECHA AS asignaturas FROM FALTAS INNER JOIN ASIGNATURAS ON FALTAS.COD_ASIGNATURA=ASIGNATURAS.COD_ASIGNATURA WHERE DNI_ALUMNO=\"$dni\" AND FALTAS.COD_ASIGNATURA=\"$cod_asig\"";
            $resultado = $this->conexion_db->query($sql);
            $listaFaltas = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaFaltas;
        }
    }

?>