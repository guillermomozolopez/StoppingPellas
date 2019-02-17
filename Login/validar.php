
<?php
 
//Validacion envio de datos con campos vacios
if (isset($_POST['send'])) {
   
    if (empty($_POST['dni']) && empty($_POST['password'])) {
        $error = "Dni y contraseña vacios";
        header("Location:./login.php?error=".urlencode($error)."");
    } else if (empty($_POST['dni'])) {
        $error = "Dni vacio";
        header("Location:./login.php");
        header("Location:./login.php?error=".urlencode($error)."");
    } else if (empty($_POST['password'])) {
        $error = "Contraseña vacia";
        header("Location:./login.php");
        header("Location:./login.php?error=".urlencode($error)."");
    } else {
        //validacion envio de datos correcta
        require "./clase_login.php";
        $objetoLogin = new Login();
        $existeUsuario = $objetoLogin->existeUsuario($_POST['dni'], $_POST['password']);

        //si existe el usuario
        if ($existeUsuario) {
            //si existe usuario crearemos una cookie con el dni
            
            
                setcookie("dni", $_POST['dni'], time()+3600, "/" , "localhost"); 
                
            session_start();
            $_SESSION['rama']= "";
            $_SESSION['user'] = $_POST['dni'];
            $error = '';
            $dni = $_POST['dni'];
            //si ese usuario existente es profesor
            $esProfesor = $objetoLogin->esProfe($dni);
            $esAlumno = $objetoLogin->esAlumno($dni);
            if ($esProfesor) {
                $_SESSION['rama']= 0;
                //modificar la pagina cuando se merge-----------------------------------------------------------------------
                header("Location: ../profesoresPHP/pantallaProfesores.php");
                exit;
            } else if ($esAlumno) {
                $_SESSION['rama']= 1;
                // ////modificar la pagina cuando se merge-----------------------------------------------------------------------
                header("Location: ../alumnosPHP/pantallaAlumnos.php");
                exit;
            }else{
                $_SESSION['rama']= 2;
                header("Location: ../adminPHP/pantallaAdmin.php");
                exit;
            }
        } else {
            //si no existe redireccionamos a la misma pagina
            $error = "Usuario Incorrecto";
            header("Location:./login.php?error=".urlencode($error)."");
        }

    }

} else {
    //validacion incorrect de envio de datos
    header("Location:./login.php");
    
}
?>