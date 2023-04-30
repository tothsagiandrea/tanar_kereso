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
	<div class="form_messages"></div>
	{{ dd($teacher->lesson_types) }}
	{{ $teacher->lesson_types->map(function (App\Models\LessonType $item, $key) {return $item['id'];})->all() }}
	{{ dd(array_map(fn($assoc) => $assoc['id'], $teacher->lesson_types)) }}
	<form id="teacher_data_form" method="post" action="{{ route('setTeacherData') }}" enctype="multipart/form-data">
		@csrf
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="highest_degree">Legmagasabb iskolai végzettség</label>
				<select class="form-control" id="highest_degree" name="highest_degree" required>
					@foreach ($qualifications as $qualification)

					@if ($teacher->qualification != null && $teacher->qualification->qualification_id == $qualification->id)
						<option value="{{ $qualification->id }}" selected>{{ $qualification->qualification }}</option>
					@else
						<option value="{{ $qualification->id }}">{{ $qualification->qualification }}</option>
					@endif
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
					
					@if ($teacher->lesson_types != null && in_array($lesson_type->id, $teacher->lesson_types[0]["id"]))
						<option value="{{ $lesson_type->id }}" selected>{{ $lesson_type->lesson_type }}</option>
					@else
						<option value="{{ $lesson_type->id }}">{{ $lesson_type->lesson_type }}</option>
					@endif
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
						@if ($teacher->towns != null && $teacher->towns->town_id == $towns->id)
							<option value="{{ $town->id }}" selected>{{ $town->town }}</option>
						@else
							<option value="{{ $town->id }}">{{ $town->town }}</option>
						@endif
						@endforeach

						<option value={{ $town->id }}>{{ $town->town }}</option>
					</optgroup>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="subjects">Mely tantárgyakat szeretné tanítani? (CTRL lenyomásával többet is választhat)</label>
				<select multiple class="form-control" id="subjects" name="subjects[]" required>
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
				<input type="text" id="hourly_rate" class="form-control" name="hourly_rate" @if ($teacher->hourly_rate != null)value="{{ $teacher->hourly_rate }}"@endif placeholder="Ft/Óra" required>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="cv_text">Szakmai önéletrajz</label>
				<textarea class="form-control ckeditor" id="cv_text" name="cv_text" required>@if ($teacher->curriculum_vitae != null){{ $teacher->curriculum_vitae }}@endif</textarea>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="profile_pic">Profilkép (max 2MB, jpg formátum)</label>
				@if ($teacher->profile_pic_path != null)
					<input type="file" accept="*.jpg, *.jpeg" max="2048" class="form-control-file" id="profile_pic" name="profile_pic">
				@else
					<input type="file" accept="*.jpg, *.jpeg" max="2048" class="form-control-file" id="profile_pic" name="profile_pic" required>
				@endif
			</div>
		</div>
		<div class="row my-2">
			<div class="col">
				<label class="py-2" for="profile_video">Bemutatkozó videó YouTube link</label>
				<input type="url" class="form-control" id="profile_video" name="profile_video" @if ($teacher->profile_video_path != null)value="{{ $teacher->profile_video_path }}"@endif placeholder="YouTube link">
			</div>
		</div>
		<div class="row my-2">
			<div class="col form-check ms-3">
				<a href="{{route('gdprPage')}}">Adatvédelmi szabályzat<br>a>
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

@section('ckeditor')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
@endsection
