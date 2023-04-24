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
  <link rel="stylesheet" href="assets/css/estilosAgregar.css" />
  <link rel="stylesheet" href="components/header/header.css" />
  <link rel="stylesheet" href="components/footer/footer.css" />
  <link rel="icon" href="assets/img/joystick.png" type="image/png" />
  <title>Primera Entrega - Alta Juego</title>
</head>

<body>
  <!-- HEADER -->
  <?php require_once('components/header/header.php') ?>
  <!-- CONTENIDO DE LA PAGINA -->
  <main class="main">
    <div class="contenido">
      <form id="formulario-agregar" class="form-agregar" enctype="multipart/form-data" action="components/postFormularioJuego.php" method="post" >
        <!-- enctype="multipart/form-data -> para que PHP pueda reconocer el archivo cuando usamos imput type="file" -->
        <div>
          <label for="nombre">Nombre del juego:</label>
          <input type="text" id="nombre" name="nombre" placeholder="Age of empire III"/>
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
          <select name="plataformas" id="plataformas" title="listado-plataformas" multiple> 
            <?php require_once('components/includes/opciones_plataforma.php') ?>
          </select>
        </div>
        <div>
          <label for="url">URL:</label>
          <input type="text" id="url" name="url" maxlength="70"placeholder="https://www.ageofempires.com/games/aoeiiide"/>
          
        </div>
        <div>
          <label for="genero">Genero:</label>
          <select name="generos" id="generos" title="listado-generos" multiple>
            <?php require_once('components/includes/opciones_genero.php') ?>
          </select>
        </div>
        <input type="submit" value="Enviar" onclick="validarFormulario()" ></input>
      </form>
    </div>
  </main>
  <!-- FOOTER -->
  <?php require_once('components/footer/footer.php') ?>
</body>
<!-- SCRIPTS -->
<!-- <script src="assets/js/seleccionMultiple.js"></script> -->
<script src="assets/js/uploadImagen.js"></script>
<script src="assets/js/validacion-form-agregar.js"></script>

<!-- PHP -->
<?php 
  if (!empty($_SESSION['msg'])) {
    echo "<script>alert('".$_SESSION['msg']."')</script>";
    unset($_SESSION['msg']);
  } 
?>
</html>