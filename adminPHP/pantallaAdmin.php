<?php
    session_start();
    require "./claseAdmin.php";

    $admin = new Admin();
    
    error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/adminDiseño.css">
    <title>Document</title>
</head>
<body>
    <div class="fondo"></div>

    <!-- header -->

    <?php
        require "../Login/headerLogin.php";
    ?>

    <div class="contenido">
    <h1>Administrador</h1>
    <form action="añadirUsuario.php">
        <input type="submit" value="Añadir usuario">
    </form>
    <form action="inscribirProfe.php">
        <input type="submit" value="Inscribir profesor">
    </form>
    <form action="inscribirAlumno.php">
        <input type="submit" value="Inscribir alumno">
    </form>
    <form action="matricularAlumno.php">
        <input type="submit" value="Matricular alumno">
    </form>
    </div>
</body>
</html>