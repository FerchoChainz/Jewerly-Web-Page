<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="users_glacier";


$name = $_POST["nombre"];
$email = $_POST["correo"];
$phone = $_POST["telefono"];
$sexo = $_POST["sexo"];
$contra = $_POST["contrasenia"];


$conexion = mysqli_connect($db_host,$db_user,$db_password, $db_name);

if(!$conexion){
    die("Error: " . mysqli_connect_error());
}

echo "conectado...";

$insert = "INSERT INTO user (id,nombre,email,telefono,sexo,contrasenia) 
VALUES ('0','$name','$email','$phone','$sexo', '$contra ')";

$ir = mysqli_query($conexion , $insert);

if($ir){
    header ('location: ingresar.html');

}else{
    echo "Hay un error";
}

mysqli_close($conexion);


?>