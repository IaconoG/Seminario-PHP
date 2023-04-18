<?php
/*
    $_POST -> array asociativo que contiene los valores enviados por el método POST
    se utiliza para obtener datos de un formulario HTML a través de una solicitud HTTP POST. 
    Los datos se envían en el cuerpo de la solicitud HTTP, por lo que no son visibles para el usuario
  */
  echo '<br>';

  function  validarJuegos() {
    echo "Validando los juegos...<br>";
    $valido = true;
    $errores = array();

    // Obtenemos la informacion del formulario
    $nombre = htmlspecialchars($_POST['nombre']);  // htmlspecialchars() -> Convierte caracteres especiales en sus entidades HTML equivalentes. Esta función es útil cuando se trabaja con datos que se muestran en una página web, como nombres de usuario, mensajes de correo electrónico, comentarios, entre otros.
    $imagen = (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) ? $_FILES['imagen'] : ''; 
      // isset() -> Verifica si una variable está definida y no es NULL
      // $_FILES['imagen']['error'] -> Contiene el código de error de la subida del archivo
      // UPLOAD_ERR_OK -> Constante que indica que el archivo se subió correctamente
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $plataformas = (isset($_POST['plataformas'])) ? $_POST['plataformas'] : '';
    $url = htmlspecialchars($_POST['url']);
    $generos = (isset($_POST['generos'])) ? $_POST['generos'] : '';

    // Validamos el nombre
    if (empty($nombre)) {
      $valido = false;
      $errores[] = 'El nombre no puede estar vacio';
    }
    // Validamos la imagen
    if (empty($imagen)) {
      $valido = false;
      $errores[] = 'La imagen no puede estar vacia';
    } elseif ($imagen['type'] != 'application/octet-stream') {
      // Verificar que el tipo de archivo sea BLOB
      $valido = false;
      $errores[] = "La imagen debe ser de tipo BLOB.";
    }

    // Validamos la descripcion
    if (strlen($descripcion) > 255) { // strlen() -> Devuelve la longitud de una cadena
      $valido = false;
      $errores[] = 'La descripcion no puede tener mas de 255 caracteres';
    }

    // Validamos las plataformas
    if (empty($plataformas)) {
      $valido = false;
      $errores[] = 'Debe seleccionar al menos una plataforma';
    }
    
    // Validamos la url
    if (strlen($url) > 80) {
      $valido = false;
      $errores[] = 'La url no puede tener mas de 80 caracteres';
    }
  
    // Validamos los generos
    if (empty($generos)) {
      $valido = false;
      $errores[] = 'Debe seleccionar al menos un genero';
    } 

    // Mostramos los errores
    if (!$valido) {
      // Si hay errores, imprimir los mensajes de error en la consola
      echo "No se pudo validar el formulario. Errores: <br>";
      foreach ($errores as $error) {
        echo " - $error<br>";
      }

    }

    return $valido;
  }



