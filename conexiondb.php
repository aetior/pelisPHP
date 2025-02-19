<?php
class Conexiondb {
    public $user = "root";
    public $pass = "";
    public $host = "localhost";
    public $db = "pelis";
    public $conn;

    public function __construct() {
        // Conectar a la base de datos
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        // Verificar si la conexión fue exitosa
        if (!$this->conn) {
            die("Error de conexión: " . mysqli_connect_error());
        } else {
            echo "Conexión OK";
        }
    }

    public function getConexion() {
        return $this->conn;
    }

}

// Instanciar la conexión
?>
