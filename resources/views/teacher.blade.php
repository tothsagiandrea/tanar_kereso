@extends('layouts.main')

@section('content')
    <h1>ez van</h1>
    <div class="container-fluid teachPage">
      <div class="d-flex bg-light" style="height:700px">
        <div class="p-2 border" style="width: 250px">
          <div class="container-fluid sablontanaroknak">
            <p class="nev">Gipsz Jakab</p>
            <p class="vegzettseg">Matematika tanár</p>
            <img src="{{ asset('img/profile1.jpg')}}" class="rounded-circle fototanar" alt="arckep">
            <hr color="#555457" width="80%" size="5">
            <p>Elérhetőségek</p>
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
            <p>Budapest</p>
            <hr color="#555457" width="80%" size="5">
            <p>Óradíj</p>
            <img src="{{ asset('img/banking.png')}}" class="iconbanking" alt="icon">
            <p>5000 Ft/óra</p>
          </div>
          
        </div>
        <div class="p-2 border align-self-start"style="width: 500px">Rólam
          <div class="mt-4 p-5 bs-info-bg-subtle text-black rounded">
            
            <p>Az ELTE matematika tanári mesterképzésén végeztem, magántanárként pedig már több mint öt éves szakmai tapasztalattal rendelkezem, éppen ezért megfelelően tudom kezelni azokat a problémákat, nehézségeket, amelyek a tanulás folyamán felmerülhetnek.Óráim személyre szabottak, minden tanulóm számára az igényeinek, elvárásainak megfelelő tantervet készítek. Rendszeres házi feladatokkal és egyéb módszertani eszközök felhasználásával segítem még inkább a megszerzett ismeretek elmélyítését.
              Legyen szó tehát felzárkóztatásról, vizsga- vagy zh felkészítésről, fordulj hozzám bizalommal!</p>
          </div>
        </div>
        <div class="p-2 border" style="width: 200px">Flex item 3</div>
      </div>
      <div class="d-flex justify-content-center">
        <a href="{{route('indexPage')}}"><button type="button" class="btn btn-primary">Vissza</button></a>
      </div>
      
      
      
    </div>
    
@endsection