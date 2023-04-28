@extends('layouts.main')

@section('content')
    <h1>{{ $user->name }} adatai</h1>
    <div class="container-fluid teachPage">
      <div class="d-flex bg-light sablontanaroknak" style="height:700px">
        <div class="p-2 border" style="width: 250px">
          <div class="container-fluid sablontanaroknak">
            <p class="nev">{{ $teacher->full_name }}</p>
            <img src="{{ url("storage/profile_pics/$teacher->profile_pic_path") }}" class="rounded-circle fototanar" alt="{{ $user->name }} fényképe">
            <hr color="#555457" width="60%" size="5">
            <p>Elérhetőségek</p>
            <span class="material-icons">
              email
            </span><br>
            <p>{{ $user->email }}</p>
            <span class="material-icons">
              location_on
            </span>
            @foreach ($teacher->towns as $town)
              <div class="teacher_location_county">{{ $town->county->county }}</div>
                <div class="teacher_location_town">{{ $town->town }}</div>
            @endforeach
            <hr color="#555457" width="60%" size="5">
            <p>Óradíj</p>
            <img src="{{ asset('img/banking.png')}}" class="iconbanking" alt="icon">
            <p>{{ $teacher->hourly_rate }} Ft/óra</p>
          </div>
        </div>
        <div class="p-2 border align-self-start"style="width: 500px">Rólam
          <div class="mt-4 p-5 bs-info-bg-subtle text-black rounded">
            <p>{{ $teacher->curriculum_vitae }}</p>
          </div>
        </div>
        <div class="p-2 border" style="width: 250px">Tanított tantárgyak
          <table class="table-responsive table-secondary">
            <tr>
              <th  scope="col">Tantárgy</th>
              <th style="padding: 35px" scope="col">Szint</th>
            </tr>
            @foreach($teacher->grade_subjects as $grade_subject)            
            <tr>
              <td scope="row">{{ $grade_subject->subject->subject }}</td>
              <td style="padding-left: 35px" scope="row">{{ $grade_subject->grade->grade }}</td>
            </tr>
						@endforeach
          </table>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <a href="{{route('indexPage')}}"><button type="button" class="bn632-hover bn22 visszabt">Vissza</button></a>
      </div>
    </div>

@endsection