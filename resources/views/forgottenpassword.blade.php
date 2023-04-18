@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')
	<div class="login-main-container">
		<div class="input-container">
			<form method="post" action="{{route('forgottenpassword')}}" class="login-form">
				@csrf
				<div class="form-title">Elfelejtett<br>jelszó</div>
				<div class="row messages">
					@if (session('status'))
					 {{ session('status') }}
					@endif
				</div>
				<input type="email" placeholder="E-mail cím" name="email">
				<div class="row">
					<a href="{{route('loginPage')}}">Vissza a belépés oldalra</a>
				</div>
				<div class="row">
					<input class="bn632-hover bn22" type="submit" value="Elküld">
				</div>
			</form>
		</div>
	</div>
@endsection