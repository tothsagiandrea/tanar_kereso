@extends('layouts.main')

@section('csrf')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('css/teachers.css')}}">
@endsection

@section('content')

<div class="teacher-container">
	<div class="filter-container">
		<div class="filter-inner-container">
			<div class="filter-icon">
				Tanárok szűrése
				<span class="material-icons">
					filter_alt
				</span>
			</div>
			<div class="filter-close">
				Szűrő bezárása
				<span class="material-icons">
					expand_less
				</span>
			</div>
			<div class="filter-elements">
				<label for="subject">Tantárgyak</label>
				<select multiple id="subject" name="subject">
					@foreach ($subjects as $subject)
					<option value={{$subject->id}}>{{$subject->subject}}</option>
					@endforeach
				</select>
			</div>
			<div class="filter-elements">
				<label for="grades">Tanulási szint</label>
				<select multiple id="grades" name="grades">
					@foreach ($grades as $grade)
					<option value={{$grade->id}}>{{$grade->grade}}</option>
					@endforeach
				</select>
			</div>
			<div class="filter-elements">
				<label for="lesson_type">Oktatás módja</label>
				<select multiple id="lesson_type" name="lesson_type">
					@foreach ($lesson_types as $lesson_type)
					<option value={{$lesson_type->id}}>{{$lesson_type->lesson_type}}</option>
					@endforeach
				</select>
			</div>
			<div class="filter-elements">
				<label for="towns">Helyszín</label>
				<select multiple id="towns" name="towns">
					@foreach ($towns as $town)
					<option value={{$town->id}}>{{$town->town}}</option>
					@endforeach
				</select>
			</div>
			<button type="button" class="btn btn-danger btn-filter">Szűrés</button>
		</div>
	</div>
		
	<div class="teacher-list">
		<div class="message_container"></div>
		@foreach ($teachers as $teacher)
		<a href="{{route('teacherPage', $teacher->id)}}" class="teacher-card-a" id="{{ $teacher->id }}" title="Részletekért kattints a névjegykártyára!">
			<div class="teacher-card">
				<div class="top-strip">
					<h2>{{ $teacher->user->name }}</h2>
					{{ $teacher->grade_subjects->unique('subject')->implode('subject.subject', ', ') }}
				</div>
				<div class="avatar">
					@php
						$path = $teacher->profile_pic_path
					@endphp 
					<img src="{{ url("storage/profile_pics/$path") }}" alt="">
				</div>
				<div class="details">
					<div class="payments">
						<span class="material-icons">
							payments
						</span>
						<p>{{ $teacher->hourly_rate }} Ft/óra</p>
					</div>
					<div class="locations">
						<span class="material-icons">
							location_on
						</span>
						{!! $teacher->lesson_types->implode('lesson_type', '<br>') !!}
					</div>
				</div>
				<button onClick="{{route('teacherPage', $teacher->id)}}" class="bn632-hover bn22">Tanár saját oldala</button>
			</div>
		</a>
		@endforeach
	</div>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/teacherdata.js')}}"></script>
@endsection