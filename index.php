<?php
// Carga el archivo conexion.php ubicado en el mismo directorio para tener acceso a la clase Conex
include("conexion.php");
// Carga los parciales html
include("parciales/templateStart.php");

//IMPORTANTE: la ruta puede ser difereente dependiendo de donde se encuentre el archivo, en este caso, como esta en la raiz,
// es asi, pero si estuviera dentro de una carpeta, seria algo asi: include("../conexion.php") o include("./conexion.php") 
//dependiendo de la estructura de carpetas que tengas
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Bootstrap-Icons/fonts/bootstrap-icons.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4" style="text-align: center;">Panel de áreas</h1>

    <table class="table table-bordered text-center" style="width: 50%; margin: 0 auto;">
        <thead class="table-dark">        //thead=table head, o encabezado de tabla, cada encabezado de la tabla se define con un thead (el texto es negrita y fondo oscuro)
            <tr>                          //tr=table row, o fila de tabla,cada fila de la tabla se define con un tr
                <th>Área</th>             //th=table header, o encabezado de tabla, cada encabezado de la tabla se define con un th (el texto es negrita)
                <th>Ver</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Investigación</td>     //td=table data, o dato de tabla,cada dato de la tabla se define con un td (el texto es normal)
                <td><a href="investigacion/index.php">Ir a</a></td>
            </tr>
            <tr>
                <td>Notas</td>
                <td><a href="notas/index.php">Ir a</a></td> //link a la carpeta notas, que contiene el index.php de esa area, lo mismo para investigacion, que linkea a la carpeta investigacion y su index.php
            </tr>
        </tbody>
    </table>
</div>

<script src="assets/Bootstrap/js/bootstrap.bundle.min.js"></script>//bootstrap
</body>
</html>

<?php // Carga la plantilla de cierre del diseño modular (divs pendientes, scripts finales y fin de etiquetas) ?>
<?php include("parciales/templateEnd.php"); ?>