@extends('layouts.main')

@section('content')
	<div class="login-main-container">
		<div class="input-container">
			<form method="post" action="{{route('loginUser')}}" class="login-form">
				@csrf
				<div class="form-title">Belépés</div>
				<input type="email" placeholder="E-mail cím" name="email">
				<input type="password" placeholder="Jelszó" name="password">
				<input type="checkbox" name="rememberme"><label for="rememberme">Emlékezzen rám</label>
				<a href="{{route('passwordPage')}}">Elfelejtettem a jelszavam</a>
				<input type="submit" value="Belépés">
				<a class="gomb center" href="{{route('registrationPage')}}">Regisztráció</a>
			</form>
		</div>
	</div>
@endsection