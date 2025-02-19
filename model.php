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
function validarUsuario($name, $pass){
    // Crear la conexión a la base de datos
    $conexionDB = new Conexiondb();
    $conn = $conexionDB->getConexion();
    
    // Consulta SQL para seleccionar el usuario y la contraseña
    $sql = "SELECT user, pass FROM usuarios WHERE user = ?";
    
    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    
    // Vincular el parámetro (usuario), el tipo "s" es para string
    $stmt->bind_param("s", $name);
    
    // Ejecutar la consulta
    $stmt->execute();
    
    // Guardar los resultados
    $stmt->store_result();
    
    // Verificar si se encontró el usuario
    if ($stmt->num_rows > 0) {
        // Vincular los resultados a las variables
        $stmt->bind_result($user, $storedPass);
        
        // Obtener el resultado
        $stmt->fetch();
        
        // Verificar si la contraseña coincide
        if ($pass === $storedPass) {
            echo "todo ok"; // Contraseña correcta
            return true; // Usuario y contraseña válidos
        } else {
            echo "contraseña incorrecta"; // Contraseña incorrecta
            return false; // Contraseña incorrecta
        }
    } else {
        echo "usuario no encontrado"; // Usuario no encontrado
        return false; // Usuario no encontrado
    }
    
    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();
    
    
}
 

    // function comprobar($user, $pass){
    //     $array = array("aitor","test");
    //         if($user == $array[0] && $pass == $array[1]){
    //           session_start();
    //             return true;
    //         }else{
    //             return false;
    //         }
    //     }
    
