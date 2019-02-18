<?php
//CONNECT TO DATABASE
require ("config.php");
    //CLASS CONEXION
    class Conexion{

        protected $conexion_db;

        public function Conexion(){
            
            $this->conexion_db=new mysqli(DB_HOST,DB_USUARIO,DB_CONTRA,DB_NOMBRE);            
            if($this->conexion_db->connect_errno){
                echo "error en la conexion:" . $this->conexion_db->connect_error . "---";                
                return;
            }
            $this->conexion_db->set_charset(DB_CHARSET);  
        }
    
    }
?>