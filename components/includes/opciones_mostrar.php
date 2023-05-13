<!-- Mostramos los datos en los select de generos o platafomra segun la varible -->

<?php foreach ($_SESSION[$_SESSION['mostrar']] as $id => $nombre) { ?>
  <option value="<?= $id ?>"><?= $nombre ?></option>
<?php } ?>