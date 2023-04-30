@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forum.css')}}">
@endsection
@section('content')
<h1>Fórum</h1>
<form action="" method="POST">
	<label for="forum_topics">Új téma létrehozása</label>
	<input type="text" id="forum_topics" name="forum_topic">
	<input type="submit" class="bn632-hover bn22" value="Létrehoz">
</form>

@endsection