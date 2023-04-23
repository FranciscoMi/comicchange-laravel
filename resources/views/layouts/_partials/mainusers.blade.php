
<form name="form_users" id="formAccessUsers" action="" method="GET" class="main-screen margin-top__50">
<section>
	<!--Si no hay usuarios pone un título-->
	@if($users->isEmpty())
	<h2 class=" title--komika title--komika__big">Esto está un poco vacio.<br>No hay usuarios</h2>
	@else

	<table id="tableUsers" class="text--Komika text--center table">
		<tr><td colspan="2"><span class="space"></span></td>
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
		<tr>
			<td colspan="2" class="btn text--Komika btn--green btn--short"><a class="link" href="{{route('user.index')}}">Nuevo</a></td>
			<td class="btn btn--grey card"><a>Role</a></td>
			<td class="btn btn--grey card"><a>Alias</a></td>
			<td class="btn btn--grey card"><a>Mail</a></td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td colspan="3"><hr class="line"></td></tr>
		@foreach ($users as $newuser )
		<tr class="table-row">
			<td>
				<form action="{{route('user.destroy',$newuser->id)}}" method=POST class="title--komika">
					@csrf
					@method('DELETE')
					<button type="submit" class="fa-solid fa-trash-can fa-xl delete-user-link btn" style="color:#D22626" value="">
				</form>
			</td>
			<td><a href="{{route('user.edit',$newuser->id)}}"><input type="radio" name="user-radio" value="{{$newuser->id}} "class="input__short"></a></td>
			<td>{{$newuser->idrole}}</td>
			<td>{{$newuser->name}}</td>
			<td>{{$newuser->email}}</td>
		</tr>
		@endforeach
		@endif
	</table>
</section>
</form>
