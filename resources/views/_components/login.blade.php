
<section class="hidden banner card__350 framework" id="{{$box_login}}">
  <div class="menu--header box box__stretch">
    <h1 class="title--komika">
    {{$accreditation_heading}}
    </h1>
    <span class="btn btn__close">
      <i class="fa-solid fa-xmark fa-2xl" style="color:black">
        <input type="hidden" value="{{$box_login}}" />
      </i></span>
  </div>
    <article>
    <div class="box box__stretch">
        <img class="img--150_75" src="{{$image}}">
        <h2 class="title--komika title--white">
          {{$accreditation_title}}
        </h2>
    </div>
    <form name="form_login" action="{{$accreditation_href}}" id="formLogin">
      <p>
        <label for="input_mail"><i class="fa-sharp fa-solid fa-envelope fa-2xl icon" style="color: #EDEE56;"></i></label>
        <input type="text" name="input_mail" id="inputMail" placeholder="email">
      </p>
      <p>
        <label for="input_password"><i class="fa-solid fa-unlock-keyhole fa-2xl icon" style="color: #EDEE56;"> </i></label>
        <input type="password" name="input_password" id="inputPassword" placeholder="Contraseña">
      </p>
      {{$register_alias}}
      <div class="box">
        <input class="btn btn--green btn--box" type="submit" value="Entrar">
        <input class="btn btn--red btn--box" type="reset" value="Borrar">
      </div>
      {{$accreditation_forgot}}
    </form>
    </article>
</section>
