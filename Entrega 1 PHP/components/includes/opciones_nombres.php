<?php
    // Mostramos los datos en la pagina
  foreach ($_SESSION['nombreJuegos'] as $nombreJuego) {
    echo "<option value=\"$nombreJuego\" name=\"$nombreJuego\"></option>";
  }
