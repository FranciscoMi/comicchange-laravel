@extends('layouts.landing')

@section('title', 'Bienvenido a la sala de Control')

@section('section_title','Administración de usuarios')

@section('register')
    <a class="btn btn--green btn__transition text--Komika box__stretch btn__close">
        Usuarios
    </a>
    <a class="btn btn--grey btn__transition text--Komika box__stretch btn__close">
        Comics
    </a>
    <a class="btn btn--red btn__transition text--Komika box__stretch btn__close">Salir
    </a>
@endsection


@section('main')
<main class="aside__hide box box__stretch" id="main">
  @include('users.edit')
  @include('layouts._partials.mainusers')
</main>
@endsection

@section('footerclass','footer--down')

<!--Sección de Laravel. insertamos un texto en el footer-->
@section('footer')
<div class="text-cite">
	<span>&copy; Todos los derechos reservados. Menos los más reservados, claro. ---</span>
	<span> Proyecto "ComicChange" para Ilerna.</span>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/modules/aside.js')}}"></script>
    <script src="{{asset('js/modules/users.js')}}"></script>
@endsection
