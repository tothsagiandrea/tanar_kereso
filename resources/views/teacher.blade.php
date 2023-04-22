@extends('layouts.main')

@section('content')
    <h1>ez van</h1>
    <div class="container-fluid teachPage">
      <div class="d-flex bg-light sablontanaroknak" style="height:700px">
        <div class="p-2 border" style="width: 250px">
          <div class="container-fluid sablontanaroknak">
            <p class="nev">{{ $teacher->full_name }}</p>
            <p class="vegzettseg">Matematika tanár</p>
            <img src="{{ asset('img/profile1.jpg')}}" class="rounded-circle fototanar" alt="arckep">
            <hr color="#555457" width="60%" size="5">
            <p>Elérhetőségek</p>
            <span class="material-icons">
            phone
            </span><br>
            <p>+36/35-200-4000</p>
            <span class="material-icons">
              email
            </span><br>
            <p>{{ $teacher->email }}</p>
            <span class="material-icons">
              location_on
            </span>
            <p>Budapest</p>
            <hr color="#555457" width="60%" size="5">
            <p>Óradíj</p>
            <img src="{{ asset('img/banking.png')}}" class="iconbanking" alt="icon">
            <p>{{ $teacher->hourly_rate }} Ft/óra</p>
          </div>

        </div>
        <div class="p-2 border align-self-start"style="width: 500px">Rólam
          <div class="mt-4 p-5 bs-info-bg-subtle text-black rounded">

            <p>Az ELTE matematika tanári mesterképzésén végeztem, magántanárként pedig már több mint öt éves szakmai tapasztalattal rendelkezem, éppen ezért megfelelően tudom kezelni azokat a problémákat, nehézségeket, amelyek a tanulás folyamán felmerülhetnek.Óráim személyre szabottak, minden tanulóm számára az igényeinek, elvárásainak megfelelő tantervet készítek. Rendszeres házi feladatokkal és egyéb módszertani eszközök felhasználásával segítem még inkább a megszerzett ismeretek elmélyítését.
              Legyen szó tehát felzárkóztatásról, vizsga- vagy zh felkészítésről, fordulj hozzám bizalommal!</p>
          </div>
        </div>
        <div class="p-2 border" style="width: 250px">Tanított tantárgyak
          <table class="table-responsive table-secondary">
            <tr>
              <th  scope="col">Tantárgy</th>
              <th style="padding: 35px" scope="col">Szint</th>
            </tr>
            <tr>
              <td scope="row">Matematika</td>
              <td style="padding-left: 35px" scope="row">Középiskola</td>
            </tr>
            <tr>
              <td scope="row">Kémia</td>
              <td style="padding-left: 35px" scope="row">Általános</td>
            </tr>
          </table>

        </div>
      </div>
      <div class="d-flex justify-content-center">
        <a href="{{route('indexPage')}}"><button type="button" class="bn632-hover bn22 visszabt">Vissza</button></a>
      </div>



    </div>

@endsection
