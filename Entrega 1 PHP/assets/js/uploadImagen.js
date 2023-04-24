/*
 * El input[type="file"] tiene display none debido a que es feo
 * El input posee esta asociado al label el cual se muestra, remplazando el input
 * El script accede al input[type="file"] y al label y cuando se selecciona un archivo en el input se remplaza el texto del label por el nombre del archivo
 */

const inputImagen = document.getElementById('imagen');
const labelImagen = document.getElementById('label-imagen');

inputImagen.addEventListener('change', () => {
    labelImagen.innerText = inputImagen.files[0].name;
    labelImagen.style.color = "var(--clr-negro)";
});