@extends('layouts.main')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@endsection
@section('content')
<div class="container kapcsolat">
    <div class="login-main-container">
		<div class="input-container">
			<form method="post" action="{{route('loginUser')}}" class="login-form">
				@csrf
				<div class="form-title">Kapcsolat
				</div>
				<div class="container adat">
					<input type="name" placeholder="Név" name="name">
					<input type="email" placeholder="E-mail cím" name="email">
					<input type="text" placeholder="Üzenet" name="message">
					<div class="row">
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
				<p>gipszjakab@gmail.com</p>
				<span class="material-icons">
					location_on
				</span>
				<p>1171, Budapest Borsfa utca 19.</p>
				<div class="col">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2696.4256549890797!2d19.271981415626207!3d47.48162067917665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741c6b53acafec3%3A0x701b84342b06ae32!2sBudapest%2C%20Borsfa%20u.%2019%2C%201171!5e0!3m2!1shu!2shu!4v1681732895825!5m2!1shu!2shu" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="g-maps"></iframe>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection
