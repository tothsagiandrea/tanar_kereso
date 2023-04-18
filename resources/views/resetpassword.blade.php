@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')
	<div class="login-main-container">
		<div class="input-container">
			<form method="post" action="{{route('password.update')}}" class="login-form">
				@csrf
				<div class="form-title">Új jelszó</div>
                @if ($errors->any())
                @foreach ($errors as $error)
                    {{ $error }}<br>
                @endforeach
                @endif
                <input type="hidden" name="token" value="{{ $token }}">
				<input type="email" placeholder="E-mail cím" name="email">
				<input type="password" placeholder="Jelszó" name="password">
				<input type="password" placeholder="Jelszó újra" name="password_confirmation">
				<div class="row">
					<input class="bn632-hover bn22" type="submit" value="Jelszó mentése">
				</div>
			</form>
		</div>
	</div>
@endsection