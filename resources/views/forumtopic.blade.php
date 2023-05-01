@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forum.css')}}">
@endsection
@section('content')
<h1>Fórum</h1>
@auth
<form action="{{ route('createForumTopic') }}" method="POST">
	@csrf
	<label for="forum_topics">Hozzászólás a témához</label>
	<input type="hidden" name="title" value="{{ $topic_id }}">
	<input type="text" id="forum_topics" name="forum_topic">
	<input type="submit" class="bn632-hover bn22" value="Létrehoz">
</form>
@endauth
@guest
	<div class="message_container">Hozzászóláshoz be kell jelentkezni!</div>
@endguest

@endsection