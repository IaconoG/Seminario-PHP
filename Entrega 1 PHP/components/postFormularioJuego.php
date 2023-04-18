<?php
//** POST juegos credos por el formulario **/

  // Comprobamos si accedieron usando el formulario

  var_dump($_SERVER['REQUEST_METHOD']); // Muestra data del metodo de envio

  if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si accedieron usando el formulario, obtenemos la informacion del formulario
      // $_SERVER['REQUEST_METHOD'] -> Devuelve el método de solicitud utilizado para acceder a la página actual.
    // Validamos la informacion
    require 'validarPostJuegos.php';
    $valido = validarJuegos();
    
    if ($valido) { // Si la informacion es valida, la insertamos en la base de datos
      // insertarJuego($nombre, $imagen, $descripcion, $plataformas, $url, $generos);
    }
    
    unset($_POST); 
    // unset() -> Elimina la información registrada de una variable
      // Después de insertar la información en la base de datos eliminamos los datos del formulario en la superglobal $_POST.
      // Para evitar que se vuelvan a enviar accidentalmente si el usuario recarga la página o realiza otra acción que envíe nuevamente el formulario.
    // Para no quedarnos en la pagina php y poder ver los datos que se envian, redireccionamos a index.php
    // header('Location: ../index.php');  // 🛐
  }
  else { // Si no accedieron usando el formulario, redireccionamos a index.php
    // header('Location: ../index.php'); 
  }

  function insertarJuego($nombre, $imagen, $descripcion, $plataformas, $url, $generos) {
    // Conectamos a la base de datos
    include 'config/conexionBD.php';

    $sql = "INSERT INTO juegos (nombre, imagen, tipo_imagen, descripcion, url, id_genero, id_plataforma) 
    VALUES ('$nombre', '$imagen', '$imagen[type]', '$descripcion', '$url', '$generos', '$plataformas')";
    $resultado = mysqli_query($conexion, $sql);
    
    if ($resultado) {
      echo "Se inserto el juego correctamente";
    }
    else {
      echo "No se pudo insertar el juego correctamente";
    }
    mysqli_close($conexion);
  }
?>


<button type="button" onclick="location.href='../altaJuego.php'">Volver</button> <!-- liminar esta linea -->