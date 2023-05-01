@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forum.css')}}">
@endsection
@section('content')
<div class="forum-container posts">
	<h2>{{ $forum_topics->title }}</h2>
	@auth
	<form action="{{ route('forumPost') }}" method="POST">
		@csrf
		@if ($forum_posts != null)
		<input type="hidden" name="topic" value="{{ $forum_topics->id }}">
		@endif
		@if (isset($answers_to))
		<input type="hidden" name="answers_to" value="{{ $answers_to }}">
		<div class="forum-post" style="max-width: 591px; margin-bottom: 1em;">
			<ul class="forum-head">
				<li>#{{ $f_post->sn_number }}&nbsp;&nbsp;&nbsp;{{ $f_post->topic->user->name }}</li>
				<li>{{ $f_post->created_at }}</li>
			</ul>

			<div class="forum-post-text">
				{!! $f_post->post !!}
			</div>
		</div>
		@endif
		<textarea required minlength="10" class="ckeditor" id="forum_post" name="forum_post"></textarea>
		<input type="submit" class="bn632-hover bn22" value="Létrehoz">
	</form>
	@if($errors->any())
	<div class="forum-message-container">{{$errors->first()}}</div>
	@endif
	@endauth
	@guest
		<div class="forum-message-container">Hozzászóláshoz be kell jelentkezni!</div>
	@endguest
	<div class="forum-post-container">
		@if ($forum_posts != null)
		@foreach ($forum_posts as $forum_post)

		<div class="forum-post">
			<ul class="forum-head">
				@if ($forum_post->answer_to != null)
				<li>#{{ $forum_post->sn_number }}&nbsp;<span>&rarr;</span>&nbsp;#{{ $forum_post->answer_to }}&nbsp;&nbsp;&nbsp;{{ $forum_post->topic->user->name }}</li>
				@else
				<li>#{{ $forum_post->sn_number }}&nbsp;&nbsp;&nbsp;{{ $forum_post->topic->user->name }}</li>
				@endif
				<li>{{ $forum_post->created_at }}</li>
			</ul>

			<div class="forum-post-text">
				{!! $forum_post->post !!}
			</div>
			<div class="forum-bottom">
				<a href="/answerforumpost/{{ $forum_post->id }}">Valász erre a posztra</a>
			</div>
		</div>

		@endforeach
		@else
		<h3>Jelenleg még nincsen hozzászólás a témához.</h3>
		@endif
	</div>
	<div class="forum-post-bottom-container">
		<a class="bn632-hover bn22" href="{{route('forumPage')}}">Vissza</a>
	</div>
</div>

@endsection

@section('ckeditor')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection