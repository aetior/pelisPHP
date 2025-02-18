<?php

class Tarjeta {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexiondb();
    }

    public function obtenerDatos() {
        $query = "SELECT img,titulo,id,liked FROM datospeli";
        $result = mysqli_query($this->conexion->conn, $query);
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC); 
        } else {
            return null;
        }
    }
    function actualizarLike($id, $liked) {
        $conexionDB = new Conexiondb();
        $conn = $conexionDB->getConexion();
        $query = "UPDATE datospeli SET liked = ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conexion->conn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $liked, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    

    public function mostrarTarjeta() {
        $datos = $this->obtenerDatos();
        if ($datos) {
            foreach ($datos as $dato) {
                echo '<div class="targeta">
                         <img src="'. htmlspecialchars($dato['img']) .'" alt="">
                         <h1>Titulo: '. htmlspecialchars($dato['titulo']) .'</h1>
                         <p>Descripcion: '. htmlspecialchars($dato['id']) .' <a href="paginas/verMas.php?id='.intval($dato['id']).'">ver más</a></p>
                         <form class="like" method="POST">
                             <button type="submit" name="like" value="1">Like</button>
                             <button type="submit" name="like" value="0">Dislike</button>
                             <input type="hidden" name="id" value="' . intval($dato['id']) . '"> 
                             <input type="submit" value="Eliminar" name="eliminar">
                         </form>
                         <!-- Botón Editar ahora redirige correctamente a editarPeli.php -->
                         <a href="paginas/editarPeli.php?id=' . intval($dato['id']) . '" class="btn-editar">Editar</a>
                       </div>';
            }
        }
    }
    
    public function mostrarTarjetaFav(){
        $datos = $this->obtenerDatos();

        foreach ($datos as $dato){
            if($dato["liked"]==1){
            echo '<div class="targeta">
                         <img src="'. htmlspecialchars($dato['img']) .'" alt="">
                         <h1>Titulo: '. htmlspecialchars($dato['titulo']) .'</h1>
                         <p>Descripcion: '. htmlspecialchars($dato['id']) .' <a href="">ver más</a></p>
                         <form class="like" method="POST">
                             <button type="submit" name="like" value="1">Like</button>
                             <button type="submit" name="like" value="0">Dislike</button>
                             <input type="hidden" name="id" value="' . intval($dato['id']) . '"> 
                             <input type="submit" value="Eliminar" name="eliminar">
                         </form>
                         <!-- Botón Editar ahora redirige correctamente a editarPeli.php -->
                         <a href="editarPeli.php?id=' . intval($dato['id']) . '" class="btn-editar">Editar</a>
                       </div>';
        } 
    }
    }
    public function mostrarTarjetaEdit(){
        if($dato["edit"]==3){
            echo '<div class="targeta">
            <img src="'. htmlspecialchars($dato['img']) .'" alt="">
            <h1>Titulo: '. htmlspecialchars($dato['titulo']) .'</h1>
            <p>Descripcion: '. htmlspecialchars($dato['id']) .' <a href="">ver mas</a></p>
            <form class="like" method="POST">
                  <button type="submit" name="like" value="1">Like</button>
                   <button type="submit" name="like" value="0">Dislike</button>
                    <button type="submit" name="editar" value="3">Editar</button>
                <input type="hidden" name="id" value="' . intval($dato['id']) . '"> <!-- Enviar el id de la película -->
                <input type="submit" value="Eliminar" name="eliminar">
            </form>       
          </div>';
        }
    }

}
?>


