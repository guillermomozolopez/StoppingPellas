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
    <title>Document</title>
</head>
<body>

    <form action="reseteoContraseña.php" method="POST">
    <?php
//echo $_SESSION['dni'];
if (!empty($_GET['error'])): ?>
    <div class="error">
    <p><?=$_GET['error']?></p>
    </div>
    <?php endif;?>
    <p><label>Nueva contraseña</label><input type="password" name="pass" id="pass"></p>
    <p><label>Confirmar contraseña</label><input type="password" name="repass" id="pass"></p>
    <p><input type="submit" name="send" value="Confirmar"></p>
    </form>
    <?php
// echo $_GET['email'];

?>
</body>
</html>