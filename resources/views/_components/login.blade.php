
<section class="card__350 framework" id="{{$box_login}}">
  <div class="menu--header box box__stretch">
    <h1 class="title--komika" >
    {{$accreditation_heading}}
    </h1>
    <span><a class="btn btn__close" href="{{route('index')}}">
      <i class="fa-solid fa-xmark fa-2xl" style="color:black">
        <input type="hidden" value="{{$box_login}}" />
      </i></a></span>
  </div>
    <article class="card--margin">
    <div class="box box__stretch">
      <img class="img--150_75" src="{{$image}}">
      <h2 class="title--komika title--white">
        {{$accreditation_title}}
      </h2>
    </div>
    @yield('formaction')
      <p>
        <label for="email"><i class="fa-sharp fa-solid fa-envelope fa-xl icon" style="color: #EDEE56;"></i></label>
        <input type="text" name="email" id="inputMail" placeholder="email" required>
      </p>
      @error('email')
        <p class="text-cite color--red">{{$error}}</p>
      @enderror
      <p>
        <label for="password"><i class="fa-solid fa-unlock-keyhole fa-xl icon" style="color: #EDEE56;"> </i></label>
        <input type="password" name="password" id="inputPassword" placeholder="Contraseña" required>
      </p>
      {{$register_alias}}
      <div class="box">
        @yield('btnlogin')
        <input class="btn btn--red btn--box" type="reset" value="Borrar">
      </div>
      {{$accreditation_forgot}}

    </article>
    @if(Session::has('success'))
      <div class="alert alert-success">
        {{Session::get('success')}}
      </div>
    @endif
</section>
