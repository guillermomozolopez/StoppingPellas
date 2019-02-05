<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Document</title>
</head>
<body>
<div class="centrar">
<h1>Stopping-Pellas</h1>
        <h2>
            Log-in
        </h2>
        <p>
            <form action="./validar.php" method="post">
                <table>
                    <tr>
                        <?php
                        error_reporting(E_ERROR | E_PARSE);

                            if($_GET['validacion']=="false"){
                                ?>
                                <p class="error">Usuairo o contraseña incorrectos</p> 
                                <?php
                            } 
        
                        ?>
                        <td>Usuario</td>
                        <td><input type="text" name="usuario" id=""></td>
                    </tr>
                    <tr>
                        <td>Contraseña</td>
                        <td><input type="password" name="contra" id=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Aceptar"></td>
                    </tr>
                </table>
            </form>
        </p>
    </div>
</body>
</html>