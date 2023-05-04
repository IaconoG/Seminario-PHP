<?php
  //Agregamos opciones a la BD para tener como default porque no quiero agregarlo manualmente :D 
  //require('components/post/postOpciones.php'); //  Este archivo no es necesario  usar 

  session_start(); // Esta función crea o reanuda una sesión y permite el acceso a las variables de sesión a través de la superglobal
    // session_start() -> se debe llamar al comienzo de cada página que utilice variables de sesión.
    // Los datos de sesión en PHP se almacenan en el servidor.
  $pathConexion = 'config/';
  require_once('components/get/getOpcionesNombresJuegos.php');
  require_once('components/get/getOpcionesGeneros.php');
  require_once('components/get/getOpcionesPlataformas.php');
?>
<!DOCTYPE html>
<html lang="es">

<head> 
  <meta charset="UTF-8" /> <!-- Para que se muestren los caracteres especiales -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Para que se adapte a la pantalla del dispositivo -->
  <link rel="stylesheet" href="assets/css/estilos.css" />
  <link rel="stylesheet" href="components/header/header.css" />
  <link rel="stylesheet" href="components/footer/footer.css" />
  <link rel="icon" href="assets/img/joystick.png" type="image/png" />
  <title>Primera Entrega</title>
</head>

<body>
  <!-- HEADER -->
  <?php require_once('components/header/header.php') ?>
  <!-- CONTENIDO DE LA PAGINA -->
  <main class="main">
    <div class="contenido">
      <!-- Seccion que contiene los filtors del contenido -->
      <aside class="filtros">
        <h3>Filtros</h3>
        <form id="form-filtro" class="from-filtros" method="get" action="components/procesarFiltros.php"> 
          <!-- Filtro por nombre -->
          <div class="bloque-filtro-nombre">
            <label for="filtro-nombre" class="titulo-filtro">Por nombre</label>
            <input id="filtro-nombre" name="filtro-nombre" list="nombres" />
            <datalist id="nombres">
              <?php require_once('components/includes/opciones_nombres.php')?>
            </datalist>
          </div>
          <!-- Filtro por genero -->
          <div class="bloque-filtro-genero">
            <label for="filtro-generos" class="titulo-filtro">Por Genero</label>
            <select name="filtro-generos" id="filtro-generos" title="listado-plataformas">
              <option value="-1">Ninguna selección</option>
              <?php 
                $_SESSION['mostrar'] = 'generos';
                require('components/includes/opciones_mostrar.php');
              ?>
            </select>
          </div>
          <!-- Filtro por plataforma -->
          <div class="bloque-filtro-plataforma">
            <label for="filtro-plataformas" class="titulo-filtro">Por plataforma</label>
            <select name="filtro-plataformas" id="filtro-plataformas" title="listado-plataformas">
              <option value="-1">Ninguna selección</option>
              <?php
                $_SESSION['mostrar'] = 'plataformas';
                require('components/includes/opciones_mostrar.php');
              ?>
            </select>
          </div>
          <div class="ordenamiento_juego">
          <!-- Ordenamiento por A-Z -->
          <label for="filtro-ordenamiento" class="titulo-filtro">ordenamiento</label>
          <select name="filtro-ordenamiento" id="filtro-ordenamiento" title="listado-ordenamientos"> 
            <option value="-1">Ninguna selección</option>
            <option value="ASC">A - Z</option>
            <option value="DESC">Z - A</option>
          </select>
        </div>
          <input type="submit" value="Filtrar"></input>
        </form>
      </aside>
      <!-- Seccion que muestra el contenido -->
      <section class="juegos">
        <div class="bloque-juegos">
          <?php
            if (empty($_SESSION['juegosFiltrados'])) {
              require('components/listaJuegos.php');
            }
            else {
              require('components/listaJuegosFiltrados.php');
            }
          ?>
        </div>
      </section>
    </div>
  </main>
  <!-- FOOTER -->
  <?php require_once('components/footer/footer.php') ?>
</body>

<!-- scripts -->
<script src="assets/js/mostrarOpciones.js"></script>

<!-- PHP -->
<!-- Mensajes de error -->
<?php require('components/includes/displayMsg.php') ?>

</html>
