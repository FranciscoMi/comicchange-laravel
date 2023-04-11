@extends('layouts.landing')

@section('title','Comic Change - Aficionados a los Comics')

@section('section_title', 'El Coleccionista de comics')

<!--Muestra los botones de registro en el navegador-->
@section('register')
	<button class="btn btn--green btn__transition text--Komika box__stretch btn__close">Reunirse
        <input type="hidden" name="hidden_btnlogin" value="boxLogin">
    </button>
	<button class="btn btn--red btn__transition text--Komika box__stretch btn__close">Asociarse
        <input type="hidden" name="hidden_btnRegister" value="boxRegister">
    </button>
@endsection

<!--Aquí incluyo todo lo que va a formar el cuerpo principal-->
@section('main')

<main class="main-screen" id="mainIndex">
<!--Incluimos el enlace a la caja de login cuando se pulse el votón "Reunirse"-->
@component('_components.login')
    @slot('box_login','boxLogin')
	@slot('image', 'assets/img/html/superheroes.png')
	@slot('accreditation_heading','Entrando en la Bóveda')
	@slot('accreditation_title','Acreditación')
	@slot('accreditation_href','')
	@slot('register_alias','')
	@slot('accreditation_forgot')
	<p>
		<a class="text--Komika text--center link" href="">¿No tienes cuenta?. Regístrate</a>
	</p>
	@endslot
@endcomponent

<!--Incluimos el enlace a la caja de login cuando se pulse el votón "Asociarse"-->
@component('_components.login')
    @slot('box_login','boxRegister')
	@slot('image', 'assets/img/html/superheroes.png')
	@slot('accreditation_heading','Registro en la Bóveda')
	@slot('accreditation_title','Inscripción')
	@slot('accreditation_href','')
	@slot('register_alias')
	<p>
		<label for="input_password_repeat"><i class="fa-solid fa-unlock-keyhole fa-2xl icon" style="color: #EDEE56;"> </i></label>
		<input type="password" name="repeat_password" id="repeatPassword" placeholder="Repetir contraseña">
	</p>
	<p>
	    <label for="input_alias"><i class="fa-solid fa-user fa-2xl icon" style="color: #EDEE56;"></i></label>
		<input type="text" name="input_alias" id="inputAlias" placeholder="Alias">
	</p>
	@endslot
	@slot('accreditation_forgot')
    <p>
		<a class="text--Komika text--center link" href="">¿Ya tienes cuenta?. Inicia sesión</a>
	</p>
    @endslot
@endcomponent

<!--En esta sección muestro la cubierta-->
<section class="box box__column margin-top__50">
	<div>
			<h2 class="title title--komika title--komika__big text--center">Tu Catálogo de Comics digital</h2>
				<h3 class="title--komika text--center color--blue">
						¡Colecciones variadas. Llenas de contenido!<br>
						¡Comics, Mangas, Tebeos, Historietas, Novelas Gráficas y más!</h3>
	</div>
<div><img class="img--500_300" src="../assets/img/html/Marvel_Comics.jpg" alt="colecciones"></div>
</section>

<!--Esta sección servirá para buscar comics-->
<section class="search">
	<form name="form_search" class="text-Komika" id="formSearch" method="get" action="">
			<div class="input__search">
					<input type="search" name="search_text" class="input__search--border-no" id="searchText" placeholder="Busqueda por categoría, título, editorial, ...">
					<button class="btn btn--search btn--blue">
							<i class="fa-solid fa-magnifying-glass" style="color: #edee56;"></i>
					</button>
			</div>
	</form>
</section>

<!--En esta sección aparecen los últimos cómics con un estilo de album de fotos-->
<section class="box__350">
	<h2 class="color--red title--komika">Últimas Subidas</h2>
	<article class="box box__wrap card__align">
		<!--Componente Laravel para no repetir el mismo código-->
		@component('_components.card')
			@slot('image','assets/img/comics/American/Fantasy/Dynamite/9788418037429.jpg')
			@slot('progress')
					<div class="progress-bar__green" style="width:90%;">90%</div>
			@endslot
			@slot('title','Lorem ipsum dolor sit amet')
			@slot('content','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nulla turpis, suscipit suscipit consequat eu, consequat suscipit.')
		@endcomponent

		@component('_components.card')
			@slot('image','assets/img/comics/American/Superheroes/Marvel/97888411013888.jpg')
			@slot('progress')
					<div class="progress-bar__green" style="width:60%;">60%</div>
			@endslot
			@slot('title','Lorem ipsum dolor sit amet')
			@slot('content','Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
		@endcomponent

		@component('_components.card')
			@slot('image','assets/img/comics/American/Superheroes/Marvel/977000565200900002.jpg')
			@slot('progress')
					<div class="progress-bar__green" style="width:40%;">40%</div>
			@endslot
			@slot('title','Lorem ipsum dolor sit amet')
			@slot('content',' Nulla nulla turpis, suscipit suscipit consequat eu, consequat suscipit.')
		@endcomponent

		@component('_components.card')
			@slot('image','assets/img/comics/American/Superheroes/Marvel/977000543600500103.jpg')
			@slot('progress')
					<div class="progress-bar__green" style="width:23%;">23%</div>
			@endslot
			@slot('title','Lorem ipsum dolor sit amet')
			@slot('content','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nulla turpis, suscipit suscipit consequat eu, consequat suscipit.')
		@endcomponent
	</article>
</section>
</main>
@endsection

<!--Sección de Laravel. insertamos un texto en el footer-->
@section('footer')
<div class="text-cite">
	<span>&copy; Todos los derechos reservados. Menos los que no son de otros, claro. ---</span>
	<span> Proyecto "ComicChange" para Ilerna.</span>
</div>
@endsection


