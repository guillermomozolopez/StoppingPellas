<?php
session_start();
$error = "";

if (isset($_POST['send'])) {
    require "./clase_olvidar.php";
    $olvidar = new Olvidar();
    echo strlen($_POST['pass']);
    if (empty($_POST['pass']) || empty($_POST['repass'])) {
        $error = "Campos vacios";
        header("Location:./reseteoContraseña.php?error=" . urlencode($error) . "");
    } else if ($_POST['pass'] != $_POST['repass']) {
        $error = "Contraseñas no coinciden";
        header("Location:./reseteoContraseña.php?error=" . urlencode($error) . "");
    } else if($_POST['pass'] == $_POST['repass']){
       
        if (strlen($_POST['pass']) < 6) {
            $error = "La clave debe tener al menos 6 caracteres";
            header("Location:./reseteoContraseña.php?error=" . urlencode($error) . "");
        }else if (strlen($_POST['pass']) > 16) {
            $error = "La clave no puede tener más de 16 caracteres";
            header("Location:./reseteoContraseña.php?error=" . urlencode($error) . "");
        }else if (!preg_match('`[a-z]`', $_POST['pass'])) {
            $error = "La clave debe tener al menos una letra minúscula";
            header("Location:./reseteoContraseña.php?error=" . urlencode($error) . "");
        }else if (!preg_match('`[A-Z]`', $_POST['pass'])) {
            $error = "La clave debe tener al menos una letra mayúscula";
            header("Location:./reseteoContraseña.php?error=" . urlencode($error) . "");
        }else if (!preg_match('`[0-9]`', $_POST['pass'])) {
            $error = "La clave debe tener al menos un caracter numérico";
            header("Location:./reseteoContraseña.php?error=" . urlencode($error) . "");
        } else {
            echo "coincides";
            $dni = $olvidar->obtenerDni($_SESSION['email']);
            $olvidarPass = $olvidar->cambiarPass($dni, $_POST['pass']);
            session_destroy();
            header("Location:../Login/login.php");
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Estilos/estiloReseteo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<a href="login.php"><i class="fas fa-arrow-circle-left"></i></a>
<div class="fondo"></div>
    <div id="logo"></div>
    <form action="reseteoContraseña.php" method="POST">
    <h2>Nueva contraseña</h2>
    <?php
//echo $_SESSION['dni'];
if (!empty($_GET['error'])): ?>
    <div class="error">
    <p><?=$_GET['error']?></p>
    </div>
    <?php endif;?>
    <input name="pass" type="password" id="pass" placeholder="Introduzca nueva contraseña">
    <!-- <p><label>Nueva contraseña</label><input type="password" name="pass" id="pass"></p> -->
    <input name="repass" type="password" id="repass" placeholder="Confirmar nueva contraseña">
    <!-- <p><label>Confirmar contraseña</label><input type="password" name="repass" id="pass"></p> -->
    <input type="submit" name="send" value="Confirmar"></p>
    </form>
    <?php
// echo $_GET['email'];

?>
</body>
</html>