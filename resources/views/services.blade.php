@extends('layouts.main')

@section('content')
  
<article class="col-sm12 col-lg6">
    <div class="flex-container">
      <div id="carousel-container">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/slide1.jpg" class="d-block w-100 img-fluid" alt="slide1">
              <div class="carousel-caption d-none d-md-block"></div>  
            </div>
            <div class="carousel-item">
              <img src="img/slide2.jpg" class="d-block w-100 img-fluid"  alt="slide2">
              <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
              <img src="img/slide3.jpg" class="d-block w-100 img-fluid"  alt="slide3">
              <div class="carousel-caption d-none d-md-block"></div>
            </div>
            <div class="carousel-item">
              <img src="img/slide4.jpg" class="d-block w-100 img-fluid"  alt="slide4">
              <div class="carousel-caption d-none d-md-block"></div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      
      <div class="flex-item-right">
        <p class="infolink"><b>Fontosabb információk</b><br>Itt megpróbáltuk összegyűjteni a fontosabb <br> információkhoz szükséges linkeket.</p>
        <a href='https://www.felvi.hu/felveteli' target="blank">Felvételi »  Alapinformációk »</a>
        <a href='https://www.felvi.hu/'>felvi.hu</a>
        <a href='https://dtk.tankonyvtar.hu/'>Digitális Tankönyvtár oldala</a>
        <a href='https://tudasbazis.sulinet.hu/hu'>Sulinet>>Tudásbázis</a>
        <a href='https://mek.oszk.hu/'>Magyar Elektronikus Könyvtár</a>
        <a href='https://hirmagazin.sulinet.hu/hu/hirek/jatekalapu-tanulas'>Játékalapú tanulás?</a>
        <a href='https://www.w3schools.com/css/tryit.asp?filename=trycss3_flexbox_responsive2'>akármi</a>
      </div>
    </div>
<article>
<div class="blog">Ide tervezünk egy blog blokkot</div>
@endsection