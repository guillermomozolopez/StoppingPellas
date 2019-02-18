<?php

    require "./clasePerfil.php";
    
    $perfil = new Perfil();
  
    $dni =$_COOKIE['dni'];

    error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/miPerfilDiseño.css">
    <title>Mi perfil</title>
</head>
<body>
    <div class="fondo"></div>
    <?php
        require "../Login/headerLogin.php";     // Incluimos el header
        $esProfe = $perfil->comprobarProfe($dni);
        // Comprobamos si es profesor o no para el boton atras
        if($esProfe[0]['profe'] != 0) {
            ?>    
            <a href="../profesoresPHP/pantallaProfesores.php" class="volver"><i class="fas fa-arrow-circle-left"></i></a>
            <?php
        } else {
            ?>
            <a href="../alumnosPHP/pantallaAlumnos.php" class="volver"><i class="fas fa-arrow-circle-left"></i></a>
            <?php
        }
        ?>
        <div class="contenido">
        <h1>Mi perfil</h1>
        <?php         
            // Comprobamos si es profesor o no para la consulta en su tabla
            if($esProfe[0]['profe'] != 0) {
                $info = $perfil->infoPerfilProfe($dni);
            } else {
                $info = $perfil->infoPerfilAlumno($dni);
            }  
            // Imprimimos la informacion en una tabla        
        ?>
        <form action="pantallaMiPerfil.php" method="post">
            <table>
                <tr>
                    <td>DNI</td>
                    <?php echo '<td><input type="text" name="dni" value="'.$info[0]['DNI'].'" disabled></td>'?>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <?php echo '<td><input type="text" name="nombre" value="'.$info[0]['Nombre'].'" disabled></td>'?>
                </tr>
                <tr>
                    <td>Primer apellido</td>
                    <?php echo '<td><input type="text" name="ape1" value="'.$info[0]['Apellido1'].'" disabled></td>'?>
                </tr>
                <tr>
                    <td>Segundo apellido</td>
                    <?php echo '<td><input type="text" name="ape2" value="'.$info[0]['Apellido2'].'" disabled></td>'?>
                </tr>
                <tr>
                    <td>Fecha de nacimiento</td>
                    <?php echo '<td><input type="text" name="fecha" value="'.$info[0]['FechaNac'].'" disabled></td>'?>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <?php echo '<td><input type="text" name="email" value="'.$info[0]['Email'].'"></td>'?>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <?php echo '<td><input type="text" name="tlf"  value="'.$info[0]['Telefono'].'"></td>'?>
                </tr>
                <tr>
                    <td>Direccion</td>
                    <?php echo '<td><input type="text" name="direccion" value="'.$info[0]['Direccion'].'"></td>'?>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnEditar" value="Editar campos"></td>
                </tr>
            </table>            
        </form>
        <?php
            if (isset($_POST['btnEditar'])) {
                // Comprobamos si hay algun campo vacío
                if(empty($_POST['email']) || empty($_POST['tlf']) || empty($_POST['direccion'])) {
                    echo "<p class='error'>No puede haber ningun campo vacio</p>";
                } else {    // Comprobamos si es profesor o no para editar la tabla correspondiente
                    if($esProfe[0]['profe'] != 0) { 
                        $profeEditado = $perfil->editarProfe($_POST['email'], $_POST['tlf'], $_POST['direccion'], $dni);
                    } else {
                        $alumnoEditado = $perfil->editarAlumno($_POST['email'], $_POST['tlf'], $_POST['direccion'], $dni);
                    }
                }
            }
        ?>
    </div>
</body>
</html>