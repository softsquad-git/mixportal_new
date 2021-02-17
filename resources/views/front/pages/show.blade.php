@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5">
        <h4 class="mb-3"> {{ $item->title }}</h4>
        <p>
            {!! $item->content !!}
        </p>
    </div>
@endsection