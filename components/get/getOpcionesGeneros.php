<?php
  // Conectamos a la base de datos
  require_once ($pathConexion."conexionBD.php");
  $conexion = conectarBD();

  // Obtenemos los datos de la base de datos
  $sql = "SELECT * FROM  generos ORDER BY nombre ASC"; // Consulta SQL
  $resultado = mysqli_query($conexion, $sql); // Ejecuta una consulta en la base de datos

  if (!$resultado) { // Si la consulta no se ejecuta correctamente
    die ('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
  }

  // Almacenamos los datos en un array
  $_SESSION['generos'] = array();
  while ($genero = mysqli_fetch_assoc($resultado)) { // Reecupera una fila de resultados como un array asociativo
    $_SESSION['generos'][$genero['id']] = $genero['nombre'];
  }

  // Cerramos la conexion
  mysqli_free_result($resultado); // Libera la memoria asociada al resultado
  mysqli_close($conexion); // Cierra la conexion a la base de datos
  ?>