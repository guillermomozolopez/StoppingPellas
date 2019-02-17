<?php
session_start();
require "./claseAlumno.php";

$alumno = new Alumno();

$listaAsignaturas = $alumno->listarAsignaturas($_SESSION['user']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumnos</title>
    <style>
        tr, td {
            border: solid 1px black;
        }
    </style>
</head>
<body>
<div id="logoHeader">
<p>Aqui va el logo guillermo</p>

</div>

<?php
echo $_SESSION['user'];
echo "<a href=''>Mi perfil</a>";
require "../Login/headerLogin.php";
?>
    <h1>Gestor de faltas</h1>
    <form action='pantallaAlumnos.php' method='post'>
        <select name="selectAsignaturas">
            <?php
foreach ($listaAsignaturas as $asignatura) {
    echo "<option value=" . $asignatura['cod_asignatura'] . ">" . $asignatura['nombre'];
}
?>
        </select>
        <input type="submit" name="btnMostrar" value="Mostrar Faltas">
    </form>
    <?php
if (isset($_POST['btnMostrar'])) {
    $listaFaltas = $alumno->listarFaltas($_SESSION['user'], $_POST['selectAsignaturas']);
    echo "<table>";
    echo "<tr><td>ASIGNATURA</td><td>FECHA</td></tr>";
    foreach ($listaFaltas as $falta) {
        echo "<tr><td>" . $falta['asignatura'] . "</td><td>" . $falta['fecha'] . "</td></tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
