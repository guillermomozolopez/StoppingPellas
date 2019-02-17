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
    <title>Inscribir usuario como profesor</title>
</head>
<body>  
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
                <td><input type="date" name="fechaNacAlu" id="fechaNacAlu"></td>
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
    <?php
        if(isset($_POST['registrarAlu'])) {     
            $existeDNI = $admin->comprobarDNI($_POST['dniAlu']);       
            $esProfe = $admin->comprobarProfe($_POST['dniAlu']);
            $esAlumno = $admin->comprobarAlumno($_POST['dniAlu']);
            if($_POST['dniAlu'] == "" || $_POST['nombreAlu'] == "" || $_POST['ape1Alu'] == "" || $_POST['ape2Alu'] == "" || $_POST['fechaNacAlu'] == "" || $_POST['emailAlu'] == "" || $_POST['tlfAlu'] == "" || $_POST['dirAlu'] == "" ){
                echo "No puede haber campos vacíos";
            } else {
                if($existeDNI[0]['existe'] == 0) {
                    echo "Ese usuario no está registrado";
                } else {
                    if($esProfe[0]['alumno']) {
                        echo "Ese usuario ya está inscrito como profesor";
                    } else {
                        if ($esAlumno[0]['alumno']) {
                            echo "Ese usuario ya está inscrito como alumno";
                        } else {
                            $alumno = $admin->registrarAlumno($_POST['dniAlu'], $_POST['nombreAlu'], $_POST['ape1Alu'], $_POST['ape2Alu'], $_POST['fechaNacAlu'], $_POST['emailAlu'], $_POST['tlfAlu'], $_POST['dirAlu']);
                        }
                    }
                }
            }
        }
    ?>
</body>
</html>