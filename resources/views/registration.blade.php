@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')
<div class="registration-container">
	<div class="input-container">
		<form action="{{route('registerUser')}}" method="POST">
		@csrf
		<div class="form-title">Regisztráció</div>
			<div class="row">
				<div class="messages">	
					@if (session('status') && session('status') == "success")
						Sikeres regisztráció!
					@elseif((session('status') && session('status') == "fail") || $errors->any())
						Hiba történt a regisztráció közben!
					@else
						Minden mező kitöltése kötelező!
					@endif
				</div>
			</div>
			<div class="row">
				<div>
					<input type="email" id="email" name="email" placeholder="E-mail cím" required>
				</div>
			</div>
			<div class="row">
				<div>
					<input type="text" id="name" name="name" placeholder="Teljes név" required>
				</div>
			</div>
			<div class="row">
				<div>
					<select id="role" name="role" required>
						<option value="" disabled selected>Tanár vagy diák?</option>
					@foreach ($user_groups as $user_group)
						<option value="{{$user_group->id}}">{{$user_group->name}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div>
					<input type="password" id="password" name="password" placeholder="Jelszó" required>
				</div>
			</div>
			<div class="row">
				<div>
					<input type="password" id="password1" name="password1" placeholder="Jelszó újra" required>
				</div>
			</div>
			<div class="row">
				<a href="{{route('loginPage')}}">Korábban már regisztráltam.</a>
			</div>
			<div class="row">
				<input id="btn_submit" class="bn632-hover bn22" type="submit" value="Küldés">
			</div>
		</form>
	</div>
</div>
@endsection