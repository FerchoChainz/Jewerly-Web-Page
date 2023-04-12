<?php

//encontar la base de datos con los campos de texto
$txtusuario=$_POST['txtusuario'];
$txtpassword=$_POST['txtpassword'];

//conectar a la base de datos
$con=mysqli_connect("localhost", "root", "", "users_glacier");
$consulta="SELECT * FROM admin WHERE correo= '$txtusuario' and contrasenia='$txtpassword' ";
$resultado=mysqli_query($con, $consulta);

$filas=mysqli_num_rows($resultado);

//validar con 1 y 0 
if ($filas>0) {
   header("Location: admin_page.php");
   echo "Autenticacion Exitosa";
}
else{
   header("Location: loginadmin.html");
   echo "Error en la autenticacion";
}

mysqli_free_result($resultado);
mysqli_close($con);

?>