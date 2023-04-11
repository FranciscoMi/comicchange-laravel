/*Al iniciar con esta función de flecha nos aseguramos de que cargue todo el contenido solo cuando haya cargado la web*/
(()=>{
  'use strict'
  //También nos aseguramos de cargar completamente el DOM
  document.addEventListener('DOMContentLoaded',()=>{
  //Propiedades
  const btnClose=document.querySelectorAll('.btn__close');
  const hiddenLayer=document.querySelector('#hiddenLayer');
  //const mainIndex=document.querySelector('body');

  //Métodos
  btnClose.forEach((btn)=>{
  btn.addEventListener("click",(e)=>{
  const boxAccess=document.getElementById(e.target.lastElementChild.value);
  hiddenLayer.setAttribute('height','100%');
  if (boxAccess.classList.contains('hidden')){
    hiddenLayer.classList.remove('hidden')
    boxAccess.classList.remove('hidden');
  }else{
    hiddenLayer.classList.add('hidden');
    boxAccess.classList.add('hidden');
  }//find if
  })//find clic btnAccess
  })//fin forEach
})//fin DOMContentLoaded
})(); //fin aside.js
