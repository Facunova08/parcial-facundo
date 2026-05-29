<?php
// Define una clase final llamada Conex, lo que significa que no puede ser heredada por otras clases
final class Conex
{
    
    private $host = "db";         
    private $usuario = "root";       
    private $password = "root_password"; 
    private $db = "practica_db";      // El nombre de la base de datos(aca adentro estan tus tablas)

    public $conexion;       // Aca se guarda los datos de la conexion, es decir el recurso de conexion activo     


    public function conectar()    // Con esta funcion llamas a la conexion, es decir, cuando quieras conectarte a la base de datos, llamas a esta funcion
    {
        //se guarda una instancia con los recursos predefinidos
        $this->conexion = new mysqli(
            $this->host,           //lo que
            $this->usuario,        //se definio
            $this->password,       //mas
            $this->db              //arriba
        );
        // Evalúa si ocurrió algún error durante el intento de conexión con el servidor
        if ($this->conexion->connect_error) {
            // Interrumpe inmediatamente la ejecución del script entero mostrando el mensaje de error provisto por el driver
            die("Error de conexion: " . $this->conexion->connect_error);
        }
        // Retorna el recurso de conexión 
        return $this->conexion;
    }
}