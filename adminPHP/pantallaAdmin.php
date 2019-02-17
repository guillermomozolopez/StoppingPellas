<?php
    session_start();
    require "./claseAdmin.php";

    $admin = new Admin();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Estilos/AlumnoPantallaDiseño.css">
    <title>Document</title>
</head>
<body>
<?php
require "../Login/headerLogin.php";
?>
    <h1>Menú administrador</h1>
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
</body>
</html>