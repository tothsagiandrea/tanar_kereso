@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forum.css')}}">
@endsection
@section('content')
<h1>Fórum</h1>
<div class="forum-topic-container">
	@auth
	<form action="{{ route('createForumTopic') }}" method="POST">
		@csrf
		<label for="forum_topics">Új téma létrehozása</label>
		<input type="text" id="forum_topics" name="forum_topic">
		<input type="submit" class="bn632-hover bn22" value="Létrehoz">
	</form>
	@endauth
	@guest
		<div class="message_container">Jelentkezzen be, ha új témájú fórumot szeretne létrehozni!</div>
	@endguest
	<div class="forum-topic-list">
		@foreach ($forum_topics as $forum_topic)
			
		@endforeach
	</div>
</div>

@endsection