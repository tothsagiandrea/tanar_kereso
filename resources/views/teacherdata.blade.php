@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/forms.css')}}">
@endsection

@section('content')
<h1>Személyes adatok</h1>
<div class="container-fluid teachdata">
	@if(session("status") && (session("status") == "missing_data"))
	<div>
		Minden mező kitöltendő!
	</div>
	@endif
	<form method="post" action="{{ route('setTeacherData') }}">
		@csrf
		<div class="row my-2">
			<div class="col">
				<label class="py-2" for="fullname">Teljes név</label>
				<input type="text" id="fullname" name="fullname" class="form-control" placeholder="Név" required @isset($user)
					value="{{$user->name}}"
				@endisset>
			</div>
			<div class="col">
				<label class="py-2" for="highest_degree">Legmagasabb iskolai végzettség</label>
				<select class="form-control" id="highest_degree" required name="highest_degree">
					@foreach ($qualifications as $qualification)
						<option value="{{ $qualification->id }}">{{ $qualification->qualification }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="exampleFormControlInput1">Email address</label>
				<input type="email" class="form-control" id="email" placeholder="example@example.hu" required @isset($user)
				value="{{$user->email}}" disabled
			@endisset>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="lesson_type">Oktatás módja</label>
				<div class="form_element_container">
					<div class="checkbox_container">
					@foreach ($lesson_types as $lesson_type)
						<input type="checkbox" id="lesson_type_{{ $lesson_type->id }}" name="lesson_type_{{ $lesson_type->id }}" value="{{ $lesson_type->id }}">
						<label for="lesson_type_{{ $lesson_type->id }}">{{ $lesson_type->lesson_type }}</label>
					@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="location">Válassza ki a preferált várost/kerületet</label>
				<select multiple class="form-control" id="location" name="location">
					@foreach ($counties as $county)
					<optgroup label="{{ $county->county }}">
						<div class="option_group">
							@foreach ($county->towns as $town)
							<option value={{ $town->id }}>{{ $town->town }}</option>
							@endforeach
						</div>
					</optgroup>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="subjects">Mely tantárgyakat szeretné tanítani?</label>
				<select multiple class="form-control" id="subjects" name="subjects">
					@foreach ($subjects as $subject)
					<optgroup label="{{ $subject->subject }}">
						@foreach ($subject->grades as $grade)
						<option value={{$subject->id}}_{{ $grade->id }}>{{ $grade->grade }}</option>
						@endforeach
					</optgroup>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row my-2">
			<div class="col">
				<label class="py-2" for="exampleFormControlInput1">Óra díj</label>
				<input type="text" class="form-control" placeholder="Ft/Óra" required>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="exampleFormControlTextarea1">Szakmai önéletrajz</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
			</div>
		</div>
		<div class="row my-2">
			<div class="form-group">
				<label class="py-2" for="exampleFormControlFile1">Profilkép (max 2MB, jpg formátum)</label>
				<input type="file" accept="*.jpg, *.jpeg" class="form-control-file" id="exampleFormControlFile1" required>
			</div>
		</div>
		<div class="row my-2">
			<div class="col">
				<label class="py-2" for="exampleFormControlInput1">Bemutatkozó videó YouTube link</label>
				<input type="text" class="form-control" placeholder="YouTube link">
			</div>
		</div>
		<div class="row my-2">
			<div class="col form-check ms-3">
				<a href="">Adatvédelmi szabályzat<br></a>
				<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				<label class="form-check-label py-2" for="defaultCheck1">
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