<?php require "config/conexion.php";
$conexion_db = new Conexion();

$message = "";

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $sql = "INSERT INTO users ('email', 'password') values (:email,:password)";
    $stmt = $conexion_db->prepare($sql);
    $stmt->bindParam(':email',$_POST['email']);
    // ENCRIP PASSWORD
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $stmt->bindParam(':password',$password);
    
    if($stmt->execute()){
        $message = 'Successfully created user';
    }else{
        $message = 'Sorry there have not created user';
    }
}
?>
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
  
   
    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>
   
    <form action="singup.php" method="POST">
    <input type="text" name="email" placeholder="Enter your mail">
    <input type="password" name="password" placeholder="Enter you password">
    <input type="password" name="confirm_password" placeholder="Confirm you password">
    <input type="submit" value="Send">
    </form>
</body>
</html>