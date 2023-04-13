@extends('layouts.main')

@section('content')
<h1>ez van</h1>
<div class="container-fluid teachPage">
  <div class="container-fluid sablontanaroknak">
    <p class="nev">Gipsz Jakab</p>
    <p class="vegzettseg">Matematika tanár</p>
    <img src="{{ asset('img/profile1.jpg')}}" class="rounded-circle fototanar" alt="arckep">
    <hr color="#555457" width="20%" size="5">
  </div>
  <p>ide dolgozz</p>
  <p>ide dolgozz</p>
  <p>ide dolgozz</p>
  <p>ide dolgozz</p>
  <button type="button" class="btn btn-primary">Vissza</button>
  @endsection