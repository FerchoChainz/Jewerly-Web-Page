<?php

include("conn.php");
$con=conectar();

$id = $_POST["id"];
$name = $_POST["nombre"];
$email = $_POST["correo"];
$phone = $_POST["telefono"];
$sexo = $_POST["sexo"];
$contra = $_POST["contrasenia"];


$sql="UPDATE user SET id = '$id' , nombre='$name', email='$email' ,telefono = '$phone', sexo = '$sexo', 
contrasenia = '$contra' WHERE id = '$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header('Location: prueba.php');
    }
?>