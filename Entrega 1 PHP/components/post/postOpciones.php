<?php 
// **********  INSERTAR OPCIONES EN LA BASE DE DATOS  ********** //
// Este archivo igual esta porque no quiero ingresar uno por uno los tipos de plataformas y generos asjkasj
// Para ejecutar este archivo tendremos un boton agregar en el footer, igual esto no deberia estas hasjha

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
function insertarDatos($conexion, $tabla, $valores) {
  $sql = "INSERT INTO $tabla (nombre) VALUES ('$valores')";  // Creamos la consulta
  /* La consulta está insertando un valor en la columna "nombre" de la tabla "generos", donde el valor a insertar se almacena en la variable $genero. */
  mysqli_query($conexion, $sql); // Ejecutamos la consulta
}

// === Conectamos a la base de datos === 
require_once 'config/conexionBD.php';
$conexion = conectarBD();

// === Verificar si la tabla Plataformas esta vacia ===
$sql = mysqli_query($conexion, "SELECT COUNT(*) FROM plataformas"); // Creamos la consulta
  /* Selecciona el número de filas en la tabla "generos".  */
$filas = mysqli_fetch_array($sql); // Obtenemos el numero de filas de la tabla

if (!$filas) {
  die ('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
}

if ($filas[0] == 0) { // Si la tabla esta vacia
  // Insertarmos  las opciones en la base de datos
  foreach ($valoresPlataformas as $plataforma) {
    insertarDatos($conexion, "plataformas", $plataforma);
  }
} else {  // Si la tabla contiene datos
  // Insertarmos solos los elemetnos que no esten repetidos
  foreach ($valoresPlataformas as $plataforma) {
    $sql = "SELECT * FROM  plataformas WHERE nombre = '$plataforma'"; // Consultamos si el dato ya existe
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
      if (mysqli_num_rows($resultado) == 0) {
        insertarDatos($conexion, "plataformas", $plataforma);
      }
    } else {
      die ('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
    }
  }
}


// === Verificar si la tabla Genero esta vacia ===
$sql = mysqli_query($conexion, "SELECT COUNT(*) FROM generos"); 
$filas = mysqli_fetch_array($sql);

if (!$filas) {
  die ('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
}

if ($filas[0] == 0) {
  foreach ($valoresGeneros as $genero) {
    insertarDatos($conexion, "generos", $genero);
  }
} else { 
  foreach ($valoresGeneros as $genero) {
    $sql = "SELECT * FROM  generos WHERE nombre = '$genero'";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
      if (mysqli_num_rows($resultado) == 0) {
        insertarDatos($conexion, "generos", $genero);
      }
    } else {
      die ('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
    }
  }
}

// === Cerramos la conexion ===
mysqli_free_result($resultado); // Libera la memoria asociada al resultado
mysqli_close($conexion); // Cierra la conexion a la base de datos
