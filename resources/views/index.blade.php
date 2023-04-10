@extends('layouts.main')

@section('content')
<div class="teacher-container">
	<h2>Tanárok listája</h2>
	<div class="filter-container">
		<h3>Szűrés</h3>
		<div class="filter-element-vertical">
			<label for="subject1">Tantárgyak</label>
			<select id="subject1" name="subject1">
				<option value="matek">Matek</option>
				<option value="fizika">Fizika</option>
				<option value="foldrajz">Földrajz</option>
			</select>
		</div>
		<div class="filter-element-vertical">
			<label for="subject2">Tantárgyak</label>
			<select id="subject2" name="subject1">
				<option value="matek">Matek</option>
				<option value="fizika">Fizika</option>
				<option value="foldrajz">Földrajz</option>
			</select>
		</div>
		<div class="filter-element-vertical">
			<label for="subject3">Tantárgyak</label>
			<select id="subject3" name="subject1">
				<option value="matek">Matek</option>
				<option value="fizika">Fizika</option>
				<option value="foldrajz">Földrajz</option>
			</select>
		</div>
	</div>
	<div class="teacher-list-container">
		<div class="teacher-list">
			<a href="#" title="Részletekért kattints a névjegykártyára.">
				<div class="teacher-card">
					<div class="top-strip">
						<h2>Gipsz Jakab</h2>
						<h3>számítástechnika, programozás</h3>
					</div>
					<div class="avatar">
						<img src="{{ asset('img/user.svg')}}" alt="Gipsz Jakab">
					</div>
					<div class="details">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa a, delectus nemo voluptates officiis soluta ullam eius ad enim odio quo dolor, eveniet nisi! Ipsum eligendi facere veniam ab accusamus.</p>
					</div>
					<a href="{{route('teacherPage')}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
					<a href="{{route('teacherDataPage')}}">További információ</a>
				</div>
			</a>
			<a href="#" title="Részletekért kattints a névjegykártyára.">
				<div class="teacher-card">
					<div class="top-strip">
						<h2>Gipsz Jakab</h2>
						<h3>számítástechnika, programozás</h3>
					</div>
					<div class="avatar">
						<img src="{{ asset('img/user.svg')}}" alt="Gipsz Jakab">
					</div>
					<div class="details">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa a, delectus nemo voluptates officiis soluta ullam eius ad enim odio quo dolor, eveniet nisi! Ipsum eligendi facere veniam ab accusamus.</p>
					</div>
					<a href="{{route('teacherPage')}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
					<a href="{{route('teacherDataPage')}}">További információ</a>
				</div>
			</a>
			<a href="#" title="Részletekért kattints a névjegykártyára.">
				<div class="teacher-card">
					<div class="top-strip">
						<h2>Gipsz Jakab</h2>
						<h3>számítástechnika, programozás</h3>
					</div>
					<div class="avatar">
						<img src="{{ asset('img/user.svg')}}" alt="Gipsz Jakab">
					</div>
					<div class="details">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa a, delectus nemo voluptates officiis soluta ullam eius ad enim odio quo dolor, eveniet nisi! Ipsum eligendi facere veniam ab accusamus.</p>
					</div>
					<a href="{{route('teacherPage')}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
					<a href="{{route('teacherDataPage')}}">További információ</a>
				</div>
			</a>
			<a href="#" title="Részletekért kattints a névjegykártyára.">
				<div class="teacher-card">
					<div class="top-strip">
						<h2>Gipsz Jakab</h2>
						<h3>számítástechnika, programozás</h3>
					</div>
					<div class="avatar">
						<img src="{{ asset('img/user.svg')}}" alt="Gipsz Jakab">
					</div>
					<div class="details">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa a, delectus nemo voluptates officiis soluta ullam eius ad enim odio quo dolor, eveniet nisi! Ipsum eligendi facere veniam ab accusamus.</p>
					</div>
					<a href="{{route('teacherPage')}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
					<a href="{{route('teacherDataPage')}}">További információ</a>
				</div>
			</a>
			<a href="#" title="Részletekért kattints a névjegykártyára.">
				<div class="teacher-card">
					<div class="top-strip">
						<h2>Gipsz Jakab</h2>
						<h3>számítástechnika, programozás</h3>
					</div>
					<div class="avatar">
						<img src="{{ asset('img/user.svg')}}" alt="Gipsz Jakab">
					</div>
					<div class="details">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa a, delectus nemo voluptates officiis soluta ullam eius ad enim odio quo dolor, eveniet nisi! Ipsum eligendi facere veniam ab accusamus.</p>
					</div>
					<a href="{{route('teacherPage')}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
					<a href="{{route('teacherDataPage')}}">További információ</a>
				</div>
			</a>
			<a href="#" title="Részletekért kattints a névjegykártyára.">
				<div class="teacher-card">
					<div class="top-strip">
						<h2>Gipsz Jakab</h2>
						<h3>számítástechnika, programozás</h3>
					</div>
					<div class="avatar">
						<img src="{{ asset('img/user.svg')}}" alt="Gipsz Jakab">
					</div>
					<div class="details">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa a, delectus nemo voluptates officiis soluta ullam eius ad enim odio quo dolor, eveniet nisi! Ipsum eligendi facere veniam ab accusamus.</p>
					</div>
					<a href="{{route('teacherPage')}}"><button class="bn632-hover bn22">Tanár saját oldala</button></a>
					<a href="{{route('teacherDataPage')}}">További információ</a>
				</div>
			</a>
		</div>
	</div>
@endsection