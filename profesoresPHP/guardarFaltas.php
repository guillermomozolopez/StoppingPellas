<?php
    require "./claseProfesor.php";

    $profesor = new Profesor();

    $alumnosFaltas = $_POST['alumnos'];
    for ($i=0; $i < count($alumnosFaltas); $i++) { 
        echo $alumnosFaltas[$i];
        $asig = $_GET['asignatura'];
        $dniP = $_GET['dniProfe'];
        $fechaActual = date("Y-m-d");
        $horaActual = date("H:i:s");
        $fechaActual = date("Y-m-d H:i:s", strtotime($fechaActual . $horaActual));
        $faltasGuardadas = $profesor->ponerFalta($asig, $alumnosFaltas[$i], $dniP,$fechaActual);
    } 

    header("Location:pantallaProfesores.php");
?>