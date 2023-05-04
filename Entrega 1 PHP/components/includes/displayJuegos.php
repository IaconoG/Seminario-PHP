<!-- ?= es lo mismo que hacer ?php echo pero mas lindo || se llama short echo tag -->
<div class='juego' id='<?= $juego["nombre"] ?>'>
  <div class="header-juego">
    <img src="data:<?= $juego['tipo_imagen'] ?>;base64,<?= $juego['imagen'] ?>" alt="Portada del <?= $juego['nombre'] ?>" loading="lazy">
  </div>
  <div class="contenido-juego">
    <div class="contenedor-titulo-juego">
      <p class="titulo-juego"><?= $juego['nombre'] ?></p>
      <div class="subrallado"></div>
    </div>
    <p class="descripcion-juego"><?= $juego['descripcion'] ?></p>
    <div>
      <p class="contenido-subtitulo">plataforma</p>
      <ul class="plataformas-juego">
        <li><?= $_SESSION['plataformas'][$juego['id_plataforma']] ?></li>
      </ul>
    </div>
    <div>
      <p class="url-juego contenido-subtitulo">pagina oficial</p>
      <ul class="url-juego">
        <li class="url">
          <a href="<?= $juego['url'] ?>" target="_blank"><?= $juego['url'] ?></a>
        </li>
      </ul>
    </div>
    <div>
      <p class="contenido-subtitulo">genero</p>
      <ul class="generos-juego">
        <li><?= $_SESSION['generos'][$juego['id_genero']] ?></li>
      </ul>
    </div>
  </div>
</div>





