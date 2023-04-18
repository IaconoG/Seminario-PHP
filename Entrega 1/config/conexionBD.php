<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "entrega1";
  // Conectamos a la base de datos
  $conexion= mysqli_connect($servername, $username, $password, $dbname) or die("Error " . mysqli_error($conexion));
?>
