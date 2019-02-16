<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Estilos/login.css">
    <title>Login</title>
    
</head>
<body>
    <?php
    require "./headerLogin.php";
    ?>
    
    <form action="login.php" method="POST">
    <input type="text" name="email" placeholder="Introduzca Dni">
    <input type="password" name="password" placeholder="Introduzca contraseña">
    <input type="submit" value="Send">
    <span><a href="singup.php">Olvidaste la contraseña</a></span> 
    </form>
</body>
</html>