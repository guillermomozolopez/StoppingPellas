<?php
require "../Config/conexion.php";
class Olvidar extends Conexion
{

    public function __contruct()
    {
        parent::__construct();

    }
    public function existeUsuario($email)
    {
        $sql = "SELECT COUNT(*) AS 'CONT' FROM USUARIO INNER JOIN ALUMNOS ON USUARIO.DNI = ALUMNOS.DNI WHERE ALUMNOS.EMAIL='$email'";
        $resultado = $this->conexion_db->query($sql);
        $existe = $resultado->fetch_all(MYSQLI_ASSOC);
        if($existe[0]['CONT'] > 0){
        return true;
        }
        return false;
        
    }
    public function obtenerNombre($email){
        $sql = "SELECT ALUMNOS.NOMBRE AS 'NOM' FROM USUARIO INNER JOIN ALUMNOS ON USUARIO.DNI = ALUMNOS.DNI WHERE ALUMNOS.EMAIL='$email'";
        $resultado = $this->conexion_db->query($sql);
        $existe = $resultado->fetch_all(MYSQLI_ASSOC);
        return $existe[0]['NOM'];
    }
   

}
