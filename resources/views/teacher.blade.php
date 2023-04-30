@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/teachers.css')}}">
@endsection

@section('content')
		<h1>{{ $teacher->user->name }} adatai</h1>
		@auth
		@if ($user->id == $teacher->user_id)
			<h3>Ez az Ön publikus adatlapja, amelyet mindenki láthat.</h3>
		@endif
		@endauth
		<div class="teacher-page">
			<div class="teacher-main-container">
				<div class="teacher-left-container">
					<div class="teacher-contacts">
						<div class="avatar">
							<img src="{{ url("storage/profile_pics/$teacher->profile_pic_path") }}" class="rounded-circle fototanar" alt="{{ $teacher->user->name }} fényképe">
						</div>
					</div>
					<h5>Elérhetőségek</h5>
					<div class="teacher-contacts">
						<span class="material-icons">
							email
						</span>
						<p>{{ $teacher->user->email }}</p>
					</div>
					<div class="teacher-contacts location">
						<span class="material-icons">
							location_on
						</span>
						<div class="locations">
							<ul>
							@foreach ($teacher->lesson_types as $lesson_type)
								<li>{{ $lesson_type->lesson_type }}</li>
							@endforeach
							</ul>
							@foreach ($teacher->towns->unique('county') as $town_with_county)
							<div class="teacher-location-county">{{ $town_with_county->county->county }}</div>
							<ul>
							@foreach ($teacher->towns as $town)
								@if($town->county == $town_with_county->county)
								<li class="teacher-location-town">{{ $town->town }}</li>
								@endif
							@endforeach
							</ul>
						@endforeach
						</div>
					</div>
					<div class="teacher-contacts">
						<span class="material-icons">
							payments
						</span>
						<p>{{ $teacher->hourly_rate }} Ft/óra</p>
					</div>
				</div>
				<div class="teacher-right-container">
					<div class="teacher-subjects">
						<h5>Tanított tantárgyak</h5>
						<div>
							@foreach($teacher->grade_subjects->unique('subject') as $subject) 
							<div class="teached-subject">{{ $subject->subject->subject }}</div>
							<ul class="subject-grades">
							@foreach($teacher->grade_subjects as $grade_subject)
								@if($grade_subject->subject == $subject->subject)
								<li>{{ $grade_subject->grade->grade }}</li>
								@endif                    
							@endforeach
							</ul>
							@endforeach
						</div>
					</div>
					@if ($teacher->profile_video_path != null)
					<h5>Bemutatkozó videóm</h5>
					<div class="teacher-video">
						<a href="{{ $teacher->profile_video_path }}"" target="_blank">Videó megtekintése</a>
					</div>
					@endif
					<h5>Rólam</h5>
					<div class="teacher-cv">
						{!! $teacher->curriculum_vitae !!}
					</div>
				</div>
			</div>
			<div class="button-container">
				<a href="{{route('indexPage')}}" class="bn632-hover bn22">Vissza</a>
			</div>
		</div>

@endsection