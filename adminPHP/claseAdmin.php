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
                echo "Error: " . $sql . "<br>" . $conexion_db->error;
            }
        }

        public function comprobarAlumno($dni) {
            $sql = "SELECT COUNT(*) AS alumno FROM ALUMNOS WHERE DNI=\"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $esAlumno = $resultado->fetch_all(MYSQLI_ASSOC);
            return $esAlumno;
        }

        public function comprobarProfe($dni) {
            $sql = "SELECT COUNT(*) AS profe FROM PROFESORES WHERE DNI=\"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $esProfe = $resultado->fetch_all(MYSQLI_ASSOC);
            return $esProfe;
        }

        public function registrarProfe($dni, $nombre,  $ape1, $ape2, $fechaNac, $email, $tlf, $direccion) {
            $sql = "INSERT INTO PROFESORES (DNI, NOMBRE, APELLIDO1, APELLIDO2, FECHANAC, EMAIL, TELEFONO, DIRECCION) VALUES (\"$dni\", \"$nombre\", \"$ape1\", \"$ape2\", \"$fechaNac\", \"$email\", \"$tlf\", \"$direccion\")";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "PROFESOR INSCRITO";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion_db->error;
            }
        }

        public function registrarAlumno($dni, $nombre,  $ape1, $ape2, $fechaNac, $email, $tlf, $direccion) {
            $sql = "INSERT INTO ALUMNOS (DNI, NOMBRE, APELLIDO1, APELLIDO2, FECHANAC, EMAIL, TELEFONO, DIRECCION) VALUES (\"$dni\", \"$nombre\", \"$ape1\", \"$ape2\", \"$fechaNac\", \"$email\", \"$tlf\", \"$direccion\")";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "ALUMNO INSCRITO";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion_db->error;
            }
        }

        public function listarAlumnos() {
            $sql = "SELECT * FROM ALUMNOS ORDER BY APELLIDO1";
            $resultado = $this->conexion_db->query($sql);
            $listaAlumnos = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAlumnos;
        }

        public function listarAsignaturas() {
            $sql = "SELECT * FROM ASIGNATURAS";
            $resultado = $this->conexion_db->query($sql);
            $listaAsignaturas = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAsignaturas;
        }

        public function estaMatriculado($cod_asig, $dni) {
            $sql = "SELECT COUNT(*) AS 'matriculado' FROM ALUMNOS_ASIGNATURAS WHERE COD_ASIGNATURA = ".$cod_asig." AND DNI_ALUMNO = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $estaMatriculado = $resultado->fetch_all(MYSQLI_ASSOC);
            return $estaMatriculado;
        }

        public function matricularAlumno($dni, $cod_asig) {
            $sql = "INSERT INTO ALUMNOS_ASIGNATURAS (COD_ASIGNATURA, DNI_ALUMNO) VALUES (".$cod_asig.", \"$dni\")";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "ALUMNO MATRICULADO";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion_db->error;
            }
        }

    }

?>