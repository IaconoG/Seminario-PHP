<?php
// .* -> todos los atributos de la tabla
// Archivo de pruebas


include 'conexion.php';

$sql = "SELECT * FROM  plataformas";
$resultado = mysqli_query($conexion, $sql);

if (!$resultado) {
  echo '<script>console.log("Error al ejecutar la consulta")</script>';
  die();
}

//** OBTENEMOS LOS ATRIBUTOS Y DATOS DE LA TABLA **//

while ($fila = mysqli_fetch_assoc($resultado)) { // obtiene una fila de resultados como una matriz asociativa
  foreach ($fila as $keys => $valor) { 
      /*
        Se recorre cada elemetno de la $fila (array asociativo), en cada iteracion se almacena ek
        nombre de la columna en la variable $columna y el valor correspondiente en la variable $valor.
      */
    echo '<script>console.log("Atributos: ' . $keys . ' -> Valor: ' . $valor . '")</script>';
  }
  echo '<script>console.log(" ---- ")</script>';
}

//** BUSCAR ELEMENTOS DE LA TABLA **//

$buscar = array(
  "PlayStation 5",
  "PlayStation 6",
  "PlayStation 7",
);

foreach ($buscar as $elem) {
  $sql = "SELECT * FROM  plataformas WHERE nombre = '$elem'";
  $resultado = mysqli_query($conexion, $sql);
  if ($resultado && mysqli_num_rows($resultado) > 0) { // Si la consulta se ejecuto correctamente y existe al menos un registro
    echo '<script>console.log("Existe")</script>';
  } else {
    echo '<script>console.log("No existe")</script>';
  }
}




mysqli_free_result($resultado);
mysqli_close($conexion);
