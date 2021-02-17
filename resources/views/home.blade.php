@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 co-md-6 col-sm-12 col-xs-12">
                @foreach($news->slice(0, 1) as $new)
                    @include('front.partials.single_news', ['item' => $new, 'big' => true])
                @endforeach
            </div>
            <div class="col-xl-6 col-lg-6 co-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    @foreach($news->slice(1, 5) as $new)
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            @include('front.partials.single_news', ['item' => $new])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($news->slice(5, 100000000000) as $new)
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    @include('front.partials.single_news', ['item' => $new])
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
