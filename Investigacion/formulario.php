<?php 
// Evalúa si en la URL viaja un parámetro 'error' con el valor exacto de 1
if (isset($_GET['error']) && $_GET['error'] == 1) {
  // Imprime una alerta visual roja notificando un percance durante la inserción de registros
  echo "<p style='color:red;'>Error al insertar datos del evento.</p>";
}

?>


<?php 
//IGNOREN QUE $fila[] ESTE EN ROJO, CUANDO LLAMEN A formulario.php  EN OTRO DOCUMENTOS ELLOS LE VAN A PASAR QUE ES $fila[]

// Revisa si hay error
if (isset($_GET['error']) && $_GET['error'] == 1) {
  // Imprime en pantalla el error correspondiente a la actualización fallida
  echo "<p style='color:red;'>Error al actualizar el evento.</p>";
}
?>
<form action="<?php echo $target; ?>" method="post">
  <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>"> 

  <label for="actividad">Actividad:</label><br> <!--igresar actividad-->
  <input type="text" value='<?php echo $fila["actividad"]; ?>' id="actividad" name="actividad" maxlength="100" required class="form-control"><br><br>

  <label for="lugar">Lugar:</label><br><!--igresar lugar-->
  <input type="text" value='<?php echo $fila["lugar"]; ?>' id="lugar" name="lugar" maxlength="100" required class="form-control"><br><br>

  <label for="fecha">Fecha:</label><br><!--igresar fecha-->
  <input type="date" value='<?php echo $fila["fecha"]; ?>' id="fecha" name="fecha" required class="form-control"><br><br>

  <label for="horario">Horario:</label><br><!--igresar horario-->
  <input type="text" value='<?php echo $fila["horario"]; ?>' id="horario" name="horario" maxlength="191" required class="form-control"><br><br>

  <label for="horas_sumadas">Horas sumadas:</label><br><!--igresar horas-->
  <input type="text" value='<?php echo $fila["horas_sumadas"]; ?>' id="horas_sumadas" name="horas_sumadas" maxlength="191" required class="form-control"><br><br>
  <a href="index.php">Volver al listado</a>
  <input type="submit" value="Guardar">
</form>