@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{asset('css/teachers.css')}}">
@endsection

@section('content')
    <h1>{{ $teacher->user->name }} adatai</h1>
    @auth
    @if ($user->id == $teacher->user_id)
      <h3>Ez az Ön publikus adatlapja, amelyet mindenki láthat.</h3>
    @endif
    @endauth
    <div class="container-fluid teachPage">
      <div class="d-flex bg-light sablontanaroknak" style="height:700px">
        <div class="p-2 border" style="width: 250px">
          <div class="container-fluid sablontanaroknak">
            <p class="nev">{{ $teacher->full_name }}</p>
            <div class="avatar">
              <img src="{{ url("storage/profile_pics/$teacher->profile_pic_path") }}" class="rounded-circle fototanar" alt="{{ $teacher->user->name }} fényképe">
            </div>
            <hr color="#555457" width="60%" size="5">
            <p>Elérhetőségek</p>
            <span class="material-icons">
              email
            </span><br>
            <p>{{ $teacher->user->email }}</p>
            <span class="material-icons">
              location_on
            </span>
            @foreach ($teacher->towns->unique('county') as $town_with_county)
              <div class="teacher_location_county">{{ $town_with_county->county->county }}</div>
              <ul>
              @foreach ($teacher->towns as $town)
                @if($town->county == $town_with_county->county)
                <li class="teacher_location_county">{{ $town->town }}</li>
                @endif
              @endforeach
              </ul>
            @endforeach
            <hr color="#555457" width="60%" size="5">
            <p>Óradíj</p>
            <img src="{{ asset('img/banking.png')}}" class="iconbanking" alt="icon">
            <p>{{ $teacher->hourly_rate }} Ft/óra</p>
          </div>
        </div>
        <div class="p-2 border align-self-start"style="width: 500px">Rólam
          <div class="mt-4 p-5 bs-info-bg-subtle text-black rounded">
            <p>{!! $teacher->curriculum_vitae !!}</p>
          </div>
        </div>
        <div class="p-2 border" style="width: 250px">Tanított tantárgyak
          <table class="table-responsive table-secondary">
            <tr>
              <th  scope="col">Tantárgy</th>
              <th style="padding: 35px" scope="col">Szint</th>
            </tr>
            @foreach($teacher->grade_subjects->unique('subject') as $subject) 
            <tr>
                <td scope="row">{{ $subject->subject->subject }}</td>
                <td style="padding-left: 35px" scope="row">
                  <ul>
                    @foreach($teacher->grade_subjects as $grade_subject)
                      @if($grade_subject->subject == $subject->subject)
                      <li>{{ $grade_subject->grade->grade }}</li>
                      @endif                    
                    @endforeach
                  </ul>
                </td>
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