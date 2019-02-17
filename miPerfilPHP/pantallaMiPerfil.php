<?php

    require "./clasePerfil.php";

    $perfil = new Perfil();

    $dni ="22222222H";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi perfil</title>
</head>
<body>
    <h1>Mi perfil</h1>
    <form action="">
        <table>
            <tr>
                <td>DNI</td>
                <td><input type="text" name="dniAlu" id="dniAlu" value=""></td>
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
</body>
</html>