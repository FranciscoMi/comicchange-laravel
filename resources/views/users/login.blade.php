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
	<form name="formlogin" action="{{route('user.loginAuth')}}" id="formLogin" method="POST">
@endsection



@component('_components.login')
	@slot('box_login','boxLogin')
	@slot('image', '../assets/img/html/superheroes.png')
	@slot('accreditation_heading','Entrando en la Bóveda')
	@slot('accreditation_title','Acreditación')
	@slot('idform', 'formLogin')
	@slot('accreditation_forgot')
	<p class="box__padding">
	<a id="loginToRegister" class="text--Komika text--center link btn__close" href="{{route('user.create')}}">¿No tienes cuenta?. Regístrate</a>
	</p>

	@endslot
	@slot('register_alias','')
		@section('btnlogin')
			<input class="btn btn--green btn--box" type="submit" value="Entrar">
		@endsection

	@if(session()->has('failed'))
		<div class="text--Komika text--center">{{ session()->get('failed') }}</div>
	@endif
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

