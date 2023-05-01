@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forum.css')}}">
@endsection
@section('content')
<h1>Fórum</h1>
<div class="forum-container">
	@auth
	<form action="{{ route('createForumTopic') }}" method="POST">
		@csrf
		<label for="forum_topics">Új téma létrehozása</label>
		<input type="text" id="forum_topics" name="forum_topic">
		<input type="submit" class="bn632-hover bn22 btn-topic-submit" value="Létrehoz">
	</form>
	@endauth
	@guest
		<div class="forum-message-container">Jelentkezzen be, ha új témájú fórumot szeretne létrehozni!</div>
	@endguest
	<div class="forum-topic-list">
		@if($errors->any())
		<div class="forum-message-container">{{$errors->first()}}</div>
		@endif
		@if ($forum_topics != null)
			
		@foreach ($forum_topics as $forum_topic)
		<a href="/forumtopic/{{ $forum_topic->id }}">
			<ul class="topic-container">
				<li>
					<span>Házigazda</span>
					{{ $forum_topic->user->name }}
				</li>
				<li>
					{{ $forum_topic->title }}
				</li>
				<li>
					<span>Létrehozva</span>
					{{ $forum_topic->created_at }}
				</li>
			</ul>
		</a>
		@endforeach

		@else
		<h3>Jelenleg még nincsenek fórum témák.</h3>
		@endif
	</div>
</div>

@endsection