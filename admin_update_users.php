<?php

@include 'connect.php';

$id = $_GET['edit'];

if(isset($_POST['update_user'])){

    $id = $_POST["id"];
    $name = $_POST["nombre"];
    $email = $_POST["correo"];
    $phone = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $contra = $_POST["contrasenia"];

  
    if(empty($name) || empty($email) || empty($phone) || empty($sexo) || empty($contra)){
        $message[] = 'Porfavor llena todos los campos';
   }else{

      $update_data ="UPDATE user SET id = '$id' , nombre='$name', email='$email' ,telefono = '$phone', sexo = '$sexo', 
      contrasenia = '$contra' WHERE id = '$id'";

      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin_page_users.php');
      }else{
         $$message[] = 'Por favor llena todos los campos'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="estilo.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

< class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){
   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Editar Producto</h3>
      <input type="text" class="box"name="id" value="<?php echo $row["id"]  ?>">
      <input type="text" class="box"name="nombre" value="<?php echo $row["nombre"]  ?>">
      <input type="text" class="box" name="correo" placeholder="email" value="<?php echo $row["email"]  ?>">
      <input type="text" class="box" name="telefono" placeholder="telefono" value="<?php echo $row["telefono"]  ?>">
      <input type="text" class="box" name="sexo" placeholder="Hombre/Mujer" value="<?php echo $row["sexo"]  ?>">
      <input type="text" class="box" name="contrasenia" placeholder="Contras" value="<?php echo $row["contrasenia"]  ?>">

      <input type="submit" value="¡Editar!" name="update_user" class="btn">
      <a href="admin_page_users.php" class="btn">Regresar</a>
   </form>
   
   <?php }; ?>

</div>


</body>
</html>