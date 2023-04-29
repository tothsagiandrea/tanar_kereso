@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/teachers.css')}}">
@endsection

@section('content')

<div class="teacher-container">
	<div class="filter-container">
		<div class="filter-elements">
			<label for="subject">Tantárgyak</label>
			<select id="subject" name="subject">
				<option selected value="" disabled>Válasszon tantárgyat!</option>
				@foreach ($subjects as $subject)
				<option value={{$subject->id}}>{{$subject->subject}}</option>
				@endforeach
			</select>
		</div>
		<div class="filter-elements">
			<label for="grades">Tanulási szint</label>
			<select id="grades" name="grades">
				<option selected value="" disabled>Válasszon tanulási szintet!</option>
				@foreach ($grades as $grade)
				<option value={{$grade->id}}>{{$grade->grade}}</option>
				@endforeach
			</select>
		</div>
		<div class="filter-elements">
			<label class="form-check-label" for="exampleRadios1">Oktatás módja</label>
			<div class="form-check">
				<label class="form-check-label" for="exampleRadios1">Online oktatás</label>
				<input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="Online oktatás">
			</div>
		</div>
		<div class="filter-elements">
			<label for="towns">Helyszín</label>
			<select id="towns" name="towns">
				<option selected value="" disabled>Válasszon helyszínt!</option>
				@foreach ($towns as $town)
				<option value={{$town->id}}>{{$town->town}}</option>
				@endforeach
			</select>
		</div>
		<button type="button" class="btn btn-danger btn-filter">Szűrés</button>
	</div>
		
	<div class="teacher-list">
		@foreach ($teachers as $teacher)
		<a href="#" title="Részletekért kattints a névjegykártyára.">
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
				<a href="{{route('teacherPage', $teacher->id)}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
			</div>
		</a>
		@endforeach
	</div>
</div>
@endsection
