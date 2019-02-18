<?php
session_start();
require "./claseProfesor.php";

$profesor = new Profesor();

$listaAsignaturas = $profesor->listarAsignaturas($_SESSION['user']);

error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/ProfesorDiseño.css">
    <title>Profesores</title>
    <style>
        tr, td {
            border: solid 1px black;
        }
    </style>
</head>
<body>
<div class="fondo"></div>
<!-- header -->

<?php
require "../Login/headerLogin.php";
?>
<div class="contenido">
    <?php
        $nombre = $profesor->nombre($_SESSION['user']);
        echo "<h1>".$nombre[0]['Nombre']." ".$nombre[0]['Apellido1']." ".$nombre[0]['Apellido2']."</h1>";
    ?>
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
    echo "<form action='guardarFaltas.php?asignatura=" . urlencode($cod_asig) . "' name='faltas' id='faltas' method='post'>";
    echo "<table>";
    echo "<tr><td>APELLIDOS</td><td>NOMBRE</td><td>DNI ALUMNO</td><td>FALTA</td></tr>";
    foreach ($listaAlumnos as $alumno) {
        echo "<tr><td>" . $alumno['Apellido1'] . " " . $alumno['Apellido2'] . "</td><td>" . $alumno['Nombre'] . "</td><td>" . $alumno['dni_alumno'] . "</td><td><input type='checkbox' name='alumnos[]' value='" . $alumno['dni_alumno'] . "'/></td></tr>";
    }
    echo "</table>";
    echo "<input type='submit' name='ponerFaltas' value='Guardar faltas'>";

    echo "</form>";
}

?>
</div>
</body>
</html>