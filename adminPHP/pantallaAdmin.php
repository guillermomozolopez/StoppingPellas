<?php
    require "./claseAdmin.php";

    $admin = new Admin();
    
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
    <form action="" method='post'>
        <h1>Añadir usuario</h1>
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
            $dni_usuario = $_POST['dni_usuario'];
            $cont_usuario = $_POST['pass_usuario'];
            $existeDNI = $admin->comprobarDNI($dni_usuario);
            if($existeDNI[0]['existe'] != 0) {
                echo "Ese usuario ya está registrado";
            } else {
                if ($_POST['pass_usuario'] != $_POST['conf_pass_usuario']) {
                    echo "La contraseña no coincide";
                } else {
                    $fecha = date("Y-m-d");
                    $usuario = $admin->insertarUser($dni_usuario, $cont_usuario, $fecha);
                }
            }
        }
    ?>
    <form action="" method="post">
        <h1>Registrar usuario como profesor</h1>
        <table>
            <tr>
                <td>DNI</td>
                <td><input type="text" name="dniPro" id="dniPro"></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombrePro" id="nombrePro"></td>
            </tr>
            <tr>
                <td>Primer apellido</td>
                <td><input type="text" name="ape1Pro" id="ape1Pro"></td>
            </tr>
            <tr>
                <td>Segundo apellido</td>
                <td><input type="text" name="ape2Pro" id="ape2Pro"></td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td><input type="text" name="fechaNacPro" id="fechaNacPro"></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><input type="text" name="emailPro" id="emailPro"></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" name="tlfPro" id="tlfPro"></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><input type="text" name="dirPro" id="dirPro"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name ="registrarPro" value="Registrar profesor"></td>
            </tr>
        </table>
    </form>
    <form action="" method="post">
        <h1>Registrar usuario como alumno</h1>
        <table>
            <tr>
                <td>DNI</td>
                <td><input type="text" name="dniAlu" id="dniAlu"></td>
            </tr>
            <tr>
                <td>Nombre</td>
                <td><input type="text" name="nombreAlu" id="nombreAlu"></td>
            </tr>
            <tr>
                <td>Primer apellido</td>
                <td><input type="text" name="ape1Alu" id="ape1Alu"></td>
            </tr>
            <tr>
                <td>Segundo apellido</td>
                <td><input type="text" name="ape2Alu" id="ape2Alu"></td>
            </tr>
            <tr>
                <td>Fecha de nacimiento</td>
                <td><input type="text" name="fechaNacAlu" id="fechaNacAlu"></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><input type="text" name="emailAlu" id="emailAlu"></td>
            </tr>
            <tr>
                <td>Telefono</td>
                <td><input type="text" name="tlfAlu" id="tlfAlu"></td>
            </tr>
            <tr>
                <td>Direccion</td>
                <td><input type="text" name="dirAlu" id="dirAlu"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name ="registrarAlu" value="Registrar alumno"></td>
            </tr>
        </table>
    </form>
</body>
</html>