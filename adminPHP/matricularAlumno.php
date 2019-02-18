<?php
    require "./claseAdmin.php";

    $admin = new Admin();
    
    $listaAlumnos = $admin->listarAlumnos();
    $listaAsignaturas = $admin->listarAsignaturas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Estilos/matricularAlumnoDiseño.css">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <title>Matricular alumno</title>
</head>
<body>
    <div class="fondo"></div>
    <?php   
        require "../Login/headerLogin.php";     // Incluimos el header   
    ?>
    <a href="../adminPHP/pantallaAdmin.php" class="volver"><i class="fas fa-arrow-circle-left"></i></a>
    <h1>Matricular alumno en una asignatura</h1>
    <form action="" method="post">
        <select name="alumnos" id="alumnos">
        <?php
            foreach ($listaAlumnos as $alumno) {    // Añadimos los options con el nombre de los alumnos y value = dni
                echo "<option value=\"".$alumno['DNI']."\">".$alumno['Apellido1']." ".$alumno['Apellido2']." ".$alumno['Nombre'];
            }
        ?>
        </select>
        <select name="asignaturas" id="asignaturas">
        <?php   
            foreach ($listaAsignaturas as $asignatura) {    // Añadimos los options con el nombre de asignatura y value = cod_asignatura
                echo "<option value=\"".$asignatura['cod_asignatura']."\">".$asignatura['nombre'];
            }
        ?>
        </select>
        <input type="submit" name="matricular" value="matricular">        
    </form>
    <?php
        if(isset($_POST['matricular'])) {
            // Comprobamos si el alumno ya esta matriculado en esa asignatura
            $estaMat = $admin->estaMatriculado($_POST['asignaturas'], $_POST['alumnos']);
            if($estaMat[0]['matriculado'] == 0) {
                $alumnoMatriculado = $admin->matricularAlumno($_POST['alumnos'], $_POST['asignaturas']);    // Si no lo esta lo matriculamos
            } else {
                echo "<p class='error'>Este alumno ya esta matriculado en esa asignatura</p>";
            }
        }
    ?>
</body>
</html>