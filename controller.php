<?php
include("model.php");
session_start();
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

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loggin'])){
    $name = $_POST['user'];
    $pass = $_POST['pass'];
    if (validarUsuario($name,$pass)) {
    $_SESSION["user"]="aitor";
        echo "Usuario válido.";
    } else {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
        echo "Usuario o contraseña incorrectos.";
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salir'])){
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}
?>