<?php  
  //* Este codigo sirve para obtener el maximo de caracteres de la catergoria imagen 
  //* de esta forma podemos verificar q el usuario ingrese una imagen en donde al codificarla 
  //* no supere los caracteres permitidos por caterogia text de imagen en la bd.
  //* Esto debido a que un texto mayor q represente la imagen sera cortado hasta el maximo de caracteres
  //* soportados 💀. 

  /*
    almacenamiento máximo en MySQL:
      TINYTEXT: Puede almacenar hasta 255 caracteres.
      TEXT: Puede almacenar hasta 65,535 caracteres.
      MEDIUMTEXT: Puede almacenar hasta 16,777,215 caracteres.
      LONGTEXT: Puede almacenar hasta 4,294,967,295 caracteres.
      BLOB: Puede almacenar hasta 65,535 bytes de datos. -> TEXT

    https://stackoverflow.com/questions/13932750/tinytext-text-mediumtext-and-longtext-maximum-storage-sizes
    https://www.mssqltips.com/sqlservertutorial/183/information-schema-columns/
  */

  function maxCaracterImg () {
    // Conectamos a la base de datos
    require_once '../config/conexionBD.php';

    $conexion = conectarBD();

    // Creamos la consulta
    $sql = "SELECT CHARACTER_MAXIMUM_LENGTH FROM information_schema.columns WHERE table_name = 'juegos' AND column_name = 'imagen'";
      // CHARACTER_MAXIMUM_LENGTH -> El maximo de caracteres de la columna
      // information_schema.columns -> Es una vista que contiene información sobre las columnas de las tablas de la base de datos.
    // Ejecutamos la consulta
    $resultado = mysqli_query($conexion, $sql);

    if (!$resultado) { // Si la consulta no se ejecuta correctamente
      die ('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
    }

    // Obtenemos el resultado
    $columnaImagen = mysqli_fetch_assoc($resultado);

    // Obtenemos el maximo de caracteres de la columna imagen
    $maxChar = $columnaImagen['CHARACTER_MAXIMUM_LENGTH'];

    // Cerramos la conexion
    mysqli_free_result($resultado);
    mysqli_close($conexion);

    return $maxChar;
  }

  

