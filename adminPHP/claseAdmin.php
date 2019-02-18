<?php
    require "../Config/conexion.php";

    class Admin extends Conexion {
        
        public function __construct() {
            parent::__construct();
        }

        // Comprobamos si el DNI existe en la base de datos
        
        public function comprobarDNI($dni) {
            $sql = "SELECT COUNT(*) AS existe FROM USUARIO WHERE DNI=\"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $existeDNI = $resultado->fetch_all(MYSQLI_ASSOC);
            return $existeDNI;
        }

        // Insertamos en la tabla de usuarios

        public function insertarUser($dni, $contr, $fecha) {
            $sql = "INSERT INTO USUARIO (DNI, CONTRASEÑA, FECHAREGISTRO) VALUES (\"$dni\", \"$contr\", \"$fecha\")";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "<p class='correcto'>USUARIO AGREGADO</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "</p>" . "<p class='error'>".$conexion_db->error."</p>";
            }
        }

        // Comprobamos si el DNI es alumno

        public function comprobarAlumno($dni) {
            $sql = "SELECT COUNT(*) AS alumno FROM ALUMNOS WHERE DNI=\"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $esAlumno = $resultado->fetch_all(MYSQLI_ASSOC);
            return $esAlumno;
        }

        // Comprobamos si el DNI es profesor

        public function comprobarProfe($dni) {
            $sql = "SELECT COUNT(*) AS profe FROM PROFESORES WHERE DNI=\"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $esProfe = $resultado->fetch_all(MYSQLI_ASSOC);
            return $esProfe;
        }

        // Insertamos el usuario en la tabla profesores

        public function registrarProfe($dni, $nombre,  $ape1, $ape2, $fechaNac, $email, $tlf, $direccion) {
            $sql = "INSERT INTO PROFESORES (DNI, NOMBRE, APELLIDO1, APELLIDO2, FECHANAC, EMAIL, TELEFONO, DIRECCION) VALUES (\"$dni\", \"$nombre\", \"$ape1\", \"$ape2\", \"$fechaNac\", \"$email\", \"$tlf\", \"$direccion\")";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "<p class='correcto'>PROFESOR INSCRITO</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "</p>" . "<p class='error'>".$conexion_db->error."</p>";
            }
        }

        // Insertamos el usuario en la tabla alumnos

        public function registrarAlumno($dni, $nombre,  $ape1, $ape2, $fechaNac, $email, $tlf, $direccion) {
            $sql = "INSERT INTO ALUMNOS (DNI, NOMBRE, APELLIDO1, APELLIDO2, FECHANAC, EMAIL, TELEFONO, DIRECCION) VALUES (\"$dni\", \"$nombre\", \"$ape1\", \"$ape2\", \"$fechaNac\", \"$email\", \"$tlf\", \"$direccion\")";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "<p class='correcto'>ALUMNO INSCRITO</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "</p>" . "<p class='error'>".$conexion_db->error."</p>";
            }
        }

        // Listamos todos los usuarios

        public function listarAlumnos() {
            $sql = "SELECT * FROM ALUMNOS ORDER BY APELLIDO1";
            $resultado = $this->conexion_db->query($sql);
            $listaAlumnos = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAlumnos;
        }

        // Listamos todas las asignaturas

        public function listarAsignaturas() {
            $sql = "SELECT * FROM ASIGNATURAS";
            $resultado = $this->conexion_db->query($sql);
            $listaAsignaturas = $resultado->fetch_all(MYSQLI_ASSOC);
            return $listaAsignaturas;
        }

        // Comprobamos si un alumno esta matriculado en una asignatura

        public function estaMatriculado($cod_asig, $dni) {
            $sql = "SELECT COUNT(*) AS 'matriculado' FROM ALUMNOS_ASIGNATURAS WHERE COD_ASIGNATURA = ".$cod_asig." AND DNI_ALUMNO = \"$dni\"";
            $resultado = $this->conexion_db->query($sql);
            $estaMatriculado = $resultado->fetch_all(MYSQLI_ASSOC);
            return $estaMatriculado;
        }

        // Insertamos alumno y asignatura en la tabla alumnos_asignaturas

        public function matricularAlumno($dni, $cod_asig) {
            $sql = "INSERT INTO ALUMNOS_ASIGNATURAS (COD_ASIGNATURA, DNI_ALUMNO) VALUES (".$cod_asig.", \"$dni\")";
            if ($this->conexion_db->query($sql) === TRUE) {
                echo "<p class='correcto'>ALUMNO MATRICULADO</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "</p>" . "<p class='correcto'>".$conexion_db->error."</p>";
            }
        }
        
        //obtener contraseña del dni

        public function obtenerPass($dni){
            $sql = "SELECT CONTRASEÑA FROM USUARIO WHERE DNI = '$dni'";
            $resultado = $this->conexion_db->query($sql);
            $contraseña = $resultado->fetch_all(MYSQLI_ASSOC);
            return $contraseña[0]['CONTRASEÑA'];
        }

    }

?>