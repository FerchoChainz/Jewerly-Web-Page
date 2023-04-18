<?php
include 'conn.php';
$conexion = conectar();

$name = $_POST["nombre"];
$email = $_POST["correo"];
$phone = $_POST["telefono"];
$sexo = $_POST["sexo"];
$contra = $_POST["contrasenia"];

 $insert = "INSERT INTO user (id,nombre,email,telefono,sexo,contrasenia) 
 VALUES ('0','$name','$email','$phone','$sexo', '$contra ')";
 
 $ir = mysqli_query($conexion , $insert);
 
 if($ir){
     header ('location: ingresar.html');
 }else{
    header('location: registro.html');
     echo "Hay un error";
 }
 
 mysqli_close($conexion);
 
 ?>