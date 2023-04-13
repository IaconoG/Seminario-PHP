
/* Obtenemos la referencia al formulario */
const formulario = document.getElementById("formulario-agregar");

/* Agregamos un evento al submit para validar los datos */
// formulario.addEventListener('submit', function(e) {
//   e.preventDefault(); // Evitamos que se envíe el formulario si no pasa la validación
// });


/* Función para validar el formulario */

function validarFormulario() {
  function estiloCondicion(condicion, elemento) {
    if (condicion) {
      elemento.style.border = "1px solid green";
      return true; // paso la validacion
    } else {
      elemento.style.border = "1px solid red";
      return false; // NO paso la validacion
    }
  }
  // Validamos que el campo nombre no esté vacío
  const nombre = formulario.elements.nombre;
  estiloCondicion(nombre.value !== "", nombre);

  // Validamos el tipo de imagen
  const elementoImagen = formulario.elements.imagen;
  const imagen = elementoImagen.files[0]; // obtenemos el primer archivo
  let condicion = false;
  if (imagen !== undefined) {
    const imagenType = /^image\//; // expresion regular para validar que sea una imagen
    condicion = imagenType.test(imagen.type);
  }
  const labelImagen = document.getElementById("label-imagen");
  estiloCondicion(condicion, labelImagen);

  // Validamos que el campo descripcion no supere los 255 caracteres
  const descripcion = formulario.elements.descripcion;
  estiloCondicion(descripcion.value.length < 255, descripcion);

  // Validamos seleccion de opciones plataforma
  const plataforma = formulario.elements.plataforma;
  const opcionesPlataforma = Array.from(plataforma.options);
  const opcionesPlataformaSeleccionadas = opcionesPlataforma.filter(
    (opcion) => opcion.selected
  );
  estiloCondicion(opcionesPlataformaSeleccionadas.length !== 0, plataforma);

  // Validamos que el campo url no supere los 80 caracteres
  const url = formulario.elements.url;
  estiloCondicion(url.value.length < 80, url);

  // Validamos seleccion de opciones genero
  const genero = formulario.elements.genero;
  const opcionesGenero = Array.from(genero.options);
  const opcionesGeneroSeleccionadas = opcionesGenero.filter(
    (opcion) => opcion.selected
  );
  estiloCondicion(opcionesGeneroSeleccionadas.length !== 0, genero);
}


