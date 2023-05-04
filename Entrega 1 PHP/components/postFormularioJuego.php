<?php
  //** POST juegos credos por el formulario **/
  session_start();
  sleep(1); // Para darle tiempo para que se vea la verificacion de js

  // Comprobamos si accedieron usando el formulario
  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si accedieron usando el formulario, obtenemos la informacion del formulario
      // $_SERVER['REQUEST_METHOD'] -> Devuelve el método de solicitud utilizado para acceder a la página actual.
    // Validamos la informacion
    require 'validarPostJuegos.php';

    unset($_POST);
      // unset() -> Elimina la información registrada de una variable
        // Después de insertar la información en la base de datos eliminamos los datos del formulario en la superglobal $_POST.
        // Para evitar que se vuelvan a enviar accidentalmente si el usuario recarga la página o realiza otra acción que envíe nuevamente el formulario.

    if ($valido) { // Si la informacion es valida, la insertamos en la base de datos
      // insertarJuego($nombre, $nombreImagen, $tipoImagen, $descripcion, $plataformas, $url, $generos);
      $msg = "Juego creado con exito";
    } else {
      // Si hay errores, los alamacenamos en la variable global $_SESSION['msg']
      $msg = 'No se pudo validar el formulario. Errores:\n';
      foreach ($errores as $error) {
        $msg .= " - ". $error . '\n';
      }
    }
  } else { // Si accedieron a este archivo sin usar el formulario
    $msg = "Acceso no autorizado";
  }
  $_SESSION['msg'] = $msg;
  header('Location: ../altaJuego.php'); // Para no quedarnos en la pagina php y poder ver los datos que se envian, redireccionamos a index.php
  exit; // para asegurarte de que el código se detenga y la redirección se realice correctamente.

  
  function insertarJuego($nombre, $nombreImagen, $tipoImagen, $descripcion, $plataformas, $url, $generos) {
    // Conectamos a la base de datos
    require_once '../config/conexionBD.php';
    $conexion = conectarBD();
    
    $sql = "INSERT INTO juegos (id, nombre, imagen, tipo_imagen, descripcion, url, id_genero, id_plataforma) VALUES (NULL ,'$nombre', '$nombreImagen', '$tipoImagen', '$descripcion', '$url', '$generos', '$plataformas')";
    $resultado = mysqli_query($conexion, $sql);
    
    if (!$resultado) {
      die('Error al ejecutar la consulta: ' .  mysqli_error($conexion));
    }
    // mysqli_free_result($resultado); // Libera la memoria asociada al resultado
    mysqli_close($conexion); // Cierra la conexion a la base de datos
  }
?>