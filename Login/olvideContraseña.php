<?php
$error="";
if (isset($_POST['enviar'])) {
    require "./clase_olvidar.php";
    $recuperar = new Olvidar();
    $existe = $recuperar->existeUsuario($_POST['email']);
    
    if($existe){
        session_start();
        $_SESSION['email'] = $_POST['email'];
        $nombre = $recuperar->obtenerNombre($_POST['email']);
        echo "<div><p>Se ha mandado un correo para restablecer la contraseña</p><div>";
        $asunto = "StoppingPellas restablecer contraseña";
        $mensaje = "
        Hola $nombre,

        Pulse el siguiente enlace para recuperar:
        
        http://localhost/StoppingPellas/Login/reseteoContrase%C3%B1a.php?email=".urlencode($_POST['email'])."";
        mail($_POST['email'], $asunto, $mensaje);
        header("Location:../Login/login.php");
    }else if($existe == false){
        $error = "Email Incorrecto";
    }
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Estilos/estiloOlvide.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<a href="login.php"><i class="fas fa-arrow-circle-left"></i></a>
<div class="fondo"></div>
    <div id="logo"></div>
    <form action="./olvideContraseña.php" method="POST">
<!-- IMPRESION DE LOS POSIBLES MENSAJES DE ERROR -->
    <h2>Restablecer contraseña</h2>
    <?php
if (!empty($error)): ?>
    <div class="error" >
    <p><?=$error?></p>
    </div>
    <?php endif;?>
    <div>
      
        <input type="text" name="email" placeholder="Introduzca su email">
        <input type="submit" value="Enviar correo" name="enviar">
        </form>
    </div>
</body>
</html>
