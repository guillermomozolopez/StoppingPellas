<?php
session_start();
$_SESSION['dni'] = $_GET['email'];
if(isset($_POST['send'])){
    
    if (empty($_POST['pass']) || empty($_POST['repass'])) {
        $error = "Campos vacios";
        header("Location:./reseteoContraseña.php?error=".urlencode($error)."");
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
    
    <form action="reseteoContraseña.php" methos="POST">
    <?php
    echo $_SESSION['dni'];
if (!empty($_GET['error'])): ?>
    <div>
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