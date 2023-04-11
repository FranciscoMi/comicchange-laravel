/*Al iniciar con esta función de flecha nos aseguramos de que cargue todo el contenido solo cuando haya cargado la web*/
(()=>{
	'use strict'
	//También nos aseguramos de cargar completamente el DOM
	document.addEventListener('DOMContentLoaded',()=>{
	//Propiedades
	const btnHide=document.querySelector('#btnHide');
    const aside=document.querySelector('#main');

		//Métodos
	btnHide.addEventListener("click",()=>{
			if (aside.classList.contains('aside__hide--active')){
        aside.classList.remove('aside__hide--active');
			}else{
        aside.classList.add('aside__hide--active');
			}
		});//fin btnhide
	})//fin DOMContentLoaded
})(); //fin aside.js
