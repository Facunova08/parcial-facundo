<?php
// Define la ruta destino hacia donde procesará el formulario (en este caso para guardar)
$target="guardar.php";
// Titulo
$titulo_form="Registrar Evento";   

//define que valores se van a ingresar en el formulario
$fila = [
    "id"           => "",
    "actividad"    => "",
    "lugar"        => "",
    "fecha"        => "",
    "horario"      => "",
    "horas_sumadas"=> ""
];

// Incluye el fragmento de código HTML correspondiente al inicio global de la interfaz
include_once '../parciales/templateStart.php'; 
// Integra el formulario limpio estructurado con los valores inicializados en blanco de $fila
include "formulario.php";

?>