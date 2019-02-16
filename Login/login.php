<?php
$error = '';
//Validacion envio de datos con campos vacios
if (isset($_POST['send'])) {
    if (empty($_POST['dni']) && empty($_POST['password'])) {
        $error = "Dni y contraseña vacios";
    } else if (empty($_POST['dni'])) {
        $error = "Dni vacio";
    } else if (empty($_POST['password'])) {
        $error = "Contraseña vacia";
    } else {
        //validacion envio de datos correcta
        require "./clase_login.php";
        $objetoLogin = new Login();
        $existeUsuario = $objetoLogin->existeUsuario($_POST['dni'], $_POST['password']);
        
        //si existe el usuario
        if ($existeUsuario) {
            $dni = $_POST['dni'];

        } else {
            //si no existe redireccionamos a la misma pagina
            $error = "Usuario Incorrecto";
            
        }

    }

} else {
    //validacion incorrect de envio de datos
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Estilos/login.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <title>Login</title>

</head>
<body>
    <?php
require "./headerLogin.php";
?>

    <form action="login.php" method="POST">
    
    <?php
    if (!empty($error)): ?>
    <div class="error" >
    <p><?=$error?></p>
    </div>
    <?php endif;?>

 
    <input type="text" name="dni" placeholder="Introduzca Dni">
    <input type="password" name="password" placeholder="Introduzca contraseña">
    <input type="submit" value="Entrar" name="send">
    <span><label><input type="checkbox" name="recordar">Recordar</label><a href="singup.php">Olvidaste la contraseña</a></span>
    </form>

    
    
</body>
</html>