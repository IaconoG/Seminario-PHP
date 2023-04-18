<?php
//** Conectamos a la base de datos **//
  include 'config/conexionBD.php';

  // //** Obtenemos los datos de la base de datos **//
  $sql = "SELECT * FROM  generos";
  $resultado = mysqli_query($conexion, $sql);

  if (!$resultado) {
    echo '<script>console.error("Error al ejecutar la consulta: ' .  mysqli_error($conexion) . '")</script>';
    die();
  }

  //** Mostramos los datos en la pagina **//
  $key = 'nombre';
  while ($fila = mysqli_fetch_assoc($resultado)) { // obtiene una fila de resultados como una matriz asociativa
    $genero = $fila[$key];
    $option = "<option value='$genero' name='$genero'>$genero</option>";
    echo $option;
  }

  /** Cerramos la conexion **/
  mysqli_close($conexion);
?>