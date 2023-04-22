@extends('layouts.main')

@section('content')
<h1>Személyes adatok</h1>
<div class="container-fluid teachdata">
	@if(session("status") && (session("status") == "missing_data"))
	<div>
		Minden mező kitöltendő!
	</div>
	@endif
	<form method="post" action="{{ route('setTeacherData') }}">
		@csrf
		<div class="row">
			<div class="col">
				<label for="exampleFormControlInput1">Teljes név</label>
				<input type="text" class="form-control" placeholder="Név" required @isset($user)
					value="{{$user->name}}"
				@endisset>
			</div>
			<div class="col">
				<label for="exampleFormControlInput1">Legmagasabb iskolai végzettség</label>
				<input type="text" class="form-control" placeholder="Végzettség" required>
			</div>
		</div>
		<div class="form-group">
			<label for="exampleFormControlInput1">Email address</label>
			<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="example@example.hu"  required @isset($user)
			value="{{$user->email}}"
		@endisset>>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Oktatás módja</label>
			<select multiple class="form-control" id="exampleFormControlSelect1" required>
				<option>Online</option>
				<option>Saját helyszín</option>
				<option>Megbeszélt helyszín</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Válassza ki a preferált várost/kerületet</label>
			<select multiple class="form-control" id="exampleFormControlSelect1">
				<option>Budapest</option>
				<option>kerület</option>
				<option>egyéb</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Mely tantárgyakat szeretné tanítani?</label>
			<select multiple class="form-control" id="exampleFormControlSelect1" required>
				<option>Matematika</option>
				<option>Fizika</option>
				<option>Irodalom</option>
				<option>Angol</option>
				<option>Informatika</option>
				<option>Egyéb</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect2">OKtatási szint</label>
			<select multiple class="form-control" id="exampleFormControlSelect2" required>
				<option>Általános iskola alsó tagozat</option>
				<option>Általános iskola felső tagozat</option>
				<option>Középiskola</option>
				<option>Főiskola/Egyetem</option>
			</select>
		</div>
		<div class="col">
			<label for="exampleFormControlInput1">Óra díj</label>
			<input type="text" class="form-control" placeholder="Ft/Óra" required>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Szakmai önéletrajz</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlFile1">Profilkép (max 2MB, jpg formátum)</label>
			<input type="file" accept="*.jpg, *.jpeg" class="form-control-file" id="exampleFormControlFile1" required>
		</div>
		<div class="col">
			<label for="exampleFormControlInput1">Bemutatkozó videó YouTube link</label>
			<input type="text" class="form-control" placeholder="YouTube link">
		</div>
		<div class="form-check">
			<a href="">Adatvédelmi szabályzat<br></a>
			<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
			<label class="form-check-label" for="defaultCheck1">
				Elolvastam és elfogadom az adatvédelmi szabályzatot.
			</label>
		</div>
		<div class="col">
			<input class="bn632-hover bn22" type="reset" name="btn_delete" value="Törlés">
			<input class="bn632-hover bn22" type="submit" name="btn_submit" value="Mentés">
		</div>
	</form>

</div>
	@endsection