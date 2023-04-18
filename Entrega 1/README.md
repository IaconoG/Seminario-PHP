# Bibliografia utilizada

 - mysqli_fetch_assoc()
  - https://www.w3schools.com/PHP/func_mysqli_fetch_assoc.asp

 - superglobal 
  - https://www.w3schools.com/php/php_superglobals.asp

  


# TODO
  - Crear el agregar juegos (/agregar/php/BD_AgregarJuegos.php)
  - Mostrar los juegos de la base de datos (BD_MostrarJuegos.php) todos
  - 
  - 
  - Filtrar los juegos (BD_FiltrarJuegos.php) esto a lo ultimo porq ni idea como

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