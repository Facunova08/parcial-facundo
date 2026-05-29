<?php
// Conexion a la base de datos y carga de clase
include "../conexion.php";
// Carga la clase con las llamadas a la base de datos
include "../Investigacion.php";

// Crea la instancia de control para la base de datos
$db = new Conex();
// llama a la conexxion y guarda el recurso activo en $con
$con = $db->conectar();

// llama a las funciones de la clase Investigacion pasándole el recurso activo de la base de datos
$dato = new Investigacion($con);
// Busca el registro específico según el ID de la URL y convierte la fila en un array asociativo
$fila = $dato->getByID($_GET['id'])->fetch_assoc();

// Define que el formulario incluido debe enviar la información a actualizar.php para procesar la edición
$target = "actualizar.php";
// Construye de manera dinámica el título que lucirá el encabezado del formulario
$titulo_form = "Editar evento: " . $fila['actividad'];

// Incluye únicamente una vez el archivo que renderiza el inicio del diseño HTML estructurado
include_once '../parciales/templateStart.php';
// Llama al formulario reutilizable que pintará las cajas de texto con los valores de $fila
include "formulario.php";
?>