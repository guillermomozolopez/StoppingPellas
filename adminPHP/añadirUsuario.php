<?php
    require "./claseAdmin.php";

    $admin = new Admin();

    error_reporting(E_ERROR | E_PARSE);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/añadirUsuarioDiseño.css">
    <title>Añadir un nuevo usuario</title>
</head>
<body>
    <a href="../adminPHP/pantallaAdmin.php" class="volver"><i class="fas fa-arrow-circle-left"></i></a> 
    <div class="fondo"></div>

    <?php
        require "../Login/headerLogin.php";     //Incluimos el header
    ?>   
   
    <div class="contenido">
    <h1>Añadir usuario</h1>
    <form action="" method='post'>        
        <table>
            <tr>
                <td>DNI</td>
                <td><input type="text" name="dni_usuario" id="dni_usuario"></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="password" name="pass_usuario" id="pass_usuario"></td>
            </tr>
            <tr>
                <td>Confirmar contraseña</td>
                <td><input type="password" name="conf_pass_usuario" id="conf_pass_usuario"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name ="añadirUser" value="Añadir usuario"></td>
            </tr>
        </table>
    </form>
    <?php
        if(isset($_POST['añadirUser'])) {   
            // Capturamos las variables que vamos a necesitar
            $dni_usuario = $_POST['dni_usuario'];   
            $cont_usuario = $_POST['pass_usuario'];
            // Comprobamos que el dni no esta ya registrado
            $existeDNI = $admin->comprobarDNI($dni_usuario);
            if ($_POST['dni_usuario'] == "" || $_POST['pass_usuario'] == "" || $_POST['conf_pass_usuario'] == "") {     // Comprobamos si hay algún campo vacío
                echo "<p class='error'>No puede haber campos vacíos</p>";
            } else {
                if($existeDNI[0]['existe'] != 0) {      // Si existe el dni
                    echo "<p class='error'>Ese usuario ya está registrado</p>";
                } else {
                    if ($_POST['pass_usuario'] != $_POST['conf_pass_usuario']) {    // Validamos que las dos contraseñas coinciden
                        echo "<p class='error'>La contraseña no coincide</p>";
                    } else {
                        $fecha = date("Y-m-d");
                        $usuario = $admin->insertarUser($dni_usuario, $cont_usuario, $fecha);      // Si se cumplen los filtro anteriores insertamos el usuario
                    }
                }
            }
        }
    ?>
    </div>
</body>
</html>