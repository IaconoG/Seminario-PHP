/* Obtenemos la referencia al formulario */
const formulario = document.getElementById("formulario-agregar");



/* Función para "validar" el formulario */
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
      // ^ -> comienza con
      // image -> contiene la palabra image
      // / -> termina con
    condicion = imagenType.test(imagen.type); 
  }
  const labelImagen = document.getElementById("label-imagen");
  estiloCondicion(condicion, labelImagen);

  // Validamos que el campo descripcion no supere los 255 caracteres
  const descripcion = formulario.elements.descripcion;
  estiloCondicion(descripcion.value.length < 255, descripcion);

  // Validamos seleccion de opciones plataforma
  const plataformas = formulario.elements.plataformas;
  const opcionesPlataforma = Array.from(plataformas);
  const algunaOpcionPlataforma = opcionesPlataforma.some(
    (opcion) => opcion.selected
  );
  estiloCondicion(algunaOpcionPlataforma, plataformas);

  // Validamos que el campo url no supere los 80 caracteres
  const url = formulario.elements.url;
  estiloCondicion(url.value.length < 80, url);

  // Validamos seleccion de opciones genero
  const generos = formulario.elements.generos;
  const opcionesGenero = Array.from(generos);
  const algunaOpcionGenero = opcionesGenero.some(
    (opcion) => opcion.selected
  );
  estiloCondicion(algunaOpcionGenero, generos);
}
