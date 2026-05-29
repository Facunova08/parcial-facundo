<?php
// Incluye una única vez el archivo de conexión utilizando rutas absolutas basadas en el directorio actual
include_once __DIR__ . "/../conexion.php";
// Incluye una única vez la clase de la entidad basándose en la ubicación del script actual
include_once __DIR__ . "/../Investigacion.php";
// 1. Creamos el objeto de la clase Conex
$db= new Conex();

// 2. Llamamos al método conectar() para obtener el objeto mysqli
$con = $db->conectar(); 

// Instancia el objeto de operaciones pasándole la conexión establecida
$investigacion=new Investigacion($con);
// Ejecuta el método que trae todos los eventos guardados en la tabla correspondiente
$rs=$investigacion->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investigación</title>
    <style>
        /* Estilos personalizados para centrar y estructurar la tabla en pantalla */
        .tabla-centrada {
            width: 85%;
            max-width: 1100px;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: center;
            table-layout: fixed;
            font-family: sans-serif;
        }
        /* Configuración de bordes y rellenos internos para las celdas de la tabla */
        .tabla-centrada th,
        .tabla-centrada td {
            border: 1px solid #333;
            padding: 10px;
            word-wrap: break-word;
        }
        /* Definición de anchos de columna para asegurar simetría visual */
        .col-id       { width: 5%; }
        .col-actividad{ width: auto; text-align: left; } /*actividad aggarra el espacio restante, y el texto se alinea a la izquierda*/
        .col-lugar    { width: 15%; }
        .col-fecha    { width: 12%; }
        .col-horario  { width: 12%; }
        .col-horas    { width: 10%; }
        .col-accion   { width: 8%; }

        /* Estilos para el contenedor superior que contiene los botones de navegación */
        .barra-acciones {
            width: 85%;
            max-width: 1100px;
            margin: 30px auto 10px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1 class="text-center mt-4">Investigación</h1>

    <?php if (isset($_GET['ok']) && $_GET['ok'] == 1): ?>
        <p class="text-center text-success">Evento insertado correctamente.</p>
    <?php elseif (isset($_GET['ok']) && $_GET['ok'] == 2): ?>
        <p class="text-center text-success">Evento actualizado correctamente.</p>
    <?php elseif (isset($_GET['ok']) && $_GET['ok'] == 3): ?>
        <p class="text-center text-success">Evento eliminado correctamente.</p>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] == 3): ?>
        <p class="text-center text-danger">Error al eliminar el evento.</p>
    <?php endif; ?>

    <div class="barra-acciones">
        <a href="nuevo.php">+ Nuevo evento</a> <!-- Link a la página de creación de un nuevo evento -->
        <a href="../index.php"><- Volver</a>    <!-- Link de regreso al panel principal ubicado en la raíz del proyecto -->
    </div>

    <table class="tabla-centrada">
        <thead>
            <tr>
                <th class="col-id">Id</th>                  <!--ya saben lo que es th, tr y td-->
                <th class="col-actividad">Actividad</th>
                <th class="col-lugar">Lugar</th>
                <th class="col-fecha">Fecha</th>
                <th class="col-horario">Horario</th>
                <th class="col-horas">Horas totales</th>
                <th class="col-accion">Editar</th>
                <th class="col-accion">Borrar</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = $rs->fetch_assoc()): ?> <!--fetch_assoc() devuelve un array asociativo con los datos de cada fila, y el while se repite mientras haya filas para traer-->
            <tr>
                <td><?php echo $fila["id"]; ?></td>
                <td><?php echo $fila["actividad"]; ?></td> <!--estos son los valores de mi tabla, creen su propia tablay reemplazen sus nombres-->
                <td><?php echo $fila["lugar"]; ?></td>
                <td><?php echo $fila["fecha"]; ?></td>
                <td><?php echo $fila["horario"]; ?></td>
                <td><?php echo $fila["horas_sumadas"]; ?></td>
                <td><a href="editar.php?id=<?php echo $fila["id"]; ?>">Editar</a></td> <!--link a la página de edición, pasando el id del evento a editar por la URL-->
                <td><a href="borrar.php?id=<?php echo $fila["id"]; ?>">Borrar</a></td> <!--lo mismo aca pero para borrar NO OLVIDEN REVISAR BIEN LAS RUTAS-->
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>