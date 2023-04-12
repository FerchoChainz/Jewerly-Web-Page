<?php 
    include("conn.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM user WHERE id = '$id'";

$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                                <input type="text" class="form-control mb-3"name="id" value="<?php echo $row["id"]  ?>">
                                <input type="text" class="form-control mb-3"name="nombre" value="<?php echo $row["nombre"]  ?>">
                                <input type="text" class="form-control mb-3" name="correo" placeholder="email" value="<?php echo $row["email"]  ?>">
                                <input type="text" class="form-control mb-3" name="telefono" placeholder="telefono" value="<?php echo $row["telefono"]  ?>">
                                <input type="text" class="form-control mb-3" name="sexo" placeholder="Hombre/Mujer" value="<?php echo $row["sexo"]  ?>">
                                <input type="text" class="form-control mb-3" name="contrasenia" placeholder="Contras" value="<?php echo $row["contrasenia"]  ?>">

                            <input type="submit" class="btn btn-primary btn-block" value="Modificar">
                    </form>
                    
                </div>
    </body>
</html>