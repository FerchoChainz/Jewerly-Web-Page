<?php

include 'conn.php';
$conexion = conectar();

$email = $_POST["correo"];
$contra = $_POST["contrasenia"];

$consulta = mysqli_query($conexion,"SELECT * FROM user WHERE email = '$email' && contrasenia = '$contra'");

$filas = mysqli_num_rows($consulta);



if($filas == mysqli_fetch_array($consulta)){
    session_start();
    $_SESSION['email'] = $email;
    header ('location: productos.php');
}else{
    header('location:ingresar.html');
}

mysqli_close($conexion);

?>