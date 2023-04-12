<?php
@include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="css/styleProductos.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Inter:wght@300;500&family=Josefin+Sans:ital,wght@1,100&display=swap" rel="stylesheet">
    <title>PRODUCTOS</title>
</head>
<body>
    <header>
            <nav>
                <a href="" id="user-photo">
                    <img class="photo" src="https://lh3.googleusercontent.com/ogw/AOh-ky0afdFxgNoIFcM6Hi1X7jFZmIC021gw-YVGr9W716Y=s32-c-mo"  alt="Imagen de usuario">
                </a>
                <ul class="nav-right-section">
                    <li>
                        <a href="carrito.php">
                            <img src="images/icons8-carrito-de-la-compra-cargado-30.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="index.html">INICIO</a>
                    </li>
                </ul>
            </nav>
    </header>

    <?php
        $select = mysqli_query($conn, "SELECT * FROM products");
    ?>

    <main>
    <div class="container-items">
    <?php while($row = mysqli_fetch_assoc($select)){?>
            <div class="item">
                <figure>
                    <img src="Upload_images/<?php echo $row['image']; ?>" height="100" alt="">
                </figure>
                <div class="info-producto">
                    <p><?php echo $row['name'] ?></p>
                    <p>$<?php echo $row['price'] ?></p>
                    <form action="carrito.php" method="get">
                        <button type="submit" name="carrito" value="<?php echo $row ['id']?>">Añadir al carrito</button>
                    </form>
                </div>
            </div>
            <?php } ?> 
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