/*Al iniciar con esta función de flecha nos aseguramos de que cargue todo el contenido solo cuando haya cargado la web*/
(()=>{
'use strict'
  //También nos aseguramos de cargar completamente el DOM
document.addEventListener('DOMContentLoaded',()=>{

    //Propiedades
const btnHide=document.querySelector('#btnHide');
const aside=document.querySelector('#main');
const enabledPassword=document.querySelector('#newpassword');
const inputPassword=document.querySelector('#password');
//-----Métodos------

//Método para ocultar o mostrar la ventana lateral
btnHide.addEventListener("click",()=>{
  if (aside.classList.contains('aside__hide--active')){
	aside.classList.remove('aside__hide--active');
  }else{
	aside.classList.add('aside__hide--active');
  //fin if
  };//fin if
});//fin btnhide


//Método para deshabilitar la casilla de cambiar de password
  enabledPassword.addEventListener("click",(e)=>{
    if (e.target.classList.contains('disabled')){
    enabledPassword.labels[0].classList.remove('fa-lock');
    enabledPassword.labels[0].classList.add('fa-unlock-keyhole');
    e.target.classList.remove('disabled');
    e.target.readOnly=false;
    inputPassword.type="password";
    inputPassword.removeAttribute('disabled');
  }else{
    enabledPassword.labels[0].classList.add('fa-lock');
    enabledPassword.labels[0].classList.remove('fa-unlock-keyhole');
    e.target.classList.add('disabled');
    e.target.value="";
    e.target.readOnly=true;
    inputPassword.type="hidden";
    inputPassword.removeAttribute('disabled');
  }//fin if
  })//fin click
})//fin DOMContentLoaded
})(); //fin aside.js
