<?php 
  //** Conectamos a la base de datos **/
  require ('config/conexionBD.php');

  //** Obtenemos los nombres de la tabla juegos */
  $sql = "SELECT nombre FROM juegos ORDER BY nombre ASC"; // Consulta SQL con orden ascendente (A a Z)
  $resultado = mysqli_query($conexion, $sql); // Ejecuta una consulta en la base de datos

  if (!$resultado) { // Si la consulta no se ejecuta correctamente
    echo '<script>console.error("Error al ejecutar la consulta: ' .  mysqli_error($conexion) . '")</script>';
    die();
  }

  //** Mostramos los nombres en la pagina */
  $_SESSION['nombreJuegos'] = array();
  while ($nombreJuego = mysqli_fetch_assoc($resultado)) {
    $_SESSION['nombreJuegos'][] = $nombreJuego['nombre'];
  }
  
  /** Cerramos la conexion **/
  mysqli_free_result($resultado); // Libera la memoria asociada al resultado
  mysqli_close($conexion); // Cierra la conexion a la base de datos
  
  