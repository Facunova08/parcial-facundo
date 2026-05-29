<?php
// conexion
include "../conexion.php"; 
// sentencias sql
include "../Investigacion.php";

$db = new Conex(); //llama conexion
$con = $db->conectar(); // conecta a la db

// CSentencias NO OLVIDAR LLAMAR CON new AL FRENTE
$datos = new Investigacion($con);
// Obtiene el registro actual mediante el ID recibido por URL para tener sus datos antes de borrarlo
$fila = $datos->getByID($_GET['id'])->fetch_assoc();

// Evalúa si el parámetro 'id' fue enviado correctamente a través de la URL ($_GET)
if (isset($_GET['id'])) {
     // Ejecuta el método delete e identifica si se procesó de forma exitosa en la base de datos
     if($rs = $datos->delete($_GET['id'])) 
        { ; // Sentencia vacía (punto y coma huérfano), no afecta el flujo
        // Redirecciona al index notificando éxito mediante 'ok=3' e incluye el ID del evento borrado
        header("Location: index.php?ok=3&id=".$fila['id']);
        // Finaliza inmediatamente la ejecución del script para asegurar la redirección
        exit(); 
        } else {
            // Si la consulta falla, redirige al index reportando el error número 3
            header("Location: index.php?error=3&id=".$fila['id']);
            // Termina la ejecución actual del script
            exit();
        }
} else {
    // Mensaje informativo en caso de acceder al script sin enviar un ID por parámetro
    echo "No se recibió un ID válido para eliminar.";
    // Redirecciona de igual forma forzando el estado de error en la vista principal
    header("Location: index.php?error=3&id=".$fila['id']);
    // Detiene el procesamiento del código PHP restante
    exit();
}
?>