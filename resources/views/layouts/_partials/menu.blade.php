<nav class="box">
  <div id="logoindex">
    <a class="link" href="{{route('index')}}"><img class="logo" src="{{asset('assets/icons/Logo.svg')}}" alt="icon"></a>
  </div>
  <div>
    <h1 class="title title--white title--komika text--center"> @yield('section_title')</h1>
  </div>
  <div class="box box__stretch">
    @if(Auth::check())
      @include('layouts._partials.btnhome')
      @if(Auth::user()->idrole == 1)
        <a class="btn btn__transition text--Komika box__stretch btn__close link btn--padding @yield('colorbtnuser')" href="{{route('user.index')}}">Usuarios</a>
      @endif
        @if (Auth::user()->idrole == 1 || Auth::user()->idrole == 2)
      <a class="btn @yield('colorbtncomics') btn__transition text--Komika box__stretch btn__close btn--padding link" href="{{route('comic.index')}}">Comics</a>
      @include('layouts._partials.closesession')
      @endif
    @else
      @yield('register')
    @endif
  </div>
</nav>
