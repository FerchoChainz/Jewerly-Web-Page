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
     header ('location: admin_page_users.php');
 }else{
 }

 if(empty($name) || empty($email) || empty($phone) || empty($sexo) || empty($contra)){
    $message[] = 'Porfavor llena todos los campos';
 }else{
    $insert = "INSERT INTO user (id,nombre,email,telefono,sexo,contrasenia) 
    VALUES ('0','$name','$email','$phone','$sexo', '$contra ')";
    $upload = mysqli_query($conn,$insert);
    if($upload){
       move_uploaded_file($user_image_tmp_name, $user_image_folder);
       $message[] = 'Añadido correctamente';
    }else{
       $message[] = 'No se pudo agregar';
    }
 }
 
 mysqli_close($conexion);
 
 ?>