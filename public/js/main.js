/*Al iniciar con esta función de flecha nos aseguramos de que cargue todo el contenido solo cuando haya cargado la web*/
(()=>{
  'use strict'
  //También nos aseguramos de cargar completamente el DOM
  document.addEventListener('DOMContentLoaded',()=>{
  //Propiedades
  let boxAccess;
  const btnClose=document.querySelectorAll('.btn__close');
  const hiddenLayer=document.querySelector('#hiddenLayer');
  const loginToRegister=document.querySelector('#loginToRegister');
  const registertoLogin=document.querySelector('#registerToLogin');
  //const mainIndex=document.querySelector('body');

  //Método para cambiar entre login y register
  btnClose.forEach((btn)=>{
  btn.addEventListener("click",(e)=>{
    hiddenLayer.setAttribute('height','100%');
  if (e.target.lastElementChild==null){
    const word=e.target.href.split('#');
    document.getElementById(word[2]).classList.add('hidden');
    boxAccess=document.getElementById(word[1]);
  }else{
    boxAccess=document.getElementById(e.target.lastElementChild.value);
  }//fin if
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
