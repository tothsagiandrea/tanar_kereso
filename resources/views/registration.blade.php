@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/registration.css')}}">
@endsection

@section('content')
<h1>Regisztráció</h1>
<div class="registration-container">
	<form action="{{route('registerUser')}}" method="POST">
	@csrf
		<div class="row">
			<div class="col-3 mt-1 mb-1">
	  			<label for="email">E-mail cím:</label>
			</div>
			<div class="col-9 mt-1 mb-1">
	  			<input type="email" id="email" name="email" placeholder="E-mail cím" required>
			</div>
  		</div>
  		<div class="row">
			<div class="col-3 mt-1 mb-1">
	  			<label for="name">Név:</label>
			</div>
			<div class="col-9 mt-1 mb-1">
	  			<input type="text" id="name" name="name" placeholder="Teljes név" required>
			</div>
  		</div>
  		<div class="row">
			<div class="col-3 mt-1 mb-1">
	  			<label for="role">Szerepkör<br>(Kérlek válaszd ki milyen szerepkörben szeretnél regisztrálni!)</label>
			</div>
			<div class="col-9 mt-1 mb-1">
	  			<select id="role" name="role" required>
				@foreach ($user_groups as $user_group)
					<option value="{{$user_group->id}}">{{$user_group->name}}</option>
				@endforeach
	  			</select>
			</div>
  		</div>
  		<div class="row">
			<div class="col-3 mt-1 mb-1">
	  			<label for="jelszo">Jelszó</label>
			</div>
			<div class="col-9 mt-1 mb-1">
	  			<input type="password" id="password" name="password" placeholder="Jelszó" required>
			</div>
  		</div>
  		<div class="row">
			<div class="col-3 mt-1 mb-1">
	  			<label for="jelszo">Jelszó újra</label>
			</div>
			<div class="col-9 mt-1 mb-1">
	  			<input type="password" id="password1" name="password1" placeholder="Jelszó újra" required>
			</div>
  		</div>
  		<div class="row mt-2">
			<input id="btn_submit" type="submit" value="Küldés">
  		</div>
  	</form>
</div>
@endsection