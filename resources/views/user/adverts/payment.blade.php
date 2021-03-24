@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="payment card shadow-lg">
            <h4>{{ trans('trans.get_payment') }}</h4>
            <p>{{ trans('trans.get_payment_info') }}</p>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <a href="{{ route('user.advert.get_payment', ['adId' => $id, 'type' => 'paypal']) }}" class="payment-link">
                        <img src="{{ asset('image/PayPal-Logo.png') }}" alt="paypal">
                        <span>{{ trans('trans.payment_paypal') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection