@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')
	<div class="message_container">
		<h1>Regisztráció törlése</h1>
		<p>Sajnáljuk, hogy törölni szeretné magát weboldalunkról.</p>
		<p>Tájékoztatjuk, hogy felhasználói fiókja törlésével minden adata törlődni fog rendszerünkből.</p>
		<p>Most még lehetősége van <a href="{{ route('indexPage') }}">visszalépni</a>, amennyiben tényleg törölné felhasználói fiókját, kattintson az alábbi gombra.</p>
		<form method="post" action="{{ route('deleteUser') }}">
			@csrf
			<input type="submit" class="bn632-hover bn22" value="Regisztráció törlése">
		</form>
		<p>Üdv</p>
		<p>Tanárkereső</p>
	</div>
@endsection