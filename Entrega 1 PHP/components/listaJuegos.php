<?php
//** Get juegos para mostrar en la pagina **/
  // Conectamos a la base de datos
  require_once 'config/conexionBD.php';
  $conexion = conectarBD();

  // Consulta para obtener los juegos
  $sql = "SELECT * FROM juegos";
  $resultado = mysqli_query($conexion, $sql);

  if (!$resultado) {
    echo '<script>console.error("Error al ejecutar la consulta: ' .  mysqli_error($conexion) . '")</script>';
    die();
  }
  
  while ($juego = mysqli_fetch_assoc($resultado)) {
    require 'includes/displayJuegos.php';
  }

  mysqli_free_result($resultado); // Libera la memoria asociada al resultado
  mysqli_close($conexion); // Cierra la conexion a la base de datos