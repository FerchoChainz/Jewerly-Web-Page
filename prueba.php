<?php


include('conn.php');
$conexion = conectar();

$sql = "SELECT * FROM user";
$query = mysqli_query($conexion , $sql);

 $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link rel="stylesheet" href="css/stylePrueba.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <h1>Ingrese Datos</h1>
            <form action="Insertar.php" method="POST">
            <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">

            <input type="text" class="form-control mb-3" name="correo" placeholder="forexample@gmail.com">

            <input type="text" class="form-control mb-3" name="telefono" placeholder="telefono">

            <input type="text" class="form-control mb-3" name="sexo" placeholder="Hombre/Mujer">

            <input type="text" class="form-control mb-3" name="contrasenia" placeholder="Password">
                                    
            <input type="submit" class="btn btn-primary">
            </form>
            </div>

            <div class="col-md-8">
                <table class="table" >
                <thead class="table-success table-striped" >
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Sexo</th>
                        <th>Contraseña</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <th><?php  echo $row["id"]?></th>
                                <th><?php  echo $row["nombre"]?></th>
                                <th><?php  echo $row["email"]?></th>
                                <th><?php  echo $row["telefono"]?></th>
                                <th><?php  echo $row["sexo"]?></th>
                                <th><?php  echo $row["contrasenia"]?></th>


                                <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a><th>                                        
                            </tr>
                        <?php 
                            }
                        ?>
                </tbody>
                </table>
            </div>
        </div>  
    </div>
</body>
</html>