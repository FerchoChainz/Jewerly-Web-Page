<?php

include("conn.php");
$con=conectar();

$id = $_GET['id'];

$sql="DELETE FROM user  WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: prueba.php");
    }
?>