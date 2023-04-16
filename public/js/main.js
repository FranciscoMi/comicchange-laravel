/*Al iniciar con esta función de flecha nos aseguramos de que cargue todo el contenido solo cuando haya cargado la web*/
(()=>{
  'use strict'
  //También nos aseguramos de cargar completamente el DOM
  document.addEventListener('DOMContentLoaded',()=>{
  //Propiedades
  let boxAccess;
  const btnClose=document.querySelectorAll('.btn__close');

  //Método para cambiar entre login y register
  btnClose.forEach((btn)=>{
  btn.addEventListener("click",(e)=>{

  //comprobamos que el valor seleccionado no sea nulo
  if (e.target.lastElementChild==null){
    //Si es nulo es porque hemos hecho clic en un enlace directo
    const word=e.target.href.split('#');
    document.getElementById(word[2]).classList.add('hidden');
    boxAccess=document.getElementById(word[1]);
  }else{
    boxAccess=document.getElementById(e.target.lastElementChild.value);
  }//fin if

  //Ocultamos o añadimos el banner seleccionado
  if (boxAccess.classList.contains('hidden')){
    boxAccess.classList.remove('hidden');
  }else{
    boxAccess.classList.add('hidden');
  }//find if

  })//find clic btnAccess
  })//fin forEach

})//fin DOMContentLoaded
})(); //fin aside.js
