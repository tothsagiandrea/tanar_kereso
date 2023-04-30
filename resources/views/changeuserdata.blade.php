@extends('layouts.main')

@section('styles')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')
<div class="changedata-container">
	<div class="input-container">
		<form action="{{ route('changeUserData') }}" method="POST">
			@csrf
			<div class="form-title">Adatok módosítása</div>
			<div class="row">
				<div class="messages">
					@if (session('status') && session('status') == "success")
						Sikeres adatmódosítás!
					@elseif (session('status') && session('status') == "pwsuccess")
						Sikeres jelszó módosítás!
					@elseif((session('status') && session('status') == "fail") || $errors->any())
						Hiba történt az adatok módosítása közben!
					@else
						Minden mező kitöltése kötelező!
					@endif
				</div>
			</div>
			<div class="row">
				<div>
					<input type="email" id="email" name="email" placeholder="E-mail cím" value="{{ $user->email }}" required>
				</div>
			</div>
			<div class="row">
				<div>
					<input type="text" id="name" name="name" placeholder="Teljes név" value="{{ $user->name }}" required>
				</div>
			</div>
			<div class="row">
				<input id="btn_submit" class="bn632-hover bn22" type="submit" value="Adatok módosítása">
			</div>
		</form>
		<form action="{{ route('changeUserPassword') }}" method="POST">
			@csrf
			<div class="form-title">Jelszó módosítása</div>
			<div class="row">
				<div>
					<input type="password" id="password" name="password" placeholder="Jelszó" required>
				</div>
			</div>
			<div class="row">
				<div>
					<input type="password" id="password_confirmation" name="password_confirmation" placeholder="Jelszó újra" required>
				</div>
			</div>
			<div class="row">
				<input id="btn_submit" class="bn632-hover bn22" type="submit" value="Jelszó mentése">
			</div>
		</form>
	</div>
</div>
@endsection
