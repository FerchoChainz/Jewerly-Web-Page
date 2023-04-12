<?php

@include 'connect.php';

$id = $_GET['edit'];


if(isset($_POST['add_user'])){

    $name = $_POST["nombre"];
    $email = $_POST["correo"];
    $phone = $_POST["telefono"];
    $sexo = $_POST["sexo"];
    $contra = $_POST["contrasenia"];

   $user_image = $_FILES['user_image']['name'];
   $user_image_tmp_name = $_FILES['user_image']['tmp_name'];
   $user_image_folder = 'Upload_user_image/'.$user_image;

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

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM user  WHERE id='$id'");
   header('location:admin_page_users.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Perfil Administrador</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="estilo.css">

</head>
<body>

<header>
            <nav>
                <a href="" id="user-photo">
                    <img class="photo" src="https://lh3.googleusercontent.com/ogw/AOh-ky0afdFxgNoIFcM6Hi1X7jFZmIC021gw-YVGr9W716Y=s32-c-mo"  alt="Imagen de usuario">
                </a>
                <ul class="nav-right-section">
                    <li>
                        <a href="admin_page_users.php">USUARIOS
                        </a>
                    </li>
                    <li>
                        <a href="admin_page.php">PRODUCTOS</a>
                    </li>
                </ul>
            </nav>
    </header>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container centered">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Agregar un nuevo Usuario</h3>
         <input type="text" placeholder="Nombre" name="nombre" class="box">
         <input type="email" placeholder="Correo electronico" name="correo" class="box">
         <input type="text" placeholder="Telefono" name="telefono" class="box">
         <input type="text" placeholder="Sexo" name="sexo" class="box">
         <input type="text" placeholder="Contraseña" name="contrasenia" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="user_image" class="box">
         <input type="submit" class="btn" name="add_user" value="Agregar">
      </form>
      

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM user");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Sexo</th>
            <th>Contraseña</th>

            <th>Opcion</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['sexo']; ?></td>
            <td><?php echo $row['contrasenia']; ?></td>

            <td>
               <a href="admin_update_users.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page_users.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>