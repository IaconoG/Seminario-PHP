<?php
//** POST juegos credos por el formulario **/

  // Comprobamos si accedieron usando el formulario

  var_dump($_SERVER['REQUEST_METHOD']); // Muestra data del metodo de envio

  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si accedieron usando el formulario, obtenemos la informacion del formulario
      // $_SERVER['REQUEST_METHOD'] -> Devuelve el método de solicitud utilizado para acceder a la página actual.
    // Validamos la informacion
    require 'validarPostJuegos.php';

    unset($_POST);
      // unset() -> Elimina la información registrada de una variable
        // Después de insertar la información en la base de datos eliminamos los datos del formulario en la superglobal $_POST.
        // Para evitar que se vuelvan a enviar accidentalmente si el usuario recarga la página o realiza otra acción que envíe nuevamente el formulario.

    if ($valido) { // Si la informacion es valida, la insertamos en la base de datos
      insertarJuego($nombre, $nombreImagen, $tipoImagen, $descripcion, $plataformas, $url, $generos);
      header('Location: ../index.php'); // Para no quedarnos en la pagina php y poder ver los datos que se envian, redireccionamos a index.php
    } else {
      // header('Location: ../altaJuego.php');  // se va a la mrd y no puedo mostrar los errores
      // Si hay errores, imprimir los mensajes de error en la consola del navegador
      $msgError = 'No se pudo validar el formulario. Errores:\n';
      foreach ($errores as $error) {
        $msgError .= " - ". $error . '\n';
      }
      echo "<script>alert('$msgError');</script>";
    }
  }
  else { // Si no accedieron usando el formulario, redireccionamos a index.php
    header('Location: ../index.php'); 
  }

  function insertarJuego($nombre, $nombreImagen, $tipoImagen, $descripcion, $plataformas, $url, $generos) {
    // Conectamos a la base de datos
    include 'config/conexionBD.php';

    $sql = "INSERT INTO juegos (nombre, imagen, tipo_imagen, descripcion, url, id_genero, id_plataforma) 
    VALUES ('$nombre', '$nombreImagen', '$tipoImagen', '$descripcion', '$url', '$generos', '$plataformas')";
    // $resultado = mysqli_query($conexion, $sql);
    
    if (!$resultado) {
      echo '<script>console.error("Error al ejecutar la consulta: ' .  mysqli_error($conexion) . '")</script>';
      die();
    }
    mysqli_free_result($resultado); // Libera la memoria asociada al resultado
    mysqli_close($conexion); // Cierra la conexion a la base de datos
  }
?>


<button type="button" onclick="location.href='../altaJuego.php'">Volver</button> <!-- liminar esta linea -->