<?php 
// **********  INSERTAR OPCIONES EN LA BASE DE DATOS  ********** //
// Este archivo igual esta porque no quiero ingresar uno por uno los tipos de plataformas y generos asjkasj
// Para ejecutar este archivo hay q descomentar el require de este archivo que esta en el final del index

// Las opciones que se insertan en la base de datos son las que se muestran en el formulario de altaJuego.php y en los formularios de index.php
$valoresPlataformas = array (
  "Computadora",
  "PlayStation 5",
  "PlayStation 4",
  "PlayStation 3",
  "Xbox ONE",
  "Nintendo Switch",
  "Mobile"
);
$valoresGeneros = array (
  "Accion",
  "Aventura",
  "Deportes",
  "Estrategia",
  "Indie",
  "MMO",
  "RPG",
  "Simulacion",
  "Shooter",
  "Survival",
  "Otros"
);

// === Funcion para insertar ===
function insertarDatos($conexion, $tabla, $valor) {
  $sql = "INSERT INTO $tabla (nombre) VALUES ('$valor')";  // Creamos la consulta
  mysqli_query($conexion, $sql); // Ejecutamos la consulta
}

// Conectamos a la base de datos 
require_once 'config/conexionBD.php';
$conexion = conectarBD();

// === Obtenemos lo datos de la tabla Plataformas ===
$sql = "SELECT nombre FROM plataformas"; // Creamos la consulta
$resultado = mysqli_query($conexion, $sql); // ejecutamos la consulta

if (!$resultado) {
  die ('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
}

$numfilas = mysqli_num_rows($resultado); // Obtenemos el numero de filas de la tabla

if ($numfilas == 0) { // Si la tabla esta vacia
  // Insertarmos todas las opciones en la base de datos
  foreach ($valoresPlataformas as $plataforma) {
    insertarDatos($conexion, "plataformas", $plataforma);
  }
} else {  // Si la tabla contiene datos
  // Insertarmos solos los elemetnos que no esten repetidos
  $valorsBD = array();
  while ($fila = mysqli_fetch_array($resultado)) {
    $valorsBD[] = $fila['nombre'];
  }
  $valoresNoRepetidos = array_diff($valoresPlataformas, $valorsBD);

  foreach ($valoresNoRepetidos as $plataforma) {
    insertarDatos($conexion, "plataformas", $plataforma);
  }
}
// === Obtenemos lo datos de la tabla Generos ===
$sql = "SELECT nombre FROM generos";
$resultado = mysqli_query($conexion, $sql); 

if (!$resultado) {
  die ('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
}

$numfilas = mysqli_num_rows($resultado); 

if ($numfilas == 0) { 
  foreach ($valoresGeneros as $genero) {
    insertarDatos($conexion, "generos", $genero);
  }
} else { 
  // Insertarmos solos los elemetnos que no esten repetidos
  $valorsBD = array();
  while ($fila = mysqli_fetch_array($resultado)) {
    $valorsBD[] = $fila['nombre'];
  }
  $valoresNoRepetidos = array_diff($valoresGeneros, $valorsBD);

  foreach ($valoresNoRepetidos as $plataforma) {
    insertarDatos($conexion, "plataformas", $plataforma);
  }
}

// === Cerramos la conexion ===
mysqli_free_result($resultado); // Libera la memoria asociada al resultado
mysqli_close($conexion); // Cierra la conexion a la base de datos
