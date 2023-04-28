<!-- Mostramos los datos en la pagina -->
<?php foreach ($_SESSION['generos'] as $id => $nombre) { ?>
  <option value="<?= $id ?>"><?= $nombre ?></option>
<?php } ?>