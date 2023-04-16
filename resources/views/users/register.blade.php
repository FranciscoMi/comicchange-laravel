<!--Incluimos el enlace a la caja de login cuando se pulse el votón "Reunirse"-->
@extends('layouts.landing')

@section('title','Comic Change - Aficionados a los Comics')

<!--Muestra los botones de registro en el navegador-->
@section('register')
	@include('layouts._partials.btnhome')
	@include('layouts._partials.btnlogin')
@endsection


@section('main')
<main class="main-screen main--center">


@section('formaction')
    <form name="formregister" action="{{route('user.store')}}" id="formRegister" method="POST" >
    @csrf
@endsection

<!--Incluimos el enlace de la carpeta _components a la caja de login cuando se pulse el votón "Asociarse"-->
@component('_components.login')
	@slot('box_login','boxRegister')
	@slot('image', '../assets/img/html/superheroes.png')
	@slot('accreditation_heading','Registro en la Bóveda')
	@slot('accreditation_title','Inscripción')
	@slot('idform','formRegister')
	@slot('register_alias')
	<p>
		<label for="password"><i class="fa-solid fa-unlock-keyhole fa-xl icon" style="color: #EDEE56;"> </i></label>
		<input type="password" name="password" id="repeatPassword" placeholder="Repetir contraseña" required>
	</p>
	<p>
		<label for="name"><i class="fa-solid fa-user fa-xl icon" style="color: #EDEE56;"></i></label>
		<input type="text" name="name" id="inputAlias" placeholder="Alias" required>
	</p>
	@endslot
    @section('btnlogin')
        <input class="btn btn--green btn--box" type="submit" value="Registro">
    @endsection
	@slot('accreditation_forgot')
	<p>
		<a id="registerToLogin" class="text--Komika text--center link btn__close" href="{{route('user.login')}}">¿Ya tienes cuenta?. Inicia sesión</a>
	</p>
	@endslot
@endcomponent
</main>
@endsection

@section('footer')
@section('footerclass','footer--down')
<div class="text-cite">
	<span>&copy; Todos los derechos reservados. Menos los que no son de otros, claro. ---</span>
	<span> Proyecto "ComicChange" para Ilerna.</span>
</div>
@endsection

