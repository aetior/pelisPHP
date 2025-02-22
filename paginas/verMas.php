<?php
require_once("../conexiondb.php"); // Incluye la conexión a la BD

$conexionDB = new Conexiondb();
$conn = $conexionDB->getConexion();

$id = $_GET['id'] ?? ''; // Obtener ID de la URL
$titulo = '';
$img = '';
$descripcion = '';

// Validar que el ID es un número antes de procesar
if (!empty($id) && is_numeric($id)) {
    $query = "SELECT titulo, img, descripcion FROM datospeli WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($titulo, $img, $descripcion);
    $stmt->fetch();
    $stmt->close();
} else {
    die("ID inválido o no proporcionado."); // Evita consultas erróneas
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Pelicula</title>
    <link href="../styles/styleAñadir.css" rel="stylesheet">
</head>
<body>
    <h2>Ver Pelicula</h2>
    <form method="POST" action="../controller.php"> <!-- Envia a controller.php -->
        <fieldset>
            <figure>

                <img src="<?=$img?>" alt="" class="imgVerMas">
            </figure>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo htmlspecialchars($titulo); ?>" disabled>


        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" disabled><?php echo htmlspecialchars($descripcion); ?></textarea>

        </fieldset>
    </form>
    <a href="../index.php">Atrás</a>
</body>
</html>
