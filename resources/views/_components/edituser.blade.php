
	{{$formUser}}
	<section>
		<p>
		  <label for="name">
            <i class="fa-solid fa-user fa-xl icon" style="color: #EDEE56;"></i>
            <input type="text" name="name" id="inputAlias" placeholder="Alias" value="{{$nameUser}}"></label>
		</p>
		<p>
		  <label for="email" class="fa-sharp fa-solid fa-envelope fa-xl icon" style="color: #EDEE56;"></label>
      <input type="text" name="email" id="email" placeholder="email" {{$readOnly}} required value="{{$emailUser}}">
      @error('email')
        <p class="text-cite">{{$message}}</p>
      @enderror
		</p>
		<p>
		  <label for="newpassword" class="fa-solid fa-lock fa-xl icon btn" style="color: #EDEE56;"></label>
		  <input class="input__long disabled" type="password" name="password" id="newpassword" placeholder="Cambiar el password" readonly><br>
		  <input class="input__long input__down" type="hidden" name="password_confirmation" id="password" placeholder="Repite el password" disabled required>
        @error('password')
          <p class="text-cite">{{$message}}</p>
        @enderror
		</p>
		<p>
		  <label for="role"><i class="fa-solid fa-xl fa-person-circle-check icon" style="color: #EDEE56"></i></label>
		  <select name="idrole" id="inputRole" placeholder="Rol" required>
			{{$roleUser}}
		  </select>
      @error('idrole')
        <p class="text-cite">{{$message}}</p>
      @enderror
		</p>
	</section>
	<section>
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
		  {{$btncreateuser}}
          <input type="reset" class="btn btn--red text--center btn--box btn--short" value="Resetea" id="btnReset">
		</p>
	</section>
	</form>
