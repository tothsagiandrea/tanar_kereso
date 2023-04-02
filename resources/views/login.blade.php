@extends('layouts.main')

@section('content')
	<div class="login-main-container">
		<div class="input-container">
			<form method="post" action="{{route('loginUser')}}" class="login-form">
				@csrf
				<div class="form-title">Belépés</div>
				<input type="text" placeholder="E-mail cím" name="user_id">
				<input type="password" placeholder="Jelszó" name="password">
				<input type="submit" value="Belépés">
				<a class="gomb center" href="{{route('registrationPage')}}">Regisztráció</a>
			</form>
		</div>
	</div>
@endsection