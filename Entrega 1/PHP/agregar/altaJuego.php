<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../estilos.css" />
    <link rel="stylesheet" href="estilosAgregar.css" />
    <link rel="icon" href="../img/joystick.png" type="image/png" />
    <title>Primera Entrega - Alta Juego</title>
  </head>
  <body>
    <header>
      <div class="header">
        <a href="#" class="logo">
          <img src="../img/joystick-color.png" alt="Icono de la pagina" />
        </a>
        <a href="#" class="nombre-pagina">
          <h1>GameStore</h1>
        </a>
      </div>
      <!-- Menu de la pagina -->
      <nav class="navbar">
        <ul class="nav-list">
          <li><a href="../index.html">Volver</a></li>
        </ul>
      </nav>
    </header>
    <!-- CONTENIDO DE LA PAGINA -->
    <main class="main">
      <div class="contenido">
        <form id="formulario-agregar" action="" method="post" class="form-agregar"> <!-- method="post"  -->
          <div>
            <label for="nombre">Nombre del juego:</label>
            <input type="text" id="nombre" name="nombre" required placeholder="Age of empire III" />
          </div>
          <div>
            <p>Imagen del juego:</p>
            <input type="file" id="imagen" name="imagen" accept="image/*" />
            <label for="imagen" id="label-imagen">Seleccione para subir un archivo imagen</label>
          </div>
          <div>
            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion" maxlength="255" placeholder="Juegazo"></textarea>
          </div>
          <div>
            <label for="plataforma">Plataforma:</label>
            <select name="plataforma" id="plataforma" multiple>
              <option value="PC" name="pc">Computadora</option>
              <option value="PS5" name="ps5">PlayStation 5</option>
              <option value="PS4" name="ps4">PlayStation 4</option>
              <option value="Xbox" name="xbox">Xbox ONE</option>
              <option value="Switch" name="switch">Nintendo Switch</option>
              <option value="Mobile" name="mobile">Mobile</option>
            </select>
          </div>
          <div>
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" maxlength="70" placeholder="https://store.steampowered.com/app/813780/Age_of_Empires_II_Definitive_Edition/"/>
          </div>
          <div>
            <label for="genero">Genero:</label>
            <select name="genero" id="genero" multiple>
              <option value="accion">Accion</option>
              <option value="aventura">Aventura</option>
              <option value="fps">FPS</option>
              <option value="terror">Terror</option>
              <option value="mmo">MMO</option>
            </select>
          </div>
          <button  >Enviar</button> <!-- type="submit"-->
        </form>
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
  <script src="js/validacion-form-agregar.js"></script>
  <script src="../js/seleccionMultiple.js"></script>
  <script src="js/uploadImagen.js"></script>
  <?php require('../php/conexion.php')?>
</html>