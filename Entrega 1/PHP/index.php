<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilos.css" />
  <link rel="icon" href="img/joystick.png" type="image/png" />
  <title>Primera Entrega</title>
</head>

<body>
  <header>
    <div class="header">
      <a href="#" class="logo">
        <img src="img/joystick-color.png" alt="Icono de la pagina" />
      </a>
      <a href="#" class="nombre-pagina">
        <h1>GameStore</h1>
      </a>
    </div>
    <!-- Menu de la pagina -->
    <nav class="navbar">
      <ul class="nav-list">
        <li><a href="agregar/altaJuego.html">Agregar Juego</a></li>
        <li><a href="#eliminar">Elimnar Juego</a></li>
        <li><a href="#actualizar">Actualizar Juego</a></li>
      </ul>
    </nav>
  </header>
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
              <option value="God Of War"></option>
              <option value="Assassin's Creed"></option>
              <option value="Destiny"></option>
              <option value="Grand Theft Auto"></option>
              <option value="Counter-Strike Global Offensive"></option>
            </datalist>
          </div>
          <!-- Filtro por genero -->
          <div class="bloque-filtro-genero">
            <p id="por-genero" class="titulo-filtro">Por genero</p>
            <div name="filtro-genero[]" id="filtro-genero" class="contenedor-opciones-filtro-genero">
              <label for="front-end-projects" class="">
                <input type="checkbox" name="user-prefer" id="front-end-projects" class="" value="front-end-projects" />
                Front-end Projects
              </label>
              <label for="predeterminado">
                <input type="checkbox" name="predeterminado" value="default" id="predeterminado" />Predeterminado
              </label>
              <label for="accion">
                <input type="checkbox" name="accion" value="accion" id="accion" />Accion
              </label>
              <label for="aventura">
                <input type="checkbox" name="aventura" value="aventura" id="aventura " />Aventura
              </label>
              <label for="fps">
                <input type="checkbox" name="fps" value="fps" id="fps " />FPS
              </label>
              <label for="terror">
                <input type="checkbox" name="terror" value="terror" id="terror" />Terror
              </label>
              <label for="mmo">
                <input type="checkbox" name="mmo" value="mmo" id="mmo" />MMO
              </label>
            </div>
          </div>
          <!-- Filtro por plataforma -->
          <div class="bloque-filtro-plataforma">
            <label for="filtro-plataforma" class="titulo-filtro">Por plataforma</label>
            <select name="filtro-plataforma" id="filtro-plataforma" multiple>
              <option value="PC">Computadora</option>
              <option value="PS5">PlayStation 5</option>
              <option value="PS4">PlayStation 4</option>
              <option value="Xbox">Xbox ONE</option>
              <option value="Switch">Nintendo Switch</option>
              <option value="Mobile">Mobile</option>
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
  <footer>
    <div class="footer-contenido">
      <p>Iacono Gianfranco & ~ 2023</p>
      <!-- fehc actual? la podemos pedir con php o js? -->
    </div>
  </footer>
</body>
<script src="js/seleccionMultiple.js"></script>
<?php require('php/BD_InsertarOpciones.php') ?>

</html>