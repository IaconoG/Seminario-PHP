<?php
//** Get juegos para mostrar en la pagina **/

  // Conectamos a la base de datos
  include 'config/conexionBD.php';

  $sql = "SELECT * FROM juegos";
  $resultado = mysqli_query($conexion, $sql);

  if (!$resultado) {
    echo '<script>console.error("Error al ejecutar la consulta: ' .  mysqli_error($conexion) . '")</script>';
    die();
  }

  while ($juego = mysqli_fetch_assoc($resultado)) {
    echo "<div class='juego' id='" . $juego['nombre'] . "'>";
      echo '<div class="header-juego">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($juego['imagen']) . '" alt="Portada del ' . $juego['nombre'] . '">';
      echo '</div>';
      echo '<div class="contenido-juego">';
        echo '<div class="contenedor-titulo-juego">';
          echo '<p class="titulo-juego">' . $juego['nombre'] . '</p>';
          echo '<div class="subrallado"></div>';
        echo '</div>';
        echo '<p class="descripcion-juego">' . $juego['descripcion'] . '</p>';
        echo '<div>';
          echo '<p class="contenido-subtitulo">Plataforma</p>';
          echo '<ul class="plataformas-juego">';
            echo '<li>' . $juego['plataforma'] . '</li>';
          echo '</ul>';
        echo '</div>'; 
        echo '<div>';
          echo '<p class="url-juego contenido-subtitulo">Pagina oficial</p>';
          echo '<ul class="generos-juego">';
            echo '<li>' . $juego['url'] . '</li>';
          echo '</ul>';
        echo '</div>';
        echo '<div>';
          echo '<p class="contenido-subtitulo">Generos</p>';
          echo '<ul class="generos-juego">';
            echo '<li>' . $juego['genero'] . '</li>';
          echo '</ul>';
        echo '</div>';  
      echo '</div>';    
    echo '</div>';
  }

  mysqli_free_result($resultado); // Libera la memoria asociada al resultado
  mysqli_close($conexion); // Cierra la conexion a la base de datos