<?php
  // Mostramos los datos en la pagina
  foreach ($_SESSION['plataformas'] as $id => $nombre) {
    echo '<option value="' . $id . '">' . $nombre . '</option>';
  }
