<?php
  /*
    $_POST -> array asociativo que contiene los valores enviados por el método POST
    se utiliza para obtener datos de un formulario HTML a través de una solicitud HTTP POST. 
    Los datos se envían en el cuerpo de la solicitud HTTP, por lo que no son visibles para el usuario
  */
  $valido = true;
  $errores = array();

  // == Obtenemos la informacion del formulario ==
  $nombre = htmlspecialchars($_POST['nombre']);  // htmlspecialchars() -> Convierte caracteres especiales en sus entidades HTML equivalentes. Esta función es útil cuando se trabaja con datos que se muestran en una página web, como nombres de usuario, mensajes de correo electrónico, comentarios, entre otros.
  $imagen = (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) ? $_FILES['imagen'] : ''; 
    // isset() -> Verifica si una variable está definida y no es NULL
    // $_FILES['imagen']['error'] -> Contiene el código de error de la subida del archivo
    // UPLOAD_ERR_OK -> Constante que indica que el archivo se subió correctamente
  if ($imagen != '') {
    $tipoImagen = $imagen['type'];   
    $tempFile = $imagen['tmp_name']; // Obtenemos la ubicacion temporal del archivo 
    $contenImg = file_get_contents($tempFile); // Obtenemos el contenido del archivo
    $nombreImagen = base64_encode($contenImg); // Codificamos el contenido del archivo en base64 (nos da ese texto gigante)
  }
  $descripcion = htmlspecialchars($_POST['descripcion']);
  $plataformas = (isset($_POST['plataformas'])) ? $_POST['plataformas'] : ''; 
  $url = htmlspecialchars($_POST['url']);
  $generos = (isset($_POST['generos'])) ? $_POST['generos'] : '';


  // == Validamos los datos ==
  // Validamos el nombre
  if (empty($nombre)) {
    $valido = false;
    $errores[] = 'El nombre no puede estar vacio';
  }

  // Validamos la imagen
  if (empty($imagen)) {
    $valido = false;
    $errores[] = 'La imagen no puede estar vacia';
  } else {
    $tiposImage = array('image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'image/svg+xml'); // Creamos un array con los tipos de imagenes permitidos
    if (!in_array($tipoImagen, $tiposImage)) { // in_array() -> Comprueba si un valor existe en un array
      $valido = false;
      $errores[] = "La imagen debe ser de tipo BLOB.";
    } else {
      require_once('get/getMaxCharImgBD.php'); // Incluimos el codigo para obtener el maximo de caracteres de la catergoria imagen
      $maxChar = maxCaracterImg(); // Obtenemos el maximo de caracteres de la catergoria imagen
      if (strlen($nombreImagen) > $maxChar) { // nombre de img ya codificado en base64
        $valido = false;
        $errores[] = "La imagen es demasiado grande. ";
      }
    }
  }

  // Validamos la descripcion
  if (empty($descripcion)) {
    $valido = false;
    $errores[] = 'La descripcion no puede estar vacia';
  }
  if (strlen($descripcion) > 255) { // strlen() -> Devuelve la longitud de una cadena
    $valido = false;
    $errores[] = 'La descripcion no puede tener mas de 255 caracteres';
  }

  // Validamos las plataformas
  if (empty($plataformas)) {
    $valido = false;
    $errores[] = 'Debe seleccionar al una plataforma';
  }
  
  // Validamos la url
  if (empty($url)) {
    $valido = false;
    $errores[] = 'La url no puede estar vacia';
  }
  if (strlen($url) > 80) {
    $valido = false;
    $errores[] = 'La url no puede tener mas de 80 caracteres';
  }

  // Validamos los generos
  if (empty($generos)) {
    $valido = false;
    $errores[] = 'Debe seleccionar al un genero';
  } 





