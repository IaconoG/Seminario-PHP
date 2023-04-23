<?php 
  session_start();
  // Filtrar los juegos segun los filtros elegidos por el usuario
  // Esto al final porque no tengo idea de como hacerlo :D
  
  // Comprobamos si accedieron usando el formulario
  if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Si accedieron usando el formulario, obtenemos la informacion del formulario
    // $_SERVER['REQUEST_METHOD'] -> Devuelve el método de solicitud utilizado para acceder a la página actual.

    // Obtenmos la informacion del formulario
    $filtroNombre = isset($_GET['filtro-nombre']) ? $_GET['filtro-nombre'] : '';
      // isset() -> Determina si una variable está definida y no es NULL
    $filtroGenero = isset($_GET['filtro-generos']) ? $_GET['filtro-generos'] : '';
    $filtroPlataforma = isset($_GET['filtro-plataformas']) ? $_GET['filtro-plataformas'] : '';

    // Validamos que el usuario haya seleccionado al menos un filtroPlataforma
    if (empty($filtroNombre) && empty($filtroGenero) && empty($plataforma)) {
      $_SESSION['msg'] = "Debe seleccionar al menos un filtro";
    } elseif (empty($filtroNombre) && ($filtroGenero == -1) && ($filtroPlataforma == -1)) { // Opcion donde debemos restablecer por defecto los juegos
      unset($_SESSION['juegosFiltrados']);
    } else { // Si el usuario selecciono al menos un filtro, filtramos los juegos      
      if ($filtroGenero == -1) $filtroGenero = ''; // Para que no sea -1 parte de la consulta
      if ($filtroPlataforma == -1) $filtroPlataforma = ''; // Para que no sea -1 parte de la consulta

      // Conectamos a la base de datos
      require '../config/conexionBD.php';
      // Consulta para obtener los juegos
        // Concatenamos la consulta con los filtros elegidos por el usuario utiilizando WHERE
        // WHERE -> filtra los registros de una tabla
        // like -> buscar un patrón específico en una columna.
          // % -> representa cero, uno o varios caracteres
      $sql = "SELECT * FROM juegos WHERE ";

      if (!empty($filtroNombre)) { // Si el usuario ingreso un nombre, lo agregamos a la consulta
        $sql .= "nombre LIKE '%$filtroNombre%' ";
      }
      if (!empty($filtroGenero)) {
        if (!empty($filtroNombre)) { // Si el usuario ingreso un nombre, agregamos un AND a la consulta
          $sql .= "AND ";
        }
        $sql .= "id_genero = '$filtroGenero' ";
      }
      if (!empty($filtroPlataforma)) {
        if (!empty($filtroNombre) || !empty($filtroGenero)) { // Si el usuario ingreso un nombre o un genero, agregamos un AND a la consulta
          $sql .= "AND ";
        }
        $sql .= "id_plataforma = '$filtroPlataforma' ";
      }      
      // Ejecutamos la consulta
      $resultadoJuegos = mysqli_query($conexion, $sql);
      if (!$resultadoJuegos) {
        echo '<script>alert("Error al ejecutar la consulta: ' .  mysqli_error($conexion) . '")</script>';
        die();
      }

      if (mysqli_num_rows($resultadoJuegos) == 0) { // Si no se encontraron juegos con los filtros seleccionados
        $msg = 'No se encontraron juegos con los filtros seleccionados:\n'
          .' Nombre: '.$filtroNombre.'\n'
          .' Género: '.$filtroGenero.'\n'
          .' Plataforma: '.$filtroPlataforma.'\n';
        
        $_SESSION['msg'] = $msg;
      } else { 
        // Almacenamos los juegos filtrados en un arreglo
        $juegosFiltrados = array();
        while ($juego = mysqli_fetch_assoc($resultadoJuegos)) {
          $juegosFiltrados[] = $juego;
        }
        $_SESSION['juegosFiltrados'] = $juegosFiltrados;
      }
    }
  } else { // Si accedieron a este archivo sin usar el formulario, los redireccionamos al index
    $_SESSION['msg'] = "Acceso no autorizado";
  }
header('Location: ../index.php');
exit; 
  