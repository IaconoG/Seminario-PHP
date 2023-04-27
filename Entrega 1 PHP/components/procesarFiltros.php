<?php 
  session_start();
  // Filtrar los juegos segun los filtros elegidos por el usuario
  
  // Comprobamos si accedieron usando el formulario
  if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Si accedieron usando el formulario, obtenemos la informacion del formulario
    // $_SERVER['REQUEST_METHOD'] -> Devuelve el método de solicitud utilizado para acceder a la página actual.

    // Obtenmos la informacion del formulario
    $filtroNombre = isset($_GET['filtro-nombre']) ? $_GET['filtro-nombre'] : '';
      // isset() -> Determina si una variable está definida y no es NULL
    $filtroGenero = isset($_GET['filtro-generos']) ? $_GET['filtro-generos'] : '';
    $filtroPlataforma = isset($_GET['filtro-plataformas']) ? $_GET['filtro-plataformas'] : '';
    $filtroOrdenamiento = isset($_GET['filtro-ordenamiento']) ? $_GET['filtro-ordenamiento'] : '';

    // filtros vacios = no seleccionados
    $allFiltrosDefault = (empty($filtroNombre) && ($filtroGenero == -1) && ($filtroPlataforma == -1));

    // Validamos que el usuario haya seleccionado al menos un filtroPlataforma
    if (($allFiltrosDefault) && ($filtroOrdenamiento == -1) && (empty($_SESSION['juegosFiltrados']))) { // Cuando no se realizo ningun filtro y no hay juegos filtrados
      $_SESSION['msg'] = "No hay nada por hacer";
    } elseif (($allFiltrosDefault) && ($filtroOrdenamiento == -1)) { // Opcion donde debemos restablecer por defecto los juegos
      unset($_SESSION['juegosFiltrados']);
      $_SESSION['msg'] = "Se restablecieron los juegos";
    } else { // Si el usuario selecciono al menos un filtro, filtramos los juegos      
      if ($filtroGenero == -1) $filtroGenero = ''; // Para que no sea -1 parte de la consulta
      if ($filtroPlataforma == -1) $filtroPlataforma = ''; // Para que no sea -1 parte de la consulta
      if ($filtroOrdenamiento == -1) $filtroOrdenamiento = ''; // Para que no sea -1 parte de la consulta

      // Conectamos a la base de datos
      require_once '../config/conexionBD.php';
      $conexion = conectarBD();
      // Consulta para obtener los juegos
        // Concatenamos la consulta con los filtros elegidos por el usuario utiilizando WHERE
        // WHERE -> filtra los registros de una tabla
        // like -> buscar un patrón específico en una columna.
          // % -> representa cero, uno o varios caracteres
      $sql = "SELECT * FROM juegos";

      // - Filtros
      if (!empty($filtroNombre) || !empty($filtroGenero) || !empty($filtroPlataforma)) { // Si el usuario ingreso algun tipo de filtro, agregamos un WHERE a la consulta
        $sql .= " WHERE ";
        if (!empty($filtroNombre)) { // Si el usuario ingreso un nombre, lo agregamos a la consulta
          $filtroNombre = mysqli_real_escape_string($conexion, $filtroNombre); // mysqli_real_escape_string($conexion, var) -> Escapa los caracteres especiales de una cadena 
          $sql .= "nombre LIKE '%$filtroNombre%' "; // % -> representa cero, uno o varios caracteres
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
      } 
      // - Ordenamiento
      if (!empty($filtroOrdenamiento)) {
        $sql .= " ORDER BY nombre $filtroOrdenamiento";
      }

      // Ejecutamos la consulta
      $resultadoJuegos = mysqli_query($conexion, $sql);
      if (!$resultadoJuegos) {
        echo '<script>alert("Error al ejecutar la consulta: ' .  mysqli_error($conexion) . '")</script>';
        die();
      }

      if (mysqli_num_rows($resultadoJuegos) == 0) { // Si no se encontraron juegos con los filtros seleccionados
        if (!$allFiltrosDefault) {
          $msg = 'No se encontraron juegos con los filtros seleccionados:\n'
            .' Nombre: '.$filtroNombre.'\n'
            .' Género: '.$_SESSION['generos'][$filtroGenero].'\n'
            .' Plataforma: '.$_SESSION['plataformas'][$filtroPlataforma].'\n';
        } else {
          $msg = 'No se puede hacer ordenamietno debido a que no hay juegos cargados';
        }
        $_SESSION['msg'] = $msg;
      } else { 
        // Almacenamos los juegos filtrados en un arreglo
        $juegosFiltrados = array();
        while ($juego = mysqli_fetch_assoc($resultadoJuegos)) {
          $juegosFiltrados[] = $juego;
        }
        $_SESSION['juegosFiltrados'] = $juegosFiltrados;
        $_SESSION['msg'] = "Filtro realizado con exito";
      }
    }
  } else { // Si accedieron a este archivo sin usar el formulario, los redireccionamos al index
    $_SESSION['msg'] = "Acceso no autorizado";
  }
header('Location: ../index.php');
exit; 
  
