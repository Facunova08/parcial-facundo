<?php
include "../conexion.php";
// llama a las sentencias sql
include "../Investigacion.php";

// Instancia un nuevo objeto de la clase Conex para gestionar la conexión a la base de datos
$db = new Conex();
// Llama a la conexion
$con = $db->conectar();
// llama a la clase con las sentencias sql
$datos = new Investigacion($con);

// Inicializa un array vacío para acumular los mensajes de error de validación
$errores = [];

// Verifica si se envió el formulario mediante una petición POST
if (isset($_POST)) {
    // Valida si el campo 'actividad' está vacío o si su longitud es mayor a 100 caracteres
    if (empty($_POST['actividad']) || strlen($_POST['actividad']) > 100) {
        // Agrega un mensaje de error al array si la validación de actividad falla
        $errores[] = "La actividad es obligatoria y no debe superar 100 caracteres.";
    }
    // Valida si el campo 'lugar' está vacío o supera los 100 caracteres
    if (empty($_POST['lugar']) || strlen($_POST['lugar']) > 100) {
        // Agrega un mensaje de error si la validación del lugar falla
        $errores[] = "El lugar es obligatorio y no debe superar 100 caracteres.";
    }
    // Valida si el campo de fecha se encuentra vacío
    if (empty($_POST['fecha'])) {
        // Agrega un mensaje de error si no se seleccionó ninguna fecha
        $errores[] = "La fecha es obligatoria.";
    }
    // Valida si el campo 'horario' está vacío o supera los 191 caracteres
    if (empty($_POST['horario']) || strlen($_POST['horario']) > 191) {
        // Agrega un mensaje de error si la validación del horario falla
        $errores[] = "El horario es obligatorio y no debe superar 191 caracteres.";
    }
    // Valida si el campo de horas sumadas está vacío o supera la longitud permitida
    if (empty($_POST['horas_sumadas']) || strlen($_POST['horas_sumadas']) > 191) {
        // Agrega un mensaje de error si no se ingresaron las horas sumadas
        $errores[] = "Las horas sumadas son obligatorias.";
    }
//IMPORTANTE: cuando agreguen su propia tbla los datos van a ser diferentes no va a ser [`actividad`] sino [`dato que le pongan a su tabla`]

    // Verifica si el array de errores se mantuvo vacío tras realizar todas las comprobaciones
    if (empty($errores)) {
        // Llama al método update enviando todo el array $_POST con los nuevos datos y el ID
        $datos->update($_POST); // usa UPDATE en vez de INSERT
        // Redirecciona al listado principal enviando un parámetro de éxito 'ok=2'
        header("Location: index.php?ok=2");
    } else {
        // Si existen errores de validación, los imprime en pantalla estructuradamente
        print_r($errores);
    }
}
// Pasa los datos a guardar.php para realizar los cambios
$target = "guardar.php";
?>