

@section('lateral_menu')
<section class="box box__center">
  <img class="img--50_50 retrait" src="assets/icons/perfil_happy.svg" alt="retrato" id="perfilImg">
  <h2 class="title--komika title--komika__big">Usuario</h2>
</section>
@if(!isset($user))
  @component('_components.edituser')
    @slot('formUser')
      <form name="formuser" action="#" method="POST" id="formUser">
      @csrf
    @endslot

    @slot('nameUser',"")
    @slot('emailUser',"")

    @slot('roleUser')
      <option value="1">Administrador</option>
      <option value="2">Colaborador</option>
      <option selected value="3" >Coleccionista</option>
      <option value="4">Invitado</option>
    @endslot
  @endcomponent
@else
  @component('_components.edituser')
    @slot('formUser')
      <form name="formuser" action="#" method="POST" id="formUser">
      @csrf
    @endslot

    @slot('nameUser',"{{$user->name}}")
    @slot('emailUser',"{{$user->email}}")

  @slot('roleUser')
    <option selected value="1">Administrador</option>
    <option value="2">Colaborador</option>
    <option value="3" >Coleccionista</option>
    <option value="4">Invitado</option>
  @endslot
  @endcomponent
@endif
@endsection

@include('layouts._partials.aside')
