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


  })//fin DOMContentLoaded
})(); //fin users.js
