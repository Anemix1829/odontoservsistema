<?php

class ConexionBD {
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasena = "";
    private $baseDeDatos = "odontoserv";
    public $conexion;

    // Método para establecer la conexión a la base de datos
    public function conectar() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->baseDeDatos);

        // Verificar la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
       
    }

    // Método para cerrar la conexión a la base de datos
    public function cerrarConexion() {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }

    // Otros métodos para realizar operaciones en la base de datos pueden ser añadidos aquí
}

// Uso de la conexión
$conexionBD = new ConexionBD();
$conexionBD->conectar();

// Realizar operaciones en la base de datos...

// Cerrar la conexión al finalizar
$conexionBD->cerrarConexion();

?>
