@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
	<link rel="stylesheet" href="{{asset('css/forms.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection
@section('content')
<div class="container kapcsolat">
    <div class="contacts-container">
		<div class="input-container">
			<form method="post" action="{{route('sendEmail')}}" class="login-form">
				@csrf
				<div class="form-title">Kapcsolat
				</div>
				<div class="container adat">
					<div class="messages">
						@if ($errors->any())
							Hiba történt a regisztráció közben!
						@else
							Minden mező kitöltése kötelező!
						@endif
					</div>
					<input type="name" placeholder="Név" name="name" required>
					<input type="email" placeholder="E-mail cím" name="email" required>
                    <textarea required class="form-control" id="message" name="message" placeholder="Üzenet"></textarea>
					<div class="row imnotarobot">
						<input type="checkbox" name="imnotrobot" id="imnotrobot">
						<label for="imnotrobot">Nem vagyok robot!</label>
					</div>

					<div class="row">
						<input class="bn632-hover bn22" type="submit" value="Küldés">
					</div>
				</div>

			</form>
		</div>
	</div>
	<div class="flexbox">
		<div class="row">
			<div class="elerhetoseg col">
				<p class="pElerhetoseg">Elérhetőségek</p>
				<hr>
				<span class="material-icons">
					phone
				</span><br>
				<p>+36/35-200-4000</p>
				<span class="material-icons">
					email
				</span><br>
				<p>info.tanarkereso@gmail.com</p>
				<span class="material-icons">
					location_on
				</span>
				<p>6710, Szeged-Tápé</p>
				<div class="col">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2758.2972039229653!2d20.20678645637151!3d46.26419760542263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDbCsDE1JzUxLjEiTiAyMMKwMTInNDIuMCJF!5e0!3m2!1shu!2shu!4v1682860614215!5m2!1shu!2shu" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="g-maps"></iframe>
                </div>
			</div>

		</div>
	</div>
</div>
@endsection
