<?php
include("model.php");
// include("./elementos/tarjeta.php");
//eliminar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar"])) {
    if (isset($_POST["id"]) && is_numeric($_POST["id"])) {
        $id = $_POST["id"];
        echo "VALIDO";
        eliminarPelicula($id); // Llamamos a la función para eliminar
    } else {
        echo "ID no válido.";
    }
}

// crear
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["secreto"])) {
    if (!empty($_POST["titulo"]) && !empty($_POST["imagen"]) && !empty($_POST["descripcion"])) {
        agregarPelicula($_POST["titulo"], $_POST["imagen"], $_POST["descripcion"]);
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
// likee
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['like'])) {
    $id = intval($_POST['id']);
    $liked = intval($_POST['like']); // 1 para like, 0 para dislike
    
    require_once 'elementos/tarjeta.php'; 
    $tarjeta = new Tarjeta();
    $tarjeta->actualizarLike($id, $liked);

    // Redireccionar para evitar el reenvío del formulario
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}
//EDITAR

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar_edicion'])) {
    $id = intval($_POST['id']);
    $titulo = $_POST['titulo'] ?? '';
    $img = $_POST['img'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';

    editarPelicula($id, $titulo, $img, $descripcion);
}
?>