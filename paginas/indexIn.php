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
        <form action=""method="POST">
            <input type="hidden" name="loggout">
             <input type="submit"value="salir">
        </form>
        <div class="logo">
            <img src="../public/logo.png" alt="logo">
        </div>
        <nav>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="../paginas/añadirPeli.php">Añadir</a></li>
                <li><a href="../paginas/favPelis.php">Favoritos</a></li>
            </ul>
        </nav>
    </header> 
    <!--  ***************************************  -->
    <main>
    <h1>TODO</h1>
        <div class="container">
           <?php
            $tarjeta->mostrarTarjeta();?>
        </div>   
    </main>


</body>
</html>