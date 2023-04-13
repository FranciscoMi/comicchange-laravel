@extends('layouts.landing')

@section('title', 'Bienvenido a la Biblioteca')

@section('section_title','Administración de Comics')

@section('register')
    <button class="btn btn--grey btn__transition text--Komika box__stretch btn__close">
        Usuarios
    </button>
    <button class="btn btn--green btn__transition text--Komika box__stretch btn__close">
        Comics
    </button>
    <button class="btn btn--red btn__transition text--Komika box__stretch btn__close">Salir
    </button>
@endsection

@section('action','')
@section('id','formComic')

@section('lateral_menu')
<nav>
    <ul class="menu__list">
        <li class="menu__item"><a id="authorMenu" class="btn--grey text--Komika title--white menu__link">Autores</a></li>
        <li class="menu__item"><a id="ComicMenu" class="btn--green text--Komika title--white menu__link">Comics</a></li>
        <li class="menu__item"><a id="PublisherMenu" class="btn--grey text--Komika title--white menu__link">Editoriales</a></li>
        <li class="menu__item"><a id="CollectionMenu" class="btn--grey text--Komika title--white menu__link">Colecciones</a></li>
    </ul>
</nav>
<section class="box box__right">
    <img class="img--75_120 retrait" src="assets/icons/perfil_happy.svg" alt="retrato" id="perfilImg">
    <div>
        <h2 class="title--komika title--komika__big">Comics</h2>
        <p>
            <label for="input_title">Título</label><br>
            <input type="text" name="input_title" id="inputTitle" placeholder="Título" class="input__long" required>
          </p>
    </div>
</section>
  <p>
    <label for="input_subtitle">Subtítulo</label><br>
    <input type="text" name="input_subtitle" id="inputSubtitle" placeholder="Subtítulo">
  </p>
  <div class="box box__right">
    <span class="box__right--margin-right box__stretch">
      <label for="input_number">Número</label><br>
      <input type="text" name="input_number" id="inputNumber" placeholder="0" class="input__short">
    </span>
    <span class="box__right--margin-right box__stretch">
      <label for="input_publish_date">Fecha</label><br>
      <input type="date" name="input_publish_date" id="inputPublishDate" class="input__half">
    </span>
    <span>
      <label for="input_score">Puntuación</label><br>
      <input type="text" name="input_score" id="inputScore" class="input__short" placeholder="100"> %
    </span>
  </div>
  <p>
    <label for="text_contain">Contenido</label><br>
    <textarea name="text_contain" id="textContain" class="text__box"></textarea>
  </p>
  <p>
    <label for="input_language">Idioma</label><br>
    <input type="text" name="input_language" id="inputLanguage">
  </p>
  <p>
    <label for="text_synopsis">Sinopsis</label><br>
    <textarea name="text_synopsis" id="textSynopsis" class="text__box"></textarea>
  </p>
  <p>
    <label for="select_category">Categoría: </label>
    <select name="select_category" id="selectCategory" required>
        <option value="Adventure">Acción y Aventura</option>
        <option value="ScienceFictions">Ciencia Ficción</option>
        <option value="Costumbrista">Costumbrista</option>
        <option value="Drama">Dramática</option>
        <option value="Fantasy">Fantasía</option>
        <option value="History">Histórico</option>
        <option value="Horror">Horror</option>
        <option value="Humour">Comedia</option>
        <option value="Romance">Romántico</option>
        <option value="BlackSeries">Serie Negra</option>
        <option value="Superheroes">Superheroes</option>
    </select>
  </p>
  <p>
    <label for="select_continent">Continente: </label>
    <select name="select_continent" id="selectContinent" required>
      <option value="American">Americano</option>
      <option value="Asian">Asiático</option>
      <option value="European">Europeo</option>
    </select>
  </p>
  <p>
    <input type="submit" class="btn btn--green text--center btn--box" value="Crear">
        <input type="reset" class="btn btn--red text--center btn--box" value="Borrar">
  </p>
</section>
@endsection

@section('main')
<main class="aside__hide box box__stretch" id="main">
  @include('layouts._partials.aside')
  @include('_components.publishers')
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
