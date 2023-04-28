@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')
<h1>Személyes adatok</h1>
<div class="container-fluid teachdata">
	<h5> 
		@isset($user)
			{{$user->name}}
		@endisset
		&nbsp;-&nbsp;
		@isset($user)
			{{$user->email}}
		@endisset
	</h5>
	@if(session("status") && (session("status") == "missing_data"))
	<div>
		Minden mező kitöltendő!
	</div>
	@endif
	<div class="form_messages">

	</div>
	<form id="teacher_data_form" method="post" action="{{ route('setTeacherData') }}" enctype="multipart/form-data">
		@csrf
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="highest_degree">Legmagasabb iskolai végzettség</label>
				<select class="form-control" id="highest_degree" name="highest_degree" required>
					@foreach ($qualifications as $qualification)
						<option value="{{ $qualification->id }}">{{ $qualification->qualification }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="lesson_type">Oktatás módja (CTRL lenyomásával többet is választhat)</label>
				<div class="form_element_container">
					<select multiple id="lesson_type" class="form-control" name="lesson_type[]" required>
					@foreach ($lesson_types as $lesson_type)
						<option value="{{ $lesson_type->id }}">{{ $lesson_type->lesson_type }}</option>
					@endforeach
					</select>
				</div>
			</div>
		</div>
		<div class="row my-2 location-row">
			<div class="form-group">
				<label class="py-2" for="location">Válassza ki a preferált várost/kerületet (CTRL lenyomásával többet is választhat)</label>
				<select multiple class="form-control" id="location" name="location[]">
					@foreach ($counties as $county)
					<optgroup label="{{ $county->county }}">
						@foreach ($county->towns as $town)
						<option value={{ $town->id }}>{{ $town->town }}</option>
						@endforeach
					</optgroup>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="subjects">Mely tantárgyakat szeretné tanítani? (CTRL lenyomásával többet is választhat)</label>
				<select multiple class="form-control" id="subjects" name="subjects[]">
					@foreach ($grades as $grade)
					<optgroup label="{{ $grade->grade }}">
						@foreach ($grade->subjects as $subject)
						<option value={{ $subject->id }}_{{ $grade->id }}>{{ $subject->subject }}</option>
						@endforeach
					</optgroup>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row my-2">
			<div class="col">
				<label class="py-2" for="hourly_rate">Óra díj</label>
				<input type="text" id="hourly_rate" class="form-control" name="hourly_rate" placeholder="Ft/Óra" required>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="cv_text">Szakmai önéletrajz</label>
				<textarea class="form-control" id="cv_text" name="cv_text" required></textarea>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="profile_pic">Profilkép (max 2MB, jpg formátum)</label>
				<input type="file" accept="*.jpg, *.jpeg" max="2048" class="form-control-file" id="profile_pic" name="profile_pic" required>
			</div>
		</div>
		<div class="row my-2">
			<div class="col">
				<label class="py-2" for="profile_video">Bemutatkozó videó YouTube link</label>
				<input type="url" class="form-control" id="profile_video" name="profile_video" placeholder="YouTube link">
			</div>
		</div>
		<div class="row my-2">
			<div class="col form-check ms-3">
				<a href="">Adatvédelmi szabályzat<br></a>
				<input class="form-check-input" type="checkbox" id="gdpr" required>
				<label class="form-check-label py-2" for="gdpr">
					Elolvastam és elfogadom az adatvédelmi szabályzatot.
				</label>
			</div>
		</div>
		<div class="row my-2">
			<div class="col center-elements">
				<input class="bn632-hover bn22" type="reset" name="btn_delete" value="Törlés">
				<input class="bn632-hover bn22" type="submit" name="btn_submit" value="Mentés">
			</div>
		</div>
	</form>

</div>
@endsection

@section('scripts')
<script src="{{asset('js/teacherdata.js')}}"></script>
@endsection