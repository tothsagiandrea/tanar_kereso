@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/teachers.css')}}">
@endsection

@section('content')

<div class="teacher-container">
	<div class="filter-container">
		<a id="szurogomb" class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h3>Szűrők</h3></a>
		<div class="row">
			<div class="col">
			  <div class="collapse multi-collapse" id="multiCollapseExample1">
				<div class="card-szuro card-body">
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
					<button type="button" class="btn btn-danger btszures">Szűrés</button>
				</div>
				</div>
			  </div>
			</div>
	</div>
		
	<div class="teacher-list-container">
		<div class="teacher-list">
            @foreach ($teachers as $teacher)
            <a href="#" title="Részletekért kattints a névjegykártyára.">
				<div class="teacher-card">
					<div class="top-strip">
						<h2>{{ $teacher->first()->name }}</h2>
						{{ $teacher->implode('subject', ', ') }}
					</div>
					<div class="avatar">
						@php
							$path = $teacher->first()->profile_pic_path
						@endphp 
						<img src="{{ url("storage/profile_pics/$path") }}" alt="">
					</div>
					<div class="details">
						<div class="payments">
							<span class="material-icons">
								payments
							</span>
							<p>{{ $teacher->first()->hourly_rate }} Ft/óra</p>
						</div>
						<div class="locations">
							<span class="material-icons">
								location_on
							</span>
							<ul>
							{{ dd($teacher) }}
							</ul>
						</div>
					</div>
					<a href="{{route('teacherPage', $teacher->first()->id)}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
				</div>
			</a>
            @endforeach
		</div>
	</div>
</div>
@endsection
