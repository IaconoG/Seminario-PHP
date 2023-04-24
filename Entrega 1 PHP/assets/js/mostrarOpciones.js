// Contamos la cantidad de opciones de cada select y segun el valor mostramos un cierto numero de opciones

const selects = document.querySelectorAll('aside select');

selects.forEach(select => {
  let cantOpciones = select.options.length;
  console.log(cantOpciones);
  if (cantOpciones > 7) select.setAttribute('size', 7);
  else select.setAttribute('size', cantOpciones);
});
