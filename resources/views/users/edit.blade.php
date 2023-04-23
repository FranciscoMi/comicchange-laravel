
@section('lateral_menu')
<section class="box box__center">
  <img class="img--50_50 retrait" src="{{asset('assets/icons/perfil_happy.svg')}}" alt="retrato" id="perfilImg">
  <h2 class="title--komika title--komika__big">Usuario</h2>
</section>
@if(!isset($user))
  @component('_components.edituser')

  @slot('formUser')
    <form name="formuser" action="{{route('user.store')}}" method="POST" id="formUser">
    @csrf
  @endslot

  @slot('nameUser',"")
  @slot('emailUser',"")
  @slot('readOnly',"")
  @slot('userPassword')
    <label for="newpassword" class="fa-solid fa-lock fa-xl icon btn" style="color: #EDEE56;"></label>
    <input class="input__long disabled" type="password" name="password" id="newpassword" placeholder="Password" required><br>
    <input class="input__long input__down" type="password" name="password_confirmation" id="password" placeholder="Repite el password" required>
  @endslot

  @slot('roleUser')
    <option value="1">Administrador</option>
    <option value="2">Colaborador</option>
    <option selected value="3" >Coleccionista</option>
    <option value="4">Invitado</option>
  @endslot

  @slot ('btncreateuser')
    <input type="submit" class="btn btn--green text--center btn--box btn--short" value="Crea">
  @endslot

  @endcomponent
@else
  @component('_components.edituser')

  @slot('formUser')
    <form name="formuser" action="{{route('user.update',$user)}}" method="POST" id="formUser">
    @csrf
    @method('PUT')
  @endslot

  @slot('nameUser',$user->name)
  @slot('emailUser',$user->email)
  @slot('readOnly',"readonly")
  @slot('userPassword')
    <label for="newpassword" class="fa-solid fa-lock fa-xl icon btn" style="color: #EDEE56;"></label>
    <input class="input__long disabled" type="password" name="password" id="newpassword" placeholder="Password" readonly><br>
    <input class="input__long input__down" type="hidden" name="password_confirmation" id="password" placeholder="Repite el password" disabled required>
  @endslot

  @slot('roleUser')
  <option value="1">Administrador</option>
  <option value="2">Colaborador</option>
  <option selected value="3" >Coleccionista</option>
  <option value="4">Invitado</option>
  @endslot

  @slot ('btncreateuser')
    <input type="submit" class="btn btn--green text--center btn--box btn--short" value="Actualiza">
  @endslot

  @endcomponent

@endif

@endsection

@include('layouts._partials.aside')
