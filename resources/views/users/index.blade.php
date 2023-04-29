<!--Cargamos la plantilla de la web-->
@extends('layouts.landing')

<!--Cargamos el menú-->
@section('title', 'Bienvenido a la sala de Control')

@section('section_title','Administración de usuarios')

@section('register')
    @section('colorbtncomics','btn--green')
    @section('colorbtnuser','btn--grey')
    @include('layouts._partials.closesession')
@endsection

<!--Agregamos la sección de contenido-->
@section('main')
<div id="hiddenLayer" class="hidden"></div>
@include('layouts._partials.boxdelete')
<main class="aside__hide box box__stretch" id="main">
  @include('users.edit')
  @include('layouts._partials.mainusers')
</main>
@endsection

<!--Cargamos el footer-->
@section('footerclass','footer--down')

<!--Sección de Laravel. insertamos un texto en el footer-->
@section('footer')
<div class="text-cite">
	<span>&copy; Todos los derechos reservados. Menos los más reservados, claro. ---</span>
	<span> Proyecto "ComicChange" para Ilerna.</span>
</div>
@endsection
<!--Cargamos los scripts de la página-->
@section('scripts')
    <script src="{{asset('js/modules/aside.js')}}"></script>
    <script src="{{asset('js/modules/users.js')}}"></script>
@endsection
