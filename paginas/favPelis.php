<?php 
 include("../controller.php");
 include("../elementos/tarjeta.php");
 $tarjeta = new Tarjeta(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <!--  ***************************************  -->
    <header>
        <div class="logo">
            <img src="https://picsum.photos/80/80" alt="Imagen de prueba">
        </div>
        <nav>
        
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="./añadirPeli.php">Añadir</a></li>
                <li><a href="">Favoritos</a></li>
            </ul>
        </nav>
    </header> 
    <!--  ***************************************  -->
 
    <main>
    <h1>FAVORITOS</h1>
        <div class="container">
            <?= $tarjeta->mostrarTarjetaFav()?>
        </div>   
    </main>


</body>
</html>