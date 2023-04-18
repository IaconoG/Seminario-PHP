<?php
  //** Conectamos a la base de datos **//
  include 'config/conexionBD.php';

  //** Obtenemos los datos de la base de datos **//
  $sql = "SELECT nombre FROM plataformas"; // Consulta SQL
  $resultado = mysqli_query($conexion, $sql); // Ejecuta una consulta en la base de datos

  if (!$resultado) { // Si la consulta no se ejecuta correctamente
    echo '<script>console.error("Error al ejecutar la consulta: ' .  mysqli_error($conexion) . '")</script>';
    die();
  }

  //** Mostramos los datos en la pagina **//
  $key = 'nombre';
  while ($plataforma = mysqli_fetch_assoc($resultado)) { // obtiene una fila de resultados como una matriz asociativa
    $nombrePlataforma = $plataforma[$key];
    $option = "<option value='$nombrePlataforma' name='$plataforma'>$nombrePlataforma</option>";
    echo $option;
  }

  /** Cerramos la conexion **/
  mysqli_free_result($resultado); // Libera la memoria asociada al resultado
  mysqli_close($conexion); // Cierra la conexion a la base de datos
