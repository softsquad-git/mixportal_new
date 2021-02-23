@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <h5 class="mb-4">
            {{ __('trans.pages.advert.add_base') }} {{ trans('trans.pages.advert.title.'.$type) }}
        </h5>
        <user-advert-form-component
            :save_url="'{{ route('user.advert.create', ['type' => $type]) }}'"
            :type="'{{ $type }}'"
            :ig_url="'{{ asset('image/instagram.png') }}'"
            :fb_url="'{{ asset('image/facebook.png') }}'"
            :yt_url="'{{ asset('image/youtube.png') }}'"
            :sc_url="'{{ asset('image/soundcloud.png') }}'"
            :categories_url="'{{ route('api.categories.all') }}'"
            :sub_categories_url="'{{ route('api.categories.sub') }}'"
            :current_lang="'{{ App::getLocale() }}'"
            :amenities_url="'{{ route('api.adverts.amenities') }}'"
        ></user-advert-form-component>
        <div class="payments-logo">
            <img src="{{ asset('image/PAYU_LOGO_LIME.png') }}" alt="PayU"/>
            <img src="{{ asset('image/PayPal-Logo.png') }}" alt="PayPal"/>
        </div>
    </div>
@endsection