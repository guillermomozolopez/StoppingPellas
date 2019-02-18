<?php
session_start();
require "./claseAlumno.php";

$alumno = new Alumno();

$listaAsignaturas = $alumno->listarAsignaturas($_SESSION['user']);

error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="../Estilos/AlumnoPantallaDiseño.css">
    <title>Alumnos</title>
    <style>
        tr, td {
            border: solid 2px white;
        }
    </style>
    
</head>

<body>
    <div class="fondo"></div>
    <?php
        require "../Login/headerLogin.php";     //Incluimos el header
    ?>
    <div class="tablas">
        <?php
            $nombre = $alumno->nombre($_SESSION['user']);   //Buscamos el nombre del DNI de la sesion
            echo "<h1>".$nombre[0]['Nombre']." ".$nombre[0]['Apellido1']." ".$nombre[0]['Apellido2']."</h1>";
        ?>
        <div class="forms">
        <form action='pantallaAlumnos.php' method='post'>             
            <select name="selectAsignaturas">
                <?php
                    // Añadimos un option por cada asignatura
                    foreach ($listaAsignaturas as $asignatura) {
                    echo "<option value=" . $asignatura['cod_asignatura'] . ">" . $asignatura['nombre'];
                    }
                ?>
            </select>
            <input type="submit" name="btnMostrar" value="Mostrar Faltas">
        </form>
        <form action='pantallaAlumnos.php' method='post'>
            <input type="submit" name="btnMostrarTodas" value="Mostrar Todas Faltas">    
        </form>
        </div>
        <?php
            if(isset($_POST['btnMostrar'])) {
                // Listamos las faltas de la asignatura seleccionada y el DNI de la sesion
                $listaFaltas = $alumno->listarFaltas($_SESSION['user'], $_POST['selectAsignaturas']);
                // Imprimimos las faltas en una tabla
                echo "<table>";
                echo "<tr><td>ASIGNATURA</td><td>FECHA</td></tr>";
                foreach ($listaFaltas as $falta) {
                    echo "<tr><td>".$falta['asignatura']."</td><td>".$falta['fecha']."</td></tr>";
                }
                echo "</table>";
            }

            if(isset($_POST['btnMostrarTodas'])) {
                // Listamos cuantas faltas de cada asignatura tiene el DNI de la sesion
                $listaTodas = $alumno->listarTodas($_SESSION['user']);
                // Imprimimos las faltas en una tabla
                echo "<table>";
                echo "<tr><td>ASIGNATURA</td><td>FALTAS</td></tr>";
                foreach ($listaTodas as $falta) {
                    echo "<tr><td>".$falta['asignatura']."</td><td>".$falta['faltas']."</td></tr>";
                }
                echo "</table>";
            }
            
    ?>
</div>
</body>
</html>
