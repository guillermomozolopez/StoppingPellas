<?php
    session_start();
    require "./claseProfesor.php";

    $profesor = new Profesor();

    $alumnosFaltas = $_POST['alumnos'];
    for ($i=0; $i < count($alumnosFaltas); $i++) { 
        echo $alumnosFaltas[$i];
        $asig = $_GET['asignatura'];
        $fechaActual = date("Y-m-d");
        $horaActual = date("H:i:s");
        $fechaActual = date("Y-m-d H:i:s", strtotime($fechaActual . $horaActual));
        $faltasGuardadas = $profesor->ponerFalta($asig, $alumnosFaltas[$i], $_SESSION['user'],$fechaActual);    // Insertar una nueva falta
    } 
    
    header("Location:pantallaProfesores.php");  // Redirige a la pantalla profesores
?>