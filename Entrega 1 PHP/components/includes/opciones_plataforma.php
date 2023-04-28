<!-- Mostramos los datos en la pagina -->
<?php foreach ($_SESSION['plataformas'] as $id => $nombre): ?>
  <option value="<?= $id ?>"><?= $nombre ?></option>
<?php endforeach; ?>
