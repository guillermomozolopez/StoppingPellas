<?php
require "../Config/conexion.php";
class Login extends Conexion
{

    public function __contruct()
    {
        parent::__construct();

    }

    //comprueba si existe el usuario

    public function existeUsuario($dni,$pass)
    {
        $sql = "SELECT COUNT(*) as 'cont' FROM USUARIO WHERE DNI='$dni' and CONTRASEÑA='$pass';";
        $resultado = $this->conexion_db->query($sql);
        $existe = $resultado->fetch_all(MYSQLI_ASSOC);
        if($existe[0]['cont'] > 0){
        return true;
        }
        return false;
        
    }

    //metodo de la clase login en la que obtenemos si el usuario que entra es profesor 

    public function esProfe($dni)
    {
        $sql = "SELECT COUNT(*) as 'cont' from PROFESORES where DNI='$dni'";
        $resultado = $this->conexion_db->query($sql);
        $existe = $resultado->fetch_all(MYSQLI_ASSOC);
        if($existe[0]['cont'] > 0){
        return true;
        }
        return false;
    }

    //comprueba si es alumno

    public function esAlumno($dni)
    {
        $sql = "SELECT COUNT(*) as 'cont' from ALUMNOS where DNI='$dni'";
        $resultado = $this->conexion_db->query($sql);
        $existe = $resultado->fetch_all(MYSQLI_ASSOC);
        if($existe[0]['cont'] > 0){
        return true;
        }
        return false;
    }
    

}
