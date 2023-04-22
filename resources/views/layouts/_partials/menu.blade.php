<nav class="box">
	<div>
        <a class="link" href="{{route('index')}}"><img class="logo" src="{{asset('assets/icons/Logo.svg')}}" alt="icon"></a>
    </div>
    <div>
        <h1 class="title title--white title--komika text--center"> @yield('section_title')</h1>
    </div>
    <div class="box box__stretch">
		@yield('register')
	</div>
</nav>
