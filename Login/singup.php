<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Estilos/login.css">
    <title>Document</title>
</head>
<body>
    <?php require "partials/header.php"?>
    <!-- all process for singup -->
    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>
    <form action="login.php" method="POST">
    <input type="text" name="email" placeholder="Enter your mail">
    <input type="password" name="password" placeholder="Enter you password">
    <input type="submit" value="Send">
    </form>
</body>
</html>