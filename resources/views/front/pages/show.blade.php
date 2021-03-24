@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5">
        <h4 class="mb-3"> {{ $item->title }}</h4>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12">
                <img src="{{ $item->news->getImage() }}" class="w-100" alt="{{ $item->title }}">
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-xs-12">
                <p>
                    {!! $item->text !!}
                </p>
            </div>
        </div>
    </div>
@endsection