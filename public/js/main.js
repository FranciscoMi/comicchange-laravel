/*Al iniciar con esta función de flecha nos aseguramos de que cargue todo el contenido solo cuando haya cargado la web*/
(()=>{
  'use strict'
  //También nos aseguramos de cargar completamente el DOM
  document.addEventListener('DOMContentLoaded',()=>{
  //Propiedades
  let boxAccess;
  const btnClose=document.querySelectorAll('.btn__close');
  const footer = document.querySelector('.footer');
  const hiddenLayer=document.querySelector('#hiddenLayer');
//método para mostrar el pie de página al desplazar el ratón
    document.addEventListener('mousemove', ()=>{
        footer.classList.add('visible');
        setTimeout(()=>footer.classList.remove('visible'),5000);
    });

//Método para cerrar la ventana con el logotipo X
btnClose.forEach((btn)=>{
    btn.addEventListener("click",(e)=>{
    //Accedemos al primer section padre
    boxAccess=e.target.closest('section');

    //Ocultamos o añadimos el banner seleccionado
    if (boxAccess.classList.contains('hidden')){
      boxAccess.classList.remove('hidden');
      hiddenLayer.classList.remove('hidden');
    }else{
      boxAccess.classList.add('hidden');
      hiddenLayer.classList.add('hidden');
    }//find if
    })//find clic btnAccess
})//fin btnClose

})//fin DOMContentLoaded
})(); //fin aside.js
