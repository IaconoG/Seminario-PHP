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
        <form id="form-filtro" class="from-filtros" method="get"> <!-- action="procesar_filtros.php" -->
          <!-- Filtro por nombre -->
          <div class="bloque-filtro-nombre">
            <label for="filtro-nombre" class="titulo-filtro">Por nombre</label>
            <input id="filtro-nombre" name="filtro-nombre" list="nombres" />
            <datalist id="nombres">
              <!-- <?php require('components/get/getOpcionesNombresJuegos.php')?> -->
              <option value="God Of War"></option>
              <option value="Assassin's Creed"></option>
              <option value="Destiny"></option>
              <option value="Grand Theft Auto"></option>
              <option value="Counter-Strike Global Offensive"></option>
            </datalist>
          </div>
          <!-- Filtro por genero -->
          <div class="bloque-filtro-genero">
            <label for="filtro-generos" class="titulo-filtro">Por Genero</label>
            <select name="filtro-generos" id="filtro-generos" title="listado-plataformas" multiple>
              <?php require('components/get/getOpcionesGeneros.php') ?>
            </select>
          </div>
          <!-- Filtro por plataforma -->
          <div class="bloque-filtro-plataforma">
            <label for="filtro-plataformas" class="titulo-filtro">Por plataforma</label>
            <select name="filtro-plataformas" id="filtro-plataformas" title="listado-plataformas" multiple>
              <?php require('components/get/getOpcionesPlataformas.php') ?>
            </select>
          </div>
          <button class="btn-filtrar">Filtrar</button>
        </form>
        <!-- Ordenamiento por A-Z -->
      </aside>
      <!-- Seccion que muestra el contenido -->
      <section class="juegos">
        <div class="ordenamiento_juego">
          <label for="ordenamiento-A_Z">ordenamiento</label>
          <select name="ordenamiento-A_Z" id="ordenamiento-A_Z">
            <option value="default" selected>...</option>
            <option value="A-Z">A-Z</option>
            <option value="Z-A">Z-A</option>
          </select>
        </div>
        <div class="bloque-juegos">
          <require src="components/listaJuegos.php"></require>
          <div class="juego" id="juego-god_of_war">
            <div class="header-juego">
              <img src="https://gamingdebates.com/wp-content/uploads/2020/12/capsule_616x353-2-1000x600.jpg?v=1607185166" alt="Portada del juego God Of War" />
            </div>
            <div class="contenido-juego">
              <div class="contenedor-titulo-juego">
                <p class="titulo-juego">God Of War</p>
                <div class="subrallado"></div>
              </div>
              <p class="descripcion-juego">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Eligendi nisi cum corrupti omnis modi corporis ab reiciendis
                provident ad nemo, a ratione consequatur quibusdam magnam!
                Blanditiis, rerum quisquam. Rem, dicta.
              </p>
              <div>
                <p class="contenido-subtitulo">Plataforma</p>
                <ul class="plataformas-juego">
                  <li>PC</li>
                  <li>PS5</li>
                  <li>PS4</li>
                  <li>Xbox ONE</li>
                </ul>
              </div>
              <div>
                <p class="url-juego contenido-subtitulo">Pagina oficial</p>
                <ul class="generos-juego">
                  <li>...</li>
                </ul>
              </div>
              <div>
                <p class="contenido-subtitulo">Generos</p>
                <ul class="generos-juego">
                  <li>Accion</li>
                  <li>Aventura</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="juego" id="juego-god_of_war">
            <div class="header-juego">
              <img src="https://gamingdebates.com/wp-content/uploads/2020/12/capsule_616x353-2-1000x600.jpg?v=1607185166" alt="Portada del juego God Of War" />
            </div>
            <div class="contenido-juego">
              <div class="contenedor-titulo-juego">
                <p class="titulo-juego">God Of War</p>
                <div class="subrallado"></div>
              </div>
              <p class="descripcion-juego">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Eligendi nisi cum corrupti omnis modi corporis ab reiciendis
                provident ad nemo, a ratione consequatur quibusdam magnam!
                Blanditiis, rerum quisquam. Rem, dicta.
              </p>
              <div>
                <p class="contenido-subtitulo">Plataforma</p>
                <ul class="plataformas-juego">
                  <li>PC</li>
                  <li>PS5</li>
                  <li>PS4</li>
                  <li>Xbox ONE</li>
                </ul>
              </div>
              <div>
                <p class="url-juego contenido-subtitulo">Pagina oficial</p>
                <ul class="generos-juego">
                  <li>...</li>
                </ul>
              </div>
              <div>
                <p class="contenido-subtitulo">Generos</p>
                <ul class="generos-juego">
                  <li>Accion</li>
                  <li>Aventura</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="juego" id="juego-god_of_war">
            <div class="header-juego">
              <img src="https://gamingdebates.com/wp-content/uploads/2020/12/capsule_616x353-2-1000x600.jpg?v=1607185166" alt="Portada del juego God Of War" />
            </div>
            <div class="contenido-juego">
              <div class="contenedor-titulo-juego">
                <p class="titulo-juego">God Of War</p>
                <div class="subrallado"></div>
              </div>
              <p class="descripcion-juego">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Eligendi nisi cum corrupti omnis modi corporis ab reiciendis
                provident ad nemo, a ratione consequatur quibusdam magnam!
                Blanditiis, rerum quisquam. Rem, dicta.
              </p>
              <div>
                <p class="contenido-subtitulo">Plataforma</p>
                <ul class="plataformas-juego">
                  <li>PC</li>
                  <li>PS5</li>
                  <li>PS4</li>
                  <li>Xbox ONE</li>
                </ul>
              </div>
              <div>
                <p class="url-juego contenido-subtitulo">Pagina oficial</p>
                <ul class="generos-juego">
                  <li>...</li>
                </ul>
              </div>
              <div>
                <p class="contenido-subtitulo">Generos</p>
                <ul class="generos-juego">
                  <li>Accion</li>
                  <li>Aventura</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <!-- FOOTER -->
  <?php require('components/footer/footer.php') ?>
</body>

<!-- SCRIPTS -->
<!-- <script src="assets/js/seleccionMultiple.js"></script> -->

<!-- PHP -->
<!-- Agregamos opciones a la BD para tener como default porque no quiero agregarlo a mano
<!-- <?php require('components/post/postOpciones.php') ?> Este es para tener opcionees por defecto sin tener q crearlas de la BD -->


<!-- <?php require('php/pruebas.php') ?> -->


</html>