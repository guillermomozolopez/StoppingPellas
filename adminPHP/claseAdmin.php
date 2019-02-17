<?php
    require "../Config/conexion.php";

    class Admin extends Conexion {
        
        public function __construct() {
            parent::__construct();
        }

        public function comprobarDNI($dni) {
            $sql = "SELECT COUNT(*) AS existe FROM USUARIO WHERE DNI=\"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $existeDNI = $resultado->fetch_all(MYSQLI_ASSOC);
            return $existeDNI;
        }

        public function insertarUser($dni, $contr, $fecha) {
            $sql = "INSERT INTO USUARIO (DNI, CONTRASEÑA, FECHAREGISTRO) VALUES (\"$dni\", \"$contr\", \"$fecha\")";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "USUARIO AGREGADO";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        public function listarFaltas($dni, $cod_asig) {
            $sql = "SELECT ASIGNATURAS.NOMBRE AS asignatura, FALTAS.FECHA AS fecha FROM FALTAS INNER JOIN ASIGNATURAS ON FALTAS.COD_ASIGNATURA=ASIGNATURAS.COD_ASIGNATURA WHERE DNI_ALUMNO=\"$dni\" AND FALTAS.COD_ASIGNATURA=\"$cod_asig\"";
            $resultado = $this->conexion_db->query($sql);
            $listaFaltas = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaFaltas;
        }

        public function listarTodas($dni) {
            $sql = "SELECT ASIGNATURAS.NOMBRE AS asignatura, COUNT(*) AS faltas FROM FALTAS INNER JOIN ASIGNATURAS ON FALTAS.COD_ASIGNATURA=ASIGNATURAS.COD_ASIGNATURA WHERE DNI_ALUMNO=\"$dni\" GROUP BY FALTAS.COD_ASIGNATURA";
            $resultado = $this->conexion_db->query($sql);
            $listaTodas = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaTodas;
        }
    }

?>