@extends('layouts.app')

@section('content')
    @if(!$error)
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="mt-5 align-content-center text-center">
                <img class="mx-auto d-block mb-4" src="image/tick.png">
                <h4>Płatność się udała, dziękujemy!</h4>
                <h6>Niedługo Twoje ogłoszenie powinno się pojawić na stronie.</h6>
                <button onclick="window.location.href='ogloszenia'" type="button"  class="btn btn-success mt-3">Zobacz swoje ogłoszenia</button>
            </div>
        </div>
    </div>
    @elseif($error = 501)
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="mt-5 align-content-center text-center">
                    <img class="mx-auto d-block mb-4" src="image/sad.png">
                    <h4>Coś poszło nie tak</h4>
                    <h6>Spróbuj jeszcze raz, możesz zapłacić za to ogłoszenie w zakładce moje ogłoszenia.</h6>
                </div>
            </div>
        </div>
    @endif

@endsection
