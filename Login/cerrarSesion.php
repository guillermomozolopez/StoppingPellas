<?php

//cierra la sesion abierta

session_start();
session_destroy();
echo 'Cerrasndo sesión...';
unset($_COOKIE['dni']);
echo '<script> window.location="./login.php"; </script>';
?>