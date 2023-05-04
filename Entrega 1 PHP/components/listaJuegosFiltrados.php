<?php
  //** Get juegos para mostrar en la pagina **/
  // Recorremos la lista de juegos filtrados pasados por la variable global $_SESSION['juegosFiltrados']

  foreach ($_SESSION['juegosFiltrados'] as $juego) {
    require 'includes/displayJuegos.php';

  }
  