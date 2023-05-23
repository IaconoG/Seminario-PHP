<!-- Mostramos los nombres en el datalist -->
<?php foreach ($_SESSION['nombreJuegos'] as $nombreJuego) { ?>
  <option value="<?= $nombreJuego; ?>" name="<?= $nombreJuego; ?>"></option>
<?php } ?>
