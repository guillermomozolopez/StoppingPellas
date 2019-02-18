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
    <link rel="stylesheet" href="../Estilos/Inscribir.css">
    <title>Inscribir usuario como profesor</title>
</head>
<body>
<div class="fondo"></div>
<a href="../adminPHP/pantallaAdmin.php" class="volver"><i class="fas fa-arrow-circle-left"></i></a>
<?php
require "../Login/headerLogin.php";
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
                <td><input type="date" name="fechaNacPro" id="fechaNacPro"></td>
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
    <?php
        if(isset($_POST['registrarPro'])) {     
            $existeDNI = $admin->comprobarDNI($_POST['dniPro']);       
            $esProfe = $admin->comprobarProfe($_POST['dniPro']);
            $esAlumno = $admin->comprobarAlumno($_POST['dniPro']);
            if($_POST['dniPro'] == "" || $_POST['nombrePro'] == "" || $_POST['ape1Pro'] == "" || $_POST['ape2Pro'] == "" || $_POST['fechaNacPro'] == "" || $_POST['emailPro'] == "" || $_POST['tlfPro'] == "" || $_POST['dirPro'] == "" ){
                echo "<p class='error'>No puede haber campos vacíos</p>";
            } else {
                if($existeDNI[0]['existe'] == 0) {
                    echo "<p class='error'>Ese usuario no está registrado</p>";
                } else {
                    if($esProfe[0]['profe']) {
                        echo "<p class='error'>Ese usuario ya está inscrito como profesor</p>";
                    } else {
                        if ($esAlumno[0]['alumno']) {
                            echo "<p class='error'>Ese usuario ya está inscrito como alumno</p>";
                        } else {
                            $profesor = $admin->registrarProfe($_POST['dniPro'], $_POST['nombrePro'], $_POST['ape1Pro'], $_POST['ape2Pro'], $_POST['fechaNacPro'], $_POST['emailPro'], $_POST['tlfPro'], $_POST['dirPro']);
                        }
                    }
                }
            }
        }
    ?>
</body>
</html>