@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')
	<div class="login-main-container">
		<div class="input-container">
			<form method="post" action="{{route('loginUser')}}" class="login-form">
				@csrf
				<div class="form-title">Belépés</div>
				<div class="row messages">
					@if (session('status'))
					 {{ session('status') }}
					@endif
				</div>
				<input type="email" placeholder="E-mail cím" name="email">
				<input type="password" placeholder="Jelszó" name="password">
				<div class="row">
					<input type="checkbox" name="remember" id="remember">
					<label for="remember">Emlékezzen rám</label>
				</div>
				<div class="row">
					<a href="{{route('passwordPage')}}">Elfelejtettem a jelszavam</a>
				</div>
				<div class="row">
					<input class="bn632-hover bn22" type="submit" value="Belépés">
					<a class="bn632-hover bn22" href="{{route('registrationPage')}}">Regisztráció</a>
				</div>
			</form>
		</div>
	</div>
@endsection