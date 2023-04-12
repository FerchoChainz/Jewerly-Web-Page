<?php
function conectar(){
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="users_glacier";


$conexion = mysqli_connect($db_host,$db_user,$db_password, $db_name);

if(!$conexion){
    die("Error: " . mysqli_connect_error());
}

return $conexion;
}

?>