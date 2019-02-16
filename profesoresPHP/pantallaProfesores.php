<?php
session_start();
require "./claseProfesor.php";

$profesor = new Profesor();

$dni = $_GET['dni'];

$listaAsignaturas = $profesor->listarAsignaturas($_SESSION['user']);

/*error_reporting(E_ERROR | E_PARSE);*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profesores</title>
    <style>
        tr, td {
            border: solid 1px black;
        }
    </style>
</head>
<body>
<!-- header -->
<div id="logoHeader">
<p>Aqui va el logo guillermo</p>
</div>

<?php
echo "<a href=''>Mi perfil</a>";
require "../Login/headerLogin.php";
?>

    <h1>Gestor de faltas</h1>
    <form action="pantallaProfesores.php" method="post">
        <select name="selectAsignaturas">
            <?php
            //cargamos las asignaturas al select
foreach ($listaAsignaturas as $asignatura) {
    echo "<option value=" . $asignatura['cod_asignatura'] . ">" . $asignatura['nombre'];
}
?>
        </select>
        <input type="submit" name="btnBuscar" value="Buscar alumnos">
    </form>

    <?php
if (isset($_POST['btnBuscar'])) {
    $cod_asig = $_POST['selectAsignaturas'];
    $listaAlumnos = $profesor->listarAlumnos($_POST['selectAsignaturas']);
    echo "<form action='guardarFaltas.php?asignatura=" . urlencode($cod_asig) . "' name='faltas' method='post'>";
    echo "<table>";
    echo "<tr><td>APELLIDOS</td><td>NOMBRE</td><td>DNI ALUMNO</td><td>FALTA</td></tr>";
    foreach ($listaAlumnos as $alumno) {
        echo "<tr><td>" . $alumno['Apellido1'] . " " . $alumno['Apellido2'] . "</td><td>" . $alumno['Nombre'] . "</td><td>" . $alumno['dni_alumno'] . "</td><td><input type='checkbox' name='alumnos[]' value='" . $alumno['dni_alumno'] . "'/></td></tr>";
    }
    echo "</table>";
    echo "<input type='submit' name='ponerFaltas' value='Guardar faltas'>";

    echo "</form>";
}
echo "<a href='../Login/cerrarSesion.php'>Cerrar Sesion</a>";

?>

</body>
</html>