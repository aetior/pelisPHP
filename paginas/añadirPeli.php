<?php 
 if(!isset($_SESSION["user"])){
    header("Location: ../index.php");
 }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="../styles/styleAñadir.css" rel="stylesheet">
</head>
<body>

    <h1>Añade tu Pelicula</h1>
    <div class="container">
        <img src="../public/logo.png" alt="Logo de la aplicación">

        <form action="../index.php" method="POST">
            <fieldset>
                <legend>Detalles de la Película</legend>

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" required placeholder="Ingrese el título">

                <label for="imagen">Imagen (URL)</label>
                <input type="url" id="imagen" name="imagen" required placeholder="Ingrese la URL de la imagen" >

                <label for="descripcion">Descripción</label>  
                <textarea id="descripcion" name="descripcion"  rows="20" cols="100"required placeholder="Ingrese la descripción"></textarea>

                <input type="hidden" name="secreto" value="12345">

                <input type="submit" value="Enviar">
                <a href="../index.php">Volver</a>
            </fieldset>
        </form>
    </div>

</body>
</html>
