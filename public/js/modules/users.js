/*Al iniciar con esta función de flecha nos aseguramos de que cargue todo el contenido solo cuando haya cargado la web*/
(()=>{
  'use strict'
  //También nos aseguramos de cargar completamente el DOM
  document.addEventListener('DOMContentLoaded',()=>{
  //Propiedades

  // Selecciona todos los elementos que tienen un ID que comienza con "delete"
  const btnDelete = document.querySelectorAll('.delete-user-link');
  const boxDelete=document.querySelector('#boxDelete');
  const btnYes=document.querySelector('#btnYes');
  const sortTr=document.querySelector('#sortTr');

  //Métodos

  //Método para abrir la ventana eliminar
  btnDelete.forEach((btn)=>{
    btn.addEventListener("click",(e)=>{
    //primero evitamos que se envíen los datos para comprobar
      e.preventDefault();
    //Mostramos el banner de confirmación
      boxDelete.classList.remove('hidden');
      hiddenLayer.classList.remove('hidden');
    //Si se pulsa sí. Enviamos el dato del formulario
      btnYes.addEventListener("click",()=>e.target.closest('form').submit());
    });//fin btn
  });//fin btnDelete

//Método para ordenar los datos en cliente
  //creamos una constante que recoja las columnas td de sorTr
    const sortTrBtn=sortTr.querySelectorAll('td a');
    sortTrBtn.forEach((srtBtn)=>{
        //si hacemos clic
        srtBtn.addEventListener("click",(e)=>{
            //prevenimos el resultado de a
            e.preventDefault();
            //extraemos el enlace y lo guardamos en una variable
            const sortBy = srtBtn.dataset.sortBy;
            console.log(sortBy);
            //Hacemos la llamada a la función sortTbody
            sortTbody(sortBy)
        });//fin click
    });//fin forEach

  //// Función para ordenar la tabla
  function sortTbody(sortBy) {
    //buscamos el elemento datesTable y los metemos en un array
  const datesTable=document.querySelector('#datesTable');
  const rows = Array.from(datesTable.querySelectorAll('tr'));

  rows.sort((a, b) => {
    const cellA = a.querySelector(`td:nth-of-type(${sortBy})`);
    const cellB = b.querySelector(`td:nth-of-type(${sortBy})`);
    return cellA.textContent.localeCompare(cellB.textContent);
  });

  // Actualizar la tabla con las filas ordenadas
  datesTable.innerHTML = '';
  rows.forEach(row => datesTable.appendChild(row));
}


  })//fin DOMContentLoaded
})(); //fin users.js
