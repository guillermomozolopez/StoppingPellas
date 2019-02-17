<?php
    require "./claseAdmin.php";

    $admin = new Admin();
    
    $listaAlumnos = $admin->listarAlumnos();
    $listaAsignaturas = $admin->listarAsignaturas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matricular alumno</title>
</head>
<body>
    <form action="" method="post">
        <select name="alumnos" id="alumnos">
        <?php
            foreach ($listaAlumnos as $alumno) {
                echo "<option value=\"".$alumno['DNI']."\">".$alumno['Apellido1']." ".$alumno['Apellido2']." ".$alumno['Nombre'];
            }
        ?>
        </select>
        <select name="asignaturas" id="asignaturas">
        <?php   
            foreach ($listaAsignaturas as $asignatura) {
                echo "<option value=\"".$asignatura['cod_asignatura']."\">".$asignatura['nombre'];
            }
        ?>
        </select>
        <input type="submit" name="matricular" value="matricular">        
    </form>
    <?php
        if(isset($_POST['matricular'])) {
            $estaMat = $admin->estaMatriculado($_POST['asignaturas'], $_POST['alumnos']);
            if($estaMat[0]['matriculado'] == 0) {
                $alumnoMatriculado = $admin->matricularAlumno($_POST['alumnos'], $_POST['asignaturas']);
            } else {
                echo "Este alumno ya esta matriculado en esa asignatura";
            }
        }
    ?>
</body>
</html>