@extends('layouts.app')

@section('content')
    <div class="container shadow p-3 mb-5">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12" style="min-height: 400px">
                <div class="fotorama" data-allowfullscreen="true">
                  @foreach($item->ad->photos as $photo)
                        <img src="{{ asset('data/media/ad/'.$photo->src) }}" alt="{{ $photo->src }}">
                    @endforeach
                </div>

            </div>
            <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <h3>{{ $item->title }}</h3>
                <ul class="social">
                    @if($item->ad->www)
                        <li>
                            <a href="{{ $item->ad->www }}">{{ App::getLocale() == 'pl' ? 'Strona internetowa' : 'Website page' }}</a>
                        </li>
                    @endif
                    <li>
                        @if($item->ad->fb)
                            <a href="{{ $item->ad->fb }}"><img src="{{ asset('image/facebook.png') }}" alt="fb"></a>
                        @endif
                        @if($item->ad->ig)
                            <a href="{{ $item->ad->ig }}"><img src="{{ asset('image/instagram.png') }}" alt="ig"></a>
                        @endif
                    </li>
                </ul>
                <div>
                    {{ App::getLocale() == 'pl' ? 'Cena:' : 'Price:' }} {{ $item->price }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {!! $item->content !!}
            </div>
        </div>
        @if($item->ad->type == 'talent')
            <div class="row">
                @if($item->ad->yt)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <iframe id="ytplayer" type="text/html" width="100%" height="360"
                                src="http://www.youtube.com/embed/{{substr($item->ad->yt, strpos($item->ad->yt, '=') + 1)}}?html5=1&amp;rel=0&amp;hl=en_US&amp;version=3"
                                frameborder="0"/>
                    </div>
                @endif
                @if($item->ad->soundcloud)
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <iframe id='sc-widget' width='100%' height='166' scrolling='no' frameborder='no'
                                src='https://w.soundcloud.com/player/?url={{$item->ad->soundcloud}}'></iframe>
                    </div>
                @endif
            </div>
        @endif
        @if($item->ad->type == 'accommodation')
            <div class="row">
                <div class="col-md-12">
                    <h4>{{ __('trans.accommodation') }}</h4>
                </div>
                <div class="col-12" style="margin-bottom: 20px;">
                        @foreach($item->ad->amenities as $amenity)
                            <img style="margin-right: 5px; width: 15px" src="{{ asset('image/tick.png') }}" alt="amenity-id-{{ $amenity->id }}">{{ $amenity->amenity->name }}</img>
                        @endforeach
                </div>
            </div>
        @endif
        <div class="contact-section">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h4>{{ App::getLocale() == 'pl' ? 'Skontaktuj się' : 'Contact' }}</h4>
                    <a href="mailto:{{ $item->ad->email_visible ?? $item->ad->email }}">{{ $$item->ad->email_visible ?? $item->ad->email }}</a>
                    <form method="post" action="" style="margin-top: 30px">
                        @csrf
                        <input name="email_from" type="hidden" value="{{ $item->ad->email }}">
                        <input name="title" type="hidden" value="{{ $item->title }}">
                        <div class="form-group">
                            <input id="name" aria-label="{{ __('trans.name') }}" name="name" class="form-control" placeholder="{{ __('trans.name') }}" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <input id="email" aria-label="E-mail" class="form-control" placeholder="E-mail" type="email" name="email">
                        </div>
                        <div class="form-group">
                            <textarea id="message" class="form-control" aria-label="{{ __('trans.message') }}" placeholder="{{ __('trans.message') }}" name="message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">{{ __('trans.send_message') }}</button>
                        </div>
                    </form>
                </div>
                @if($item->ad->type == 'accommodation')
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h4>{{ __('trans.send_question') }}</h4>
                        <form method="post" action="" style="margin-top: 30px">
                            @csrf
                            <input name="email_from" type="hidden" value="{{ $item->ad->email }}">
                            <input name="title" type="hidden" value="{{ $item->title }}">
                            <div class="form-group">
                                <input id="name" aria-label="{{ __('trans.name') }}" name="name" class="form-control" placeholder="{{ __('trans.name') }}" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <input id="email" aria-label="E-mail" class="form-control" placeholder="E-mail" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <textarea id="message" class="form-control" aria-label="{{ __('trans.message') }}" placeholder="{{ __('trans.message') }}" name="message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" aria-label="{{ __('trans.phone') }}" placeholder="{{ __('trans.phone') }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="date_from">{{ __('trans.from') }}</label>
                                    <input id="date_from" type="date" name="date_from" class="form-control" placeholder="{{ __('trans.from') }}" aria-label="{{ __('trans.from') }}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="date_to">{{ __('trans.to') }}</label>
                                    <input id="date_to" type="date" name="date_to" class="form-control" placeholder="{{ __('trans.to') }}" aria-label="{{ __('trans.to') }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <input type="number" name="adults" class="form-control" placeholder="{{ __('trans.adults') }}" aria-label="{{ __('trans.adults') }}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <input type="number" class="form-control" name="children" placeholder="{{ __('trans.children') }}" aria-label="{{ __('trans.children') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary">{{ __('trans.send_message') }}</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('customScripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
@endsection