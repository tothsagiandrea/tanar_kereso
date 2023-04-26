@extends('layouts.main')

@section('content')

<div class="teacher-container">
	<div class="filter-container">
		<h3>Szűrők</h3>
		<div class="filter-element-vertical">
			<label for="subject">Tantárgyak</label>
			<select id="subject" name="subject">
				@foreach ($subjects as $subject)
				<option value={{$subject->id}}>{{$subject->subject}}</option>
				@endforeach
			</select>
		</div>
		<div class="filter-element-vertical">
			<label for="grades">Tanulási szint</label>
			<select id="grades" name="grades">
				@foreach ($grades as $grade)
				<option value={{$grade->id}}>{{$grade->grade}}</option>
				@endforeach
			</select>
		</div>
		<div class="filter-element-vertical">
			<label class="form-check-label" for="exampleRadios1">oktatás módja</label>
			<div class="form-check">
				<label class="form-check-label" for="exampleRadios1">Online oktatás</label>
				<input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
			 </div>

		</div>
		<div class="filter-element-vertical">
			<label for="towns">Helyszín</label>
			<select id="towns" name="towns">
				@foreach ($towns as $town)
				<option value={{$town->id}}>{{$town->town}}</option>
				@endforeach
			</select>
		</div>
		<div class="filter-element-vertical">
			<label for="subject3">Óradíj</label>
			<select id="subject3" name="subject1">
				<option value="matek">Matek</option>
				<option value="fizika">Fizika</option>
				<option value="foldrajz">Földrajz</option>
			</select>
		</div>
		<button type="button" class="btn btn-danger">Szűrés</button>
	</div>
	<div class="teacher-list-container">
		<div class="teacher-list">
            @foreach ($teachers as $teacher)
            <a href="#" title="Részletekért kattints a névjegykártyára.">
				<div class="teacher-card">
					<div class="top-strip">
						<h2>{{ $teacher->full_name }}</h2>
						<h3>számítástechnika, programozás</h3>
					</div>
					<div class="avatar">
						<img src="{{ asset('img/user.svg')}}" alt="{{ $teacher->full_name }}">
					</div>
					<div class="details">
						<p>{{ $teacher->curriculum_vitae }}</p>
					</div>
					<a href="{{route('teacherPage', $teacher->id)}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
				</div>
			</a>
            @endforeach
		</div>
	</div>
</div>
@endsection
