# Paginas utilizadas
  - Colores
    - https://randoma11y.com/
  
## Leer sobre
  - FOMRS
    - input[name=""]: nombre de refencia cunado se envia el formulario

  - VARIABLES SUPERGLOBALES
  - estructura de carpetas que se asemeje a un patrón de diseño MVC (Modelo-Vista-Controlador)
  - action="<? echo $_SERVER["PHP_SELF"];?>" (para que sirve?)
    - La variable superglobal $_SERVER["PHP_SELF"] devuelve el nombre del archivo actual que se está ejecutando, incluyendo la ruta relativa desde la raíz del servidor web.
    En el caso de un formulario, se utiliza en el atributo action del elemento form para especificar la página a la que se enviarán los datos del formulario cuando se envíe.
    En este caso, cuando se envía el formulario, se enviará a la misma página en la que se encuentra el formulario ($_SERVER["PHP_SELF"]), y la acción de la página se procesará en el mismo archivo de PHP.
  
  - htmlspecialchars



# Infromacion Entrega 1

## Post formulario de juegos
  - altaJuego.php
    - components/postFormularioJuego.php
    - components/validarPostJuegos.php
    - assets/css/estilosAgeregarJuego.css
    - assets/js/validacion-form-agregar.js
    - assets/js/uploadImagen.js
    - assets/js/mostrarOpciones.js

## Pagina princiapl
  - index.php
    - components/listaJuegos.php
    - components/includes/displayJuegos.php
    - components/includes/displayMsg.php
    - assets/css/estilos.css
    - components/header/header.php
      - components/header/header.css
    - components/footer/footer.php
      - components/footer/footer.css

## Filtros de juegos
  - index.php
    - components/listaJuegosFiltrados.php
      - components/procesarFiltros.php
  ### Visual
    - components/get/getOpcionesGeneros.php
    - components/get/getOpcionesPlataformas.php
    - components/get/getOpcionesNombresJuegos.php
    - components/includes/opciones_genero.php
    - components/includes/opciones_plataforma.php
    - components/includes/opciones_nombre_juego.php
    - assets/js/mostrarOpciones.js