@extends('layouts.app')

@section('content')
    @if($question)
        <div class="container mb-5 mt-5">
            <div class="row justify-content-center">
                <div class="mt-5 align-content-center text-center">
                    <img class="mx-auto d-block mb-4" src="image/tick.png">
                    <h4>Dziękujemy</h4>
                    <h6>Twoje zapytanie zostało wysłane.</h6>
                    <a href="/{{$slug}}" class="btn btn-outline-primary">Wróć do ogłoszenia</a>
                </div>
            </div>
        </div>
    @else
        <div class="container mb-5 mt-5">
            <div class="row justify-content-center">
                <div class="mt-5 align-content-center text-center">
                    <img class="mx-auto d-block mb-4" src="image/tick.png">
                    <h4>Dziękujemy</h4>
                    <h6>Twoje zgłoszenie zostało wysłane.</h6>
                </div>
            </div>
        </div>
    @endif
@endsection