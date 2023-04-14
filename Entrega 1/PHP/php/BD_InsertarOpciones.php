<?php 
// **********  INSERTAR OPCIONES EN LA BASE DE DATOS  ********** //
// Este archivo igual esta porque no quiero ingresar uno por uno los tipos de plataformas y generos asjkasj
// Para ejecutar este archivo tendremos un boton agregar en el footer, igual esto no deberia estas hasjha

// Las opciones que se insertan en la base de datos son las que se muestran en el formulario de altaJuego.php y en los formularios de index.php


$plataformas = array (
  "Computadora",
  "PlayStation 5",
  "PlayStation 4",
  "Xbox ONE",
  "Nintendo Switch",
  "Mobile"
);
$generos = array (
  "Accion",
  "Aventura",
  "FPS",
  "Terror",
  "MMO"
);

// === Conectamos a la base de datos === 
include 'conexion.php';

// === Verificar si la tabla Plataformas esta vacia ===
$sql = mysqli_query($conexion, "SELECT COUNT(*) FROM plataformas"); // Creamos la consulta
  /* Selecciona el número de filas en la tabla "generos".  */
$filas = mysqli_fetch_array($sql); // Obtenemos el numero de filas de la tabla
if ($filas[0] == 0) { // Si la tabla esta vacia
  // Insertarmos  las opciones en la base de datos
  foreach ($plataformas as $plataforma) {
    $sql = "INSERT INTO plataformas (nombre) VALUES ('$plataforma')";  // Creamos la consulta
    /* La consulta está insertando un valor en la columna "nombre" de la tabla "generos", donde el valor a insertar se almacena en la variable $genero. */
    mysqli_query($conexion, $sql); // Ejecutamos la consulta
  }
}
echo "<br>";
$msg = ($filas[0] == 0) ? "Vacio, se agregaron los datos" : "No esta vacio, no se agregaron los datos";
echo '<script>console.log("Condicion de plataformas -> :' . $msg . '")</script>';

// === Verificar si la tabla Genero esta vacia ===
$sql = mysqli_query($conexion, "SELECT COUNT(*) FROM generos"); 
$filas = mysqli_fetch_array($sql); 
if ($filas[0] == 0) { 
  foreach ($generos as $genero) {
    $sql = "INSERT INTO generos (nombre) VALUES ('$genero')"; 
    $resultado = mysqli_query($conexion, $sql); 
  }
}

$msg = ($filas[0] == 0) ? "Vacio, se agregaron los datos" : "No esta vacio, no se agregaron los datos";
echo '<script>console.log("Condicion de genero -> :' . $msg . '")</script>';


// === Cerramos la conexion ===
mysqli_close($conexion);
?>