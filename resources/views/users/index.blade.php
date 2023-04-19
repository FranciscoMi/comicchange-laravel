@extends('layouts.landing')

@section('title', 'Bienvenido a la sala de Control')

@section('section_title','Administración de usuarios')

@section('register')
    <button class="btn btn--green btn__transition text--Komika box__stretch btn__close">
        Usuarios
    </button>
    <button class="btn btn--grey btn__transition text--Komika box__stretch btn__close">
        Comics
    </button>
    <button class="btn btn--red btn__transition text--Komika box__stretch btn__close">Salir
    </button>
@endsection


@section('main')
<main class="aside__hide box box__stretch" id="main">
  @include('users.edit')
  @include('layouts._partials.mainusers')
</main>
<script type="text/javascript" src="js/modules/aside.js"></script>
@endsection

<!--Sección de Laravel. insertamos un texto en el footer-->
@section('footer')
<div class="text-cite">
	<span>&copy; Todos los derechos reservados. Menos los más reservados, claro. ---</span>
	<span> Proyecto "ComicChange" para Ilerna.</span>
</div>
@endsection

@section('scripts')
    <script src="{{asset('js/modules/aside.js')}}"></script>
@endsection
