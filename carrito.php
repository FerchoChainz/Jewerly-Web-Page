<?php

session_start();

include ('connect.php');

$car = array(
    'productos' => array(),
    'subtotal' => 0,
    'total' => 0
);

if(isset($_SESSION["carrito"])){
    $car = $_SESSION["carrito"];
}
$carritosGuardados = [];
if(isset($_SESSION["carritos"])){
    $carritosGuardados = $_SESSION["carritos"];
}

calcular($car, $carritosGuardados);

if(isset($_GET["carrito"])){
    print $_SESSION["carrito"]['total'];
    $id = $_GET["carrito"];
    if($id){
        add($id, $car, $conn, $carritosGuardados);
    }
}

if(isset($_GET["remove"])){
    $id = $_GET["remove"];
    if(isset($id) || $id == 0){
        remove($id, $car, $carritosGuardados);
    }
}

function add($p = [], &$car, &$conn, &$carritosGuardados){
    $sql = mysqli_query($conn, "SELECT * FROM products WHERE id = '$p' ");
    $resul = mysqli_fetch_array($sql);
    $resul['cantidad'] = 1;
    array_push($car['productos'], $resul);
    $_SESSION["carrito"] = $car;
    calcular($car, $carritosGuardados);
}

function calcular(&$car, &$carritosGuardados){
    $car['subtotal'] = 0;
    $car['total'] = 0;
    $car['index'] = 0;

    foreach($car['productos'] as &$p){
        $car['subtotal'] += $p['price'];
    }
    $car['total'] = $car['subtotal'];
    $_SESSION["carrito"] = $car;

    $carritosGuardados[$car['index']] = $car;
    $_SESSION["carritos"] = $carritosGuardados;
}

function remove($index = 0, &$car, &$carritosGuardados){
    array_splice($car['productos'], $index, 1);
    calcular($car, $carritosGuardados);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleProductos.css">
    <title>CARRITO</title>

</head>
<body>
<header>
        <nav>
        <h1>Total a pagar: $ <?php echo $car['total'] ?></h1>
            <ul class="nav-right-section">
                <li>
                    <form action="productos.php" method="get">
                        <li type="submit" name="p" value="p" class="boton" ><a href="productos.php"> Seguir Comprando</a></li>
                    </form>
                </li>
                <li>
                    <form action="#" method="get">
                        <li type="submit" name="comprar" value="comprar" class="boton" ><a href="">Salir</a> </li>
                    </form>
                </li>
            </ul>
        </nav>
</header>
   
<main>
    <div class="container-items">
        <?php
            include("connect.php");
            foreach($car['productos'] as $key =>$row){
        ?>
        <div class="item">
            <figure>
            <img src="Upload_images/<?php echo $row['image']; ?>" height="100" alt="">
            </figure>
            <div class="info-producto">
            <p><?php echo $row['name'] ?></p>
                <p>$<?php echo $row['price'] ?></p>
                <form action="carrito.php" method="get">
                <button type="submit" name="remove" value="<?php echo $key?>" class="btn">Eliminar</button>
                </form>
            </div>
        </div>   
        <?php }?>
    </div>

    </main>

    <footer class="footer">
        <div class="contenedor"> 
            <div class="footerC">
                <div>
                    <p class="footer_corporativo">CORPORATIVO</p>
                    <p>
                        Centro Joyero "Galeria Joyeria"
                        <br>
                        AV. Republica #50 
                        <br>
                        COL. San Juan De Dios.
                    </p>
                </div>
                <div class="social-media">
                    <p class="smp">Siguenos</p>
                    <ul class="social-icons">
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/glacier_jewels/"><i class="fab fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="footer_menu_inferior"> MENU INFERIOR </p>
                    <a href="" id="link_menu">Politicas de privacidad.</a>
                    <br>
                    <a href="" id="link_menu">Politicas de reembolso.</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>