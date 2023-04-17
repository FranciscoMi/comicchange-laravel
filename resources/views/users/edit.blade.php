

@section('lateral_menu')
<section class="box box__center">
    <img class="img--50_50 retrait" src="assets/icons/perfil_happy.svg" alt="retrato" id="perfilImg">
    <h2 class="title--komika title--komika__big">Usuario</h2>
</section>
<form name="formuser" action="#" method="POST" id="formUser">
@csrf
<section>
    <p>
      <label for="name"><i class="fa-solid fa-user fa-xl icon" style="color: #EDEE56;"></i><input type="text" name="name" id="inputAlias" placeholder="Alias"></label>
    </p>
    <p>
      <label for="email" class="fa-sharp fa-solid fa-envelope fa-xl icon" style="color: #EDEE56;"></label><input type="text" name="email" id="email" placeholder="email" required>
    </p>
    <p>
      <label for="newpassword" class="fa-solid fa-lock fa-xl icon btn" style="color: #EDEE56;"></label>
      <input class="input__long disabled" type="password" name="newpassword" id="newpassword" placeholder="Cambiar el password" readonly><br>
      <input class="input__long input__down" type="hidden" name="password" id="password" placeholder="Repite el password" disabled required>
    </p>
    <p>
      <label for="role"><i class="fa-solid fa-xl fa-person-circle-check icon" style="color: #EDEE56"></i></label>
      <select name="role" id="inputRole" placeholder="Rol" required>
        <option value="1">Administrador</option>
        <option value="2">Colaborador</option>
        <option value="3">Coleccionista</option>
        <option value="4">Invitado</option>
      </select>
    </p>
</section>
<section>
    <h2>Datos personales</h2>
    <label class="label" for="name">Nombre</label>
    <input type="text" name="name" id="inputName"placeholder="Nombre">
    <label class="label" for="surname">Apellidos</label>
    <input type="text" name="surname" id="inputSurname"placeholder="Apellidos">
    <p class="box box--wrap box--column box__padding">
        <label for="age" class="box box--column__child">Edad</label>
        <label for="gender" class="box box--column__child">Género</label>
        <input type="number" class="input__short box box--column__child" name="age" min="3" max="100" id="inputAge" step="1" value="13">
        <select name="gender" id=selectGender class="box box--column__child">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="Prefiero no decirlo">Prefiero no decirlo</option>
        </select>
    </p>
    <label class="label" for="city">Ciudad</label>
    <input type="text" name="city" id="inputCity"placeholder="Ciudad, pueblo, villa,...">
    <label class="label" for="country">Pais</label>
    <input type="text" name="country" id="inputCountry"placeholder="Pais">
    <label class="label" for="cp">CP</label>
    <input type="text" name="cp" id="inputCP"placeholder="Código Postal">
    <p>
        @if(isset($users->id))
        <input type="submit" class="btn btn--green text--center btn--box" value="Actualizar">
        @else
        <input type="submit" class="btn btn--green text--center btn--box" value="Crear">
        @endif
        <input type="reset" class="btn btn--red text--center btn--box" value="Borrar">
    </p>
</section>
</form>
@endsection

@include('layouts._partials.aside')
