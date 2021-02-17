@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger ">

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Nowy link aktywacyjny został wysłany.') }}
                        </div>
                    @endif

                    {{ __('Proszę najpierw zweryfikować adres email.') }}
                    {{ __('Jeśli nie dostałeś maila') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kliknij by wysłać jeszcze raz.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
