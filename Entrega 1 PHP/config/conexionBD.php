<?php 
  // Crear una funcio para la conexion de la BD
  function conectarBD() {
    // Informacion de la BD
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "juegovacio"; 
    $dbname = "entrega1"; 

    // Conectamos a la base de datos
    $conexion= mysqli_connect($servername, $username, $password, $dbname);

    // Comprobamos la conexion 
    if (!$conexion) {
      die("Conexion fallida: " . mysqli_connect_error());
    }
    return $conexion;
  }
  

  
  

