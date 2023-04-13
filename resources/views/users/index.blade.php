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

@section('action','')
@section('id','formUser')

@section('lateral_menu')
<section class="box box__center">
    <img class="img--50_50 retrait" src="assets/icons/perfil_happy.svg" alt="retrato" id="perfilImg">
    <h2 class="title--komika title--komika__big">Usuario</h2>
</section>
<section>
    <p>
      <label for="input_alias"><i class="fa-solid fa-user fa-xl icon" style="color: #EDEE56;"></i></label>
      <input type="text" name="input_alias" id="inputAlias" placeholder="Alias">
    </p>
    <p>
      <label for="input_mail"><i class="fa-sharp fa-solid fa-envelope fa-xl icon" style="color: #EDEE56;"></i></label>
      <input type="text" name="input_mail" id="inputMail" placeholder="email" required>
    </p>
    <p>
      <label for="input_password"><i class="fa-solid fa-unlock-keyhole fa-xl icon" style="color: #EDEE56;"> </i></label>
      <input type="password" name="input_password" id="inputPassword" placeholder="password" required>
    </p>
    <p>
      <label for="input_password"><i class="fa-solid fa-unlock-keyhole fa-xl icon" style="color: #EDEE56;"> </i></label>
      <input type="password" name="input_password" id="inputPassword" placeholder="repetir password" required>
    </p>
    <p>
      <label for="input_role"><i class="fa-solid fa-xl fa-person-circle-check icon" style="color: #EDEE56"></i></label>
      <select name="input_role" id="inputRole" placeholder="Rol" required>
        <option value="1">Administrador</option>
        <option value="2">Colaborador</option>
        <option value="3">Coleccionista</option>
        <option value="4">Invitado</option>
      </select>
    </p>
</section>
<section>
      <h2>Datos personales</h2>
      <label class="label" for="input_name">Nombre</label>
      <input type="text" name="input_name" id="inputName"placeholder="Nombre">
      <label class="label" for="input_surname">Apellidos</label>
      <input type="text" name="input_surname" id="inputSurname"placeholder="Apellidos">
      <p class="box box--wrap box--column box__padding">
        <label for="input_age" class="box box--column__child">Edad</label>
        <label for="input_gender" class="box box--column__child">Género</label>
        <input type="number" class="input__short box box--column__child" name="input_age" min="3" max="100" id="inputAge" step="1" value="13">
        <select name="select_gender" id=selectGender class="box box--column__child">
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
          <option value="Prefiero no decirlo">Prefiero no decirlo</option>
        </select>
      </p>
      <label class="label" for="input_city">Ciudad</label>
      <input type="text" name="input_city" id="inputCity"placeholder="Ciudad, pueblo, villa,...">
      <label class="label" for="input_country">Pais</label>
      <input type="text" name="input_country" id="inputCountry"placeholder="Pais">
      <label class="label" for="input_cp">CP</label>
      <input type="text" name="input_cp" id="inputCP"placeholder="Código Postal">
      <p>
        <input type="submit" class="btn btn--green text--center btn--box" value="Crear">
        <input type="reset" class="btn btn--red text--center btn--box" value="Borrar">
      </p>
</section>
@endsection

@section('main')
<main class="aside__hide box box__stretch" id="main">
  @include('layouts._partials.aside')
  @include('layouts._partials.mainusers')
</main>
<script type="text/javascript" src="js/modules/aside.js"></script>
@endsection

<!--Sección de Laravel. insertamos un texto en el footer-->
@section('footer')
<div class="text-cite">
	<span>&copy; Todos los derechos reservados. Menos los que no son de otros, claro. ---</span>
	<span> Proyecto "ComicChange" para Ilerna.</span>
</div>
@endsection
