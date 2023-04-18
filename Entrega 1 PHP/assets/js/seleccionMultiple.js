/* Permitir la selección múltiple en un elemento select sin la necesidad de usar la tecla Shift,  */

const selects = document.querySelectorAll("select:not(#ordenamiento-A_Z)");

selects.forEach((select) => {
  seleccionMultiple(select);
});


function seleccionMultiple(select) {
  let isMouseDown = false;
  let isClicked = false;
  /* 
    Dentro del controlador de eventos mousedown, seleccionamos la opción en la que el usuario hizo clic y cambiamos su estado seleccionado con la propiedad selected.
  */
  select.addEventListener("mousedown", function (event) {
    event.preventDefault(); // Dentro del controlador de eventos mousedown, seleccionamos la opción en la que el usuario hizo clic y cambiamos su estado seleccionado con la propiedad selected.
    isMouseDown = true;

    const option = event.target; // seleccionamos la opción
    option.selected = !option.selected; //  cambiamos su estado
    isClicked = true;
  });

  /*
    Detecta cuándo el usuario ha soltado el botón del mouse y cuándo se está moviendo el mouse. 
  */
  select.addEventListener("mouseup", function () {
    isMouseDown = false;
    isClicked = false;
  });

  select.addEventListener("mousemove", function (event) {
    if (isMouseDown && isClicked) {
      const option = event.target;
      option.selected = !option.selected;
    }
  });
}
