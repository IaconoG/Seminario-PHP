<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/estilos.css" />
  <link rel="stylesheet" href="components/header/header.css" />
  <link rel="stylesheet" href="components/footer/footer.css" />
  <link rel="icon" href="assets/img/joystick.png" type="image/png" />
  <title>Primera Entrega</title>
</head>

<body>
  <!-- HEADER -->
  <?php require('components/header/header.php') ?>
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
              <?php require('components/get/getOpcionesNombresJuegos.php')?>
            </datalist>
          </div>
          <!-- Filtro por genero -->
          <div class="bloque-filtro-genero">
            <label for="filtro-generos" class="titulo-filtro">Por Genero</label>
            <select name="filtro-generos" id="filtro-generos" title="listado-plataformas" size="2">
              <option value="-1">Ninguna selección</option>
              <?php require('components/mostrarDatos/opciones_genero.php') ?>
            </select>
          </div>
          <!-- Filtro por plataforma -->
          <div class="bloque-filtro-plataforma">
            <label for="filtro-plataformas" class="titulo-filtro">Por plataforma</label>
            <select name="filtro-plataformas" id="filtro-plataformas" title="listado-plataformas" size="2">
              <option value="-1">Ninguna selección</option>
              <?php require('components/mostrarDatos/opciones_plataforma.php') ?>
            </select>
          </div>
          <input type="submit" value="Filtrar"></input>
        </form>
        <!-- Ordenamiento por A-Z -->
      </aside>
      <!-- Seccion que muestra el contenido -->
      <section class="juegos">
        <div class="ordenamiento_juego">
          <label for="ordenamiento-A_Z">ordenamiento</label>
          <select name="ordenamiento-A_Z" id="ordenamiento-A_Z" >
            <option value="default" selected>...</option>
            <option value="A-Z">A-Z</option>
            <option value="Z-A">Z-A</option>
          </select>
        </div>
        <div class="bloque-juegos">
          <?php
            if (empty($_SESSION['juegosFiltrados'])) {
              require('components/listaJuegos.php');
            }
            else {
              require('components/listaJuegosFiltrados.php');
              unset($_SESSION['juegosFiltrados']); // Limpiamos la variable de sesion
            }
          ?>
        </div>
      </section>
    </div>
  </main>
  <!-- FOOTER -->
  <?php require('components/footer/footer.php') ?>
</body>

<!-- PHP -->
<!-- Agregamos opciones a la BD para tener como default porque no quiero agregarlo a mano -->
<? // php require('components/post/postOpciones.php') ?>
<?php 
  if (!empty($_SESSION['msg'])) {
    echo "<script>alert('".$_SESSION['msg']."')</script>";
    unset($_SESSION['msg']);
  } 
?>

</html>

<!-- TODO: Creo q lo ultimo q falta es el ordenamietno q me parece mejor por js pero vamos a hacerlor por php. Hacer un from aparte para el ordenamiento -->

