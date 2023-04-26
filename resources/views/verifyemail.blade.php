@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')

	<div class="message_container">
		<h1>Emailcím megerősítése</h1>
		<h3>Kedves Felhasználó!</h3>
		<p>Jelenleg még nem erősítetted meg profilodhoz tartozó email címedet</p>
		<p>Keresd fel email fiókodat, és keress "Tanárkereső" emailére!</p>
		<p>Ha szeretnéd, az alábbi gombra kattintva újraküldjük a megerősítő email!.</p>
		<form method="post" action="{{ route('verification.send') }}">
			@csrf
			<input type="submit" class="bn632-hover bn22" value="Email küldése">
		</form>
		<p>Üdv</p>
		<p>Tanárkereső</p>
	</div>
@endsection
