<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location:../profesoresPHP/pantallaProfesores.php");
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

    <form action="validar.php" method="POST">

    <?php
if (!empty($_GET['error'])): ?>
    <div class="error" >
    <p><?=$_GET['error']?></p>
    </div>
    <?php endif;?>


    <input type="text" name="dni" placeholder="Introduzca Dni">
    <input type="password" name="password" placeholder="Introduzca contraseña">
    <input type="submit" value="Entrar" name="send">
    <span><label><input type="checkbox" name="recordar">Recordar</label><a href="singup.php">Olvidaste la contraseña</a></span>
    </form>



</body>
</html>