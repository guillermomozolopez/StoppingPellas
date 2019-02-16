<?php
require "../Config/conexion.php";
class Login extends Conexion
{

    public function __contruct()
    {
        parent::__construct();

    }
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
    public function esAlumno()
    {

    }
    public function esAdmin()
    {

    }

}
