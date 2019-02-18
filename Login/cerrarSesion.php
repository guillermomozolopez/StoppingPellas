<?php
session_start();
session_destroy();
echo 'Cerrasndo sesión...';
unset($_COOKIE['dni']);
echo '<script> window.location="./login.php"; </script>';

?>