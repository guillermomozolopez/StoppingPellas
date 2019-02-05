<?php
$usuario=$_POST["usuario"];
$contra=$_POST["contra"];
try {
    $base=new PDO('mysql:host=localhost; dbname=stoppingpellas','root', '');
    $base->exec("SET CARACTER SET utf8");
    $sql="SELECT USUARIO, CONTRASENA FROM USUARIOS WHERE USUARIO=?";
    $resultado=$base->prepare($sql);
    $resultado->execute(array($usuario));
    //while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)) {
        $registro=$resultado->fetch(PDO::FETCH_ASSOC);
        
        if ($registro['USUARIO']==null) {
            header('Location: ./index.php?validacion=false'); 
        }else{
            echo "Usuario: ".$registro['USUARIO'] . " contraseña: ".$registro['CONTRASENA'];
        }
    //}
} catch (Exception $e) {
    die('Error: ' . $e->GetMessage());
}
?>