<?php
if (isset($_POST['enviar'])) {
    require "./clase_olvidar.php";
    $recuperar = new Olvidar();
    $existe = $recuperar->existeUsuario($_POST['email']);
    
    if($existe){
        $nombre = $recuperar->obtenerNombre($_POST['email']);
        echo "<div><p>Se ha mandado un correo para restablecer la contraseña</p><div>";
        $asunto = "StoppingPellas restablecer contraseña";
        $mensaje = "
        Hola $nombre,

        Pulse el siguiente enlace para recuperar:
        
        http://localhost:8886/StoppingPellas2/Login/reseteoContrase%C3%B1a.php?email=".urlencode($_POST['email'])."";
        mail($_POST['email'], $asunto, $mensaje);
        //header("Location:./reseteoContraseña.php?email=".urlencode($_POST['email'])."");
    }else if($existe == false){
        echo "Email incorrecto";
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="./olvideContraseña.php" method="POST">
        <input type="text" name="email">
        <input type="submit" value="Enviar correo" name="enviar">
        </form>
    </div>
</body>
</html>
