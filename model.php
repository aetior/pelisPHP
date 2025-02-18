<?php
include("conexiondb.php");

function agregarPelicula($titulo, $img, $descripcion) {
    $conexionDB = new Conexiondb();
    $conn = $conexionDB->getConexion();
    $sql = "INSERT INTO datospeli (titulo, img, descripcion) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);



    $stmt->bind_param("sss", $titulo, $img, $descripcion);

    if ($stmt->execute()) {
        echo "Película añadida con éxito.";
    
    } else {
        echo "Error al añadir la película.";
    }

    $stmt->close();
    $conn->close();
}

function eliminarPelicula($id) {
    $conexionDB = new Conexiondb();
    $conn = $conexionDB->getConexion();

    // Preparar la consulta para evitar inyección SQL
    $sql = "DELETE FROM datospeli WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" es para entero

    if ($stmt->execute()) {
        echo "Película eliminada con éxito.";
    } else {
        echo "Error al eliminar la película.";
    }

    $stmt->close();
    $conn->close();
}

function editarPelicula($id, $titulo, $img, $descripcion) {
    $conexionDB = new Conexiondb();
    $conn = $conexionDB->getConexion();

    // Validar datos antes de ejecutar la consulta
    if (empty($titulo) || empty($img) || empty($descripcion)) {
        echo "Todos los campos son obligatorios.";
        return;
    }

    // Preparar la consulta para evitar inyección SQL
    $sql = "UPDATE datospeli SET titulo = ?, img = ?, descripcion = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $titulo, $img, $descripcion, $id);
    
    if ($stmt->execute()) {
        echo "Película editada con éxito.";
         header("Location: ./index.php"); // Redirigir a index después de guardar
        exit();
    } else {
        echo "Error al editar la película.";
    }
    
    $stmt->close();
}
