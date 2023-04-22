<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Enlaces-->
  <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('/css/style.css')}}">
  <!--Fin enlaces-->

<title>@yield('title')</title>

  <!--Metadatos OpenGraph para las redes sociales-->
  <meta property="og:title" content="ComicChange">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.comicchange.es">
  <meta property="og:image" content="https://www.comicchange.es/assets/img/icons/Logo.png">
  <!--Fin Metadatos redes sociales-->

  <!--Metadatos para los buscadores-->
  <meta name="description" content="Bienvenido al sitio web, dedicado a los coleccionistas de comics ">
  <meta name="keywords" content="comics online, historietas, colecciones, mangas, superheroinas">
  <meta name="author" content="ComicChange">
  <!--Fin Metadatos buscadores-->
</head>
<body>

  <header class="menu menu--sticky">
    @include('layouts._partials.menu')
  </header>

<!--plantilla main-->
  <div id="hiddenLayer" class="hidden"></div>
  @yield('main')

  <!--Sección donde se incluye el pie de pagina-->
  @include('layouts._partials.footer')

  <!--Este apartado enlazará con los scripts del proyecto-->
  @include('layouts._partials.scripts')
</body>

</html>
