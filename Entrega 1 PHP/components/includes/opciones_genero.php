<?php
    // Mostramos los datos en la pagina
  foreach ($_SESSION['generos'] as $id => $nombre) {
    echo "<option value='$id'>$nombre</option>";
  }
