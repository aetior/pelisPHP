<?php 

 include("../controller.php");
 include("../elementos/tarjeta.php");
 $tarjeta = new Tarjeta(); 
 if(!isset($_SESSION["user"])){
    header("Location: ../index.php");
 }
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
        <form action="../index.php" method="POST">
             <input type="submit" value="salir" name="salir">
        </form>
        <div class="logo">
        <img src="../public/logo.png" alt="logo">
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