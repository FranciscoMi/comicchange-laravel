<!--Cargamos la sección lateral-->
@section('lateral_menu')
<section class="box box__center">
  <img class="img--50_50 retrait" src="{{asset('assets/icons/perfil_happy.svg')}}" alt="retrato" id="perfilImg">
  <h2 class="title--komika title--komika__big">Usuario</h2>
</section>

<!--No cargamos el contenido del usuario seleccionado si se ha venido de una petición-->
@if(!isset($user))
  @component('_components.edituser')
    <!--Formulario para crear el usuario al no existir usuario -->
  @slot('formUser')
    <form name="formuser" action="{{route('user.storeUser')}}" method="POST" id="formUser">
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
  @foreach($roles as $role)
  <option value="{{ $role->id }}" {{ $role->id=='3' ? 'selected' : '' }}>{{ $role->role }}</option>
  @endforeach
  @endslot

  @slot('userAge',"")
  @slot('selectGender')
    <option value="Prefiero no decirlo" selected>Prefiero no decirlo</option>
    <option value="Masculino">Masculino</option>
    <option value="Femenino">Femenino</option>
  @endslot
  @slot('userCity','')
  @slot('userCountry','')
  @slot('userCP','')

  @slot ('btncreateuser')
    <input type="submit" class="btn btn--green text--center btn--box btn--short" value="Crea">
  @endslot

  @endcomponent
  <!--Si el usuario existe, entonces el formulario es de actualización-->
@else
  @component('_components.edituser')

  @slot('formUser')
    <form name="formuser" action="{{route('user.update',$user->id)}}" method="POST" id="formUser">
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
  <!--Establecemos con un operador ternario los roles del sistema y establecemos el que corresponde al usuario-->
    @foreach($roles as $role)
        <option value="{{ $role->id }}" {{ $user->idrole == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
    @endforeach
  @endslot

  @slot('userAge',$user->datauser->age)

  @slot('selectGender')
    <option value="Prefiero no decirlo" {{ $user->datauser->gender == 'Prefiero no decirlo' ? 'selected' : '' }}>Prefiero no decirlo</option>
    <option value="Masculino" {{ $user->datauser->gender == 'Masculino' ? 'selected' : '' }}>Masculino</option>
    <option value="Femenino" {{ $user->datauser->gender == 'Femenino' ? 'selected' : '' }}>Femenino</option>
  @endslot

  @slot('userCity',$user->datauser->city)
  @slot('userCountry',$user->datauser->country)
  @slot('userCP',$user->datauser->cp)

  @slot ('btncreateuser')
    <input type="submit" class="btn btn--green text--center btn--box btn--short" value="Actualiza">
  @endslot

  @endcomponent

@endif

@endsection

<!--Una vez cargados los datos de la petición, mostramos el resultado recogiendo la plantilla del menú lateral-->
@include('layouts._partials.aside')
