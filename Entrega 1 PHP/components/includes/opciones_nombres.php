<!-- Mostramos los datos en la página -->
<?php foreach ($_SESSION['nombreJuegos'] as $nombreJuego) { ?>
  <option value="<?= $nombreJuego; ?>" name="<?= $nombreJuego; ?>"></option>
<?php } ?>
