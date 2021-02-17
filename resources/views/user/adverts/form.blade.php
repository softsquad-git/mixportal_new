@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <user-advert-form-component
            :save_url="'{{ route('user.advert.create', ['type' => $type]) }}'"
            :type="'{{ $type }}'"
            :ig_url="'{{ asset('image/instagram.png') }}'"
            :fb_url="'{{ asset('image/facebook.png') }}'"
        ></user-advert-form-component>
    </div>
@endsection