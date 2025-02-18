<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="../styles/styleAñadir.css" rel="stylesheet">
</head>
<body>
    <h2>Agregar Película</h2>
    <div class="container">
        <div></div>
    <form action="../index.php" method="POST">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" required>

        <label for="imagen">Imagen</label>
        <input type="text" name="imagen" required>

        <label for="descripcion">Descripción</label>  
        <input type="text" name="descripcion" required>

        <input type="hidden" name="secreto" value="12345">

        <input type="submit" value="Enviar" >
        <a href="../index.php">Volver</a>
    </form>
 
    </div>

</body>
</html>
