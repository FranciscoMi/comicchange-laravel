
<form name="form_users" id="formAccessUsers" action="" method="GET" class="main-screen margin-top__50">
<section>
	<!--Si no hay usuarios pone un título- y marca que no hay usuarios. Es absurdo porque no te deja acceder, pero por si acaso -->
	@if($userResource->isEmpty())
	    <h2 class=" title--komika title--komika__big">Esto está un poco vacio.<br>No hay usuarios</h2>
	@else
    <!--Pero como si hay usuarios, generamos la tabla con tooooodos los usuarios-->
	<table id="tableUsers" class="text--Komika text--center table">
		<tr><td colspan="2"><span class="space"></span></td>
			<!--Apartado para buscar por campos-->
            <td>
				<div class="input__search">
				<input type="search" name="search_Role" id="searchRole" class="input__search--border-no">
				<button class="btn btn--search btn--blue">
					<i class="fa-solid fa-magnifying-glass" style="color: #edee56;"></i>
				</button>
				</div>
			</td>
			<td>
				<div class="input__search">
				<input type="search" name="search_Alias" id="searchAlias" class="input__search--border-no">
				<button class="btn btn--search btn--blue">
					<i class="fa-solid fa-magnifying-glass" style="color: #edee56;"></i>
				</button>
				</div>
			</td>
			<td>
				<div class="input__search">
				<input type="search" name="search_Mail" id="searchMail" class="input__search--border-no">
				<button class="btn btn--search btn--blue">
					<i class="fa-solid fa-magnifying-glass" style="color: #edee56;"></i>
				</button>
				</div>
			</td>
		</tr>
        <!--Apartado que muestra los datos y los ordena alfabéticamente según el campo que se pulse-->
		<tr id="sortTr">
            <!--Este enlace carga la página de creación de usuarios-->
			<td colspan="2" class="btn text--Komika btn--green btn--short"><a class="link btn--green" href="{{route('user.index')}}">Nuevo</a></td>
            <!--Estos enlaces muestran los campos y los ordena según se pulse-->
            <td class="btn btn--grey card"><a class="link btn--grey" href="{{ route('user.index', ['sort_by' => 'email']) }}" data-sort-by="3">Mail</a></td>
			<td class="btn btn--grey card"><a class="link btn--grey" href="{{ route('user.index', ['sort_by' => 'name']) }}" data-sort-by="4">Alias</a></td>
            <td class="btn btn--grey card"><a class="link btn--grey" href="{{ route('user.index', ['sort_by' => 'role']) }}" data-sort-by="5">Role</a></td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td colspan="3"><hr class="line"></td></tr>
		<tbody id="datesTable">
        @foreach ($userResource as $newuser )
		<tr class="table-row">
			<td>
                <!--Formulario para eliminar el usuario seleccionado-->
				<form action="{{route('user.destroy',$newuser->id)}}" method=POST class="title--komika">
					@csrf
					@method('DELETE')
					<button type="submit" class="fa-solid fa-trash-can fa-xl delete-user-link btn" style="color:#D22626" value="">
				</form>
			</td>
			<td>
                <!--Ruta para cargar el menú lateral y actualizar el usuario-->
                <a href="{{route('user.edit',$newuser->id)}}"><input type="radio" name="user-radio" value="{{$newuser->id}} "class="input__short"></a>
            </td>
            <td>{{$newuser->email}}</td>
			<td>{{$newuser->name}}</td>
            <td>{{$newuser->role['role']}}</td>
		</tr>
		@endforeach
        </tbody>
		@endif
	</table>
</section>
</form>
